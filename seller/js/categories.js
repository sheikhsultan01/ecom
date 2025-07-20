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

    $(document).on('click', '#editCategoryImageUpload', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#editCategoryImageInput').trigger('click');
    });

    $(document).on('click', '#editSubcategoryImageUpload', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#editSubcategoryImageInput').trigger('click');
    });

    // Setup image uploads for all modals
    setupImageUpload('categoryImageUpload', 'categoryImageInput', 'categoryImagePreview');
    setupImageUpload('editCategoryImageUpload', 'editCategoryImageInput', null);
    setupImageUpload('subcategoryImageUpload', 'subcategoryImageInput', 'subcategoryImagePreview');
    setupImageUpload('editSubcategoryImageUpload', 'editSubcategoryImageInput', null);

    // Delete button functionality
    $('.btn-delete').on('click', function () {
        const deleteModal = new bootstrap.Modal($('#deleteConfirmModal')[0]);
        deleteModal.show();
    });

    // Form submission handlers
    $('#saveCategoryBtn').on('click', function () {
        // Validate form
        const form = $('#addCategoryForm')[0];
        if (form.checkValidity()) {
            // Here you would typically submit the form data via AJAX
            alert('Category saved successfully!');
            bootstrap.Modal.getInstance($('#addCategoryModal')[0]).hide();
        } else {
            form.reportValidity();
        }
    });

    $('#updateCategoryBtn').on('click', function () {
        // Validate form
        const form = $('#editCategoryForm')[0];
        if (form.checkValidity()) {
            // Here you would typically submit the form data via AJAX
            alert('Category updated successfully!');
            bootstrap.Modal.getInstance($('#editCategoryModal')[0]).hide();
        } else {
            form.reportValidity();
        }
    });

    $('#saveSubcategoryBtn').on('click', function () {
        // Validate form
        const form = $('#addSubcategoryForm')[0];
        if (form.checkValidity()) {
            // Here you would typically submit the form data via AJAX
            alert('Subcategory saved successfully!');
            bootstrap.Modal.getInstance($('#addSubcategoryModal')[0]).hide();
        } else {
            form.reportValidity();
        }
    });

    $('#updateSubcategoryBtn').on('click', function () {
        // Validate form
        const form = $('#editSubcategoryForm')[0];
        if (form.checkValidity()) {
            // Here you would typically submit the form data via AJAX
            alert('Subcategory updated successfully!');
            bootstrap.Modal.getInstance($('#editSubcategoryModal')[0]).hide();
        } else {
            form.reportValidity();
        }
    });

    $('#confirmDeleteBtn').on('click', function () {
        // Here you would typically send a delete request via AJAX
        alert('Category deleted successfully!');
        bootstrap.Modal.getInstance($('#deleteConfirmModal')[0]).hide();
    });

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