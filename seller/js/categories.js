$(document).ready(function () {
    // Image upload preview functionality
    function setupImageUpload(uploadId, inputId, previewId) {
        const $uploadArea = $('#' + uploadId);
        const $inputElement = $('#' + inputId);
        const $previewElement = previewId ? $('#' + previewId) : null;

        if ($uploadArea.length && $inputElement.length) {
            $uploadArea.on('dragover', function (e) {
                e.preventDefault();
                $(this).addClass('border-primary');
            });

            $uploadArea.on('dragleave', function (e) {
                e.preventDefault();
                $(this).removeClass('border-primary');
            });

            $uploadArea.on('drop', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('border-primary');

                if (e.originalEvent.dataTransfer.files.length) {
                    $inputElement[0].files = e.originalEvent.dataTransfer.files;
                    updatePreview($inputElement[0], $previewElement ? $previewElement[0] : null);
                }
            });

            $inputElement.on('change', function () {
                updatePreview(this, $previewElement ? $previewElement[0] : null);
            });
        }
    };

    const updatePreview = (input, preview) => {
        if (input.files && input.files[0] && preview) {
            const reader = new FileReader();

            reader.onload = function (e) {
                $(preview).attr('src', e.target.result).show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    };

    $(document).on('click', '#categoryImageUpload', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#categoryImageInput').trigger('click');
    });

    $(document).on('click', '#subcategoryImageUpload', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#subcategoryImageInput').trigger('click');
    });


    // Setup image uploads for all modals
    setupImageUpload('categoryImageUpload', 'categoryImageInput', 'categoryImagePreview');
    setupImageUpload('subcategoryImageUpload', 'subcategoryImageInput', 'subcategoryImagePreview');

    // Auto-generate slug from name
    const slugify = (text) => {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(/[^\w\-]+/g, '') // Remove all non-word chars
            .replace(/\-\-+/g, '-') // Replace multiple - with single -
            .replace(/^-+/, '') // Trim - from start of text
            .replace(/-+$/, ''); // Trim - from end of text
    };

    $('#categoryName').on('input', function () {
        $('#categorySlug').val(slugify($(this).val()));
    });

    $('#subcategoryName').on('input', function () {
        $('#subcategorySlug').val(slugify($(this).val()));
    });
});

$(document).on('click', '.reset-img-btn', (e) => {
    e.preventDefault();
    let $catImgPreview = $('#mdlSaveCategory').find('.image-preview'),
        $subCatImgPreview = $('#mdlSaveSubCategory').find('.image-preview');

    $catImgPreview.attr('src', '').removeAttr('style');
    $subCatImgPreview.attr('src', '').removeAttr('style');
});