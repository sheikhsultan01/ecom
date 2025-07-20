$(document).ready(function () {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Edit button click handler
    $('.edit-btn').click(function () {
        // In a real application, you would fetch the product data from your backend
        // For now, we'll just show the modal with pre-filled data
        $('#editProductModal').modal('show');
    });

    // Delete button click handler
    $('.delete-btn').click(function () {
        if (confirm('Are you sure you want to delete this product?')) {
            // In a real application, you would send a delete request to your backend
            alert('Product deleted successfully!');
        }
    });

    // Search functionality
    $('#searchProducts').on('keyup', function () {
        const value = $(this).val().toLowerCase();
        $('.inventory-table tbody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});