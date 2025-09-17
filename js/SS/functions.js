// Tags initializer
function initTcTags(selectors) {
    $(selectors).each(function () {
        if ($(this).hasAttr("data-launched")) return true;
        $(this).attr("data-launched", "true");
        new Tags($(this));
    });
}

// left trim
function ltrim(str, char) {
    if (!str.length) return str;

    let rgx = new RegExp(`^(${char})+`, "g");
    return str.replace(rgx, "");
}
// right trim
function rtrim(str, char) {
    if (!str.length) return str;

    let rgx = new RegExp(`(${char})+$`, "g");
    return str.replace(rgx, "");
}
// trim from both sides
function trim(str, char = " ") {
    str = ltrim(str, char);
    str = rtrim(str, char);
    return str;
}

// Wait Promise
function wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//#region ss select list
function ssSelectFn() {
    $("select.ss-select").each(function () {
        let selectElement = this;

        // Check if the data-launch attribute exists
        if ($(selectElement).attr("data-launch") === "true") {
            return; // Already initialized
        }

        $(selectElement).attr("data-launch", "true");

        let options = $(this).find("option").map(function () {
            let dataAttrs = $.map($(this).data(), (value, key) => `data-${key}="${value}"`).join(" "),
                text = $(this).text().trim(),
                html = $(this).dataVal("html"),
                styles = $(this).attr("ss-style") || ""; // Use || instead of hasAttr()

            let attrs = {
                text: text,
                value: $(this).attr("value"),
                selected: $(this).prop("selected"), // Use prop() instead of hasAttr()
                innerHTML: `<div class="pull-away option" style="${styles}" ${dataAttrs}>
                            <span>${text}</span>
                            ${$(selectElement).attr("data-update") ? '<i class="hgi hgi-stroke hgi-pencil-edit-02 edit-icon"></i>' : ''}
                        </div>`
            };
            if (html) attrs.innerHTML = html;
            return attrs;
        }).get();

        let showMoreButton = $(selectElement).attr("data-toggle") === "true";
        let slimSelect = new SlimSelect({
            select: selectElement,
            valuesUseText: false,
            data: options,
            onChange: function (selected) {
                // Update selected options on change
                if (Array.isArray(selected)) updateSelectedOptions(selected);
            }
        });
        // Function to update selected options in the Slim Select
        function updateSelectedOptions(selected) {
            options.forEach(option => {
                option.selected = selected.some(sel => sel.value === option.value);
            });
            slimSelect.setData(options);
        }

        if (options.filter(option => option.selected).length > 2 && showMoreButton) {
            let moreButton = $(`<button class='more-button'>Show More</button>`),
                lessButton = $(`<button class='less-button'>Show Less</button>`),
                container = $("<div class='bc-ss-select-container pull-right'></div>");

            container.append(moreButton, lessButton);
            $(this).next(".ss-main").after(container);

            function toggleOptions(showMore) {
                if (showMore) {
                    slimSelect.setData(options);
                    moreButton.hide();
                    lessButton.show();
                } else {
                    let options_ = options.filter(option => option.selected);
                    let optionTextLength = options_.slice(0, 2).filter(option => option.text.length < 14).length;
                    if (!optionTextLength) optionTextLength = 1;
                    slimSelect.setData(options_.slice(0, optionTextLength));
                    moreButton.show();
                    lessButton.hide();
                }
            }

            moreButton.on("click", function () {
                toggleOptions(true);
            });

            lessButton.on("click", function () {
                toggleOptions(false);
            });

            toggleOptions(false);
        }

        // Event listener for closing selected options
        $(selectElement).on('click', '.ss-value-delete', function () {
            let selectedValue = $(this).siblings('span').text(); // Get the value of the option being removed
            // Find the option in the original select element and unselect it
            $(selectElement).find(`option:contains(${selectedValue})`).prop('selected', false);
            // Update Slim Select
            if (Array.isArray(slimSelect.getSelected())) {
                updateSelectedOptions(slimSelect.getSelected());
            }
        });
    });
}

function refreshFns() {
    ssCheckbox();
    initTcTags(".tc-tags") // Tc Tags Input
    initSsJxElements('.ss-jx-element'); // Jx Elements
    initializeHoverableDropdowns();
    ssSelectFn();
}

$(document).ready(refreshFns);