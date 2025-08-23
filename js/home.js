// Add Product Callback
ss.fn.cb.addProductToCartCB = function ($btn, res) {

    let { data, status } = res;

    if (status == 'success') {

        let $cartContainer = $btn.closest('.product-info').find('.action-btn'),
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
                        <input type="number" name="qty" class="quantity-input ss-jx-element" id="quantityInput" value="1" min="1" readonly data-submit="${dataSubmit}" data-target="cart" data-listener="change" data-callback="quantityUpdateCB">
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
    notify(res.data, res.status)
}

// Lazy loading effect for product cards
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function (entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

function getDiscountPercentage(originalPrice, salePrice) {
    if (!originalPrice || originalPrice <= 0) {
        return 0;
    }
    let discount = ((originalPrice - salePrice) / originalPrice) * 100;
    return "-" + Math.round(discount) + "%"; // round to nearest integer
}