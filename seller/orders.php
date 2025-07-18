<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Central - Orders Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        }

        .nav-link:hover {
            transform: translateY(-2px);
        }

        .stats-card {
            border-radius: 15px;
            border: none;
            transition: all 0.3s;
            box-shadow: var(--card-shadow);
            overflow: hidden;
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

        .stats-pending {
            background: linear-gradient(135deg, #FF9966 0%, #FF5E62 100%);
        }

        .stats-completed {
            background: var(--primary-gradient);
        }

        .stats-transit {
            background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);
        }

        .stats-cancelled {
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

        .filter-card {
            border-radius: 15px;
            border: none;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
        }

        .filter-card .card-body {
            padding: 1.5rem;
        }

        .search-input {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .search-input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(34, 139, 34, 0.25);
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

        .btn-reset {
            background: #f1f1f1;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            color: var(--text-dark);
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-reset:hover {
            background: #e0e0e0;
        }

        .orders-table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
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

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 0.5rem;
            transition: all 0.3s;
        }

        .view-btn {
            background-color: var(--accent-color);
        }

        .edit-btn {
            background-color: #2196F3;
        }

        .delete-btn {
            background-color: #F44336;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .pagination {
            margin-top: 1.5rem;
        }

        .page-link {
            border: none;
            color: var(--text-dark);
            margin: 0 0.2rem;
            border-radius: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
        }

        .page-link:hover {
            background-color: #f1f1f1;
            color: var(--accent-color);
        }

        .page-item.active .page-link {
            background: var(--primary-gradient);
            color: white;
        }

        .customer-info {
            display: flex;
            align-items: center;
        }

        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
            font-weight: 600;
            margin-right: 10px;
        }

        .customer-name {
            font-weight: 600;
            margin-bottom: 0;
        }

        .customer-email {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0;
        }

        .date-cell {
            font-size: 0.9rem;
        }

        .amount-cell {
            font-weight: 600;
        }

        @media (max-width: 992px) {
            .stats-card {
                margin-bottom: 1rem;
            }
        }

        .dropdown-menu {
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            border: none;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.5rem 1rem;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .dropdown-item.active {
            background: var(--secondary-gradient);
            color: var(--text-dark);
        }

        .date-input {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .empty-state-text {
            color: var(--text-light);
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-leaf me-2"></i>
                GreenCart Seller
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-shopping-cart me-1"></i> Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-box me-1"></i> Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-chart-line me-1"></i> Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog me-1"></i> Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Orders Management</h2>
            <button class="btn btn-filter">
                <i class="fas fa-plus me-2"></i> Create Order
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stats-card card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stats-icon stats-pending">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Details</a></li>
                                    <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="stats-value">42</h3>
                        <p class="stats-label">Pending Orders</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stats-icon stats-completed">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Details</a></li>
                                    <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="stats-value">187</h3>
                        <p class="stats-label">Completed Orders</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stats-icon stats-transit">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Details</a></li>
                                    <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="stats-value">28</h3>
                        <p class="stats-label">In Transit</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stats-icon stats-cancelled">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v text-muted"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Details</a></li>
                                    <li><a class="dropdown-item" href="#">Generate Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="stats-value">13</h3>
                        <p class="stats-label">Cancelled Orders</p>
                        <div class="progress mt-3" style="height: 6px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 8%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Card -->
        <div class="card filter-card">
            <div class="card-body">
                <h5 class="card-title mb-3">Filter Orders</h5>
                <form id="filter-form">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Search</label>
                            <input type="text" class="form-control search-input" id="search-input" placeholder="Order ID, Customer...">
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select search-input" id="status-filter">
                                <option value="">All Statuses</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="transit">In Transit</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">From Date</label>
                            <input type="date" class="form-control date-input" id="from-date">
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">To Date</label>
                            <input type="date" class="form-control date-input" id="to-date">
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-reset me-2" id="reset-filter">
                                <i class="fas fa-undo me-1"></i> Reset
                            </button>
                            <button type="button" class="btn btn-filter" id="apply-filter">
                                <i class="fas fa-filter me-1"></i> Apply Filters
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="card mt-4">
            <div class="card-body p-0">
                <div class="table-responsive orders-table">
                    <table class="table table-hover mb-0" id="orders-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table content will be dynamically populated -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center p-3">
                    <div class="text-muted">Showing <span id="showing-entries">1-10</span> of <span id="total-entries">270</span> entries</div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; border: none; overflow: hidden;">
                <div class="modal-header" style="background: var(--primary-gradient); color: white;">
                    <h5 class="modal-title">Order Details #<span id="modal-order-id">ORD-7829</span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Customer Information</h6>
                            <h5 class="mb-1" id="modal-customer-name">Emma Johnson</h5>
                            <p class="mb-1" id="modal-customer-email">emma.johnson@example.com</p>
                            <p class="mb-0" id="modal-customer-phone">+1 (555) 123-4567</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h6 class="text-muted mb-2">Order Information</h6>
                            <p class="mb-1">Date: <span id="modal-order-date">June 15, 2023</span></p>
                            <p class="mb-1">Status: <span class="badge status-completed" id="modal-order-status">Completed</span></p>
                            <p class="mb-0">Payment: <span id="modal-payment-method">Credit Card</span></p>
                        </div>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table" id="modal-order-items">
                            <thead style="background: var(--secondary-gradient);">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Order items will be populated dynamically -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Subtotal:</td>
                                    <td class="text-end fw-bold" id="modal-subtotal">$129.97</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">Shipping:</td>
                                    <td class="text-end" id="modal-shipping">$8.99</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">Tax:</td>
                                    <td class="text-end" id="modal-tax">$10.40</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Total:</td>
                                    <td class="text-end fw-bold fs-5" id="modal-total">$149.36</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="card h-100" style="border-radius: 10px; border: none; box-shadow: var(--card-shadow);">
                                <div class="card-body">
                                    <h6 class="card-title">Shipping Address</h6>
                                    <address class="mb-0" id="modal-shipping-address">
                                        Emma Johnson<br>
                                        123 Main Street, Apt 4B<br>
                                        New York, NY 10001<br>
                                        United States
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100" style="border-radius: 10px; border: none; box-shadow: var(--card-shadow);">
                                <div class="card-body">
                                    <h6 class="card-title">Notes</h6>
                                    <p class="mb-0" id="modal-notes">Please leave the package at the front door if no one answers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-reset" data-bs-dismiss="modal">Close</button>
                    <div class="dropdown">
                        <button class="btn btn-filter dropdown-toggle" type="button" id="updateStatusDropdown" data-bs-toggle="dropdown">
                            Update Status
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="updateStatusDropdown">
                            <li><a class="dropdown-item" href="#">Pending</a></li>
                            <li><a class="dropdown-item" href="#">In Transit</a></li>
                            <li><a class="dropdown-item" href="#">Completed</a></li>
                            <li><a class="dropdown-item" href="#">Cancelled</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Sample order data
            const orders = [{
                    id: "ORD-7829",
                    customer: {
                        name: "Emma Johnson",
                        email: "emma.johnson@example.com",
                        avatar: "EJ"
                    },
                    date: "2023-06-15",
                    amount: 149.36,
                    status: "completed",
                    items: [{
                            name: "Organic Green Tea",
                            price: 24.99,
                            quantity: 2,
                            total: 49.98
                        },
                        {
                            name: "Bamboo Cutting Board",
                            price: 39.99,
                            quantity: 1,
                            total: 39.99
                        },
                        {
                            name: "Reusable Produce Bags (Set of 5)",
                            price: 19.99,
                            quantity: 2,
                            total: 39.98
                        }
                    ],
                    shipping: 8.99,
                    tax: 10.40,
                    phone: "+1 (555) 123-4567",
                    shippingAddress: "Emma Johnson<br>123 Main Street, Apt 4B<br>New York, NY 10001<br>United States",
                    paymentMethod: "Credit Card",
                    notes: "Please leave the package at the front door if no one answers."
                },
                {
                    id: "ORD-7830",
                    customer: {
                        name: "Michael Smith",
                        email: "michael.smith@example.com",
                        avatar: "MS"
                    },
                    date: "2023-06-14",
                    amount: 87.50,
                    status: "pending",
                    items: [{
                            name: "Organic Coconut Oil",
                            price: 12.99,
                            quantity: 1,
                            total: 12.99
                        },
                        {
                            name: "Stainless Steel Water Bottle",
                            price: 24.99,
                            quantity: 2,
                            total: 49.98
                        },
                        {
                            name: "Eco-friendly Dish Soap",
                            price: 8.99,
                            quantity: 1,
                            total: 8.99
                        }
                    ],
                    shipping: 7.99,
                    tax: 7.55,
                    phone: "+1 (555) 234-5678",
                    shippingAddress: "Michael Smith<br>456 Oak Avenue<br>San Francisco, CA 94102<br>United States",
                    paymentMethod: "PayPal",
                    notes: "Please call before delivery."
                },
                {
                    id: "ORD-7831",
                    customer: {
                        name: "Sophia Garcia",
                        email: "sophia.garcia@example.com",
                        avatar: "SG"
                    },
                    date: "2023-06-14",
                    amount: 215.75,
                    status: "transit",
                    items: [{
                            name: "Solar-Powered Garden Lights (Set of 4)",
                            price: 59.99,
                            quantity: 1,
                            total: 59.99
                        },
                        {
                            name: "Organic Cotton Bedding Set",
                            price: 129.99,
                            quantity: 1,
                            total: 129.99
                        }
                    ],
                    shipping: 12.99,
                    tax: 12.78,
                    phone: "+1 (555) 345-6789",
                    shippingAddress: "Sophia Garcia<br>789 Pine Street<br>Chicago, IL 60601<br>United States",
                    paymentMethod: "Credit Card",
                    notes: ""
                },
                {
                    id: "ORD-7832",
                    customer: {
                        name: "William Taylor",
                        email: "william.taylor@example.com",
                        avatar: "WT"
                    },
                    date: "2023-06-13",
                    amount: 64.25,
                    status: "cancelled",
                    items: [{
                            name: "Reusable Silicone Food Storage Bags",
                            price: 18.99,
                            quantity: 2,
                            total: 37.98
                        },
                        {
                            name: "Bamboo Toothbrushes (Pack of 4)",
                            price: 12.99,
                            quantity: 1,
                            total: 12.99
                        }
                    ],
                    shipping: 6.99,
                    tax: 6.29,
                    phone: "+1 (555) 456-7890",
                    shippingAddress: "William Taylor<br>101 Maple Road<br>Austin, TX 78701<br>United States",
                    paymentMethod: "Debit Card",
                    notes: "Order cancelled due to out of stock items."
                },
                {
                    id: "ORD-7833",
                    customer: {
                        name: "Olivia Brown",
                        email: "olivia.brown@example.com",
                        avatar: "OB"
                    },
                    date: "2023-06-13",
                    amount: 178.45,
                    status: "completed",
                    items: [{
                            name: "Organic Plant-Based Protein Powder",
                            price: 39.99,
                            quantity: 1,
                            total: 39.99
                        },
                        {
                            name: "Glass Food Storage Containers (Set of 5)",
                            price: 49.99,
                            quantity: 2,
                            total: 99.98
                        },
                        {
                            name: "Recycled Paper Notebooks (Pack of 3)",
                            price: 14.99,
                            quantity: 1,
                            total: 14.99
                        }
                    ],
                    shipping: 9.99,
                    tax: 13.50,
                    phone: "+1 (555) 567-8901",
                    shippingAddress: "Olivia Brown<br>222 Cedar Lane<br>Seattle, WA 98101<br>United States",
                    paymentMethod: "Credit Card",
                    notes: "Please deliver after 5 PM."
                },
                {
                    id: "ORD-7834",
                    customer: {
                        name: "James Wilson",
                        email: "james.wilson@example.com",
                        avatar: "JW"
                    },
                    date: "2023-06-12",
                    amount: 129.99,
                    status: "pending",
                    items: [{
                            name: "Solar Phone Charger",
                            price: 49.99,
                            quantity: 1,
                            total: 49.99
                        },
                        {
                            name: "Organic Cotton T-Shirt",
                            price: 29.99,
                            quantity: 2,
                            total: 59.98
                        }
                    ],
                    shipping: 8.99,
                    tax: 11.03,
                    phone: "+1 (555) 678-9012",
                    shippingAddress: "James Wilson<br>333 Birch Street<br>Denver, CO 80202<br>United States",
                    paymentMethod: "PayPal",
                    notes: ""
                },
                {
                    id: "ORD-7835",
                    customer: {
                        name: "Ava Martinez",
                        email: "ava.martinez@example.com",
                        avatar: "AM"
                    },
                    date: "2023-06-12",
                    amount: 95.75,
                    status: "transit",
                    items: [{
                            name: "Reusable Beeswax Food Wraps",
                            price: 22.99,
                            quantity: 1,
                            total: 22.99
                        },
                        {
                            name: "Stainless Steel Straws (Set of 8)",
                            price: 15.99,
                            quantity: 1,
                            total: 15.99
                        },
                        {
                            name: "Organic Herbal Tea Sampler",
                            price: 34.99,
                            quantity: 1,
                            total: 34.99
                        }
                    ],
                    shipping: 7.99,
                    tax: 13.79,
                    phone: "+1 (555) 789-0123",
                    shippingAddress: "Ava Martinez<br>444 Elm Court<br>Miami, FL 33101<br>United States",
                    paymentMethod: "Credit Card",
                    notes: "Leave with building concierge if not home."
                },
                {
                    id: "ORD-7836",
                    customer: {
                        name: "Benjamin Anderson",
                        email: "benjamin.anderson@example.com",
                        avatar: "BA"
                    },
                    date: "2023-06-11",
                    amount: 245.50,
                    status: "completed",
                    items: [{
                            name: "Eco-friendly Yoga Mat",
                            price: 79.99,
                            quantity: 1,
                            total: 79.99
                        },
                        {
                            name: "Organic Wool Blanket",
                            price: 129.99,
                            quantity: 1,
                            total: 129.99
                        },
                        {
                            name: "Natural Beeswax Candles (Set of 3)",
                            price: 19.99,
                            quantity: 1,
                            total: 19.99
                        }
                    ],
                    shipping: 0,
                    tax: 15.53,
                    phone: "+1 (555) 890-1234",
                    shippingAddress: "Benjamin Anderson<br>555 Walnut Drive<br>Boston, MA 02108<br>United States",
                    paymentMethod: "Credit Card",
                    notes: "Free shipping applied."
                },
                {
                    id: "ORD-7837",
                    customer: {
                        name: "Mia Thompson",
                        email: "mia.thompson@example.com",
                        avatar: "MT"
                    },
                    date: "2023-06-11",
                    amount: 57.98,
                    status: "cancelled",
                    items: [{
                            name: "Bamboo Dish Brush",
                            price: 9.99,
                            quantity: 2,
                            total: 19.98
                        },
                        {
                            name: "Organic Cotton Produce Bags",
                            price: 17.99,
                            quantity: 2,
                            total: 35.98
                        }
                    ],
                    shipping: 5.99,
                    tax: 4.03,
                    phone: "+1 (555) 901-2345",
                    shippingAddress: "Mia Thompson<br>666 Spruce Avenue<br>Portland, OR 97201<br>United States",
                    paymentMethod: "Debit Card",
                    notes: "Customer requested cancellation."
                },
                {
                    id: "ORD-7838",
                    customer: {
                        name: "Ethan Lee",
                        email: "ethan.lee@example.com",
                        avatar: "EL"
                    },
                    date: "2023-06-10",
                    amount: 189.97,
                    status: "pending",
                    items: [{
                            name: "Stainless Steel Compost Bin",
                            price: 49.99,
                            quantity: 1,
                            total: 49.99
                        },
                        {
                            name: "Organic Cotton Bath Towels (Set of 2)",
                            price: 59.99,
                            quantity: 2,
                            total: 119.98
                        }
                    ],
                    shipping: 9.99,
                    tax: 10.01,
                    phone: "+1 (555) 012-3456",
                    shippingAddress: "Ethan Lee<br>777 Aspen Circle<br>Las Vegas, NV 89101<br>United States",
                    paymentMethod: "PayPal",
                    notes: "Gift order - please include gift receipt."
                }
            ];

            // Populate orders table
            function populateOrdersTable(ordersData) {
                const tableBody = $('#orders-table tbody');
                tableBody.empty();

                if (ordersData.length === 0) {
                    // Show empty state
                    tableBody.html(`
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <h4 class="empty-state-text">No orders found</h4>
                                    <button class="btn btn-filter">Reset Filters</button>
                                </div>
                            </td>
                        </tr>
                    `);
                    return;
                }

                ordersData.forEach(order => {
                    const statusClass = `status-${order.status}`;
                    let statusText = order.status.charAt(0).toUpperCase() + order.status.slice(1);
                    if (statusText === "Transit") statusText = "In Transit";

                    const row = `
                        <tr data-order-id="${order.id}">
                            <td class="order-id">${order.id}</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">${order.customer.avatar}</div>
                                    <div>
                                        <p class="customer-name">${order.customer.name}</p>
                                        <p class="customer-email">${order.customer.email}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="date-cell">${formatDate(order.date)}</td>
                            <td class="amount-cell">$${order.amount.toFixed(2)}</td>
                            <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                            <td>
                                <a href="#" class="action-btn view-btn view-order" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" data-order-id="${order.id}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="action-btn edit-btn">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="action-btn delete-btn">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                    tableBody.append(row);
                });
            }

            // Format date
            function formatDate(dateString) {
                const options = {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                };
                return new Date(dateString).toLocaleDateString('en-US', options);
            }

            // Initialize table
            populateOrdersTable(orders);

            // Filter functionality
            $('#apply-filter').click(function() {
                const searchTerm = $('#search-input').val().toLowerCase();
                const statusFilter = $('#status-filter').val();
                const fromDate = $('#from-date').val();
                const toDate = $('#to-date').val();

                let filteredOrders = orders.filter(order => {
                    // Search term filter
                    if (searchTerm && !order.id.toLowerCase().includes(searchTerm) &&
                        !order.customer.name.toLowerCase().includes(searchTerm) &&
                        !order.customer.email.toLowerCase().includes(searchTerm)) {
                        return false;
                    }

                    // Status filter
                    if (statusFilter && order.status !== statusFilter) {
                        return false;
                    }

                    // Date range filter
                    if (fromDate && order.date < fromDate) {
                        return false;
                    }

                    if (toDate && order.date > toDate) {
                        return false;
                    }

                    return true;
                });

                populateOrdersTable(filteredOrders);
                updatePaginationInfo(filteredOrders.length);
            });

            // Reset filter
            $('#reset-filter').click(function() {
                $('#filter-form')[0].reset();
                populateOrdersTable(orders);
                updatePaginationInfo(orders.length);
            });

            // Update pagination info
            function updatePaginationInfo(totalItems) {
                const start = totalItems > 0 ? 1 : 0;
                const end = Math.min(10, totalItems);
                $('#showing-entries').text(`${start}-${end}`);
                $('#total-entries').text(totalItems);
            }

            // View order details
            $(document).on('click', '.view-order', function() {
                const orderId = $(this).data('order-id');
                const order = orders.find(o => o.id === orderId);

                if (order) {
                    // Populate modal with order details
                    $('#modal-order-id').text(order.id);
                    $('#modal-customer-name').text(order.customer.name);
                    $('#modal-customer-email').text(order.customer.email);
                    $('#modal-customer-phone').text(order.phone);
                    $('#modal-order-date').text(formatDate(order.date));

                    // Set status badge
                    const statusClass = `status-${order.status}`;
                    let statusText = order.status.charAt(0).toUpperCase() + order.status.slice(1);
                    if (statusText === "Transit") statusText = "In Transit";
                    $('#modal-order-status').removeClass().addClass(`badge ${statusClass}`).text(statusText);

                    $('#modal-payment-method').text(order.paymentMethod);
                    $('#modal-shipping-address').html(order.shippingAddress);
                    $('#modal-notes').text(order.notes || "No notes provided");

                    // Populate order items
                    const itemsTable = $('#modal-order-items tbody');
                    itemsTable.empty();

                    order.items.forEach(item => {
                        const row = `
                            <tr>
                                <td>${item.name}</td>
                                <td>$${item.price.toFixed(2)}</td>
                                <td>${item.quantity}</td>
                                <td class="text-end">$${item.total.toFixed(2)}</td>
                            </tr>
                        `;
                        itemsTable.append(row);
                    });

                    // Set totals
                    const subtotal = order.items.reduce((sum, item) => sum + item.total, 0);
                    $('#modal-subtotal').text(`$${subtotal.toFixed(2)}`);
                    $('#modal-shipping').text(`$${order.shipping.toFixed(2)}`);
                    $('#modal-tax').text(`$${order.tax.toFixed(2)}`);
                    $('#modal-total').text(`$${order.amount.toFixed(2)}`);
                }
            });

            // Pagination functionality
            $('.page-link').click(function(e) {
                e.preventDefault();
                if ($(this).parent().hasClass('disabled')) return;

                $('.page-item').removeClass('active');
                $(this).parent().addClass('active');

                // In a real application, this would fetch the appropriate page of data
                // For this demo, we'll just keep showing the same data
            });
        });
    </script>
</body>

</html>