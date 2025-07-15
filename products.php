<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - GreenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2E8B57 0%, #228B22 50%, #32CD32 100%);
            --secondary-gradient: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
            --accent-color: #228B22;
            --text-dark: #2F4F4F;
            --text-light: #6B8E6B;
            --card-shadow: 0 8px 30px rgba(34, 139, 34, 0.15);
            --hover-shadow: 0 15px 40px rgba(34, 139, 34, 0.25);
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f8fffe 0%, #e8f5e8 100%);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .page-header {
            background: var(--primary-gradient);
            padding: 40px 0;
            margin-bottom: 40px;
            text-align: center;
            box-shadow: var(--card-shadow);
        }

        .page-title {
            color: white;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .breadcrumb-custom {
            background: var(--secondary-gradient);
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .breadcrumb-custom a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-custom a:hover {
            text-decoration: underline;
        }

        /* Categories Section */
        .categories-section {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
        }

        .categories-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 25px;
            margin-bottom: 20px;
        }

        .category-card {
            background: var(--secondary-gradient);
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .category-card:hover,
        .category-card.active {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
            border-color: var(--accent-color);
        }

        .category-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 15px;
        }

        .category-name {
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .category-count {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Filter Section */
        .filter-section {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            padding: 25px;
            margin-bottom: 30px;
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        .filter-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .filter-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-dark);
        }

        .clear-filters {
            background: none;
            border: none;
            color: var(--accent-color);
            font-weight: 500;
            cursor: pointer;
            text-decoration: underline;
        }

        .filter-group {
            margin-bottom: 25px;
        }

        .filter-group-title {
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-option:hover {
            background: var(--secondary-gradient);
            border-radius: 8px;
            padding-left: 10px;
        }

        .filter-option input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--accent-color);
        }

        .filter-option label {
            cursor: pointer;
            flex-grow: 1;
        }

        .filter-count {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Price Range Slider */
        .price-range {
            margin: 20px 0;
        }

        .price-inputs {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .price-input {
            flex: 1;
            padding: 8px 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .price-input:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        .price-slider {
            width: 100%;
            height: 8px;
            background: #e0e0e0;
            border-radius: 5px;
            outline: none;
            appearance: none;
        }

        .price-slider::-webkit-slider-thumb {
            appearance: none;
            width: 20px;
            height: 20px;
            background: var(--accent-color);
            border-radius: 50%;
            cursor: pointer;
        }

        /* Rating Filter */
        .rating-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            cursor: pointer;
        }

        .rating-stars {
            color: #ffc107;
        }

        /* Sort Options */
        .sort-section {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
        }

        .sort-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .results-count {
            color: var(--text-light);
            font-size: 1rem;
        }

        .sort-controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .sort-select {
            padding: 8px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sort-select:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        .view-toggle {
            display: flex;
            background: #f0f0f0;
            border-radius: 8px;
            padding: 2px;
        }

        .view-btn {
            padding: 8px 12px;
            border: none;
            background: none;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .view-btn.active {
            background: var(--accent-color);
            color: white;
        }

        /* Products Grid */
        .products-section {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .products-grid.list-view {
            grid-template-columns: 1fr;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }

        .product-rating .stars {
            color: #ffc107;
        }

        .product-rating .rating-text {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 15px;
        }

        .product-price .original-price {
            color: #999;
            text-decoration: line-through;
            font-size: 1rem;
            margin-left: 10px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .btn-add-cart {
            flex: 1;
            padding: 12px;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-add-cart:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .btn-wishlist {
            width: 45px;
            height: 45px;
            border: 2px solid var(--accent-color);
            background: white;
            color: var(--accent-color);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-wishlist:hover {
            background: var(--accent-color);
            color: white;
        }

        .product-badges {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge.sale {
            background: #ff4444;
            color: white;
        }

        .badge.new {
            background: #28a745;
            color: white;
        }

        .badge.bestseller {
            background: #ffc107;
            color: #000;
        }

        /* List View */
        .product-card.list-view {
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .product-card.list-view .product-image {
            width: 200px;
            height: 150px;
            margin-right: 20px;
        }

        .product-card.list-view .product-info {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Pagination */
        .pagination-section {
            margin-top: 40px;
            text-align: center;
        }

        .pagination-custom {
            display: inline-flex;
            gap: 10px;
            align-items: center;
        }

        .pagination-custom .page-btn {
            padding: 12px 18px;
            border: 2px solid #e0e0e0;
            background: white;
            color: var(--text-dark);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .pagination-custom .page-btn:hover,
        .pagination-custom .page-btn.active {
            border-color: var(--accent-color);
            background: var(--accent-color);
            color: white;
        }

        /* Mobile Filter Toggle */
        .mobile-filter-toggle {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: var(--card-shadow);
            z-index: 1000;
        }

        .filter-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .mobile-filter-panel {
            position: fixed;
            top: 0;
            left: -100%;
            width: 80%;
            height: 100%;
            background: white;
            padding: 20px;
            transition: left 0.3s ease;
            overflow-y: auto;
            z-index: 1000;
        }

        .mobile-filter-panel.active {
            left: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .categories-grid {
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 15px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }

            .sort-header {
                flex-direction: column;
                align-items: stretch;
            }

            .sort-controls {
                justify-content: space-between;
            }

            .mobile-filter-toggle {
                display: block;
            }

            .filter-section {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .categories-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .product-card.list-view {
                flex-direction: column;
            }

            .product-card.list-view .product-image {
                width: 100%;
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">All Products</h1>
            <p class="page-subtitle">Discover our complete collection of premium products</p>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="container">
        <div class="breadcrumb-custom">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Products</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container">
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
                        <i class="fas fa-heart"></i>
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

    <div class="container">
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
                                        <i class="fas fa-heart"></i>
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
                                        <i class="fas fa-heart"></i>
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
                                        <i class="fas fa-heart"></i>
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
                                        <i class="fas fa-heart"></i>
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
                                        <i class="fas fa-heart"></i>
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
                                        <i class="fas fa-heart"></i>
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
                                        <i class="fas fa-heart"></i>
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
                                        <i class="fas fa-heart"></i>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Category selection
            $('.category-card').click(function() {
                $('.category-card').removeClass('active');
                $(this).addClass('active');

                const category = $(this).data('category');
                filterProducts(category);
            });

            // View toggle
            $('#gridView').click(function() {
                $('.view-btn').removeClass('active');
                $(this).addClass('active');
                $('#productsGrid').removeClass('list-view');
                $('.product-card').removeClass('list-view');
            });

            $('#listView').click(function() {
                $('.view-btn').removeClass('active');
                $(this).addClass('active');
                $('#productsGrid').addClass('list-view');
                $('.product-card').addClass('list-view');
            });

            // Mobile filter toggle
            $('#mobileFilterToggle').click(function() {
                $('#filterOverlay').fadeIn();
                $('#mobileFilterPanel').addClass('active');

                // Clone filter content to mobile panel
                const filterContent = $('.filter-section').html();
                $('#mobileFilterPanel').append(filterContent);
            });

            $('#closeMobileFilter, #filterOverlay').click(function() {
                $('#filterOverlay').fadeOut();
                $('#mobileFilterPanel').removeClass('active');
            });

            // Filter functionality
            $('.filter-option input[type="checkbox"]').change(function() {
                applyFilters();
            });

            $('.price-input').on('input', function() {
                applyFilters();
            });

            $('.sort-select').change(function() {
                const sortBy = $(this).val();
                sortProducts(sortBy);
            });

            // Clear filters
            $('.clear-filters').click(function() {
                $('input[type="checkbox"]').prop('checked', false);
                $('.price-input').val('');
                $('.price-slider').val(500);
                applyFilters();
            });

            // Add to cart functionality
            $('.btn-add-cart').click(function() {
                const button = $(this);
                const originalText = button.html();

                button.html('<i class="fas fa-check"></i> Added');
                button.css('background', '#28a745');

                setTimeout(() => {
                    button.html(originalText);
                    button.css('background', '');
                }, 2000);
            });

            // Wishlist functionality
            $('.btn-wishlist').click(function() {
                $(this).toggleClass('active');
                const icon = $(this).find('i');

                if ($(this).hasClass('active')) {
                    icon.removeClass('far').addClass('fas');
                    $(this).css('color', '#ff4444');
                } else {
                    icon.removeClass('fas').addClass('far');
                    $(this).css('color', '');
                }
            });

            // Product card click to view details
            $('.product-card').click(function(e) {
                if (!$(e.target).closest('.product-actions').length) {
                    // Navigate to product detail page
                    window.location.href = '#product-detail';
                }
            });

            // Price range slider
            $('.price-slider').on('input', function() {
                const value = $(this).val();
                $('.price-input').eq(1).val(value);
                applyFilters();
            });

            // Functions
            function filterProducts(category) {
                if (category === 'all') {
                    $('.product-card').show();
                    $('.results-count').html('Showing <strong>1-24</strong> of <strong>1,234</strong> products');
                } else {
                    // Filter logic would go here
                    console.log('Filtering by category:', category);
                }
            }

            function applyFilters() {
                // Filter application logic
                const selectedCategories = [];
                const selectedRatings = [];
                const selectedBrands = [];
                const selectedAvailability = [];

                $('input[name="category"]:checked').each(function() {
                    selectedCategories.push($(this).val());
                });

                $('input[name="rating"]:checked').each(function() {
                    selectedRatings.push($(this).val());
                });

                $('input[name="brand"]:checked').each(function() {
                    selectedBrands.push($(this).val());
                });

                $('input[name="availability"]:checked').each(function() {
                    selectedAvailability.push($(this).val());
                });

                const minPrice = $('.price-input').eq(0).val();
                const maxPrice = $('.price-input').eq(1).val();

                console.log('Applying filters:', {
                    categories: selectedCategories,
                    ratings: selectedRatings,
                    brands: selectedBrands,
                    availability: selectedAvailability,
                    priceRange: {
                        min: minPrice,
                        max: maxPrice
                    }
                });
            }

            function sortProducts(sortBy) {
                console.log('Sorting by:', sortBy);
                // Sorting logic would go here
            }

            // Pagination
            $('.page-btn').click(function(e) {
                e.preventDefault();
                $('.page-btn').removeClass('active');
                $(this).addClass('active');

                // Scroll to top of products
                $('html, body').animate({
                    scrollTop: $('.products-section').offset().top - 100
                }, 500);
            });
        });
    </script>
</body>

</html>