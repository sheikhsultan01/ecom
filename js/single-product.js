$(document).ready(function () {
    // Thumbnail image switching
    $('.thumbnail-image').click(function () {
        const mainImageSrc = $(this).data('main');
        $('#mainImage').attr('src', mainImageSrc);

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

    // Color option selection
    $('.color-option').click(function () {
        $('.color-option').removeClass('active');
        $(this).addClass('active');

        const color = $(this).data('color');
        console.log('Selected color:', color);
    });

    // Size option selection
    $('.size-option').click(function () {
        $('.size-option').removeClass('active');
        $(this).addClass('active');

        const size = $(this).data('size');
        console.log('Selected size:', size);
    });

    // Quantity controls
    $('#increaseBtn').click(function () {
        const current = parseInt($('#quantityInput').val());
        $('#quantityInput').val(current + 1);
    });

    $('#decreaseBtn').click(function () {
        const current = parseInt($('#quantityInput').val());
        if (current > 1) {
            $('#quantityInput').val(current - 1);
        }
    });

    // Add to cart functionality
    $('#addToCartBtn').click(function () {
        const quantity = $('#quantityInput').val();
        const color = $('.color-option.active').data('color');
        const size = $('.size-option.active').data('size');

        // Add animation
        $(this).html('<i class="fas fa-check"></i> Added to Cart');
        $(this).removeClass('btn-primary-custom').css('background', '#28a745');

        setTimeout(() => {
            $(this).html('<i class="fas fa-cart-plus"></i> Add to Cart');
            $(this).addClass('btn-primary-custom').css('background', '');
        }, 2000);

        console.log('Added to cart:', {
            quantity,
            color,
            size
        });
    });

    // Wishlist functionality
    $('#wishlistBtn').click(function () {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $(this).html('<i class="fas fa-heart"></i> Added');
            $(this).css('background', '#ff4444').css('color', 'white');
        } else {
            $(this).html('<i class="fas fa-heart"></i> Wishlist');
            $(this).css('background', '').css('color', '');
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