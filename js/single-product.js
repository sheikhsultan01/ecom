$(document).ready(function () {

    // Thumbnail image switching
    $('.thumbnail-image').click(function () {
        const mainImageSrc = $(this).data('image');
        $('#mainImage').attr('src', mergeUrl(SITE_URL, 'images/products/', mainImageSrc));

        $('.thumbnail-image').removeClass('active');
        $(this).addClass('active');
    });

    // Main image zoom modal
    $('#mainImage').click(function () {
        const src = $(this).attr('src');
        $('#modalImage').attr('src', src);
        $('#imageModal').fadeIn();
    });

    // Close modal
    $('.close-modal, #imageModal').click(function (e) {
        if (e.target === this) {
            $('#imageModal').fadeOut();
        }
    });

    // Related product cards hover effect
    $('.product-card').hover(
        function () {
            $(this).find('.product-card-btn').css('background', 'var(--accent-color)');
        },
        function () {
            $(this).find('.product-card-btn').css('background', '');
        }
    );

    // Smooth scrolling for related products
    $('.product-card-btn').click(function (e) {
        e.preventDefault();

        // Add to cart animation
        $(this).html('<i class="fas fa-check"></i> Added');
        $(this).css('background', '#28a745');

        setTimeout(() => {
            $(this).html('Add to Cart');
            $(this).css('background', '');
        }, 1500);
    });
});