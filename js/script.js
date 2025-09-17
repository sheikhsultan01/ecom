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
// prevent 
// Jab search-item pr click ho → product page open ho
$(document).on("click", ".search-item", function (e) {
    // Agar click action-btn ke andar hua to ignore
    if ($(e.target).closest(".action-btn").length) return;
    let url = $(this).data("url");
    if (url) {
        window.open(url, "_blank"); // naya page open kare
    }
});

$(document).ready(function () {
    let selectedIndex = -1; // Track selected item

    // Display search results
    function displaySearchResults($searchCon, data) {
        if (data.length === 0) {
            $searchCon.html('<div class="no-results">No products found. Try a different search term.</div>');
            return;
        }

        let html = '';
        data.forEach(product => {
            let { id, primary_image, title, description, price, cart_id, product_qty, uid, sale_price } = product;

            let productUrl = pageUrl('single-product/') + generateSlug(title, uid);

            html += `
            <div class="search-item" data-url="${productUrl}">
                <div class="product-image">
                    <img src="${mergeUrl(SITE_URL, 'images/products/', primary_image)}">
                </div>
                <div class="product-info">
                    <div class="product-detail">
                        <div class="product-title">${title}</div>
                        <div class="product-description">${description}</div>
                        <div class="product-price">
                            ${CURRENCY + price} 
                            <small class="sale-price">${CURRENCY + sale_price}</small>
                        </div>
                    </div>
                    <div class="action-btn">
                        ${IsSearchProductAddedToCart(id, price, cart_id, product_qty)}
                    </div>
                </div>
            </div>
        `;
        });
        $searchCon.html(html);
        selectedIndex = -1; // reset when new results come
    }

    // Send Search Request
    $(document).on('keyup', '.ec-search-input', function (e) {
        const keyword = $(this).val().trim();
        let $searchCon = $('.search-container').find('.search-results');

        if (keyword.length === 0) {
            $searchCon.removeClass('show');
            return;
        }

        // Ignore arrow keys + enter in AJAX trigger
        if ([37, 39, 38, 40, 13].includes(e.keyCode)) return;


        $searchCon.html('<div class="loading">Searching...</div>').addClass('show');

        $.ajax({
            url: pageUrl('controllers/search'),
            type: "POST",
            data: { searchProducts: true, keyword },
            dataType: "json",
            success: function (res) {
                let { status, data } = res;
                if (status === 'success') {
                    displaySearchResults($searchCon, data);
                    initSsJxElements('.ss-jx-element'); // Jx Elements
                } else {
                    $searchCon.html('<div class="no-results">No products found. Try a different search term.</div>');
                }
            }
        });
    });

    // Handle keyboard navigation
    $(document).on('keydown', '.ec-search-input', function (e) {
        let $searchCon = $('.search-container').find('.search-results');
        let $items = $searchCon.find('.search-item');

        if (!$items.length) return;

        if (e.key === "ArrowDown") {
            e.preventDefault();
            if (selectedIndex < $items.length - 1) {
                selectedIndex++;
                $items.removeClass('active').eq(selectedIndex).addClass('active')[0].scrollIntoView({
                    block: "nearest",
                    behavior: "smooth"
                });
            } else {
                // If last item → back to input
                $items.removeClass('active');
                selectedIndex = -1;
                $(this).focus();
            }
        }
        else if (e.key === "ArrowUp") {
            e.preventDefault();
            if (selectedIndex > 0) {
                selectedIndex--;
                $items.removeClass('active').eq(selectedIndex).addClass('active')[0].scrollIntoView({
                    block: "nearest",
                    behavior: "smooth"
                });
            } else {
                // If already at first item → go back to input
                $items.removeClass('active');
                selectedIndex = -1;
                $(this).focus();
            }
        }
        else if (e.key === "Enter") {
            e.preventDefault();
            if (selectedIndex >= 0) {
                // If a product is selected → go to its link
                $items.eq(selectedIndex).get(0).click();
            } else {
                // No product selected → go to search page with query
                const keyword = $(this).val().trim();
                if (keyword.length > 0) {
                    window.location.href = pageUrl("search?search=" + encodeURIComponent(keyword));
                }
            }
        }
    });
});

// Hide search results on outside click
$(document).on('click', function (e) {
    const $searchContainer = $('.search-container');
    const $results = $searchContainer.find('.search-results');

    if ($results.hasClass('show') && !$searchContainer.is(e.target) && $searchContainer.has(e.target).length === 0) {
        $results.removeClass('show');
    }
});
