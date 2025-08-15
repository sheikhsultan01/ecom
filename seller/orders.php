<?php
define('_DIR_', '../');
require_once 'includes/db.php';
$page_name = 'Orders';

$CSS_FILES = [
    'orders.css'
];

$JS_FILES = [
    'orders.js'
];

require_once 'includes/head.php';
?>
<div class="order-container">
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
    <div class="card my-4">
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
                                <i class="hgi hgi-stroke hgi-arrow-left-01"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="hgi hgi-stroke hgi-arrow-right-01"></i>
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

<?php require_once 'includes/foot.php'; ?>