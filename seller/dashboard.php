<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Central - Dashboard</title>
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
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
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

        .stats-card {
            border-radius: 15px;
            border: none;
            transition: all 0.3s;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .stats-card .card-body {
            padding: 1.5rem;
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stats-sales {
            background: var(--primary-gradient);
        }

        .stats-profit {
            background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);
        }

        .stats-cost {
            background: linear-gradient(135deg, #FF9966 0%, #FF5E62 100%);
        }

        .stats-orders {
            background: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);
        }

        .stats-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0;
        }

        .stats-label {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .stats-trend {
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .trend-up {
            color: #4CAF50;
        }

        .trend-down {
            color: #F44336;
        }

        .chart-card {
            border-radius: 15px;
            border: none;
            box-shadow: var(--card-shadow);
            transition: all 0.3s;
            height: 100%;
        }

        .chart-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .chart-card .card-body {
            padding: 1.5rem;
        }

        .chart-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .chart-container {
            position: relative;
            height: 300px;
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

        .table-card {
            border-radius: 15px;
            border: none;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .table-card .card-body {
            padding: 0;
        }

        .table-card .table {
            margin-bottom: 0;
        }

        .table-card th {
            background: var(--secondary-gradient);
            color: var(--text-dark);
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .table-card td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f1f1;
        }

        .product-img {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
            font-size: 1.2rem;
        }

        .product-name {
            font-weight: 600;
            margin-bottom: 0;
        }

        .product-category {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .status-pending {
            background-color: #FFF3E0;
            color: #FF9800;
        }

        .status-completed {
            background-color: #E8F5E9;
            color: #4CAF50;
        }

        .status-transit {
            background-color: #E3F2FD;
            color: #2196F3;
        }

        .status-cancelled {
            background-color: #FCE4EC;
            color: #E91E63;
        }

        .btn-view {
            background-color: var(--accent-color);
            color: white;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border: none;
            transition: all 0.3s;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .date-range-picker {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
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

        .progress-thin {
            height: 6px;
            border-radius: 3px;
        }

        .inventory-status {
            font-size: 0.8rem;
            font-weight: 600;
        }

        .inventory-low {
            color: #FF5E62;
        }

        .inventory-medium {
            color: #FF9800;
        }

        .inventory-good {
            color: #4CAF50;
        }

        .welcome-card {
            background: var(--primary-gradient);
            border-radius: 15px;
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .welcome-title {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            opacity: 0.9;
            margin-bottom: 1.5rem;
            max-width: 80%;
        }

        .welcome-decoration {
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.2;
            font-size: 10rem;
        }

        @media (max-width: 992px) {
            .sidebar {
                height: auto;
                position: static;
                margin-bottom: 1.5rem;
            }

            .stats-card {
                margin-bottom: 1rem;
            }

            .welcome-subtitle {
                max-width: 100%;
            }

            .welcome-decoration {
                display: none;
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
                        <a class="nav-link active" href="#">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
                    <a href="#" class="sidebar-link active">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="#" class="sidebar-link">
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
                <!-- Welcome Card -->
                <div class="welcome-card">
                    <div class="welcome-decoration">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h2 class="welcome-title">Welcome back, John!</h2>
                    <p class="welcome-subtitle">Your store is performing well. Sales are up 12% from last month.</p>
                    <div class="d-flex">
                        <button class="btn btn-light me-2">
                            <i class="fas fa-download me-1"></i> Download Report
                        </button>
                        <button class="btn btn-outline-light">
                            <i class="fas fa-bullhorn me-1"></i> New Campaign
                        </button>
                    </div>
                </div>

                <!-- Date Range Filter -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Dashboard Overview</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-md-end">
                                    <div class="input-group me-2" style="max-width: 300px;">
                                        <input type="text" class="form-control date-range-picker" id="dateRange" value="Jun 01, 2023 - Jun 30, 2023">
                                        <span class="input-group-text bg-white">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <div class="dropdown filter-dropdown">
                                        <button class="btn btn-filter dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                                            <i class="fas fa-filter me-1"></i> Filter
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item active" href="#">All Products</a></li>
                                            <li><a class="dropdown-item" href="#">Electronics</a></li>
                                            <li><a class="dropdown-item" href="#">Clothing</a></li>
                                            <li><a class="dropdown-item" href="#">Home & Garden</a></li>
                                            <li><a class="dropdown-item" href="#">Beauty & Health</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="stats-icon stats-sales">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">View Details</a></li>
                                            <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class="stats-value">$24,589</h3>
                                <p class="stats-label">Total Sales</p>
                                <div class="d-flex align-items-center mt-3">
                                    <span class="stats-trend trend-up me-2">
                                        <i class="fas fa-arrow-up me-1"></i>12.5%
                                    </span>
                                    <span class="text-muted small">vs last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="stats-icon stats-profit">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">View Details</a></li>
                                            <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class="stats-value">$8,245</h3>
                                <p class="stats-label">Total Profit</p>
                                <div class="d-flex align-items-center mt-3">
                                    <span class="stats-trend trend-up me-2">
                                        <i class="fas fa-arrow-up me-1"></i>8.2%
                                    </span>
                                    <span class="text-muted small">vs last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="stats-icon stats-cost">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">View Details</a></li>
                                            <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class="stats-value">$16,344</h3>
                                <p class="stats-label">Cost of Products</p>
                                <div class="d-flex align-items-center mt-3">
                                    <span class="stats-trend trend-down me-2">
                                        <i class="fas fa-arrow-down me-1"></i>3.1%
                                    </span>
                                    <span class="text-muted small">vs last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="stats-icon stats-orders">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">View Details</a></li>
                                            <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class="stats-value">270</h3>
                                <p class="stats-label">Total Orders</p>
                                <div class="d-flex align-items-center mt-3">
                                    <span class="stats-trend trend-up me-2">
                                        <i class="fas fa-arrow-up me-1"></i>5.7%
                                    </span>
                                    <span class="text-muted small">vs last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row mb-4">
                    <div class="col-lg-8 mb-4">
                        <div class="chart-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="chart-title mb-0">Sales Overview</h5>
                                    <div class="dropdown filter-dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="salesChartDropdown" data-bs-toggle="dropdown">
                                            Last 30 Days
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="salesChartDropdown">
                                            <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                            <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                            <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="chart-container">
                                    <canvas id="salesChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="chart-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="chart-title mb-0">Order Status</h5>
                                    <div class="dropdown filter-dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="orderChartDropdown" data-bs-toggle="dropdown">
                                            This Month
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="orderChartDropdown">
                                            <li><a class="dropdown-item active" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                                            <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="chart-container">
                                    <canvas id="orderStatusChart"></canvas>
                                </div>
                                <div class="row text-center mt-3">
                                    <div class="col-3">
                                        <div class="status-badge status-completed mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                                        <p class="small mb-0">Completed</p>
                                        <h6 class="mb-0">187</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="status-badge status-pending mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                                        <p class="small mb-0">Pending</p>
                                        <h6 class="mb-0">42</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="status-badge status-transit mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                                        <p class="small mb-0">In Transit</p>
                                        <h6 class="mb-0">28</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="status-badge status-cancelled mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                                        <p class="small mb-0">Cancelled</p>
                                        <h6 class="mb-0">13</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders and Hot Products -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card table-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <h5 class="chart-title mb-0">Recent Orders</h5>
                                    <a href="#" class="btn btn-sm btn-filter">View All Orders</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="recentOrdersTable">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ORD-7829</td>
                                                <td>Emma Johnson</td>
                                                <td>Jun 15, 2023</td>
                                                <td>$149.36</td>
                                                <td><span class="status-badge status-completed">Completed</span></td>
                                                <td><a href="#" class="btn btn-view btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>ORD-7830</td>
                                                <td>Michael Smith</td>
                                                <td>Jun 14, 2023</td>
                                                <td>$87.50</td>
                                                <td><span class="status-badge status-pending">Pending</span></td>
                                                <td><a href="#" class="btn btn-view btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>ORD-7831</td>
                                                <td>Sophia Garcia</td>
                                                <td>Jun 14, 2023</td>
                                                <td>$215.75</td>
                                                <td><span class="status-badge status-transit">In Transit</span></td>
                                                <td><a href="#" class="btn btn-view btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>ORD-7832</td>
                                                <td>William Taylor</td>
                                                <td>Jun 13, 2023</td>
                                                <td>$64.25</td>
                                                <td><span class="status-badge status-cancelled">Cancelled</span></td>
                                                <td><a href="#" class="btn btn-view btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>ORD-7833</td>
                                                <td>Olivia Brown</td>
                                                <td>Jun 13, 2023</td>
                                                <td>$178.45</td>
                                                <td><span class="status-badge status-completed">Completed</span></td>
                                                <td><a href="#" class="btn btn-view btn-sm">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card table-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <h5 class="chart-title mb-0">Hot Selling Products</h5>
                                    <a href="#" class="btn btn-sm btn-filter">View All</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="hotProductsTable">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Sold</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="product-img me-2">
                                                            <i class="fas fa-leaf"></i>
                                                        </div>
                                                        <div>
                                                            <p class="product-name">Organic Green Tea</p>
                                                            <p class="product-category">Beverages</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>142</td>
                                                <td>
                                                    <div>
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="inventory-status inventory-good">In Stock</span>
                                                            <span>85%</span>
                                                        </div>
                                                        <div class="progress progress-thin">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="product-img me-2">
                                                            <i class="fas fa-tint"></i>
                                                        </div>
                                                        <div>
                                                            <p class="product-name">Bamboo Water Bottle</p>
                                                            <p class="product-category">Accessories</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>98</td>
                                                <td>
                                                    <div>
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="inventory-status inventory-medium">Low Stock</span>
                                                            <span>32%</span>
                                                        </div>
                                                        <div class="progress progress-thin">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 32%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="product-img me-2">
                                                            <i class="fas fa-seedling"></i>
                                                        </div>
                                                        <div>
                                                            <p class="product-name">Organic Coconut Oil</p>
                                                            <p class="product-category">Health</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>87</td>
                                                <td>
                                                    <div>
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="inventory-status inventory-good">In Stock</span>
                                                            <span>78%</span>
                                                        </div>
                                                        <div class="progress progress-thin">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 78%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="product-img me-2">
                                                            <i class="fas fa-soap"></i>
                                                        </div>
                                                        <div>
                                                            <p class="product-name">Eco-friendly Dish Soap</p>
                                                            <p class="product-category">Home</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>76</td>
                                                <td>
                                                    <div>
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="inventory-status inventory-low">Out of Stock</span>
                                                            <span>0%</span>
                                                        </div>
                                                        <div class="progress progress-thin">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="product-img me-2">
                                                            <i class="fas fa-lightbulb"></i>
                                                        </div>
                                                        <div>
                                                            <p class="product-name">Solar Garden Lights</p>
                                                            <p class="product-category">Garden</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>65</td>
                                                <td>
                                                    <div>
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="inventory-status inventory-medium">Low Stock</span>
                                                            <span>25%</span>
                                                        </div>
                                                        <div class="progress progress-thin">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Stats Row -->
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card chart-card">
                            <div class="card-body">
                                <h5 class="chart-title">Top Categories</h5>
                                <div class="chart-container" style="height: 250px;">
                                    <canvas id="categoryChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card chart-card">
                            <div class="card-body">
                                <h5 class="chart-title">Customer Growth</h5>
                                <div class="chart-container" style="height: 250px;">
                                    <canvas id="customerChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card chart-card">
                            <div class="card-body">
                                <h5 class="chart-title">Traffic Sources</h5>
                                <div class="chart-container" style="height: 250px;">
                                    <canvas id="trafficChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <script>
        $(document).ready(function() {
            // Initialize date range picker
            $('#dateRange').daterangepicker({
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            });

            // Chart.js Global Configuration
            Chart.defaults.font.family = "'Poppins', sans-serif";
            Chart.defaults.color = '#6B8E6B';
            Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(46, 139, 87, 0.8)';
            Chart.defaults.plugins.tooltip.titleColor = '#fff';
            Chart.defaults.plugins.tooltip.bodyColor = '#fff';
            Chart.defaults.plugins.tooltip.padding = 10;
            Chart.defaults.plugins.tooltip.cornerRadius = 8;
            Chart.defaults.plugins.tooltip.displayColors = false;

            // Sales Chart
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: ['Jun 1', 'Jun 5', 'Jun 10', 'Jun 15', 'Jun 20', 'Jun 25', 'Jun 30'],
                    datasets: [{
                            label: 'Sales',
                            data: [1200, 1900, 1700, 2400, 2200, 2600, 2450],
                            borderColor: '#228B22',
                            backgroundColor: 'rgba(34, 139, 34, 0.1)',
                            tension: 0.4,
                            fill: true
                        },
                        {
                            label: 'Profit',
                            data: [700, 1100, 1000, 1400, 1300, 1500, 1450],
                            borderColor: '#2F80ED',
                            backgroundColor: 'rgba(47, 128, 237, 0.1)',
                            tension: 0.4,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                boxWidth: 12,
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': $' + context.parsed.y;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Order Status Chart
            const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
            const orderStatusChart = new Chart(orderStatusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Completed', 'Pending', 'In Transit', 'Cancelled'],
                    datasets: [{
                        data: [187, 42, 28, 13],
                        backgroundColor: [
                            '#4CAF50',
                            '#FF9800',
                            '#2196F3',
                            '#E91E63'
                        ],
                        borderWidth: 0,
                        hoverOffset: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Category Chart
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            const categoryChart = new Chart(categoryCtx, {
                type: 'bar',
                data: {
                    labels: ['Health', 'Home', 'Beverages', 'Garden', 'Accessories'],
                    datasets: [{
                        label: 'Sales',
                        data: [8500, 7200, 6800, 5400, 4900],
                        backgroundColor: [
                            'rgba(46, 139, 87, 0.8)',
                            'rgba(46, 139, 87, 0.7)',
                            'rgba(46, 139, 87, 0.6)',
                            'rgba(46, 139, 87, 0.5)',
                            'rgba(46, 139, 87, 0.4)'
                        ],
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Sales: $' + context.parsed.x;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            },
                            ticks: {
                                callback: function(value) {
                                    return '$' + value / 1000 + 'k';
                                }
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Customer Growth Chart
            const customerCtx = document.getElementById('customerChart').getContext('2d');
            const customerChart = new Chart(customerCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'New Customers',
                        data: [65, 78, 90, 105, 125, 138],
                        borderColor: '#228B22',
                        backgroundColor: 'rgba(34, 139, 34, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Traffic Sources Chart
            const trafficCtx = document.getElementById('trafficChart').getContext('2d');
            const trafficChart = new Chart(trafficCtx, {
                type: 'pie',
                data: {
                    labels: ['Organic Search', 'Direct', 'Social Media', 'Referral', 'Email'],
                    datasets: [{
                        data: [45, 25, 15, 10, 5],
                        backgroundColor: [
                            '#228B22',
                            '#4CAF50',
                            '#8BC34A',
                            '#CDDC39',
                            '#DCE775'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${percentage}%`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>