<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Central - Order Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2E8B57 0%, #228B22 50%, #32CD32 100%);
            --secondary-gradient: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
            --accent-color: #228B22;
            --text-dark: #2F4F4F;
            --text-light: #6B8E6B;
            --card-shadow: 0 8px 30px rgba(34, 139, 34, 0.15);
            --hover-shadow: 0 15px 40px rgba(34, 139, 34, 0.25);
            --light-bg: #f8f9fa;
            --border-color: #e0e0e0;
            --inactive-color: #adb5bd;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }

        .navbar {
            background: var(--primary-gradient);
            box-shadow: var(--card-shadow);
        }

        .navbar-brand {
            font-weight: 700;
            color: white;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.75rem 1rem;
            border-radius: 8px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .sidebar {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            height: calc(100vh - 6rem);
            position: sticky;
            top: 1.5rem;
            transition: all 0.3s ease;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-dark);
            border-radius: 10px;
            margin-bottom: 0.5rem;
            transition: all 0.3s;
            text-decoration: none;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: var(--secondary-gradient);
            color: var(--accent-color);
            transform: translateX(5px);
        }

        .sidebar-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-heading {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            margin: 1.5rem 0 0.5rem;
            padding-left: 1rem;
        }

        .card {
            border-radius: 15px;
            border: none;
            transition: all 0.3s;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            height: 100%;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            background-color: white;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 0;
            color: var(--text-dark);
        }

        .btn-filter {
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-filter:hover {
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
            color: white;
        }

        .btn-outline-filter {
            background: transparent;
            border: 1px solid var(--accent-color);
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            color: var(--accent-color);
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-outline-filter:hover {
            background: var(--secondary-gradient);
            color: var(--accent-color);
            transform: translateY(-2px);
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 10px;
        }

        .user-name {
            color: white;
            font-weight: 600;
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        .user-role {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.75rem;
            margin-bottom: 0;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #FF5E62;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .order-tabs {
            border: none;
            margin-bottom: 1.5rem;
        }

        .order-tabs .nav-link {
            color: var(--text-light) !important;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            margin-right: 0.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .order-tabs .nav-link.active {
            background: var(--primary-gradient);
            color: white !important;
            box-shadow: var(--card-shadow);
        }

        .order-tabs .nav-link:hover:not(.active) {
            background-color: rgba(34, 139, 34, 0.1);
            color: var(--accent-color) !important;
        }

        .search-input {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            padding-left: 3rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .search-container {
            position: relative;
            max-width: 400px;
        }

        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
        }

        .orders-table {
            margin-bottom: 0;
        }

        .orders-table th {
            background: var(--secondary-gradient);
            color: var(--text-dark);
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .orders-table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f1f1;
        }

        .order-id {
            font-weight: 600;
            color: var(--accent-color);
        }

        .order-date {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .order-customer {
            font-weight: 500;
        }

        .order-amount {
            font-weight: 600;
        }

        .order-status {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
        }

        .status-delivered {
            background-color: rgba(76, 175, 80, 0.15);
            color: #4CAF50;
        }

        .status-transit {
            background-color: rgba(33, 150, 243, 0.15);
            color: #2196F3;
        }

        .status-processing {
            background-color: rgba(255, 152, 0, 0.15);
            color: #FF9800;
        }

        .status-placed {
            background-color: rgba(156, 39, 176, 0.15);
            color: #9C27B0;
        }

        .status-cancelled {
            background-color: rgba(244, 67, 54, 0.15);
            color: #F44336;
        }

        .status-returned {
            background-color: rgba(158, 158, 158, 0.15);
            color: #9E9E9E;
        }

        .order-actions .btn {
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
            border-radius: 8px;
        }

        /* New Horizontal Order Tracking */
        .order-tracking-horizontal {
            position: relative;
            padding: 2rem 0;
            margin: 0 auto;
            max-width: 100%;
            overflow-x: auto;
        }

        .tracking-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .tracking-line-horizontal {
            position: absolute;
            top: 65px;
            left: 0;
            right: 0;
            height: 4px;
            background-color: var(--inactive-color);
            z-index: 1;
        }

        .tracking-progress-horizontal {
            position: absolute;
            top: 65px;
            left: 0;
            height: 4px;
            background: var(--primary-gradient);
            z-index: 2;
            transition: width 0.5s ease;
        }

        .tracking-step-horizontal {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 3;
            min-width: 80px;
            padding: 0 10px;
        }

        .tracking-icon-horizontal {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: white;
            border: 3px solid var(--inactive-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--inactive-color);
            margin-bottom: 0.75rem;
            transition: all 0.3s;
            position: relative;
        }

        .tracking-icon-horizontal.active {
            border-color: var(--accent-color);
            color: var(--accent-color);
            background: var(--secondary-gradient);
        }

        .tracking-icon-horizontal.completed {
            border-color: var(--accent-color);
            color: white;
            background: var(--primary-gradient);
        }

        .tracking-title-horizontal {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
            text-align: center;
            color: var(--inactive-color);
            transition: color 0.3s;
        }

        .tracking-step-horizontal.active .tracking-title-horizontal,
        .tracking-step-horizontal.completed .tracking-title-horizontal {
            color: var(--accent-color);
        }

        .tracking-time-horizontal {
            font-size: 0.75rem;
            color: var(--text-light);
            text-align: center;
            margin-bottom: 0;
        }

        .order-detail-card {
            border-radius: 15px;
            border: none;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
        }

        .order-detail-header {
            background: var(--secondary-gradient);
            padding: 1.5rem;
            border-radius: 15px 15px 0 0;
        }

        .order-detail-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .order-detail-subtitle {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 0;
        }

        .order-detail-body {
            padding: 1.5rem;
        }

        .order-detail-section {
            margin-bottom: 1.5rem;
        }

        .order-detail-section:last-child {
            margin-bottom: 0;
        }

        .order-detail-section-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-dark);
            display: flex;
            align-items: center;
        }

        .order-detail-section-title i {
            margin-right: 0.5rem;
            color: var(--accent-color);
        }

        .order-product {
            display: flex;
            padding: 1rem;
            border-radius: 10px;
            background-color: var(--light-bg);
            margin-bottom: 1rem;
        }

        .order-product:last-child {
            margin-bottom: 0;
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--accent-color);
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .product-variant {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-weight: 600;
            color: var(--accent-color);
        }

        .product-quantity {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .address-card {
            padding: 1rem;
            border-radius: 10px;
            background-color: var(--light-bg);
        }

        .address-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .address-text {
            font-size: 0.9rem;
            color: var(--text-dark);
            margin-bottom: 0;
        }

        .payment-info {
            padding: 1rem;
            border-radius: 10px;
            background-color: var(--light-bg);
        }

        .payment-method {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--accent-color);
            margin-right: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .payment-name {
            font-weight: 600;
            margin-bottom: 0;
        }

        .payment-detail {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 0;
        }

        .order-summary {
            padding: 1rem;
            border-radius: 10px;
            background-color: var(--light-bg);
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .summary-item:last-child {
            margin-bottom: 0;
            padding-top: 0.75rem;
            border-top: 1px solid var(--border-color);
        }

        .summary-label {
            color: var(--text-light);
        }

        .summary-value {
            font-weight: 500;
        }

        .summary-total {
            font-weight: 700;
            color: var(--accent-color);
        }

        .order-actions-bar {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn-order-action {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary-action {
            background: var(--primary-gradient);
            color: white;
            border: none;
        }

        .btn-primary-action:hover {
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
            color: white;
        }

        .btn-secondary-action {
            background: transparent;
            color: var(--accent-color);
            border: 1px solid var(--accent-color);
        }

        .btn-secondary-action:hover {
            background: var(--secondary-gradient);
            transform: translateY(-2px);
        }

        .order-timeline {
            position: relative;
            padding-left: 30px;
            margin-top: 1rem;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--accent-color);
            z-index: 1;
        }

        .timeline-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: -24px;
            top: 12px;
            width: 1px;
            height: calc(100% - 12px);
            background-color: #e0e0e0;
        }

        .timeline-time {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0.25rem;
        }

        .timeline-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .timeline-text {
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .filter-dropdown .dropdown-menu {
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            border: none;
            padding: 0.5rem;
        }

        .filter-dropdown .dropdown-item {
            border-radius: 8px;
            padding: 0.5rem 1rem;
        }

        .filter-dropdown .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .filter-dropdown .dropdown-item.active {
            background: var(--secondary-gradient);
            color: var(--text-dark);
        }

        .date-range-picker {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .order-filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .filter-item {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }

        .filter-select {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--text-light);
            opacity: 0.5;
            margin-bottom: 1.5rem;
        }

        .empty-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .empty-text {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                height: auto;
                position: static;
                margin-bottom: 1.5rem;
            }

            .order-filter-bar {
                flex-direction: column;
            }

            .filter-item {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-header .btn-group,
            .card-header .search-container {
                margin-top: 1rem;
                width: 100%;
            }

            .order-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 5px;
            }

            .order-tabs .nav-item {
                flex-shrink: 0;
            }

            .tracking-steps {
                min-width: 600px;
            }

            .order-actions-bar {
                flex-direction: column;
            }

            .btn-order-action {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 1rem;
            }

            .order-detail-header,
            .order-detail-body {
                padding: 1rem;
            }

            .product-image {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .order-product {
                flex-direction: column;
            }

            .product-image {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .tracking-icon-horizontal {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .tracking-title-horizontal {
                font-size: 0.8rem;
            }

            .tracking-time-horizontal {
                font-size: 0.7rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#">
                <i class="fas fa-leaf me-2"></i>
                GreenCart Seller
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-shopping-cart me-1"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-box me-1"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-line me-1"></i> Analytics
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="position-relative me-3">
                        <a href="#" class="nav-link p-0">
                            <i class="fas fa-bell fs-5"></i>
                            <span class="notification-badge">3</span>
                        </a>
                    </div>
                    <div class="user-profile">
                        <div class="user-avatar">JS</div>
                        <div>
                            <p class="user-name">John Smith</p>
                            <p class="user-role">Store Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 mb-4">
                <div class="sidebar">
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="#" class="sidebar-link active">
                        <i class="fas fa-shopping-cart"></i> Orders
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-box"></i> Products
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-users"></i> Customers
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-chart-line"></i> Analytics
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-tag"></i> Marketing
                    </a>

                    <div class="sidebar-heading">Settings</div>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-store"></i> Store Settings
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-credit-card"></i> Payments
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-truck"></i> Shipping
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-cog"></i> Account Settings
                    </a>

                    <div class="mt-auto pt-4">
                        <a href="#" class="sidebar-link text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                    <div>
                        <h2 class="mb-1">My Orders</h2>
                        <p class="text-muted mb-0">Track and manage all your orders in one place</p>
                    </div>
                    <div class="d-flex mt-3 mt-md-0">
                        <div class="input-group me-2" style="max-width: 300px;">
                            <input type="text" class="form-control date-range-picker" id="dateRange" value="Jun 01, 2023 - Jun 30, 2023">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                        <button class="btn btn-filter">
                            <i class="fas fa-download me-2"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Order Tabs -->
                <ul class="nav nav-pills order-tabs" id="orderTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tracking-tab" data-bs-toggle="pill" data-bs-target="#tracking" type="button" role="tab">Order Tracking</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="history-tab" data-bs-toggle="pill" data-bs-target="#history" type="button" role="tab">Order History</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="orderTabContent">
                    <!-- Order Tracking Tab -->
                    <div class="tab-pane fade show active" id="tracking" role="tabpanel" aria-labelledby="tracking-tab">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-title">Order #GC78945</h5>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="orderDropdown" data-bs-toggle="dropdown">
                                                Select Order
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="orderDropdown">
                                                <li><a class="dropdown-item active" href="#">Order #GC78945</a></li>
                                                <li><a class="dropdown-item" href="#">Order #GC78932</a></li>
                                                <li><a class="dropdown-item" href="#">Order #GC78901</a></li>
                                                <li><a class="dropdown-item" href="#">Order #GC78890</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- New Horizontal Order Tracking -->
                                        <div class="order-tracking-horizontal">
                                            <div class="tracking-line-horizontal"></div>
                                            <div class="tracking-progress-horizontal" style="width: 65%;"></div>

                                            <div class="tracking-steps">
                                                <div class="tracking-step-horizontal completed">
                                                    <div class="tracking-icon-horizontal completed">
                                                        <i class="fas fa-clipboard-check"></i>
                                                    </div>
                                                    <h6 class="tracking-title-horizontal">Order Placed</h6>
                                                    <p class="tracking-time-horizontal">Jun 28, 10:30 AM</p>
                                                </div>

                                                <div class="tracking-step-horizontal completed">
                                                    <div class="tracking-icon-horizontal completed">
                                                        <i class="fas fa-check-circle"></i>
                                                    </div>
                                                    <h6 class="tracking-title-horizontal">Confirmed</h6>
                                                    <p class="tracking-time-horizontal">Jun 28, 11:45 AM</p>
                                                </div>

                                                <div class="tracking-step-horizontal completed">
                                                    <div class="tracking-icon-horizontal completed">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                    <h6 class="tracking-title-horizontal">Preparing</h6>
                                                    <p class="tracking-time-horizontal">Jun 28, 2:15 PM</p>
                                                </div>

                                                <div class="tracking-step-horizontal active">
                                                    <div class="tracking-icon-horizontal active">
                                                        <i class="fas fa-truck"></i>
                                                    </div>
                                                    <h6 class="tracking-title-horizontal">In Transit</h6>
                                                    <p class="tracking-time-horizontal">Jun 29, 9:20 AM</p>
                                                </div>

                                                <div class="tracking-step-horizontal">
                                                    <div class="tracking-icon-horizontal">
                                                        <i class="fas fa-home"></i>
                                                    </div>
                                                    <h6 class="tracking-title-horizontal">Delivered</h6>
                                                    <p class="tracking-time-horizontal">Est: Jun 30</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <h6 class="mb-3">Shipping Updates</h6>
                                            <div class="order-timeline">
                                                <div class="timeline-item">
                                                    <p class="timeline-time">June 29, 2023 at 9:20 AM</p>
                                                    <h6 class="timeline-title">Order Shipped</h6>
                                                    <p class="timeline-text">Your order has been picked up by the courier and is on its way to you.</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <p class="timeline-time">June 28, 2023 at 2:15 PM</p>
                                                    <h6 class="timeline-title">Order Prepared</h6>
                                                    <p class="timeline-text">Your order has been prepared and packaged for shipping.</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <p class="timeline-time">June 28, 2023 at 11:45 AM</p>
                                                    <h6 class="timeline-title">Order Confirmed</h6>
                                                    <p class="timeline-text">Your order has been confirmed and payment has been processed.</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <p class="timeline-time">June 28, 2023 at 10:30 AM</p>
                                                    <h6 class="timeline-title">Order Placed</h6>
                                                    <p class="timeline-text">You placed an order for 3 items.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="order-detail-card">
                                    <div class="order-detail-header">
                                        <h5 class="order-detail-title">Order Details</h5>
                                        <p class="order-detail-subtitle">Order #GC78945 | June 28, 2023</p>
                                    </div>
                                    <div class="order-detail-body">
                                        <div class="order-detail-section">
                                            <h6 class="order-detail-section-title">
                                                <i class="fas fa-box"></i> Order Items
                                            </h6>
                                            <div class="order-product">
                                                <div class="product-image">
                                                    <i class="fas fa-leaf"></i>
                                                </div>
                                                <div class="product-details">
                                                    <h6 class="product-name">Organic Green Tea</h6>
                                                    <p class="product-variant">Premium Quality, 100g</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="product-price">$18.99</span>
                                                        <span class="product-quantity">Qty: 2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-product">
                                                <div class="product-image">
                                                    <i class="fas fa-tint"></i>
                                                </div>
                                                <div class="product-details">
                                                    <h6 class="product-name">Bamboo Water Bottle</h6>
                                                    <p class="product-variant">Eco-friendly, 750ml</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="product-price">$24.99</span>
                                                        <span class="product-quantity">Qty: 1</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-summary mt-3">
                                            <div class="summary-item">
                                                <span class="summary-label">Subtotal</span>
                                                <span class="summary-value">$62.97</span>
                                            </div>
                                            <div class="summary-item">
                                                <span class="summary-label">Shipping</span>
                                                <span class="summary-value">$5.99</span>
                                            </div>
                                            <div class="summary-item">
                                                <span class="summary-label">Tax</span>
                                                <span class="summary-value">$4.10</span>
                                            </div>
                                            <div class="summary-item">
                                                <span class="summary-label">Total</span>
                                                <span class="summary-total">$73.06</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="order-detail-card">
                                    <div class="order-detail-header">
                                        <h5 class="order-detail-title">Shipping & Payment</h5>
                                        <p class="order-detail-subtitle">Estimated Delivery: June 30, 2023</p>
                                    </div>
                                    <div class="order-detail-body">
                                        <div class="order-detail-section">
                                            <h6 class="order-detail-section-title">
                                                <i class="fas fa-map-marker-alt"></i> Shipping Address
                                            </h6>
                                            <div class="address-card">
                                                <h6 class="address-title">John Smith</h6>
                                                <p class="address-text">
                                                    123 Green Street<br>
                                                    Apt 4B<br>
                                                    Eco City, EC 12345<br>
                                                    United States<br>
                                                    Phone: (555) 123-4567
                                                </p>
                                            </div>
                                        </div>

                                        <div class="order-detail-section mt-4">
                                            <h6 class="order-detail-section-title">
                                                <i class="fas fa-credit-card"></i> Payment Information
                                            </h6>
                                            <div class="payment-info">
                                                <div class="payment-method">
                                                    <div class="payment-icon">
                                                        <i class="fab fa-cc-visa"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="payment-name">Visa ending in 4567</h6>
                                                        <p class="payment-detail">Expires 05/2025</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-actions-bar">
                                            <button class="btn btn-secondary-action">
                                                <i class="fas fa-question-circle me-2"></i> Need Help?
                                            </button>
                                            <button class="btn btn-primary-action">
                                                <i class="fas fa-file-alt me-2"></i> View Invoice
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order History Tab -->
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Order History</h5>
                                <div class="search-container">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="search-input" placeholder="Search orders...">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="order-filter-bar">
                                    <div class="filter-item">
                                        <p class="filter-label">Status</p>
                                        <select class="filter-select">
                                            <option value="">All Statuses</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="transit">In Transit</option>
                                            <option value="processing">Processing</option>
                                            <option value="placed">Placed</option>
                                            <option value="cancelled">Cancelled</option>
                                            <option value="returned">Returned</option>
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <p class="filter-label">Time Period</p>
                                        <select class="filter-select">
                                            <option value="">Last 30 Days</option>
                                            <option value="90days">Last 90 Days</option>
                                            <option value="6months">Last 6 Months</option>
                                            <option value="year">Last Year</option>
                                            <option value="all">All Time</option>
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <p class="filter-label">Sort By</p>
                                        <select class="filter-select">
                                            <option value="date-desc">Date (Newest First)</option>
                                            <option value="date-asc">Date (Oldest First)</option>
                                            <option value="amount-desc">Amount (High to Low)</option>
                                            <option value="amount-asc">Amount (Low to High)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table orders-table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Items</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78945</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">June 28, 2023</p>
                                                        <p class="order-date">10:30 AM</p>
                                                    </div>
                                                </td>
                                                <td>3 items</td>
                                                <td>
                                                    <span class="order-amount">$73.06</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-transit">In Transit</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter me-2" onclick="document.getElementById('tracking-tab').click()">Track</button>
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78932</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">June 20, 2023</p>
                                                        <p class="order-date">2:15 PM</p>
                                                    </div>
                                                </td>
                                                <td>2 items</td>
                                                <td>
                                                    <span class="order-amount">$45.98</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-delivered">Delivered</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter me-2" onclick="document.getElementById('tracking-tab').click()">Track</button>
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78901</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">June 15, 2023</p>
                                                        <p class="order-date">11:45 AM</p>
                                                    </div>
                                                </td>
                                                <td>1 item</td>
                                                <td>
                                                    <span class="order-amount">$29.99</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-delivered">Delivered</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter me-2" onclick="document.getElementById('tracking-tab').click()">Track</button>
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78890</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">June 10, 2023</p>
                                                        <p class="order-date">9:20 AM</p>
                                                    </div>
                                                </td>
                                                <td>4 items</td>
                                                <td>
                                                    <span class="order-amount">$102.45</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-delivered">Delivered</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter me-2" onclick="document.getElementById('tracking-tab').click()">Track</button>
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78875</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">June 5, 2023</p>
                                                        <p class="order-date">3:40 PM</p>
                                                    </div>
                                                </td>
                                                <td>2 items</td>
                                                <td>
                                                    <span class="order-amount">$56.50</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-delivered">Delivered</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter me-2" onclick="document.getElementById('tracking-tab').click()">Track</button>
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78850</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">May 28, 2023</p>
                                                        <p class="order-date">1:15 PM</p>
                                                    </div>
                                                </td>
                                                <td>3 items</td>
                                                <td>
                                                    <span class="order-amount">$78.25</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-delivered">Delivered</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter me-2" onclick="document.getElementById('tracking-tab').click()">Track</button>
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78825</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">May 20, 2023</p>
                                                        <p class="order-date">10:30 AM</p>
                                                    </div>
                                                </td>
                                                <td>1 item</td>
                                                <td>
                                                    <span class="order-amount">$24.99</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-cancelled">Cancelled</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="order-id">#GC78810</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="mb-0">May 15, 2023</p>
                                                        <p class="order-date">4:45 PM</p>
                                                    </div>
                                                </td>
                                                <td>2 items</td>
                                                <td>
                                                    <span class="order-amount">$42.75</span>
                                                </td>
                                                <td>
                                                    <span class="order-status status-returned">Returned</span>
                                                </td>
                                                <td>
                                                    <div class="order-actions">
                                                        <button class="btn btn-outline-filter" onclick="document.getElementById('tracking-tab').click()">Details</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <p class="text-muted mb-0">Showing 8 of 24 orders</p>
                                    </div>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Add click handlers for order history buttons
            const trackButtons = document.querySelectorAll('.order-actions .btn:first-child');
            trackButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('tracking-tab').click();
                });
            });

            const detailButtons = document.querySelectorAll('.order-actions .btn:last-child');
            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('tracking-tab').click();
                });
            });

            // Handle order selection from dropdown
            const orderDropdownItems = document.querySelectorAll('.dropdown-item');
            orderDropdownItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('orderDropdown').textContent = this.textContent;

                    // You would typically load the selected order data here
                    // For demo purposes, we'll just update the active class
                    orderDropdownItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>