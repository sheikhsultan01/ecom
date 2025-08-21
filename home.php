<?php
require_once 'includes/db.php';
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

        <div class="row" id="productsGrid">
            <!-- Product 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Wireless Headphones">
                        <div class="discount-badge">-25%</div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-title">Premium Wireless Headphones</h5>
                        <div class="product-price">
                            <span class="current-price">$75</span>
                            <span class="original-price">$100</span>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=300&h=200&fit=crop" alt="Smart Watch">
                        <div class="discount-badge">-30%</div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-title">Smart Fitness Watch</h5>
                        <div class="product-price">
                            <span class="current-price">$140</span>
                            <span class="original-price">$200</span>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=300&h=200&fit=crop" alt="Skincare Set">
                        <div class="discount-badge">-15%</div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-title">Organic Skincare Set</h5>
                        <div class="product-price">
                            <span class="current-price">$85</span>
                            <span class="original-price">$100</span>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=300&h=200&fit=crop" alt="Kitchen Blender">
                        <div class="discount-badge">-40%</div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-title">High-Speed Kitchen Blender</h5>
                        <div class="product-price">
                            <span class="current-price">$90</span>
                            <span class="original-price">$150</span>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300&h=200&fit=crop" alt="Running Shoes">
                        <div class="discount-badge">-20%</div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-title">Professional Running Shoes</h5>
                        <div class="product-price">
                            <span class="current-price">$120</span>
                            <span class="original-price">$150</span>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=300&h=200&fit=crop" alt="Laptop">
                        <div class="discount-badge">-35%</div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-title">Ultra-Thin Laptop</h5>
                        <div class="product-price">
                            <span class="current-price">$650</span>
                            <span class="original-price">$1000</span>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
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


<?php require_once 'includes/foot.php'; ?>