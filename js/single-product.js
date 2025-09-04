$(document).ready(function () {

     // Add Product Callback
    ss.fn.cb.addSingleProductToCartCB = function ($form, res) {

        let { data, status } = res;

        if (status == 'success') {

            let $btn = $form.find('#addToCartBtn'),
                $cartContainer = $form.find('.add-to-cart-btn'),
                $cartButton = $('.cart-btn'),
                oldCartVal = toNumber($cartButton.find('.cart-count').attr('data-count'));

            // Set cart count
            $cartButton.find('.cart-count').text(oldCartVal + 1).removeClass('d-none');

            let dataSubmit = JSON.stringify({
                'updateProductQty': true,
                'id': data.id
            }).replace(/"/g, '&quot;');

            let qtyBtnHtml = `<div class="quantity-controls">
                            <button class="quantity-btn" data-type="decrease"><i class="hgi hgi-stroke hgi-minus-sign"></i></button>
                            <input type="number" name="qty" class="quantity-input ss-jx-element" id="quantityInput" value="1" min="1" readonly data-submit="${dataSubmit}" data-target="${mergeUrl(SITE_URL, 'controllers/', 'cart')}" data-listener="change" data-callback="quantityUpdateCB">
                            <button class="quantity-btn" data-type="increase"><i class="hgi hgi-stroke hgi-plus-sign"></i></button>
                          </div>`;

            $btn.remove();  // Remove add to cart button
            $cartContainer.append(qtyBtnHtml);
            initSsJxElements('.ss-jx-element'); // Jx Elements
            notify(data.msg, status); // Notify User
        } else {
            notify(data, status);
        }

    }

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