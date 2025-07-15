<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - GreenShop</title>
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

        /* Product Detail Section */
        .product-detail-section {
            padding: 40px 0;
            background: white;
            margin: 20px 0;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
        }

        .product-image-container {
            position: relative;
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            box-shadow: var(--card-shadow);
        }

        .main-product-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 15px;
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }

        .main-product-image:hover {
            transform: scale(1.02);
        }

        .thumbnail-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            overflow-x: auto;
            padding: 10px;
        }

        .thumbnail-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            flex-shrink: 0;
        }

        .thumbnail-image:hover,
        .thumbnail-image.active {
            border-color: var(--accent-color);
            transform: scale(1.1);
        }

        .sale-badge {
            position: absolute;
            top: 30px;
            right: 30px;
            background: #ff4444;
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            z-index: 10;
        }

        .product-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .rating-stars {
            color: #ffc107;
            font-size: 1.2rem;
        }

        .rating-count {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .product-price {
            font-size: 2.2rem;
            font-weight: bold;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
        }

        .original-price {
            color: #999;
            text-decoration: line-through;
            font-size: 1.5rem;
            margin-left: 15px;
        }

        .product-description {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .product-options {
            margin-bottom: 30px;
        }

        .option-group {
            margin-bottom: 25px;
        }

        .option-label {
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 10px;
            display: block;
        }

        .color-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .color-option {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 3px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .color-option.active {
            border-color: var(--accent-color);
            transform: scale(1.1);
        }

        .color-option.active::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 16px;
        }

        .size-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .size-option {
            padding: 10px 20px;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .size-option:hover,
        .size-option.active {
            border-color: var(--accent-color);
            background: var(--secondary-gradient);
            color: var(--text-dark);
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            overflow: hidden;
        }

        .quantity-btn {
            width: 45px;
            height: 45px;
            border: none;
            background: var(--secondary-gradient);
            cursor: pointer;
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: var(--primary-gradient);
            color: white;
        }

        .quantity-input {
            width: 70px;
            height: 45px;
            border: none;
            text-align: center;
            font-size: 1.1rem;
            font-weight: bold;
            background: white;
        }

        .btn-custom {
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary-custom {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--card-shadow);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .btn-secondary-custom {
            background: white;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }

        .btn-secondary-custom:hover {
            background: var(--accent-color);
            color: white;
        }

        .product-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 40px;
            padding-top: 40px;
            border-top: 1px solid #e0e0e0;
        }

        .feature-card {
            text-align: center;
            padding: 25px;
            background: var(--secondary-gradient);
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent-color);
        }

        .feature-title {
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .feature-description {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Related Products Section */
        .related-products-section {
            margin-top: 60px;
            padding: 60px 0;
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 50px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
            margin-bottom: 30px;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .product-card-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-card-image {
            transform: scale(1.05);
        }

        .product-card-content {
            padding: 20px;
        }

        .product-card-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .product-card-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 15px;
        }

        .product-card-btn {
            width: 100%;
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

        .product-card-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .product-card-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ff4444;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .product-card-badge.new {
            background: #28a745;
        }

        /* Modal Styles */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            max-height: 80%;
            object-fit: contain;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .close-modal:hover {
            color: #bbb;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-title {
                font-size: 2rem;
            }

            .product-price {
                font-size: 1.8rem;
            }

            .main-product-image {
                height: 300px;
            }

            .section-title {
                font-size: 2rem;
            }

            .product-features {
                grid-template-columns: 1fr;
            }

            .btn-custom {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            .product-detail-section {
                padding: 20px 0;
                margin: 10px 0;
            }

            .product-title {
                font-size: 1.5rem;
            }

            .product-price {
                font-size: 1.5rem;
            }

            .main-product-image {
                height: 250px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Product Detail Section -->
        <div class="product-detail-section">
            <div class="container">
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
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-4 col-12">
                                    <button class="btn btn-custom btn-secondary-custom w-100" id="wishlistBtn">
                                        <i class="fas fa-heart"></i> Wishlist
                                    </button>
                                </div>
                            </div>

                            <!-- Product Features -->
                            <div class="product-features">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="feature-title">Free Shipping</div>
                                    <div class="feature-description">Free delivery on orders over $50</div>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-undo"></i>
                                    </div>
                                    <div class="feature-title">30-Day Return</div>
                                    <div class="feature-description">Easy returns within 30 days</div>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-shield-alt"></i>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Thumbnail image switching
            $('.thumbnail-image').click(function() {
                const mainImageSrc = $(this).data('main');
                $('#mainImage').attr('src', mainImageSrc);

                $('.thumbnail-image').removeClass('active');
                $(this).addClass('active');
            });

            // Main image zoom modal
            $('#mainImage').click(function() {
                const src = $(this).attr('src');
                $('#modalImage').attr('src', src);
                $('#imageModal').fadeIn();
            });

            // Close modal
            $('.close-modal, #imageModal').click(function(e) {
                if (e.target === this) {
                    $('#imageModal').fadeOut();
                }
            });

            // Color option selection
            $('.color-option').click(function() {
                $('.color-option').removeClass('active');
                $(this).addClass('active');

                const color = $(this).data('color');
                console.log('Selected color:', color);
            });

            // Size option selection
            $('.size-option').click(function() {
                $('.size-option').removeClass('active');
                $(this).addClass('active');

                const size = $(this).data('size');
                console.log('Selected size:', size);
            });

            // Quantity controls
            $('#increaseBtn').click(function() {
                const current = parseInt($('#quantityInput').val());
                $('#quantityInput').val(current + 1);
            });

            $('#decreaseBtn').click(function() {
                const current = parseInt($('#quantityInput').val());
                if (current > 1) {
                    $('#quantityInput').val(current - 1);
                }
            });

            // Add to cart functionality
            $('#addToCartBtn').click(function() {
                const quantity = $('#quantityInput').val();
                const color = $('.color-option.active').data('color');
                const size = $('.size-option.active').data('size');

                // Add animation
                $(this).html('<i class="fas fa-check"></i> Added to Cart');
                $(this).removeClass('btn-primary-custom').css('background', '#28a745');

                setTimeout(() => {
                    $(this).html('<i class="fas fa-cart-plus"></i> Add to Cart');
                    $(this).addClass('btn-primary-custom').css('background', '');
                }, 2000);

                console.log('Added to cart:', {
                    quantity,
                    color,
                    size
                });
            });

            // Wishlist functionality
            $('#wishlistBtn').click(function() {
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).html('<i class="fas fa-heart"></i> Added');
                    $(this).css('background', '#ff4444').css('color', 'white');
                } else {
                    $(this).html('<i class="fas fa-heart"></i> Wishlist');
                    $(this).css('background', '').css('color', '');
                }
            });

            // Related product cards hover effect
            $('.product-card').hover(
                function() {
                    $(this).find('.product-card-btn').css('background', 'var(--accent-color)');
                },
                function() {
                    $(this).find('.product-card-btn').css('background', '');
                }
            );

            // Smooth scrolling for related products
            $('.product-card-btn').click(function(e) {
                e.preventDefault();

                // Add to cart animation
                $(this).html('<i class="fas fa-check"></i> Added');
                $(this).css('background', '#28a745');

                setTimeout(() => {
                    $(this).html('Add to Cart');
                    $(this).css('background', '');
                }, 1500);
            });
        });
    </script>
</body>

</html>