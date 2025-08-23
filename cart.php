<?php
define('CLASSES', ['jd']);
require_once 'includes/db.php';
require_once "./helper/cart.php";
$page_name = 'Cart';

$CSS_FILES = [
    'animate.min.css',
    'cart.css'
];

$JS_FILES = [
    'cart.js'
];

require_once 'includes/head.php';
?>

<main class="cart-container my-5">
    <h1 class="text-center mb-5 gs-page-title">Your Shopping Cart</h1>

    <div class="row gx-lg-5">
        <!-- Cart Items List -->
        <div class="col-lg-8">
            <div class="gs-card gs-cart-items-card p-3 shadow-sm mb-4">
                <!-- Cart Items Table (Desktop View) -->
                <div class="d-none d-md-block">
                    <table class="table align-middle gs-cart-table">
                        <thead>
                            <tr>
                                <th scope="col" class="product-col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="cart-items-table-body" jd-source="cartItems" jd-pick="#singleCartItem" jd-drop="this" jd-pagination="#cartPagination" jd-success="cartSuccessCB">
                            <?= skeleton("table", [
                                'columns' => 4,
                            ]) ?>
                        </tbody>
                    </table>
                    <div class="jd-pagination">
                        <ul id="cartPagination" class="mt-2 pagination"></ul>
                    </div>
                </div>
            </div>

            <!-- Empty Cart State -->
            <div id="empty-cart-message" class="text-center p-5 gs-card bg-light d-none">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-3 animate__animated animate__bounceIn"></i>
                <h4 class="mb-3">Your shopping cart is empty!</h4>
                <p class="text-muted">Looks like you haven't added anything to your cart yet.</p>
                <a href="home.html" class="btn gs-btn-primary btn-lg mt-3"><i class="fas fa-shopping-bag me-2"></i> Start Shopping</a>
            </div>

            <div class="d-flex justify-content-start">
                <a href="home.html" class="btn gs-btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                </a>
            </div>
        </div>

        <!-- Order Summary & Policies -->
        <div class="col-lg-4 mt-4 mt-lg-0">
            <!-- Order Summary -->
            <div class="gs-card gs-summary-card p-4 shadow-sm mb-4" jd-ref="cartItems">
                <h5 class="mb-4 gs-section-title">Order Summary</h5>
                <ul class="list-group list-group-flush border-bottom mb-3 order-summary-container">
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="prcing-row" jd-data>
                            <span>Cart Subtotal:</span>
                            <span id="cart-subtotal" class="gs-price-value animate__animated">${summary.sub_total}</span>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="prcing-row" jd-data>
                            <span>Discount: </span>
                            <span class="text-danger gs-price-value animate__animated" id="cart-discount">${summary.discount}</span>
                        </div>
                    </li>
                    <li class="list-group-item px-0 bg-transparent">
                        <div class="prcing-row" jd-data>
                            <span>Shipping: </span>
                            <span id="cart-shipping" class="gs-price-value animate__animated">Free</span>
                        </div>
                    </li>
                </ul>
                <div class="d-flex justify-content-between align-items-center mb-3" jd-data>
                    <h4 class="mb-0 gs-section-title">Total:</h4>
                    <h4 class="mb-0 gs-total-price" id="cart-grand-total">${summary.total_amount}</h4>
                </div>
                <div class="coupon-input d-none">
                    <input type="text" placeholder="Enter coupon code" class="form-control">
                    <button>Apply</button>
                </div>
                <button class="btn btn-success checkout-btn w-100">
                    Proceed to Checkout <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </div>

            <!-- Store Policies & Support -->
            <div class="gs-card gs-policy-card p-4 shadow-sm mb-4">
                <h5 class="mb-3 gs-section-title">Store Policies & Support</h5>
                <div class="accordion accordion-flush gs-accordion" id="policiesAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed gs-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <i class="fas fa-undo-alt me-2 gs-icon-policy"></i> Return Policy
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#policiesAccordion">
                            <div class="accordion-body gs-accordion-body">
                                Enjoy hassle-free returns within 30 days of purchase for most items. Items must be in original condition. <a href="#" class="gs-link">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed gs-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <i class="fas fa-receipt me-2 gs-icon-policy"></i> Refund Policy
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#policiesAccordion">
                            <div class="accordion-body gs-accordion-body">
                                Refunds are processed to the original payment method within 5-7 business days after approval. <a href="#" class="gs-link">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed gs-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <i class="fas fa-headset me-2 gs-icon-policy"></i> Customer Support
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#policiesAccordion">
                            <div class="accordion-body gs-accordion-body">
                                Need help? Our friendly support team is available Monday-Friday, 9 AM - 5 PM.
                                <br>Email: <a href="mailto:support@greenshop.com" class="gs-link">support@greenshop.com</a>
                                <br>Phone: <a href="tel:+15551234567" class="gs-link">+1 (555) 123-4567</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Frequently Bought Together Section -->
    <h3 class="related-title fade-in-up" style="animation-delay: 0.5s">Frequently Bought Together</h3>
    <div class="row fade-in-up" style="animation-delay: 0.6s">
        <div class="col-md-3 col-sm-6">
            <div class="related-product">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=300&h=200&fit=crop" class="related-img" alt="Headphone Case">
                <h6 class="related-name">Premium Headphone Case</h6>
                <p class="related-price">\$25.00</p>
                <button class="related-btn">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="related-product">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=300&h=200&fit=crop" class="related-img" alt="Running Socks">
                <h6 class="related-name">Performance Running Socks</h6>
                <p class="related-price">\$15.00</p>
                <button class="related-btn">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="related-product">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=300&h=200&fit=crop" class="related-img" alt="Wireless Earbuds">
                <h6 class="related-name">Wireless Earbuds Pro</h6>
                <p class="related-price">\$89.00</p>
                <button class="related-btn">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="related-product">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=300&h=200&fit=crop" class="related-img" alt="Water Bottle">
                <h6 class="related-name">Sports Water Bottle</h6>
                <p class="related-price">\$18.00</p>
                <button class="related-btn">Add to Cart</button>
            </div>
        </div>
    </div>
</main>

<script>
    function cartSuccessCB(res, $ele) {
        initSsJxElements('.ss-jx-element'); // Jx Elements
    }
</script>

<script type="text/html" id="singleCartItem">
    <js-script>
    let subTotal = '$' + sale_price * qty;
    </js-script>
    <tr class="gs-cart-item-row" data-item-id="1">
        <td>
            <div class="d-flex align-items-center">
                <img src="<?= merge_url(SITE_URL, './images/products/') ?>${primary_image}" class="gs-item-img me-3" alt="Img">
                <span class="gs-item-name">${title}</span>
            </div>
        </td>
        <td class="item-price" data-price="75">${'$' + sale_price}</td>
        <td>
            <div class="d-flex justify-content-between">
                <div class="quantity-controls">
                    <button class="quantity-btn" data-type="decrease"><i class="hgi hgi-stroke hgi-minus-sign"></i></button>
                    <input type="number" name="qty" class="quantity-input ss-jx-element" value="${qty}" min="1" readonly data-submit='{"updateProductQty" : true, "id" : ${id}}' data-target="cart" data-listener="change" data-callback="quantityUpdateCB">
                    <button class="quantity-btn" data-type="increase"><i class="hgi hgi-stroke hgi-plus-sign"></i></button>
                </div>
            </div>
        </td>
        <td class="gs-item-subtotal">${subTotal}</td>
        <td>
            <button class="btn gs-btn-remove-item delete-data-btn" data-target="${id}" data-action="cart" data-callback="deleteCartItemCB">
                <i class="hgi hgi-stroke hgi-delete-02"></i>
            </button>
        </td>
    </tr>
</script>

<?php require_once 'includes/foot.php'; ?>