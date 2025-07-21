<?php
require_once 'includes/db.php';
$page_name = 'Product';

$CSS_FILES = [
    'single-product.css'
];

$JS_FILES = [
    'single-product.js'
];

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
                        <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop" alt="Premium Wireless Headphones" class="main-product-image" id="mainImage">

                        <div class="thumbnail-container">
                            <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop" alt="Thumbnail 1" class="thumbnail-image active" data-main="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Thumbnail 2" class="thumbnail-image" data-main="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop">
                            <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop" alt="Thumbnail 3" class="thumbnail-image" data-main="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop">
                            <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop" alt="Thumbnail 4" class="thumbnail-image" data-main="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop">
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="product-info">
                        <h1 class="product-title">Premium Wireless Headphones</h1>

                        <div class="product-rating">
                            <div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="rating-count">(4.5) 324 Reviews</span>
                        </div>

                        <div class="product-price">
                            \$129.99
                            <span class="original-price">\$199.99</span>
                        </div>

                        <p class="product-description">
                            Experience premium audio quality with our advanced wireless headphones. Features include active noise cancellation, 30-hour battery life, and premium comfort design for all-day listening pleasure.
                        </p>

                        <!-- Product Options -->
                        <div class="product-options">
                            <div class="option-group">
                                <label class="option-label">Color:</label>
                                <div class="color-options">
                                    <div class="color-option active" style="background: #000000;" data-color="Black"></div>
                                    <div class="color-option" style="background: #FFFFFF; border: 1px solid #ccc;" data-color="White"></div>
                                    <div class="color-option" style="background: #228B22;" data-color="Green"></div>
                                    <div class="color-option" style="background: #FF4444;" data-color="Red"></div>
                                </div>
                            </div>

                            <div class="option-group">
                                <label class="option-label">Size:</label>
                                <div class="size-options">
                                    <div class="size-option active" data-size="Regular">Regular</div>
                                    <div class="size-option" data-size="Large">Large</div>
                                    <div class="size-option" data-size="X-Large">X-Large</div>
                                </div>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="quantity-selector">
                            <label class="option-label">Quantity:</label>
                            <div class="quantity-controls">
                                <button class="quantity-btn" id="decreaseBtn">-</button>
                                <input type="number" class="quantity-input" id="quantityInput" value="1" min="1">
                                <button class="quantity-btn" id="increaseBtn">+</button>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <button class="btn btn-custom btn-primary-custom w-100" id="addToCartBtn">
                                    <i class="hgi hgi-stroke hgi-shopping-cart-01"></i>
                                    Add to Cart
                                </button>
                            </div>
                            <div class="col-md-4 col-12">
                                <button class="btn btn-custom btn-secondary-custom w-100" id="wishlistBtn">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                    Wishlist
                                </button>
                            </div>
                        </div>

                        <!-- Product Features -->
                        <div class="product-features">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="hgi hgi-stroke hgi-truck"></i>
                                </div>
                                <div class="feature-title">Free Shipping</div>
                                <div class="feature-description">Free delivery on orders over $50</div>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="hgi hgi-stroke hgi-undo-02"></i>
                                </div>
                                <div class="feature-title">30-Day Return</div>
                                <div class="feature-description">Easy returns within 30 days</div>
                            </div>
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