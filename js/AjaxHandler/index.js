/**
 * AJAX Bulk Request System
 * Sends a single AJAX request for multiple data sources
 */
class AjaxBulkRequestSystem {
    constructor() {
        this.allRequests = {}; // All requests
        this.templateCache = {}; // Format: { sourceName: { loopKey: htmlTemplate } }
        this.isProcessing = false; // Flag to prevent multiple simultaneous requests
        this.batchTimeout = null; // Timeout for batching requests
        this.batchDelay = 50; // Delay in milliseconds to batch requests
        this.paginationState = {}; // Format: { sourceName: { page, limit, total, pages, offset } }
        this.loadedPages = {}; // For scroll pagination: { sourceName: Set(pageNumbers) }
    }

    main() {
        this.loadAllSources();
        // Bind scroll pagination after initial load
        setTimeout(() => {
            this.bindAllScrollPaginations();
        }, 100);
    }

    // Load data for all sources
    loadAllSources() {
        // Clear any existing batch timeout
        if (this.batchTimeout) {
            clearTimeout(this.batchTimeout);
        }

        // Initialize template cache for all elements before making requests
        this.initializeTemplateCache();

        // Collect all sources first without sending requests
        const sources = [];
        $('[jd-source]').each((index, element) => {
            sources.push($(element));
        });

        // Queue all requests without sending
        sources.forEach(($element) => {
            this.queueRequestOnly($element);
        });

        // Show skeleton loading for all sources
        this.showSkeleton();

        // Set loading state for all elements with jd-data
        this.setLoadingState();

        // Send single batch request after small delay
        this.batchTimeout = setTimeout(() => {
            this.sendBulkRequest();
        }, this.batchDelay);
    }

    // Initialize template cache for all elements
    initializeTemplateCache() {
        $('[jd-source]').each((index, element) => {
            const $element = $(element);
            const sourceName = $element.attr('jd-source');
            const dropSelector = $element.attr('jd-drop');

            if (sourceName && dropSelector) {
                let $drop;
                if (dropSelector === 'this') {
                    $drop = $element;
                } else {
                    $drop = $(dropSelector);
                }

                if ($drop.length) {
                    if (!this.templateCache[sourceName]) {
                        this.templateCache[sourceName] = {};
                    }
                    // Store the current HTML structure for skeleton loading
                    this.templateCache[sourceName]['skeleton'] = $drop.html();
                }
            }
        });

        // Cache actual templates from pick selectors for data rendering
        $('[jd-source]').each((index, element) => {
            const $element = $(element);
            const sourceName = $element.attr('jd-source');
            const pickSelector = $element.attr('jd-pick');

            if (sourceName && pickSelector) {
                const $pick = $(pickSelector);
                if ($pick.length) {
                    if (!this.templateCache[sourceName]) {
                        this.templateCache[sourceName] = {};
                    }

                    const template = $pick.html();
                    this.templateCache[sourceName]['data'] = template;
                }
            }
        });

        // Cache templates for jd-ref elements with jd-for
        $('[jd-ref][jd-for], [jd-ref-context][jd-for]').each((index, element) => {
            const $element = $(element);
            const sourceName = $element.attr('jd-ref') || $element.attr('jd-ref-context');
            const forKey = $element.attr('jd-for');

            if (sourceName && forKey) {
                if (!this.templateCache[sourceName]) {
                    this.templateCache[sourceName] = {};
                }
                // Store template and also create a clean version for skeleton loading
                let template = $element.html();
                this.templateCache[sourceName][forKey] = template;
                this.templateCache[sourceName][forKey + '_skeleton'] = template.replace(/<js-script>[\s\S]*?<\/js-script>/g, '');
            }
        });
    }

    // Function to load source (for individual refresh)
    loadSource(source = false) {
        let $element;

        if (typeof source === 'string') {
            $element = $(`[jd-source="${source}"]`);
            if (!$element.length) {
                console.error(`Source element not found: ${source}`);
                return;
            }
        } else {
            $element = source;
        }

        const sourceName = $element.attr('jd-source');
        if (!sourceName) {
            console.error('Source name not specified');
            return;
        }

        // Show skeleton loading for this specific source (skip for scroll loads beyond first page)
        const isScroll = $element.is('[jd-scroll-paginate]');
        const currentPage = parseInt($element.attr('jd-page')) || (this.paginationState[sourceName]?.page || 1);

        if (!(isScroll && currentPage > 1)) {
            this.showSkeletonForSource(sourceName);
            this.setLoadingState(sourceName);
        } else {
            // For scroll pagination beyond first page, show loading indicator
            this.showScrollLoadingIndicator(sourceName);
        }

        // Queue request and send immediately for individual refresh
        this.queueRequestOnly($element);
        this.sendBulkRequest();
    }

    // Function to queue request without sending (used for batching)
    queueRequestOnly($element) {
        const sourceName = $element.attr('jd-source');
        let params = {};
        let filters = {};

        // Get filters from attribute
        try {
            const filtersAttr = $(`[jd-filters="${sourceName}"]`);

            filtersAttr.find('[jd-filter]').each((index, filterElement) => {
                const $filter = $(filterElement);
                const name = $filter.attr('name');
                if (!name) return;

                const type = $filter.attr('type');
                const filterType = $filter.attr('jd-filter-type');

                // Handle checkboxes and radios
                if (type === 'radio' || type === 'checkbox') {
                    if ($filter.is(':checked')) {
                        filters[name] = $filter.val();
                    }
                } else {
                    // Other input types (text, select, etc.)
                    const value = $filter.val();
                    if (value !== '' && value !== null && value !== undefined) {
                        filters[name] = value;
                    }
                }
            });
        } catch (error) {
            console.error('Error processing filters:', error);
        }

        // Store the filters in the params
        params['filters'] = filters;

        // Pagination params - FIXED: Use current page from element or state
        const state = this.paginationState[sourceName] || {};
        const elementPage = parseInt($element.attr('jd-page'));
        const currentPage = elementPage || state.page || 1;
        const defaultLimit = parseInt($element.attr('jd-limit')) || state.limit || 10;

        params['pagination'] = {
            page: currentPage,
            limit: defaultLimit
        };

        // Reset loaded pages when starting over on scroll paginate (page 1 with filters)
        if ($element.is('[jd-scroll-paginate]') && currentPage <= 1) {
            this.loadedPages[sourceName] = new Set();
        }

        // Store element in pending requests
        this.allRequests[sourceName] = {
            element: $element,
            manager: sourceName,
            params: params
        };
    }

    // Function to queue request (legacy method for individual requests)
    queueRequest($element) {
        // Clear any existing batch timeout
        if (this.batchTimeout) {
            clearTimeout(this.batchTimeout);
        }

        this.queueRequestOnly($element);

        // Send batch request after small delay to allow other requests to queue
        this.batchTimeout = setTimeout(() => {
            this.sendBulkRequest();
        }, this.batchDelay);
    }

    // Function to send Bulk Request For all pending requests
    sendBulkRequest() {
        // Clear batch timeout
        if (this.batchTimeout) {
            clearTimeout(this.batchTimeout);
            this.batchTimeout = null;
        }

        // Prevent multiple simultaneous requests
        if (this.isProcessing || Object.keys(this.allRequests).length === 0) {
            return;
        }

        this.isProcessing = true;

        // Prepare bulk request data
        const bulkData = {
            AJAX_REQUEST: true,
            requests: {}
        };

        // Add each pending request to the bulk request
        for (const source in this.allRequests) {
            const request = this.allRequests[source];
            bulkData.requests[source] = {
                DATA_MANAGER: request.manager,
                params: request.params
            };
        }

        // Send AJAX request
        $.ajax({
            url: window.location.href,
            type: 'GET',
            data: bulkData,
            dataType: 'json',
            success: (response) => {
                // Process each response
                if (response && response.data) {
                    for (const source in this.allRequests) {
                        if (response.data[source]) {
                            const $element = this.allRequests[source].element;
                            this.processResponse(response.data[source], $element);
                        } else {
                            console.error(`No response data for source: ${source}`);
                        }
                    }
                } else {
                    console.error('Invalid response format:', response);
                }
            },
            error: (xhr, status, error) => {
                console.error('Error sending bulk request:', error);

                // Show error for each pending request
                for (const source in this.allRequests) {
                    const $element = this.allRequests[source].element;
                    console.error($element, 'Failed to load data. Please try again.');
                }
            },
            complete: () => {
                // Clear all requests and reset processing flag
                this.allRequests = {};
                this.isProcessing = false;
                this.removeLoadingState();
                this.hideScrollLoadingIndicators();
            }
        });
    }

    // Function to process the response
    processResponse(response, $element) {
        const pickSelector = $element.attr('jd-pick');
        const dropSelector = $element.attr('jd-drop');
        const sourceName = $element.attr('jd-source');
        if (!sourceName) return;

        const $pick = $(pickSelector);
        const $drop = (dropSelector === 'this') ? $element : $(dropSelector);
        const isScrollPaginate = $element.is('[jd-scroll-paginate]');

        // IMPORTANT: Update pagination state FIRST from server response
        if (response && response.pagination) {
            const respPage = parseInt(response.pagination.page) || 1;
            const respLimit = parseInt(response.pagination.limit) || 10;
            const respTotal = parseInt(response.pagination.total) || 0;
            const computedPages = Math.max(1, Math.ceil(respTotal / (respLimit || 1)));
            const computedOffset = (respPage - 1) * respLimit;

            this.paginationState[sourceName] = {
                page: respPage,
                limit: respLimit,
                total: respTotal,
                pages: computedPages,
                offset: computedOffset
            };
        }

        // Check if we have data
        if (response && (response.data || Array.isArray(response))) {
            const data = response.data || response;

            // Check if template is cached
            if (!this.templateCache[sourceName] || !this.templateCache[sourceName]['data']) {
                console.error(`Template not cached for source: ${sourceName}`);
                return;
            }

            const rawHtml = this.templateCache[sourceName]['data'];
            let htmlOutput = '';

            data.forEach((item) => {
                let template = rawHtml;

                // Create context with all available functions and variables
                const context = {
                    ...item,
                    item,
                    console,
                    Object,
                    Math,
                    Date,
                    String,
                    Number,
                    Array,
                    Boolean,
                    JSON
                };

                htmlOutput += this.processTemplate(template, context);
            });

            // Handle scroll pagination vs regular pagination
            if (isScrollPaginate && response.pagination && typeof response.pagination.page !== 'undefined') {
                const pageNum = parseInt(response.pagination.page) || 1;
                if (!this.loadedPages[sourceName]) this.loadedPages[sourceName] = new Set();

                if (pageNum === 1) {
                    // First page - replace all content and remove skeleton
                    $drop.find('[jd-skeleton]').remove();
                    $drop.html(htmlOutput);
                    this.loadedPages[sourceName].clear();
                    this.loadedPages[sourceName].add(pageNum);
                } else if (!this.loadedPages[sourceName].has(pageNum)) {
                    // Subsequent pages - append content
                    $drop.append(htmlOutput);
                    this.loadedPages[sourceName].add(pageNum);
                }
            } else {
                // Regular pagination - replace all content
                $drop.find('[jd-skeleton]').remove();
                $drop.html(htmlOutput);
            }

            // Execute success callback if defined
            const successCallback = $element.attr('jd-success');
            if (successCallback && typeof window[successCallback] === 'function') {
                try {
                    window[successCallback](response, $element);
                } catch (e) {
                    console.error(`Error in jd-success callback '${successCallback}':`, e);
                }
            }
        } else {
            console.error($element, 'No data available');
            // Remove skeleton even if no data
            if (isScrollPaginate) {
                const pageNum = parseInt(response.pagination?.page) || 1;
                if (pageNum === 1) {
                    $drop.find('[jd-skeleton]').remove();
                    $drop.html('<div class="no-data">No data available</div>');
                }
            } else {
                $drop.find('[jd-skeleton]').remove();
                $drop.html('<div class="no-data">No data available</div>');
            }
        }

        // Update and render pagination controls for non-scroll sources
        if (!isScrollPaginate && response && response.pagination) {
            this.renderPaginationControls($element, this.paginationState[sourceName]);
        }

        // Handle jd-ref and jd-ref-context elements
        this.processRefElements(response, $element);
    }

    // New function to handle jd-ref and jd-ref-context elements
    processRefElements(response, $sourceElement) {
        const sourceName = $sourceElement.attr('jd-source');

        // Find all elements with jd-ref or jd-ref-context that match this source
        $(`[jd-ref="${sourceName}"], [jd-ref-context="${sourceName}"]`).each((index, element) => {
            const $refElement = $(element);
            const refAttr = $refElement.attr('jd-ref') || $refElement.attr('jd-ref-context');
            const forAttr = $refElement.attr('jd-for');

            if (refAttr === sourceName) {
                if (forAttr) {
                    // Handle jd-for: loop through specified array
                    this.processRefWithLoop($refElement, response, forAttr);
                } else {
                    // Handle simple jd-ref: display data directly
                    this.processRefSimple($refElement, response);
                }
            }
        });
    }

    // Process jd-ref with jd-for (loop)
    processRefWithLoop($element, response, forKey) {
        const sourceName = $element.attr('jd-ref') || $element.attr('jd-ref-context');
        if (!sourceName) return;

        // Check if template is cached
        if (!this.templateCache[sourceName] || !this.templateCache[sourceName][forKey]) {
            console.error(`Template not cached for source: ${sourceName}, forKey: ${forKey}`);
            return;
        }

        const originalHtml = this.templateCache[sourceName][forKey];
        let outputHtml = '';

        // Get the array data for looping
        const loopData = response[forKey];

        if (Array.isArray(loopData)) {
            loopData.forEach((item, index) => {
                // Create context with item data and response data
                const context = {
                    ...item,
                    ...response,
                    item,
                    index,
                    console,
                    Object,
                    Math,
                    Date,
                    String,
                    Number,
                    Array,
                    Boolean,
                    JSON
                };

                outputHtml += this.processTemplate(originalHtml, context);
            });
            $element.html(outputHtml);
        } else {
            console.error(`No array data found for jd-for="${forKey}"`);
        }
    }

    // Process simple jd-ref (no loop)
    processRefSimple($element, response) {
        // Read template directly from DOM (no global cache)
        let template = $element.data('original-template');
        if (!template) {
            template = $element.html();
            $element.data('original-template', template);
        }

        // Create context with all response data
        const context = {
            ...response,
            console,
            Object,
            Math,
            Date,
            String,
            Number,
            Array,
            Boolean,
            JSON
        };

        const processedTemplate = this.processTemplate(template, context);
        $element.html(processedTemplate);
    }

    // Centralized template processing function
    processTemplate(template, context) {
        // Create sandbox for safe execution
        const sandbox = new Proxy(context, {
            has: () => true,
            get: (target, key) => {
                if (key in target) {
                    return target[key];
                }
                if (key in globalThis) {
                    return globalThis[key];
                }
                return undefined;
            },
            set: (target, key, value) => {
                target[key] = value;
                return true;
            }
        });

        // Process js-script blocks
        const jsScriptMatch = template.match(/<js-script>([\s\S]*?)<\/js-script>/);
        if (jsScriptMatch) {
            const scriptContent = jsScriptMatch[1].trim();

            try {
                const scopedFunction = new Function('sandbox', `
                with (sandbox) {
                    try {
                        ${scriptContent}
                        
                        const localVars = {};
                        ${this.extractVariableNames(scriptContent).map(varName => `
                            if (typeof ${varName} !== 'undefined') {
                                localVars.${varName} = ${varName};
                            }
                        `).join('')}
                        
                        return localVars;
                    } catch (err) {
                        console.error('Error in js-script execution:', err);
                        return {};
                    }
                }
            `);

                const localVars = scopedFunction(sandbox);

                if (localVars && typeof localVars === 'object' && localVars !== null) {
                    try {
                        Object.assign(sandbox, localVars);
                    } catch (assignError) {
                        console.error('Error assigning localVars to sandbox:', assignError);
                    }
                }

            } catch (executionError) {
                console.error('Error executing js-script block:', executionError);
            }

            template = template.replace(jsScriptMatch[0], '');
        }

        // Process template expressions ${...}
        template = template.replace(/\${(.*?)}/g, (match, expr) => {
            try {
                const decodedExpr = this.decodeHtmlEntities(expr.trim());

                // Pass both sandbox and globalThis (window in browser)
                const evalFunc = new Function('sandbox', 'globalScope', `
                            with (globalScope) {
                                with (sandbox) {
                                    return ${decodedExpr};
                                }
                            }
                        `);

                let result = evalFunc(sandbox, globalThis); // Inject global functions too

                if (result === undefined || result === null) return '';

                // Auto-stringify objects/arrays
                if (typeof result === 'object') {
                    try {
                        return JSON.stringify(result);
                    } catch (err) {
                        console.error('Error stringifying result:', err);
                        return '';
                    }
                }

                return result;
            } catch (e) {
                console.error(`Error evaluating expression: ${expr}`, e);
                return '';
            }
        });

        // Process dynamic attributes and classes
        template = this.processDynamicAttributes(template, sandbox);

        return template;
    }

    // Process dynamic attributes and classes
    processDynamicAttributes(template, sandbox) {
        // Process dynamic class attributes: class="${expression}"
        template = template.replace(/class\s*=\s*["']([^"']*\${[^}]*}[^"']*)["']/g, (match, classExpr) => {
            try {
                const processedClass = classExpr.replace(/\${(.*?)}/g, (innerMatch, expr) => {
                    try {
                        // Decode HTML entities in the expression
                        const decodedExpr = this.decodeHtmlEntities(expr.trim());

                        const evalFunc = new Function('with(this) { return ' + decodedExpr + '; }');
                        const result = evalFunc.call(sandbox);
                        return result !== undefined && result !== null ? result : '';
                    } catch (e) {
                        console.error(`Error evaluating class expression: ${expr}`, e);
                        return '';
                    }
                });
                return `class="${processedClass}"`;
            } catch (e) {
                console.error('Error processing dynamic class:', e);
                return match;
            }
        });

        // Process other dynamic attributes: attribute="${expression}"
        template = template.replace(/(\w+)\s*=\s*["']([^"']*\${[^}]*}[^"']*)["']/g, (match, attrName, attrValue) => {
            if (attrName === 'class') return match; // Already processed above

            try {
                const processedValue = attrValue.replace(/\${(.*?)}/g, (innerMatch, expr) => {
                    try {
                        // Decode HTML entities in the expression
                        const decodedExpr = this.decodeHtmlEntities(expr.trim());

                        const evalFunc = new Function('with(this) { return ' + decodedExpr + '; }');
                        const result = evalFunc.call(sandbox);
                        return result !== undefined && result !== null ? result : '';
                    } catch (e) {
                        console.error(`Error evaluating attribute expression: ${expr}`, e);
                        return '';
                    }
                });
                return `${attrName}="${processedValue}"`;
            } catch (e) {
                console.error(`Error processing dynamic attribute ${attrName}:`, e);
                return match;
            }
        });

        return template;
    }

    // Extract variable names from script content
    extractVariableNames(script) {
        const regex = /\b(?:let|const|var)\s+([a-zA-Z_$][a-zA-Z0-9_$]*)/g;
        const names = [];
        let match;
        while ((match = regex.exec(script))) {
            names.push(match[1]);
        }
        return names;
    }

    // Helper function to decode HTML entities in expressions
    decodeHtmlEntities(str) {
        return str.replace(/&gt;/g, '>')
            .replace(/&lt;/g, '<')
            .replace(/&amp;/g, '&')
            .replace(/&quot;/g, '"')
            .replace(/&#39;/g, "'");
    }

    // Function to display loading where is jd-data attribute
    setLoadingState(source = false) {
        if (source) {
            $(`[jd-source="${source}"], [jd-ref="${source}"], [jd-ref-context="${source}"]`).find('[jd-data]').each(function () {
                $(this).attr('jd-data', 'loading');
            });
        } else {
            $('[jd-data]').each(function () {
                $(this).attr('jd-data', 'loading');
            });
        }
    }

    // Function to remove loading state
    removeLoadingState() {
        $('[jd-data]').each(function () {
            // Remove only if current value is 'loading'
            if ($(this).attr('jd-data') === 'loading') {
                $(this).attr('jd-data', 'loaded');
            }
        });
    }

    // Function to show skeleton loading for all sources
    showSkeleton() {
        // Show skeleton for all cached sources
        for (const source in this.templateCache) {
            this.showSkeletonForSource(source);
        }
    }

    // Function to show skeleton loading for specific source
    showSkeletonForSource(source) {
        const cache = this.templateCache[source];

        if (cache) {
            // Handle main jd-source="source"
            $(`[jd-source="${source}"]`).each((index, element) => {
                const $el = $(element);
                const count = parseInt($el.attr('jd-loading-count')) || 1; // Default to 3 skeleton items
                let template = cache.skeleton || cache.data || '';

                // Remove js-script tags from skeleton template
                template = template.replace(/<js-script>[\s\S]*?<\/js-script>/g, '');

                let output = '';
                for (let i = 0; i < count; i++) {
                    output += template;
                }

                const dropSelector = $el.attr('jd-drop');
                const $drop = dropSelector === 'this' ? $el : $(dropSelector);
                if ($drop.length) {
                    $drop.html(output);
                }
            });

            // Handle all jd-ref + jd-for="xxx"
            $(`[jd-ref="${source}"][jd-for], [jd-ref-context="${source}"][jd-for]`).each((index, element) => {
                const $el = $(element);
                const forKey = $el.attr('jd-for');
                const count = parseInt($el.attr('jd-loading-count')) || 1;
                let template = cache[forKey + '_skeleton'] || cache[forKey] || '';

                // Fallback: remove js-script tags if clean version not available
                if (!cache[forKey + '_skeleton'] && cache[forKey]) {
                    template = template.replace(/<js-script>[\s\S]*?<\/js-script>/g, '');
                }

                let output = '';
                for (let i = 0; i < count; i++) {
                    output += template;
                }

                $el.html(output);
            });

            // Handle simple jd-ref elements without global cache: use their current DOM as skeleton
            $(`[jd-ref="${source}"]:not([jd-for]), [jd-ref-context="${source}"]:not([jd-for])`).each((index, element) => {
                const $el = $(element);
                let original = $el.data('original-template');
                if (!original) {
                    original = $el.html();
                    $el.data('original-template', original);
                }
                let cleaned = original.replace(/<js-script>[\s\S]*?<\/js-script>/g, '');
                $el.html(cleaned);
            });
        }
    }

    // Show loading indicator for scroll pagination
    showScrollLoadingIndicator(sourceName) {
        const $element = $(`[jd-source="${sourceName}"]`);
        const dropSelector = $element.attr('jd-drop');
        const $drop = dropSelector === 'this' ? $element : $(dropSelector);

        if ($drop.length) {
            // Remove existing indicator
            $drop.find('.jd-scroll-loading').remove();

            // Add loading indicator at the end
            const loadingHtml = '<div class="jd-scroll-loading" style="text-align: center; padding: 20px;">Loading more...</div>';
            $drop.append(loadingHtml);
        }
    }

    // Hide all scroll loading indicators
    hideScrollLoadingIndicators() {
        $('.jd-scroll-loading').remove();
    }

    // Render numeric pagination controls for table-like sources
    renderPaginationControls($sourceElement, pagination) {
        const sourceName = $sourceElement.attr('jd-source');
        if (!sourceName || !pagination) return;

        const dropSelector = $sourceElement.attr('jd-drop');
        const $drop = dropSelector === 'this' ? $sourceElement : $(dropSelector);

        // Determine where to place pagination
        let $container = null;
        const paginationSelector = $sourceElement.attr('jd-pagination');
        if (paginationSelector) {
            $container = $(paginationSelector);
        }
        if (!$container || !$container.length) {
            // Create or reuse a sibling container after the drop area
            const existing = $drop.next('.jd-pagination[data-source="' + sourceName + '"]');
            $container = existing.length ? existing : $('<div class="jd-pagination" data-source="' + sourceName + '"></div>').insertAfter($drop);
        }

        const current = parseInt(pagination.page) || 1;
        const limit = parseInt(pagination.limit) || 10;
        const totalFromState = parseInt(pagination.total) || 0;
        const totalPages = (parseInt(pagination.pages) || (totalFromState > 0 ? Math.ceil(totalFromState / (limit || 1)) : 1));

        // Build page items (limit to a window around current)
        const windowSize = 5;
        let start = Math.max(1, current - Math.floor(windowSize / 2));
        let end = Math.min(totalPages, start + windowSize - 1);
        start = Math.max(1, Math.min(start, end - windowSize + 1));

        let html = '';
        html += `<li class="jd-page page-item jd-prev" data-source="${sourceName}" data-page="${Math.max(1, current - 1)}" ${current <= 1 ? 'disabled' : ''}>&laquo;</li>`;
        for (let i = start; i <= end; i++) {
            html += `<li class="jd-page page-item ${i === current ? 'active' : ''}" data-source="${sourceName}" data-page="${i}">${i}</li>`;
        }
        html += `<li class="jd-page page-item jd-next" data-source="${sourceName}" data-page="${Math.min(totalPages, current + 1)}" ${current >= totalPages ? 'disabled' : ''}>&raquo;</li>`;

        $container.html(html);
    }

    // Handle numeric pagination change
    handlePageChange(sourceName, newPage) {
        const $element = $(`[jd-source="${sourceName}"]`).first();
        if (!$element.length) return;
        const state = this.paginationState[sourceName] || {};
        const totalPages = state.pages || (state.total && state.limit ? Math.max(1, Math.ceil(state.total / (state.limit || 1))) : 1);
        const boundedPage = Math.max(1, Math.min(newPage, totalPages));
        this.paginationState[sourceName] = {
            ...state,
            page: boundedPage
        };
        $element.attr('jd-page', boundedPage);
        this.loadSource($element);
    }

    // Bind scroll-based pagination for card-like grids
    bindAllScrollPaginations() {
        $('[jd-source][jd-scroll-paginate]').each((index, element) => {
            const $element = $(element);
            const sourceName = $element.attr('jd-source');
            this.bindScrollPagination($element);
        });
    }

    bindScrollPagination($element) {
        const sourceName = $element.attr('jd-source');
        if (!sourceName) return;
        const dropSelector = $element.attr('jd-drop');
        const $drop = dropSelector === 'this' ? $element : $(dropSelector);
        if (!$drop.length) return;

        const onScroll = () => {
            const state = this.paginationState[sourceName];

            if (!state) return;
            if (state.page >= state.pages) return; // No more pages
            if (this.isProcessing) return; // avoid concurrent

            const threshold = 150; // px from bottom
            const scrollContainer = $drop.get(0);
            const scrollTop = scrollContainer.scrollTop;
            const scrollHeight = scrollContainer.scrollHeight;
            const clientHeight = scrollContainer.clientHeight;
            const nearBottom = (scrollHeight - scrollTop - clientHeight) < threshold;

            if (nearBottom) {
                const nextPage = state.page + 1;
                if (!this.loadedPages[sourceName]) this.loadedPages[sourceName] = new Set();
                if (this.loadedPages[sourceName].has(nextPage)) {
                    return; // already loaded
                }

                // Update pagination state for next page
                this.paginationState[sourceName] = {
                    ...state,
                    page: nextPage
                };

                // Set page and load source
                $element.attr('jd-page', nextPage);
                this.loadSource($element);
            }
        };

        // Ensure container is scrollable
        if ($drop.css('overflow-y') === 'visible' || !$drop.css('overflow-y')) {
            $drop.css('overflow-y', 'auto');
        }

        // Make sure container has a height if not set
        if (!$drop.height() || $drop.height() === 0) {
            $drop.css('max-height', '400px'); // Default max height
        }

        // Remove any existing scroll handlers and bind new one
        $drop.off('scroll.jdScrollPaginate').on('scroll.jdScrollPaginate', onScroll);
    }

    // Method to handle filter changes
    handleFilterChange(sourceName) {
        const $element = $(`[jd-source="${sourceName}"]`);
        if (!$element.length) return;

        // Reset pagination to page 1 when filters change
        this.paginationState[sourceName] = {
            ...(this.paginationState[sourceName] || {}),
            page: 1
        };
        $element.attr('jd-page', 1);

        // Clear loaded pages for scroll pagination
        if ($element.is('[jd-scroll-paginate]')) {
            this.loadedPages[sourceName] = new Set();
        }

        // Load the source with new filters
        this.loadSource($element);
    }

    // Method to refresh a specific source
    refreshSource(sourceName) {
        const $element = $(`[jd-source="${sourceName}"]`);
        if (!$element.length) return;

        // Reset to page 1
        this.paginationState[sourceName] = {
            ...(this.paginationState[sourceName] || {}),
            page: 1
        };
        $element.attr('jd-page', 1);

        // Clear loaded pages for scroll pagination
        if ($element.is('[jd-scroll-paginate]')) {
            this.loadedPages[sourceName] = new Set();
        }

        this.loadSource($element);
    }
}

// Initialize the system
const AS = new AjaxBulkRequestSystem();

// Load all sources when document is ready
$(document).ready(function () {
    AS.main();
    AS.bindAllScrollPaginations();
});

// Send source request on applying filter
$(document).on('change', '[jd-filter]', function (e) {
    e.preventDefault();
    const source = $(this).closest('[jd-filters]').attr('jd-filters');
    // Reset page to 1 on filter change
    const $element = $(`[jd-source="${source}"]`).first();
    if ($element.length) {
        $element.attr('jd-page', 1);
    }
    refreshSource(source);
});

// Handle numeric pagination clicks
$(document).on('click', '.jd-pagination .jd-page', function (e) {
    e.preventDefault();
    const $btn = $(this);
    if ($btn.is('[disabled]')) return;
    const source = $btn.attr('data-source');
    const page = parseInt($btn.attr('data-page')) || 1;
    AS.handlePageChange(source, page);
});