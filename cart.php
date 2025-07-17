<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart - GreenShop</title>
    <!-- Google Fonts (Example: Poppins or Lato for modern look) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* --- Global GreenShop Styling --- */
        :root {
            --greenshop-primary: #28a745;
            /* Your main green */
            --greenshop-primary-dark: #218838;
            /* Darker green for hover */
            --greenshop-light-green: #e9f5e9;
            /* Light background for some elements */
            --greenshop-text-dark: #343a40;
            /* Dark text */
            --greenshop-text-muted: #6c757d;
            /* Muted text */
            --greenshop-card-bg: #fff;
            --greenshop-border-color: #dee2e6;
            --greenshop-border-radius: 0.75rem;
            /* Consistent rounded corners */
            --greenshop-shadow: rgba(0, 0, 0, 0.075);
            /* Subtle shadow */
        }

        body {
            font-family: 'Poppins', sans-serif;
            /* A more modern, friendly font */
            background-color: #f8f9fa;
            /* Light grey background */
            color: var(--greenshop-text-dark);
        }

        .container {
            max-width: 1200px;
        }

        /* --- Header Styling (Refined from your homepage) --- */
        .gs-header {
            background-color: var(--greenshop-primary);
            color: #fff;
            box-shadow: 0 2px 4px var(--greenshop-shadow);
        }

        .gs-logo-link {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .gs-search-bar .gs-search-input {
            border-radius: 0.5rem 0 0 0.5rem;
            border: none;
            padding-left: 1.25rem;
        }

        .gs-search-bar .gs-search-btn {
            background-color: #fff;
            color: var(--greenshop-primary);
            border-radius: 0 0.5rem 0.5rem 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .gs-search-bar .gs-search-btn:hover {
            background-color: var(--greenshop-light-green);
            color: var(--greenshop-primary-dark);
        }

        .gs-cart-btn {
            background-color: var(--greenshop-primary-dark);
            border-color: var(--greenshop-primary-dark);
            color: #fff;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .gs-cart-btn:hover {
            background-color: #fff;
            color: var(--greenshop-primary);
            border-color: #fff;
            transform: translateY(-2px);
            /* Subtle lift animation */
        }

        .gs-badge {
            background-color: #fff;
            color: var(--greenshop-primary);
            font-weight: bold;
            padding: 0.3em 0.6em;
            border-radius: 50%;
            transform: scale(0.9);
            transition: transform 0.2s ease;
        }

        /* --- Main Content & Card Styling --- */
        .gs-page-title {
            color: var(--greenshop-primary-dark);
            font-weight: 600;
            letter-spacing: 0.05em;
            position: relative;
        }

        .gs-page-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background-color: var(--greenshop-primary);
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .gs-card {
            background-color: var(--greenshop-card-bg);
            border-radius: var(--greenshop-border-radius);
            border: none;
            box-shadow: 0 0.25rem 0.5rem var(--greenshop-shadow);
            /* More pronounced shadow */
            transition: transform 0.2s ease-in-out;
        }

        .gs-card:hover {
            transform: translateY(-3px);
            /* Subtle lift on hover for cards */
        }

        /* --- Cart Items Table (Desktop) --- */
        .gs-cart-table th {
            color: var(--greenshop-text-muted);
            font-weight: 500;
            border-bottom: 1px solid var(--greenshop-border-color);
            padding-bottom: 1rem;
        }

        .gs-cart-table td {
            padding-top: 1rem;
            padding-bottom: 1rem;
            border-top: 1px solid #f0f0f0;
            /* Lighter divider */
        }

        .gs-cart-item-row {
            transition: all 0.3s ease-in-out;
            /* For removal animation */
        }

        .gs-cart-item-row.removing {
            opacity: 0;
            transform: translateX(-20px);
        }

        .gs-item-img {
            width: 90px;
            /* Slightly larger image */
            height: 90px;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .gs-item-name {
            font-weight: 500;
        }

        .gs-quantity-control .gs-qty-input {
            width: 60px;
            /* Wider input for better touch */
            border-color: var(--greenshop-border-color);
            background-color: #f9f9f9;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .gs-quantity-control .gs-qty-input:focus {
            border-color: var(--greenshop-primary);
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        }

        .gs-quantity-control .btn {
            border-color: var(--greenshop-border-color);
            color: var(--greenshop-text-dark);
            background-color: #f0f0f0;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .gs-quantity-control .btn:hover {
            background-color: var(--greenshop-primary);
            color: #fff;
            border-color: var(--greenshop-primary);
        }

        .gs-quantity-control .btn-outline-secondary:active {
            background-color: var(--greenshop-primary-dark) !important;
            border-color: var(--greenshop-primary-dark) !important;
            color: #fff !important;
        }

        .gs-item-subtotal {
            font-weight: 600;
            color: var(--greenshop-primary);
        }

        .gs-btn-remove-item {
            color: var(--greenshop-text-muted);
            transition: color 0.2s ease, transform 0.2s ease;
            background: none;
            border: none;
            padding: 0.5rem;
            /* Make clickable area larger */
            border-radius: 0.5rem;
        }

        .gs-btn-remove-item:hover {
            color: #dc3545;
            /* Red for delete */
            transform: scale(1.1);
            /* Subtle grow on hover */
        }

        /* --- Cart Items Cards (Mobile) --- */
        .gs-cart-item-card {
            border: 1px solid #f0f0f0 !important;
            border-radius: var(--greenshop-border-radius);
            overflow: hidden;
            /* For rounded image corners */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .gs-cart-item-card img {
            border-radius: var(--greenshop-border-radius) 0 0 var(--greenshop-border-radius);
        }

        .gs-cart-item-card .card-body {
            padding: 0.75rem;
        }

        .gs-cart-item-card .mobile-remove-btn {
            font-size: 0.85rem;
            padding: 0.25rem 0.5rem;
        }

        /* --- Empty Cart State --- */
        #empty-cart-message {
            border: 1px dashed var(--greenshop-border-color);
            /* Dashed border for empty state */
            color: var(--greenshop-text-muted);
            font-style: italic;
            background-color: var(--greenshop-light-green);
        }

        #empty-cart-message i {
            color: var(--greenshop-primary) !important;
        }


        /* --- Order Summary Card --- */
        .gs-summary-card {
            background-color: var(--greenshop-light-green);
            /* Lighter green background */
            border: 1px solid rgba(40, 167, 69, 0.1);
        }

        .gs-section-title {
            color: var(--greenshop-primary-dark);
            font-weight: 600;
        }

        .gs-summary-card .list-group-item {
            font-size: 1.05rem;
            padding: 0.75rem 0;
            color: var(--greenshop-text-dark);
        }

        .gs-summary-card .list-group-item:last-child {
            border-bottom: none;
        }

        .gs-price-value {
            font-weight: 500;
        }

        .gs-total-price {
            color: var(--greenshop-primary);
            font-weight: 700;
            font-size: 2.2rem;
            /* Larger total price */
        }

        .gs-total-price.animate-flash {
            animation: flashPrice 0.5s ease-out;
            /* Animation for price update */
        }

        @keyframes flashPrice {
            0% {
                transform: scale(1);
                color: var(--greenshop-primary);
            }

            50% {
                transform: scale(1.05);
                color: var(--greenshop-primary-dark);
            }

            100% {
                transform: scale(1);
                color: var(--greenshop-primary);
            }
        }


        /* --- Buttons (Consistent with homepage) --- */
        .gs-btn-primary {
            background-color: var(--greenshop-primary);
            border-color: var(--greenshop-primary);
            color: #fff;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(40, 167, 69, 0.2);
            /* Soft shadow for primary buttons */
        }

        .gs-btn-primary:hover {
            background-color: var(--greenshop-primary-dark);
            border-color: var(--greenshop-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(40, 167, 69, 0.3);
        }

        .gs-btn-primary:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .gs-btn-outline-primary {
            color: var(--greenshop-primary);
            border-color: var(--greenshop-primary);
            background-color: transparent;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .gs-btn-outline-primary:hover {
            background-color: var(--greenshop-primary);
            color: #fff;
            transform: translateY(-2px);
        }

        .gs-btn-outline-primary:active {
            transform: translateY(0);
        }

        .checkout-btn {
            background-color: #28a745;
            border: none;
            border-radius: 25px;
            padding: 12px;
            font-weight: 500;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .checkout-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }

        .checkout-btn:active {
            transform: translateY(0);
        }

        .coupon-input {
            display: flex;
            margin-bottom: 20px;
        }

        .coupon-input input {
            flex-grow: 1;
            border-radius: 25px 0 0 25px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            font-size: 14px;
        }

        .coupon-input input:focus-visible,
        .coupon-input input:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        }

        .coupon-input button {
            border-radius: 0 25px 25px 0;
            border: none;
            background-color: #28a745;
            color: white;
            padding: 0 15px;
            font-weight: 500;
        }

        /* --- Store Policies Accordion --- */
        .gs-policy-card {
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .gs-accordion .accordion-item {
            border: none;
            margin-bottom: 0.5rem;
            background-color: transparent;
        }

        .gs-accordion .accordion-header {
            border-radius: 0.5rem;
        }

        .gs-accordion-button {
            background-color: #f7f7f7;
            /* Light background for unexpanded */
            color: var(--greenshop-text-dark);
            border-radius: 0.5rem !important;
            /* Ensure rounded corners */
            font-weight: 500;
            padding: 1rem 1.25rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .gs-accordion-button:not(.collapsed) {
            background-color: var(--greenshop-primary);
            /* Green when expanded */
            color: #fff;
            box-shadow: none;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .gs-accordion-button:not(.collapsed)::after {
            filter: brightness(0) invert(1);
            /* Invert arrow color when expanded */
        }

        .gs-accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        }

        .gs-accordion-button .gs-icon-policy {
            color: var(--greenshop-primary);
            /* Icon color normally */
            transition: color 0.3s ease;
        }

        .gs-accordion-button:not(.collapsed) .gs-icon-policy {
            color: #fff;
            /* Icon color when expanded */
        }

        .gs-accordion-body {
            background-color: #fff;
            border: 1px solid #eee;
            border-top: none;
            border-radius: 0 0 0.5rem 0.5rem;
            padding: 1.25rem;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .gs-link {
            color: var(--greenshop-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .gs-link:hover {
            color: var(--greenshop-primary-dark);
            text-decoration: underline;
        }

        /* --- Footer Styling (Consistent with your homepage) --- */
        .gs-footer {
            background-color: var(--greenshop-primary);
            color: #fff;
        }

        .gs-footer-heading {
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: #fff;
        }

        .gs-footer-text,
        .gs-copyright {
            color: rgba(255, 255, 255, 0.8);
        }

        .gs-footer-links li {
            margin-bottom: 0.5rem;
        }

        .gs-footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .gs-footer-link:hover {
            color: #fff;
        }

        .gs-social-icons .gs-social-icon {
            color: #fff;
            font-size: 1.2rem;
            transition: transform 0.2s ease;
        }

        .gs-social-icons .gs-social-icon:hover {
            transform: translateY(-2px);
        }

        .gs-newsletter-input .form-control {
            border-radius: 0.5rem 0 0 0.5rem;
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .gs-btn-newsletter {
            background-color: #ffc107;
            /* Your homepage yellow */
            color: var(--greenshop-text-dark);
            border-radius: 0 0.5rem 0.5rem 0;
            transition: background-color 0.2s ease;
        }

        .gs-btn-newsletter:hover {
            background-color: #e0a800;
        }

        .gs-payment-icons img {
            filter: brightness(0.9) saturate(1.2);
            /* Slightly alter color for footer integration */
        }

        .gs-footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .related-title {
            font-weight: 600;
            color: #28a745;
            margin: 40px 0 20px;
            text-align: center;
        }

        .related-product {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin: 0 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.3s;
        }

        .related-product:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .related-img {
            height: 120px;
            width: 120px;
            margin: 0 auto 15px;
            object-fit: cover;
            border-radius: 8px;
        }

        .related-name {
            font-weight: 500;
            margin-bottom: 5px;
            color: #333;
        }

        .related-price {
            color: #28a745;
            font-weight: 500;
        }

        .related-btn {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 5px 15px;
            margin-top: 10px;
            font-size: 13px;
            transition: all 0.2s;
        }

        .related-btn:hover {
            background-color: #218838;
        }

        .footer {
            background-color: #28a745;
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }

        .fade-in-up {
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 767.98px) {
            .gs-page-title {
                font-size: 1.8rem;
            }

            .gs-cart-items-card {
                padding: 1rem !important;
            }

            .gs-cart-item-card .card-body {
                padding: 0.5rem;
                /* Tighter spacing on mobile cards */
            }

            .gs-cart-item-card .gs-item-name {
                font-size: 0.95rem;
            }

            .gs-btn-remove-item.mobile-remove-btn {
                padding: 0.4rem 0.6rem;
                font-size: 0.8rem;
                white-space: nowrap;
                /* Prevent "Remove" from wrapping */
            }

            .gs-total-price {
                font-size: 1.8rem;
                /* Smaller total price on mobile */
            }

            .gs-summary-card,
            .gs-policy-card {
                padding: 1.5rem !important;
            }
        }
    </style>
</head>

<body>

    <!-- Header (Consistent with your GreenShop homepage) -->
    <header class="gs-header py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="home.html" class="gs-logo-link h4 mb-0">
                <i class="fas fa-leaf me-2"></i>GreenShop
            </a>
            <div class="input-group gs-search-bar w-50 d-none d-lg-flex">
                <input type="text" class="form-control gs-search-input" placeholder="Search in GreenShop">
                <button class="btn gs-search-btn" type="button"><i class="fas fa-search"></i></button>
            </div>
            <a href="cart.html" class="btn gs-cart-btn position-relative">
                <i class="fas fa-shopping-cart me-1"></i> Cart <span class="badge gs-badge ms-1" id="cart-count">3</span>
            </a>
        </div>
    </header>

    <main class="container my-5">
        <h1 class="text-center mb-5 gs-page-title">Your Shopping Cart</h1>

        <div class="row gx-lg-5"> <!-- Added gutter spacing for desktop -->
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
                            <tbody id="cart-items-table-body">
                                <!-- Example Item 1 -->
                                <tr class="gs-cart-item-row" data-item-id="1">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=300&h=200&fit=crop" class="gs-item-img me-3" alt="Premium Wireless Headphones">
                                            <span class="gs-item-name">Premium Wireless Headphones</span>
                                        </div>
                                    </td>
                                    <td class="item-price" data-price="75">\$75.00</td>
                                    <td>
                                        <div class="input-group input-group-sm gs-quantity-control">
                                            <button class="btn btn-outline-secondary gs-btn-qty-minus" type="button">-</button>
                                            <input type="number" class="form-control text-center gs-qty-input" value="1" min="1">
                                            <button class="btn btn-outline-secondary gs-btn-qty-plus" type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="gs-item-subtotal">\$75.00</td>
                                    <td>
                                        <button class="btn gs-btn-remove-item"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <!-- Example Item 2 -->
                                <tr class="gs-cart-item-row" data-item-id="2">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=300&h=200&fit=crop" class="gs-item-img me-3" alt="Professional Running Shoes">
                                            <span class="gs-item-name">Professional Running Shoes</span>
                                        </div>
                                    </td>
                                    <td class="item-price" data-price="120">\$120.00</td>
                                    <td>
                                        <div class="input-group input-group-sm gs-quantity-control">
                                            <button class="btn btn-outline-secondary gs-btn-qty-minus" type="button">-</button>
                                            <input type="number" class="form-control text-center gs-qty-input" value="1" min="1">
                                            <button class="btn btn-outline-secondary gs-btn-qty-plus" type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="gs-item-subtotal">\$120.00</td>
                                    <td>
                                        <button class="btn gs-btn-remove-item"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Cart Items Cards (Mobile View) -->
                    <div class="d-md-none" id="cart-items-cards-mobile">
                        <!-- Example Item 1 Card -->
                        <div class="card mb-3 gs-cart-item-card" data-item-id="1">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="https://via.placeholder.com/150x150?text=Headphones" class="img-fluid rounded-start h-100 object-fit-cover" alt="Premium Wireless Headphones">
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-2">
                                        <h6 class="card-title mb-1 gs-item-name">Premium Wireless Headphones</h6>
                                        <p class="card-text small mb-1">Price: <span class="item-price" data-price="75">\$75.00</span></p>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="input-group input-group-sm w-50 gs-quantity-control">
                                                <button class="btn btn-outline-secondary gs-btn-qty-minus" type="button">-</button>
                                                <input type="number" class="form-control text-center gs-qty-input" value="1" min="1">
                                                <button class="btn btn-outline-secondary gs-btn-qty-plus" type="button">+</button>
                                            </div>
                                            <button class="btn gs-btn-remove-item mobile-remove-btn"><i class="fas fa-trash-alt"></i> Remove</button>
                                        </div>
                                        <p class="card-text fw-bold mb-0">Subtotal: <span class="gs-item-subtotal">\$75.00</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Example Item 2 Card -->
                        <div class="card mb-3 gs-cart-item-card" data-item-id="2">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="https://via.placeholder.com/150x150?text=Shoes" class="img-fluid rounded-start h-100 object-fit-cover" alt="Professional Running Shoes">
                                </div>
                                <div class="col-8">
                                    <div class="card-body py-2">
                                        <h6 class="card-title mb-1 gs-item-name">Professional Running Shoes</h6>
                                        <p class="card-text small mb-1">Price: <span class="item-price" data-price="120">\$120.00</span></p>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="input-group input-group-sm w-50 gs-quantity-control">
                                                <button class="btn btn-outline-secondary gs-btn-qty-minus" type="button">-</button>
                                                <input type="number" class="form-control text-center gs-qty-input" value="1" min="1">
                                                <button class="btn btn-outline-secondary gs-btn-qty-plus" type="button">+</button>
                                            </div>
                                            <button class="btn gs-btn-remove-item mobile-remove-btn"><i class="fas fa-trash-alt"></i> Remove</button>
                                        </div>
                                        <p class="card-text fw-bold mb-0">Subtotal: <span class="gs-item-subtotal">\$120.00</span></p>
                                    </div>
                                </div>
                            </div>
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
                <div class="gs-card gs-summary-card p-4 shadow-sm mb-4">
                    <h5 class="mb-4 gs-section-title">Order Summary</h5>
                    <ul class="list-group list-group-flush border-bottom mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                            Cart Subtotal: <span id="cart-subtotal" class="gs-price-value animate__animated">\$195.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                            Discount: <span class="text-danger gs-price-value animate__animated" id="cart-discount">-\$0.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                            Shipping: <span id="cart-shipping" class="gs-price-value animate__animated">\$10.00</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0 gs-section-title">Total:</h4>
                        <h4 class="mb-0 gs-total-price" id="cart-grand-total">\$205.00</h4>
                    </div>
                    <div class="coupon-input">
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

    <!-- Footer (Consistent with your GreenShop homepage) -->
    <footer class="gs-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5 class="gs-footer-heading">About GreenShop</h5>
                    <p class="gs-footer-text">Your trusted partner for premium quality products. We bring you the best selection of eco-friendly and sustainable products for a better tomorrow.</p>
                    <div class="d-flex gs-social-icons">
                        <a href="#" class="gs-social-icon me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="gs-social-icon me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="gs-social-icon me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="gs-social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="gs-footer-heading">Quick Links</h5>
                    <ul class="list-unstyled gs-footer-links">
                        <li><a href="#" class="gs-footer-link">Home</a></li>
                        <li><a href="#" class="gs-footer-link">Products</a></li>
                        <li><a href="#" class="gs-footer-link">Categories</a></li>
                        <li><a href="#" class="gs-footer-link">Deals</a></li>
                        <li><a href="#" class="gs-footer-link">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="gs-footer-heading">Customer Service</h5>
                    <ul class="list-unstyled gs-footer-links">
                        <li><a href="#" class="gs-footer-link">Help Center</a></li>
                        <li><a href="#" class="gs-footer-link">Shipping Info</a></li>
                        <li><a href="#" class="gs-footer-link">Returns</a></li>
                        <li><a href="#" class="gs-footer-link">Warranty</a></li>
                        <li><a href="#" class="gs-footer-link">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="gs-footer-heading">Contact Info</h5>
                    <ul class="list-unstyled gs-footer-links">
                        <li>123 Green Street, Eco City, EC 12345</li>
                        <li><a href="tel:+15551234567" class="gs-footer-link">+1 (555) 123-4567</a></li>
                        <li><a href="mailto:info@greenshop.com" class="gs-footer-link">info@greenshop.com</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="gs-footer-heading">Newsletter</h5>
                    <p class="gs-footer-text">Subscribe to get special offers, exclusive deals, and the latest updates.</p>
                    <div class="input-group mb-3 gs-newsletter-input">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button class="btn gs-btn-newsletter" type="button"><i class="fas fa-paper-plane"></i></button>
                    </div>
                    <div class="d-flex gap-2 gs-payment-icons">
                        <img src="https://via.placeholder.com/50x30/FFFFFF/000000?text=VISA" alt="Visa" class="img-fluid rounded">
                        <img src="https://via.placeholder.com/50x30/FFFFFF/000000?text=MC" alt="Mastercard" class="img-fluid rounded">
                        <img src="https://via.placeholder.com/50x30/FFFFFF/000000?text=PayPal" alt="PayPal" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            <hr class="gs-footer-divider my-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap small gs-copyright">
                <div class="mb-2 mb-md-0">&copy; 2024 GreenShop. All rights reserved.</div>
                <div>
                    <a href="#" class="gs-footer-link me-3">Privacy Policy</a>
                    <a href="#" class="gs-footer-link me-3">Terms of Service</a>
                    <a href="#" class="gs-footer-link">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (Popper and Bootstrap JS bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Animate.css for more animations (optional but nice) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom JS for Cart Logic -->
    <script>
        $(document).ready(function() {
            // Function to format currency
            function formatCurrency(amount) {
                return `\$${amount.toFixed(2)}`;
            }

            // Function to update item subtotal and overall cart totals
            function updateCartTotals() {
                let subtotal = 0;
                let discount = 0; // Placeholder for future discount logic
                let shipping = 10.00; // Example fixed shipping

                // Loop through each cart item to calculate item subtotal and overall subtotal
                // This targets both table rows (desktop) and card divs (mobile)
                $('.gs-cart-item-row, .gs-cart-item-card').each(function() {
                    const $item = $(this);
                    const price = parseFloat($item.find('.item-price').data('price'));
                    const quantity = parseInt($item.find('.gs-qty-input').val());
                    const itemSubtotal = price * quantity;

                    $item.find('.gs-item-subtotal').text(formatCurrency(itemSubtotal));
                    subtotal += itemSubtotal;
                });

                const grandTotal = subtotal - discount + shipping;

                // Apply price update animation
                function animatePriceUpdate($element, newPrice) {
                    const currentPrice = parseFloat($element.text().replace('$', ''));
                    if (currentPrice !== newPrice) {
                        $element.addClass('animate__animated animate__flash'); // Add animate.css flash
                        $element.text(formatCurrency(newPrice));
                        // Remove animation class after it completes
                        $element.one('animationend', function() {
                            $(this).removeClass('animate__animated animate__flash');
                        });
                    } else {
                        $element.text(formatCurrency(newPrice));
                    }
                }

                animatePriceUpdate($('#cart-subtotal'), subtotal);
                animatePriceUpdate($('#cart-discount'), discount);
                animatePriceUpdate($('#cart-shipping'), shipping);
                animatePriceUpdate($('#cart-grand-total'), grandTotal); // Special animation for grand total

                // Update cart count in header
                const totalItemsInCart = $('.gs-qty-input').toArray().reduce((sum, input) => sum + parseInt($(input).val()), 0);
                $('#cart-count').text(totalItemsInCart);
                if (totalItemsInCart > 0) {
                    $('#cart-count').addClass('animate__animated animate__pulse'); // Pulse animation on count update
                    $('#cart-count').one('animationend', function() {
                        $(this).removeClass('animate__animated animate__pulse');
                    });
                }


                // Show/hide empty cart message
                if (totalItemsInCart === 0) {
                    $('#empty-cart-message').removeClass('d-none animate__animated animate__bounceOut').addClass('animate__animated animate__bounceIn');
                    $('.gs-cart-items-card').addClass('d-none'); // Hide cart items section
                } else {
                    $('#empty-cart-message').addClass('d-none').removeClass('animate__animated animate__bounceIn');
                    $('.gs-cart-items-card').removeClass('d-none');
                }
            }

            // Event listener for quantity increment (+)
            $(document).on('click', '.gs-btn-qty-plus', function() {
                const $input = $(this).siblings('.gs-qty-input');
                let quantity = parseInt($input.val());
                quantity++;
                $input.val(quantity);
                updateCartTotals();
                // In a real application, you'd send an AJAX request here to update the server-side cart
                // updateCartOnServer($item.data('item-id'), quantity);
            });

            // Event listener for quantity decrement (-)
            $(document).on('click', '.gs-btn-qty-minus', function() {
                const $input = $(this).siblings('.gs-qty-input');
                let quantity = parseInt($input.val());
                if (quantity > 1) { // Prevent quantity from going below 1
                    quantity--;
                    $input.val(quantity);
                    updateCartTotals();
                    // updateCartOnServer($item.data('item-id'), quantity);
                }
            });

            // Event listener for direct quantity input change
            $(document).on('change', '.gs-qty-input', function() {
                let quantity = parseInt($(this).val());
                if (isNaN(quantity) || quantity < 1) { // Ensure valid number and minimum 1
                    $(this).val(1);
                }
                updateCartTotals();
                // updateCartOnServer($item.data('item-id'), quantity);
            });

            // Event listener for remove item button
            $(document).on('click', '.gs-btn-remove-item', function() {
                const $itemRow = $(this).closest('.gs-cart-item-row'); // For table row
                const $itemCard = $(this).closest('.gs-cart-item-card'); // For mobile card

                const itemId = $itemRow.data('item-id') || $itemCard.data('item-id');

                if (confirm('Are you sure you want to remove this item from your cart?')) {
                    // Apply removing animation
                    $itemRow.addClass('animate__animated animate__fadeOutLeft');
                    $itemCard.addClass('animate__animated animate__fadeOutLeft');

                    // Remove the item visually after animation completes
                    $itemRow.one('animationend', function() {
                        $(this).remove();
                        updateCartTotals(); // Recalculate after removal
                    });
                    $itemCard.one('animationend', function() {
                        $(this).remove();
                        updateCartTotals(); // Recalculate after removal
                    });

                    // In a real application, you'd send an AJAX request here to remove the item from server-side cart
                    // removeCartItemFromServer(itemId);
                }
            });

            // Initial calculation when the page loads
            updateCartTotals();

            // Optional: Add a subtle flash effect to totals on load
            $('#cart-subtotal, #cart-discount, #cart-shipping, #cart-grand-total').each(function() {
                $(this).addClass('animate__animated animate__fadeIn');
            });

            // Coupon apply animation
            $(document).on('click', '.coupon-input button', function() {
                const input = $(this).prev();

                if (!input.val() || input.val().trim() === '') {
                    input.css('border-color', '#dc3545');
                    setTimeout(() => {
                        input.css('border-color', '#ddd');
                    }, 1000);
                    return;
                }

                $(this).html('<i class="bi bi-hourglass-split"></i>');
                setTimeout(() => {
                    $(this).html('Applied');
                    $('#cart-discount').text('-\$30.00');
                    $('#cart-grand-total').text('\$250.00');

                    setTimeout(() => {
                        this.innerHTML = 'Apply';
                    }, 2000);
                }, 1000);
            });

        });
    </script>
</body>

</html>