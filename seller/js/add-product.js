$(document).ready(function () {
    let images = [];

    // Initialize Sortable
    Sortable.create(document.getElementById('imagesGrid'), {
        animation: 150,
        ghostClass: 'sortable-ghost',
        chosenClass: 'sortable-chosen',
        dragClass: 'dragging',
        filter: '.add-photo-item',
        onStart: function (evt) {
            evt.item.classList.add('dragging');
        },
        onEnd: function (evt) {
            evt.item.classList.remove('dragging');
            updateImagePositions();
        },
        onUpdate: function (evt) {
            // Update images array based on new order
            const newOrder = Array.from(evt.to.children)
                .filter(child => !child.classList.contains('add-photo-item'))
                .map(child => parseInt(child.dataset.index));

            const reorderedImages = newOrder.map(index => images[index]);
            images = reorderedImages;
        }
    });

    // File input change handler
    $('#fileInput').on('change', function (e) {
        handleFiles(e.target.files);
    });

    // Add photo item click handler
    $('#addPhotoItem').on('click', function () {
        $('#fileInput').click();
    });

    // Drag and drop handlers
    $('#addPhotoItem').on('dragover', function (e) {
        e.preventDefault();
        $(this).addClass('drag-over');
    });

    $('#addPhotoItem').on('dragleave', function (e) {
        e.preventDefault();
        $(this).removeClass('drag-over');
    });

    $('#addPhotoItem').on('drop', function (e) {
        e.preventDefault();
        $(this).removeClass('drag-over');
        handleFiles(e.originalEvent.dataTransfer.files);
    });

    // Handle file processing
    function handleFiles(files) {
        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imageData = {
                        src: e.target.result,
                        name: file.name,
                        size: file.size,
                        file: file,
                        isPrimary: images.length === 0
                    };
                    images.push(imageData);
                    renderImages();
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Render images
    function renderImages() {
        const grid = $('#imagesGrid');
        const addPhotoItem = $('#addPhotoItem');

        // Remove existing image items
        grid.find('.image-item').remove();

        // Add image items before the add-photo-item
        images.forEach((image, index) => {
            const imageItem = createImageItem(image, index);
            addPhotoItem.before(imageItem);
        });

        updateImagePositions();
    }

    // Create image item HTML
    function createImageItem(image, index) {
        return `
    <div class="image-item" data-index="${index}">
        <img src="${image.src}" alt="${image.name}">
            ${image.isPrimary ? '<div class="primary-badge">Primary</div>' : ''}
            <div class="image-position">${index + 1}</div>
            <div class="image-controls">
                <button class="control-btn move-btn" onclick="moveImage(${index}, 'left')" title="Move Left">
                    <i class="hgi hgi-stroke hgi-arrow-left-01"></i>
                </button>
                <button class="control-btn move-btn" onclick="moveImage(${index}, 'right')" title="Move Right">
                    <i class="hgi hgi-stroke hgi-arrow-right-01"></i>
                </button>
                <button class="control-btn remove-btn" onclick="removeImage(${index})" title="Remove">
                    <i class="hgi hgi-stroke hgi-cancel-01"></i>
                </button>
            </div>
    </div>
    `;
    }

    // Update image positions
    function updateImagePositions() {
        $('#imagesGrid .image-item').each(function (index) {
            $(this).find('.image-position').text(index + 1);
            $(this).attr('data-index', index);
        });
    }

    // Move image function
    window.moveImage = function (index, direction) {
        if (direction === 'left' && index > 0) {
            [images[index], images[index - 1]] = [images[index - 1], images[index]];
        } else if (direction === 'right' && index < images.length - 1) {
            [images[index], images[index + 1]] = [images[index + 1], images[index]];
        }
        renderImages();
    };

    // Remove image function
    window.removeImage = function (index) {
        images.splice(index, 1);

        // Set new primary if removed image was primary
        if (images.length > 0 && !images.some(img => img.isPrimary)) {
            images.isPrimary = true;
        }

        renderImages();
    };

    // Update stats
    // function updateStats() {
    //     const primaryCount = images.filter(img => img.isPrimary).length;
    //     const totalSizeInMB = (totalSize / (1024 * 1024)).toFixed(2);

    //     $('#totalImages').text(images.length);
    //     $('#primaryImages').text(primaryCount);
    //     $('#totalSize').text(totalSizeInMB + ' MB');
    // }

    // Upload all images
    // $('#uploadAllBtn').on('click', function() {
    //     if (images.length === 0) {
    //         alert('Please add some images first!');
    //         return;
    //     }

    //     // Simulate upload process
    //     const formData = new FormData();
    //     images.forEach((image, index) => {
    //         formData.append(`image_${index}`, image.file);
    //         formData.append(`image_${index}_primary`, image.isPrimary);
    //     });

    //     // Replace this with your actual upload logic
    //     console.log('Uploading images:', images);
    //     alert('Images uploaded successfully!');
    // });

    // Clear all images
    $('#clearAllBtn').on('click', function () {
        if (images.length === 0) {
            alert('No images to clear!');
            return;
        }

        if (confirm('Are you sure you want to clear all images?')) {
            images = [];
            totalSize = 0;
            renderImages();
            // updateStats();
        }
    });

    // Set image as primary
    $(document).on('click', '.image-item img', function () {
        const index = parseInt($(this).closest('.image-item').data('index'));

        // Remove primary from all images
        images.forEach(img => img.isPrimary = false);

        // Set clicked image as primary
        images[index].isPrimary = true;

        renderImages();
        // updateStats();
    });

    // Initialize TinyMCE
    tinymce.init({
        selector: '#productDescription',
        height: 400,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body {font - family: Inter, Arial, sans-serif; font-size: 16px; }',
        setup: function (editor) {
            editor.on('focus', function () {
                $('#tinymceWrapper').addClass('focused');
            });
            editor.on('blur', function () {
                $('#tinymceWrapper').removeClass('focused');
                updateProgress();
            });
            editor.on('change', function () {
                updateProgress();
            });
        }
    });

    // Tags functionality
    const tagsContainer = $('#tagsContainer');
    const tagInput = tagsContainer.find('.tag-input');
    let tags = [];

    tagInput.on('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const tag = $(this).val().trim();
            if (tag && !tags.includes(tag)) {
                tags.push(tag);
                addTagToUI(tag);
                $(this).val('');
                updateProgress();
            }
        }
    });

    function addTagToUI(tag) {
        const tagHtml = `
    <div class="tag-item">
        ${tag}
        <button type="button" class="tag-remove" onclick="removeTag('${tag}')">
            <i class="fas fa-times"></i>
        </button>
    </div>
    `;
        tagInput.before(tagHtml);
    }

    window.removeTag = function (tag) {
        tags = tags.filter(t => t !== tag);
        $(`.tag-item:contains("${tag}")`).remove();
        updateProgress();
    };

    // Form validation and progress tracking
    function updateProgress() {
        const requiredFields = ['#productTitle', '#productSku', '#productCategory', '#regularPrice'];
        let filledFields = 0;
        let totalFields = requiredFields.length + 2; // +2 for images and description

        // Check required fields
        requiredFields.forEach(field => {
            if ($(field).val().trim()) {
                filledFields++;
            }
        });

        // Check images
        if (images.length > 0) {
            filledFields++;
        }

        // Check description
        if (tinymce.get('productDescription') && tinymce.get('productDescription').getContent().trim()) {
            filledFields++;
        }

        const progress = Math.round((filledFields / totalFields) * 100);
        $('#progressFill').css('width', `${progress}%`);
        $('#progressText').text(`${progress}%`);
    }

    // Form inputs change tracking
    $('input, select, textarea').on('input change', function () {
        updateProgress();
    });

    // Button actions
    $('#saveDraftBtn').click(function () {
        const button = $(this);
        button.addClass('loading');
        button.html('<div class="spinner"></div> Saving...');

        setTimeout(() => {
            button.removeClass('loading');
            button.html('<i class="fas fa-save"></i> Save as Draft');
            showNotification('Product saved as draft!', 'success');
        }, 2000);
    });

    $('#previewBtn').click(function () {
        // Open preview in new tab
        window.open('#', '_blank');
    });

    $('#publishBtn').click(function () {
        if (validateForm()) {
            const button = $(this);
            button.addClass('loading');
            button.html('<div class="spinner"></div> Publishing...');

            setTimeout(() => {
                button.removeClass('loading');
                button.html('<i class="fas fa-rocket"></i> Publish Product');
                showNotification('Product published successfully!', 'success');
            }, 3000);
        }
    });

    function validateForm() {
        const title = $('#productTitle').val().trim();
        const sku = $('#productSku').val().trim();
        const category = $('#productCategory').val();
        const price = $('#regularPrice').val();

        if (!title) {
            showNotification('Product title is required!', 'error');
            return false;
        }
        if (!sku) {
            showNotification('SKU is required!', 'error');
            return false;
        }
        if (!category) {
            showNotification('Please select a category!', 'error');
            return false;
        }
        if (!price) {
            showNotification('Regular price is required!', 'error');
            return false;
        }
        if (images.length === 0) {
            showNotification('Please upload at least one product image!', 'error');
            return false;
        }

        return true;
    }

    function showNotification(message, type) {
        const notification = $(`
    <div class="alert alert-${type === 'error' ? 'danger' : 'success'} alert-dismissible fade show"
        style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    `);

        $('body').append(notification);

        setTimeout(() => {
            notification.alert('close');
        }, 5000);
    }

    // Initialize progress tracking
    updateProgress();
});