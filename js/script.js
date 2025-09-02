// Add Product Callback
ss.fn.cb.addProductToCartCB = function ($btn, res) {

    let { data, status } = res;

    if (status == 'success') {

        let $cartContainer = $btn.closest('.product-info').find('.action-btn'),
            $cartButton = $('.cart-btn'),
            oldCartVal = toNumber($cartButton.find('.cart-count').attr('data-count'));

        // Set cart count
        $cartButton.find('.cart-count').text(oldCartVal + 1).removeClass('d-none');
        $cartButton.find('.cart-count').attr('data-count', oldCartVal + 1);

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

// Callback on update Quantity 
ss.fn.cb.quantityUpdateCB = function ($btn, res) {
    if (res.status == "success") {
        return true;
    }
    notify(res.data, res.status);
}

$(document).on('click', '.password-toggle', function () {
    const input = $(this).prev();
    const icon = $(this).is('button') ? $(this).find('i.password-toggle') : $(this);


    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('hgi-stroke hgi-view');
        icon.addClass('hgi-stroke hgi-view-off-slash');
    } else {
        input.attr('type', 'password');
        icon.removeClass('hgi-stroke hgi-view-off-slash');
        icon.addClass('hgi-stroke hgi-view');
    }
});

// Back to top functionality
$(window).on('scroll', function () {
    const $backToTop = $('.back-to-top');
    if ($(window).scrollTop() > 300) {
        $backToTop.addClass('show');
    } else {
        $backToTop.removeClass('show');
    }
});

// Back to top button
$(document).on('click', '.back-to-top', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});