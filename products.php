<?php
require_once 'includes/db.php';
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

<!-- Categories Section -->
<div class="categories-container mt-4">
    <div class="categories-section">
        <h2 class="categories-title">Shop by Categories</h2>
        <div class="categories-grid">
            <div class="category-card active" data-category="all">
                <div class="category-icon">
                    <i class="fas fa-th-large"></i>
                </div>
                <div class="category-name">All Products</div>
                <div class="category-count">1,234 items</div>
            </div>
            <div class="category-card" data-category="electronics">
                <div class="category-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="category-name">Electronics</div>
                <div class="category-count">324 items</div>
            </div>
            <div class="category-card" data-category="fashion">
                <div class="category-icon">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="category-name">Fashion</div>
                <div class="category-count">189 items</div>
            </div>
            <div class="category-card" data-category="home">
                <div class="category-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="category-name">Home & Garden</div>
                <div class="category-count">267 items</div>
            </div>
            <div class="category-card" data-category="sports">
                <div class="category-icon">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <div class="category-name">Sports & Fitness</div>
                <div class="category-count">156 items</div>
            </div>
            <div class="category-card" data-category="beauty">
                <div class="category-icon">
                    <i class="hgi hgi-stroke hgi-favourite"></i>
                </div>
                <div class="category-name">Beauty & Health</div>
                <div class="category-count">198 items</div>
            </div>
            <div class="category-card" data-category="books">
                <div class="category-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="category-name">Books & Media</div>
                <div class="category-count">100 items</div>
            </div>
        </div>
    </div>
</div>

<div class="products-container">
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-lg-3 col-md-4">
            <div class="filter-section">
                <div class="filter-header">
                    <h3 class="filter-title">Filters</h3>
                    <button class="clear-filters">Clear All</button>
                </div>

                <!-- Category Filter -->
                <div class="filter-group">
                    <h4 class="filter-group-title">Categories</h4>
                    <div class="filter-options">
                        <div class="filter-option">
                            <input type="checkbox" id="electronics" name="category" value="electronics">
                            <label for="electronics">Electronics</label>
                            <span class="filter-count">(324)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="fashion" name="category" value="fashion">
                            <label for="fashion">Fashion</label>
                            <span class="filter-count">(189)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="home" name="category" value="home">
                            <label for="home">Home & Garden</label>
                            <span class="filter-count">(267)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="sports" name="category" value="sports">
                            <label for="sports">Sports & Fitness</label>
                            <span class="filter-count">(156)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="beauty" name="category" value="beauty">
                            <label for="beauty">Beauty & Health</label>
                            <span class="filter-count">(198)</span>
                        </div>
                    </div>
                </div>

                <!-- Price Range Filter -->
                <div class="filter-group">
                    <h4 class="filter-group-title">Price Range</h4>
                    <div class="price-range">
                        <div class="price-inputs">
                            <input type="number" class="price-input" placeholder="Min" min="0" max="1000">
                            <input type="number" class="price-input" placeholder="Max" min="0" max="1000">
                        </div>
                        <input type="range" class="price-slider" min="0" max="1000" value="500">
                    </div>
                </div>

                <!-- Rating Filter -->
                <div class="filter-group">
                    <h4 class="filter-group-title">Customer Rating</h4>
                    <div class="filter-options">
                        <div class="rating-option">
                            <input type="checkbox" id="rating5" name="rating" value="5">
                            <label for="rating5">
                                <span class="rating-stars">★★★★★</span>
                                <span class="filter-count">(45)</span>
                            </label>
                        </div>
                        <div class="rating-option">
                            <input type="checkbox" id="rating4" name="rating" value="4">
                            <label for="rating4">
                                <span class="rating-stars">★★★★☆</span>
                                <span class="filter-count">(89)</span>
                            </label>
                        </div>
                        <div class="rating-option">
                            <input type="checkbox" id="rating3" name="rating" value="3">
                            <label for="rating3">
                                <span class="rating-stars">★★★☆☆</span>
                                <span class="filter-count">(67)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Brand Filter -->
                <div class="filter-group">
                    <h4 class="filter-group-title">Brand</h4>
                    <div class="filter-options">
                        <div class="filter-option">
                            <input type="checkbox" id="apple" name="brand" value="apple">
                            <label for="apple">Apple</label>
                            <span class="filter-count">(23)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="samsung" name="brand" value="samsung">
                            <label for="samsung">Samsung</label>
                            <span class="filter-count">(18)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="nike" name="brand" value="nike">
                            <label for="nike">Nike</label>
                            <span class="filter-count">(34)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="sony" name="brand" value="sony">
                            <label for="sony">Sony</label>
                            <span class="filter-count">(28)</span>
                        </div>
                    </div>
                </div>

                <!-- Availability Filter -->
                <div class="filter-group">
                    <h4 class="filter-group-title">Availability</h4>
                    <div class="filter-options">
                        <div class="filter-option">
                            <input type="checkbox" id="instock" name="availability" value="instock">
                            <label for="instock">In Stock</label>
                            <span class="filter-count">(890)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="sale" name="availability" value="sale">
                            <label for="sale">On Sale</label>
                            <span class="filter-count">(156)</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="new" name="availability" value="new">
                            <label for="new">New Arrivals</label>
                            <span class="filter-count">(78)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="col-lg-9 col-md-8">
            <!-- Sort Section -->
            <div class="sort-section">
                <div class="sort-header">
                    <div class="results-count">
                        Showing <strong>1-24</strong> of <strong>1,234</strong> products
                    </div>
                    <div class="sort-controls">
                        <select class="sort-select">
                            <option value="featured">Featured</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="newest">Newest First</option>
                            <option value="rating">Customer Rating</option>
                            <option value="bestseller">Best Sellers</option>
                        </select>
                        <div class="view-toggle">
                            <button class="view-btn active" id="gridView">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="view-btn" id="listView">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="products-section">
                <div class="products-grid" id="productsGrid">
                    <!-- Product 1 -->
                    <div class="product-card">
                        <div class="product-badges">
                            <span class="badge sale">Sale</span>
                            <span class="badge bestseller">Best Seller</span>
                        </div>
                        <img src="https://via.placeholder.com/300x250/228B22/FFFFFF?text=Wireless+Headphones" alt="Wireless Headphones" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">Premium Wireless Headphones</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-text">(4.8) 156 reviews</span>
                            </div>
                            <div class="product-price">
                                \$129.99
                                <span class="original-price">\$199.99</span>
                            </div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="product-card">
                        <div class="product-badges">
                            <span class="badge new">New</span>
                        </div>
                        <img src="https://via.placeholder.com/300x250/2E8B57/FFFFFF?text=Smart+Watch" alt="Smart Watch" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">Advanced Smart Watch</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-text">(4.2) 89 reviews</span>
                            </div>
                            <div class="product-price">\$299.99</div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="product-card">
                        <img src="https://via.placeholder.com/300x250/32CD32/FFFFFF?text=Laptop+Stand" alt="Laptop Stand" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">Adjustable Laptop Stand</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-text">(4.9) 234 reviews</span>
                            </div>
                            <div class="product-price">\$49.99</div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="product-card">
                        <div class="product-badges">
                            <span class="badge sale">Sale</span>
                        </div>
                        <img src="https://via.placeholder.com/300x250/90EE90/FFFFFF?text=Wireless+Mouse" alt="Wireless Mouse" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">Ergonomic Wireless Mouse</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-text">(4.1) 67 reviews</span>
                            </div>
                            <div class="product-price">
                                \$39.99
                                <span class="original-price">\$59.99</span>
                            </div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="product-card">
                        <img src="https://via.placeholder.com/300x250/228B22/FFFFFF?text=Bluetooth+Speaker" alt="Bluetooth Speaker" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">Portable Bluetooth Speaker</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-text">(4.7) 178 reviews</span>
                            </div>
                            <div class="product-price">\$79.99</div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="product-card">
                        <div class="product-badges">
                            <span class="badge bestseller">Best Seller</span>
                        </div>
                        <img src="https://via.placeholder.com/300x250/2E8B57/FFFFFF?text=Phone+Case" alt="Phone Case" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">Premium Phone Case</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-text">(4.3) 92 reviews</span>
                            </div>
                            <div class="product-price">\$24.99</div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 7 -->
                    <div class="product-card">
                        <img src="https://via.placeholder.com/300x250/32CD32/FFFFFF?text=Keyboard" alt="Mechanical Keyboard" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">Mechanical Gaming Keyboard</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-text">(4.6) 145 reviews</span>
                            </div>
                            <div class="product-price">\$149.99</div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 8 -->
                    <div class="product-card">
                        <div class="product-badges">
                            <span class="badge new">New</span>
                        </div>
                        <img src="https://via.placeholder.com/300x250/90EE90/FFFFFF?text=Tablet" alt="Tablet" class="product-image">
                        <div class="product-info">
                            <h3 class="product-title">10-inch Android Tablet</h3>
                            <div class="product-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-text">(4.0) 76 reviews</span>
                            </div>
                            <div class="product-price">\$199.99</div>
                            <div class="product-actions">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist">
                                    <i class="hgi hgi-stroke hgi-favourite"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination-section">
                <div class="pagination-custom">
                    <a href="#" class="page-btn"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="page-btn active">1</a>
                    <a href="#" class="page-btn">2</a>
                    <a href="#" class="page-btn">3</a>
                    <a href="#" class="page-btn">4</a>
                    <a href="#" class="page-btn">5</a>
                    <span class="page-btn">...</span>
                    <a href="#" class="page-btn">15</a>
                    <a href="#" class="page-btn"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Filter Toggle -->
<button class="mobile-filter-toggle" id="mobileFilterToggle">
    <i class="fas fa-filter"></i>
</button>

<!-- Mobile Filter Overlay -->
<div class="filter-overlay" id="filterOverlay"></div>

<!-- Mobile Filter Panel -->
<div class="mobile-filter-panel" id="mobileFilterPanel">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="filter-title">Filters</h3>
        <button class="btn-close" id="closeMobileFilter">×</button>
    </div>
    <!-- Filter content will be cloned here for mobile -->
</div>

<?php require_once 'includes/foot.php'; ?>