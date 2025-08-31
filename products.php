<?php
define('CLASSES', ['jd']);
require_once 'includes/db.php';

$current_url = get_current_url();
$slug = extract_slug_from_URL($current_url);
$slug = _GET('slug');
$category_uid = extract_id_from_slug($slug);

require_once "./helper/products.php";
$page_name = 'Products';


$CSS_FILES = [
    'products.css'
];

$JS_FILES = [
    'products.js'
];

define('INCLUDE_FOOTER', false);
require_once 'includes/head.php';
?>

<!-- Products Section -->
<section class="products-section">
    <div class="products-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Category</h2>
        </div>

        <div class="row" id="productsGrid" jd-source="categoryProducts" jd-pick="#singleProduct" jd-drop="this" jd-success="SuccessCB" jd-scroll-paginate="#productsLoadBtn">
            <?php for ($i = 0; $i < 3; $i++) {  ?>
                <div class="col-lg-3 col-xl-3 col-xxl-2 col-md-4 col-sm-6 mb-3" jd-skeleton>
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
        <div class="load-more-container">
            <button class="btn load-more-btn" id="productsLoadBtn">Load More</button>
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
    <div class="col-lg-3 col-xl-3 col-xxl-2 col-md-4 col-sm-6 mb-3">
        <div class="product-card">
            <div class="product-image">
                <a href="<?= page_url('single-product/') ?>${generateSlug(title,uid)}" target="_blank">
                    <img src="<?= merge_url(SITE_URL, 'images/products/') ?>${image}" alt="Img">
                </a>
                <div class="discount-badge">${getDiscountPercentage(price, sale_price)}</div>
            </div>
            <div class="product-info">
                <a href="<?= page_url('single-product/') ?>${generateSlug(title,uid)}" target="_blank" class="product-title">${title}</a>
                <div class="product-price">
                    <span class="current-price">${"$" + price}</span>
                    <span class="original-price">${"$" + sale_price}</span>
                </div>
                <div class="action-btn">
                    ${checkProductAddedToCart(id,price,cart_id, product_qty)}
                </div>
            </div>
        </div>
    </div>
</script>

<?php require_once 'includes/foot.php'; ?>