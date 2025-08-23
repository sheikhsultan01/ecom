<?php
define('CLASSES', ['jd']);
require_once 'includes/db.php';
require_once "./helper/home.php";
$page_name = 'Home';

$CSS_FILES = [
    'home.css'
];

$JS_FILES = [
    'home.js'
];

require_once 'includes/head.php';
?>

<!-- Search History -->
<div class="container mt-3 d-none">
    <div class="search-history">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h6>Search History</h6>
            <button class="btn btn-sm btn-outline-success">CLEAR</button>
        </div>
        <div id="searchTags">
            <span class="search-tag">wireless earbuds</span>
            <span class="search-tag">home theater speakers</span>
            <span class="search-tag">kitchen gadgets</span>
            <span class="search-tag">beauty products</span>
        </div>
    </div>
</div>

<!-- Products Section -->
<section class="products-section">
    <div class="products-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Featured Products</h2>
            <a href="products" class="shop-all-btn">
                SHOP ALL PRODUCTS
                <i class="hgi hgi-stroke hgi-arrow-right-02"></i>
            </a>
        </div>

        <div class="row" id="productsGrid" jd-source="featureProducts" jd-pick="#singleProduct" jd-drop="this" jd-success="SuccessCB" jd-scroll-paginate>
            <?php for ($i = 0; $i < 3; $i++) {  ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3" jd-skeleton>
                    <div class="product-card">
                        <div class="product-image" jd-data>
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Wireless Headphones">
                            <div class="discount-badge">-25%</div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title" jd-data>Premium Wireless Headphones</h5>
                            <div class="product-price" jd-data>
                                <span class="current-price">$75</span>
                                <span class="original-price">$100</span>
                            </div>
                            <button class="add-to-cart" jd-data>
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <h2 class="section-title">Shop by Categories</h2>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h5 class="category-title">Electronics</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h5 class="category-title">Fashion</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h5 class="category-title">Home & Garden</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h5 class="category-title">Sports & Fitness</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h5 class="category-title">Beauty & Health</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h5 class="category-title">Books & Media</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function SuccessCB(res, $ele) {
        initSsJxElements('.ss-jx-element'); // Jx Elements
    }
</script>

<!-- Single Product Template -->
<script type="text/html" id="singleProduct">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="product-card">
            <div class="product-image">
                <a href="single-product?uid=${uid}" target="_blank">
                    <img src="<?= merge_url(SITE_URL, 'images/products/') ?>${image}" alt="Wireless Headphones">
                </a>
                <div class="discount-badge">${getDiscountPercentage(price, sale_price)}</div>
            </div>
            <div class="product-info">
                <a href="single-product?uid=${uid}" target="_blank" class="product-title">${title}</a>
                <div class="product-price">
                    <span class="current-price">${"$" + sale_price}</span>
                    <span class="original-price">${"$" + price}</span>
                </div>
                <div class="action-btn">
                    ${checkProductAddedToCart(id,sale_price,cart_id, product_qty)}
                </div>
            </div>
        </div>
    </div>
</script>


<?php require_once 'includes/foot.php'; ?>