<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenShop - Premium Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fffe 0%, #e8f5e8 100%);
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Header Styles */
        .header {
            background: var(--primary-gradient);
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(34, 139, 34, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo i {
            background: white;
            color: var(--accent-color);
            padding: 0.5rem;
            border-radius: 50%;
        }

        .search-container {
            position: relative;
            max-width: 500px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--accent-color);
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 20px;
            color: white;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: #1e6b1e;
            transform: translateY(-50%) scale(1.05);
        }

        .cart-btn {
            background: white;
            color: var(--accent-color);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cart-btn:hover {
            background: #f0f8f0;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .cart-count {
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            padding: 0.2rem 0.5rem;
            font-size: 0.8rem;
        }

        /* Search History */
        .search-history {
            background: white;
            border-radius: 15px;
            padding: 1rem;
            margin-top: 1rem;
            box-shadow: var(--card-shadow);
        }

        .search-history h6 {
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }

        .search-tag {
            display: inline-block;
            background: var(--secondary-gradient);
            color: var(--accent-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            margin: 0.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-tag:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Sale Banner */
        .sale-banner {
            background: var(--primary-gradient);
            color: white;
            padding: 0.8rem 0;
            text-align: center;
            font-weight: 600;
            animation: slideIn 0.5s ease-out;
        }

        .sale-banner i {
            margin-right: 0.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        /* Product Grid */
        .products-section {
            padding: 2rem 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--text-dark);
            font-size: 2.5rem;
            font-weight: 700;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--hover-shadow);
        }

        .product-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--accent-color);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .current-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .original-price {
            font-size: 1rem;
            color: #999;
            text-decoration: line-through;
        }

        .add-to-cart {
            width: 100%;
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.8rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(34, 139, 34, 0.3);
        }

        /* Categories Section */
        .categories-section {
            padding: 2rem 0;
            background: white;
        }

        .category-card {
            background: var(--secondary-gradient);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            cursor: pointer;
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(34, 139, 34, 0.2);
        }

        .category-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .category-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 0.5rem 0;
            }

            .logo {
                font-size: 1.5rem;
            }

            .search-input {
                font-size: 0.9rem;
                padding: 0.6rem 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .product-image {
                height: 180px;
            }

            .category-icon {
                font-size: 2.5rem;
            }
        }

        /* Loading Animation */
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 2rem;
        }

        .spinner {
            border: 4px solid rgba(34, 139, 34, 0.1);
            border-top: 4px solid var(--accent-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
            }

            to {
                transform: translateY(0);
            }
        }

        /* Shop All Button */
        .shop-all-btn {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .shop-all-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(34, 139, 34, 0.3);
        }

        /* Footer Styles */
        .footer {
            background: var(--primary-gradient);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #FFD700, #32CD32, #FFD700);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {

            0%,
            100% {
                transform: translateX(-100%);
            }

            50% {
                transform: translateX(100%);
            }
        }

        .footer-content {
            position: relative;
            z-index: 1;
        }

        .footer-section {
            margin-bottom: 2rem;
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
            position: relative;
            display: inline-block;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #FFD700, #32CD32);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: #FFD700;
            transform: translateX(5px);
        }

        .footer-links a i {
            font-size: 0.9rem;
            width: 16px;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            border-color: #FFD700;
            color: #FFD700;
        }

        .newsletter-form {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .newsletter-input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .newsletter-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            border-color: #FFD700;
        }

        .newsletter-btn {
            background: #FFD700;
            color: var(--text-dark);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .newsletter-btn:hover {
            background: #FFC107;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.3);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFD700;
            font-size: 1.1rem;
        }

        .payment-methods {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .payment-method {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 1.5rem;
            margin-top: 2rem;
            text-align: center;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .copyright {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .footer-bottom-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: #FFD700;
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(34, 139, 34, 0.3);
            opacity: 0;
            visibility: hidden;
            transform: translateY(100px);
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(34, 139, 34, 0.4);
        }

        .trust-badges {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .trust-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .trust-badge:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .trust-badge i {
            color: #FFD700;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer {
                padding: 2rem 0 1rem;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-bottom-links {
                justify-content: center;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .social-links {
                justify-content: center;
            }

            .trust-badges {
                flex-direction: column;
                align-items: center;
            }

            .payment-methods {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .footer-title {
                font-size: 1.1rem;
            }

            .social-link {
                width: 40px;
                height: 40px;
            }

            .back-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
            }
        }
    </style>
</head>

<body>
    <!-- Sale Banner -->
    <div class="sale-banner">
        <i class="fas fa-fire"></i>
        Limited Time Sale - Up to 70% Off Selected Items!
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <a href="#" class="logo">
                        <i class="fas fa-leaf"></i>
                        GreenShop
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Search in GreenShop" id="searchInput">
                        <button class="search-btn" onclick="performSearch()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3 text-end">
                    <button class="cart-btn" onclick="toggleCart()">
                        <i class="fas fa-shopping-cart"></i>
                        Cart
                        <span class="cart-count">3</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Search History -->
    <div class="container mt-3 d-none">
        <div class="search-history">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6>Search History</h6>
                <button class="btn btn-sm btn-outline-success" onclick="clearHistory()">CLEAR</button>
            </div>
            <div id="searchTags">
                <span class="search-tag" onclick="searchFor('wireless earbuds')">wireless earbuds</span>
                <span class="search-tag" onclick="searchFor('home theater speakers')">home theater speakers</span>
                <span class="search-tag" onclick="searchFor('kitchen gadgets')">kitchen gadgets</span>
                <span class="search-tag" onclick="searchFor('beauty products')">beauty products</span>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="section-title mb-0">Featured Products</h2>
                <a href="products" class="shop-all-btn">
                    SHOP ALL PRODUCTS
                    <i class="fas fa-arrow-right"></i>
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
                            <button class="add-to-cart" onclick="addToCart(1)">
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
                            <button class="add-to-cart" onclick="addToCart(2)">
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
                            <button class="add-to-cart" onclick="addToCart(3)">
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
                            <button class="add-to-cart" onclick="addToCart(4)">
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
                            <button class="add-to-cart" onclick="addToCart(5)">
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
                            <button class="add-to-cart" onclick="addToCart(6)">
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
                    <div class="category-card" onclick="browseCategory('electronics')">
                        <div class="category-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5 class="category-title">Electronics</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="browseCategory('fashion')">
                        <div class="category-icon">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <h5 class="category-title">Fashion</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="browseCategory('home')">
                        <div class="category-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h5 class="category-title">Home & Garden</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="browseCategory('sports')">
                        <div class="category-icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <h5 class="category-title">Sports & Fitness</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="browseCategory('beauty')">
                        <div class="category-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h5 class="category-title">Beauty & Health</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="browseCategory('books')">
                        <div class="category-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h5 class="category-title">Books & Media</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Loading Spinner -->
    <div class="loading-spinner" id="loadingSpinner">
        <div class="spinner"></div>
        <p>Loading products...</p>
    </div>

    <!-- Footer HTML Structure -->
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <!-- About Section -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-section">
                            <h4 class="footer-title">About GreenShop</h4>
                            <p class="footer-description">
                                Your trusted partner for premium quality products. We bring you the best selection of eco-friendly and sustainable products for a better tomorrow.
                            </p>
                            <div class="social-links">
                                <a href="#" class="social-link" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section">
                            <h4 class="footer-title">Quick Links</h4>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                                <li><a href="#"><i class="fas fa-shopping-bag"></i> Products</a></li>
                                <li><a href="#"><i class="fas fa-tags"></i> Categories</a></li>
                                <li><a href="#"><i class="fas fa-percent"></i> Deals</a></li>
                                <li><a href="#"><i class="fas fa-blog"></i> Blog</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Customer Service -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section">
                            <h4 class="footer-title">Customer Service</h4>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fas fa-question-circle"></i> Help Center</a></li>
                                <li><a href="#"><i class="fas fa-truck"></i> Shipping Info</a></li>
                                <li><a href="#"><i class="fas fa-undo"></i> Returns</a></li>
                                <li><a href="#"><i class="fas fa-shield-alt"></i> Warranty</a></li>
                                <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section">
                            <h4 class="footer-title">Contact Info</h4>
                            <div class="contact-info">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <div>123 Green Street</div>
                                        <div>Eco City, EC 12345</div>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>+1 (555) 123-4567</div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>info@greenshop.com</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-section">
                            <h4 class="footer-title">Newsletter</h4>
                            <p class="footer-description">
                                Subscribe to get special offers, exclusive deals, and the latest updates.
                            </p>
                            <form class="newsletter-form" onsubmit="subscribeNewsletter(event)">
                                <input type="email" class="newsletter-input" placeholder="Enter your email" required>
                                <button type="submit" class="newsletter-btn">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>

                            <div class="payment-methods">
                                <div class="payment-method">
                                    <i class="fab fa-cc-visa"></i>
                                    <span>Visa</span>
                                </div>
                                <div class="payment-method">
                                    <i class="fab fa-cc-mastercard"></i>
                                    <span>Mastercard</span>
                                </div>
                                <div class="payment-method">
                                    <i class="fab fa-paypal"></i>
                                    <span>PayPal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trust Badges -->
                <div class="trust-badges">
                    <div class="trust-badge">
                        <i class="fas fa-lock"></i>
                        <span>Secure Shopping</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Free Shipping</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-medal"></i>
                        <span>Best Quality</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-headset"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        © 2024 GreenShop. All rights reserved.
                    </div>
                    <div class="footer-bottom-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" onclick="scrollToTop()" title="Back to Top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        function performSearch() {
            const searchInput = document.getElementById('searchInput');
            const query = searchInput.value.trim();

            if (query) {
                addToSearchHistory(query);
                showLoading();

                // Simulate search delay
                setTimeout(() => {
                    hideLoading();
                    alert(`Searching for: ${query}`);
                }, 1000);
            }
        }

        function searchFor(query) {
            document.getElementById('searchInput').value = query;
            performSearch();
        }

        function addToSearchHistory(query) {
            const searchTags = document.getElementById('searchTags');
            const newTag = document.createElement('span');
            newTag.className = 'search-tag';
            newTag.textContent = query;
            newTag.onclick = () => searchFor(query);
            searchTags.appendChild(newTag);
        }

        function clearHistory() {
            document.getElementById('searchTags').innerHTML = `
                <span class="search-tag" onclick="searchFor('wireless earbuds')">wireless earbuds</span>
                <span class="search-tag" onclick="searchFor('home theater speakers')">home theater speakers</span>
                <span class="search-tag" onclick="searchFor('kitchen gadgets')">kitchen gadgets</span>
                <span class="search-tag" onclick="searchFor('beauty products')">beauty products</span>
            `;
        }

        // Cart functionality
        let cartCount = 3;

        function addToCart(productId) {
            cartCount++;
            document.querySelector('.cart-count').textContent = cartCount;

            // Add animation effect
            const button = event.target;
            button.innerHTML = '<i class="fas fa-check"></i> Added!';
            button.style.background = '#28a745';

            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-cart-plus"></i> Add to Cart';
                button.style.background = '';
            }, 2000);
        }

        function toggleCart() {
            alert('Cart opened! Items in cart: ' + cartCount);
        }

        // Category browsing
        function browseCategory(category) {
            showLoading();

            setTimeout(() => {
                hideLoading();
                alert(`Browsing ${category} category`);
            }, 1000);
        }

        // Loading spinner
        function showLoading() {
            document.getElementById('loadingSpinner').style.display = 'block';
        }

        function hideLoading() {
            document.getElementById('loadingSpinner').style.display = 'none';
        }

        // Search on Enter key
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add to cart animation
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Lazy loading effect for product cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Initialize lazy loading
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });

        // Footer section
        // Newsletter subscription
        function subscribeNewsletter(event) {
            event.preventDefault();
            const email = event.target.querySelector('input[type="email"]').value;

            // Simulate subscription
            alert(`Thank you for subscribing with email: ${email}`);
            event.target.reset();
        }

        // Back to top functionality
        window.addEventListener('scroll', function() {
            const backToTop = document.querySelector('.back-to-top');
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Smooth scroll for footer links
        document.querySelectorAll('.footer-links a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Social media link handlers
        document.querySelectorAll('.social-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const platform = this.title;
                alert(`Opening ${platform} page...`);
            });
        });
    </script>
</body>

</html>