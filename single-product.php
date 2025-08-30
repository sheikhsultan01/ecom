<?php
require_once 'includes/db.php';
require_once 'Functions/single-product.php';
$page_name = 'Product';
$uid = _get_param('uid', false);

// Get Location
$product = [];
if ($uid) {
    $product = $db->select_one('products', 'id,uid,title,description,images,price,sale_price,weight', ['uid' => $uid]);
    $images = json_decode($product['images'], true);
    $primaryImage = null;
    foreach ($images as $img) {
        if (!empty($img['isPrimary'])) {
            $primaryImage = $img['name'];
            break;
        }
    }
    // If not primary then select first image
    if ($primaryImage === null && !empty($images)) {
        $primaryImage = $images[0]['name'];
    }
}

$CSS_FILES = [
    'single-product.css'
];

$JS_FILES = [
    'single-product.js'
];

define('INCLUDE_FOOTER', false);
require_once 'includes/head.php';
?>

<div class="container-fluid">
    <!-- Product Detail Section -->
    <div class="product-detail-section">
        <div class="product-container p-3">
            <div class="row">
                <!-- Product Images -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-image-container">
                        <div class="sale-badge">SALE</div>
                        <img src="<?= merge_url(SITE_URL, 'images/products/', $primaryImage) ?>" alt="Premium Wireless Headphones" class="main-product-image" id="mainImage">

                        <div class="thumbnail-container">
                            <?php
                            foreach ($images as $image) {
                                $isPrimary = !empty($image['isPrimary']);
                            ?>
                                <img src="<?= merge_url(SITE_URL, 'images/products/', $image['name']) ?>" alt="Product Img" class="thumbnail-image <?= $isPrimary ? 'active' : '' ?>" data-image="<?= $image['name'] ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="col-lg-6 col-md-6 col-12">
                    <form action="cart" class="js-form h-100" data-callback="addProductToCartCB">
                        <div class="product-info h-100">
                            <div class="product-details">
                                <h1 class="product-title"><?= $product['title'] ?></h1>

                                <div class="product-rating">
                                    <div class="rating-stars">
                                        <i class="hgi hgi-solid hgi-star"></i>
                                        <i class="hgi hgi-solid hgi-star"></i>
                                        <i class="hgi hgi-solid hgi-star"></i>
                                        <i class="hgi hgi-solid hgi-star"></i>
                                        <i class="hgi hgi-solid hgi-star-half"></i>
                                    </div>
                                    <span class="rating-count">(4.5) 324 Reviews</span>
                                </div>

                                <div class="product-price">
                                    <?= CURRENCY . $product['sale_price'] . "/" ?>
                                    <span class="original-price"><?= CURRENCY . $product['price'] ?></span>
                                </div>

                                <p class="product-description">
                                    <?= $product['description'] ?>
                                </p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="add-to-cart-btn">
                                <input type="hidden" name="unit_price" value="<?= $product['sale_price'] ?>">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="addToCartProduct" value="true">
                                <?php
                                $cart_id = is_product_added($product['id']);
                                if ($cart_id) { ?>
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" data-type="decrease"><i class="hgi hgi-stroke hgi-minus-sign"></i></button>
                                        <input type="number" name="qty" class="quantity-input ss-jx-element" id="quantityInput" value="<?= is_product_added($product['id'], 'qty') ?>" min="1" readonly data-submit='<?= json_encode(['updateProductQty' => true, 'id' => $cart_id]) ?>' data-target="cart" data-listener="change" data-callback="quantityUpdateCB">
                                        <button class="quantity-btn" data-type="increase"><i class="hgi hgi-stroke hgi-plus-sign"></i></button>
                                    </div>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-custom btn-primary-custom w-50" id="addToCartBtn">
                                        <i class="hgi hgi-stroke hgi-shopping-cart-01"></i>
                                        <span class="text">Add to Cart</span>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Product Features -->
                <div class="col-lg-12 col-md-12 col-12 mt-5">
                    <div class="product-features">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="hgi hgi-stroke hgi-truck"></i>
                                    </div>
                                    <div class="feature-title">Free Shipping</div>
                                    <div class="feature-description">Free delivery on orders over $50</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="hgi hgi-stroke hgi-undo-02"></i>
                                    </div>
                                    <div class="feature-title">30-Day Return</div>
                                    <div class="feature-description">Easy returns within 30 days</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="hgi hgi-stroke hgi-shield-02"></i>
                                    </div>
                                    <div class="feature-title">2-Year Warranty</div>
                                    <div class="feature-description">Full warranty coverage</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="related-products-section">
        <div class="container">
            <h2 class="section-title">Related Products</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="product-card">
                        <div class="product-card-badge">SALE</div>
                        <img src="https://via.placeholder.com/300x250/228B22/FFFFFF?text=Wireless+Speaker" alt="Wireless Speaker" class="product-card-image">
                        <div class="product-card-content">
                            <h3 class="product-card-title">Wireless Speaker</h3>
                            <div class="product-card-price">\$89.99</div>
                            <button class="product-card-btn">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="product-card">
                        <img src="https://via.placeholder.com/300x250/2E8B57/FFFFFF?text=Bluetooth+Earbuds" alt="Bluetooth Earbuds" class="product-card-image">
                        <div class="product-card-content">
                            <h3 class="product-card-title">Bluetooth Earbuds</h3>
                            <div class="product-card-price">\$79.99</div>
                            <button class="product-card-btn">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="product-card">
                        <img src="https://via.placeholder.com/300x250/32CD32/FFFFFF?text=Charging+Dock" alt="Charging Dock" class="product-card-image">
                        <div class="product-card-content">
                            <h3 class="product-card-title">Charging Dock</h3>
                            <div class="product-card-price">\$39.99</div>
                            <button class="product-card-btn">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="product-card">
                        <div class="product-card-badge new">NEW</div>
                        <img src="https://via.placeholder.com/300x250/90EE90/FFFFFF?text=Phone+Stand" alt="Phone Stand" class="product-card-image">
                        <div class="product-card-content">
                            <h3 class="product-card-title">Phone Stand</h3>
                            <div class="product-card-price">\$24.99</div>
                            <button class="product-card-btn">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="image-modal">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<?php require_once 'includes/foot.php'; ?>