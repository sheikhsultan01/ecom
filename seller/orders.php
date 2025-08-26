<?php
define('_DIR_', '../');
require_once 'includes/db.php';
require_once 'helper/orders.php';
$page_name = 'Orders';

$CSS_FILES = [
    'orders.css'
];

$JS_FILES = [
    'orders.js'
];

add_assets_template('date-input');
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

    <!-- Orders Table -->
    <div class="custom-card card my-4">
        <div class="card-header" jd-filters="orders">
            <div class="row g-3">
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="query" class="form-control search-input" id="search-input" placeholder="Order ID, Customer..." jd-filter="query">
                </div>
                <div class="col-lg-3 col-md-6">
                    <select class="form-select search-input" name="status" jd-filter="status">
                        <option value="*">All Statuses</option>
                        <option value="pending" selected>Pending</option>
                        <option value="completed">Completed</option>
                        <option value="transit">In Transit</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php __gcomp('date-input'); ?>
                </div>
            </div>
        </div>
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
                    <tbody jd-source="orders" jd-pick="#orderTemplate" jd-drop="this" jd-pagination="#ordersPagination">
                        <?= skeleton("table", [
                            'columns' => 6,
                        ]) ?>
                    </tbody>
                </table>
                <div class="jd-pagination">
                    <ul id="ordersPagination" class="mt-2 pagination"></ul>
                </div>
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

<script type="text/html" id="orderTemplate">
    <tr>
        <td class="order-id">${generateOrderId(created_at, id)}</td>
        <td>
            <div class="customer-info">
                <div class="customer-avatar">${fname.charAt(0) + lname.charAt(0)}</div>
                <div>
                    <p class="customer-name">${name}</p>
                    <p class="customer-email">${email}</p>
                </div>
            </div>
        </td>
        <td class="date-cell">${moment(created_at).format("MMM DD, YYYY")}</td>
        <td class="amount-cell">${'$' + amount}</td>
        <td><span class="status-badge status-${status}">${toCapitalize(status)}</span></td>
        <td>
            <a href="#" class="action-btn view-btn view-order" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                <i class="hgi hgi-stroke hgi-view"></i>
            </a>
            <a href="#" class="action-btn edit-btn">
                <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
            </a>
            <a href="#" class="action-btn delete-btn">
                <i class="hgi hgi-stroke hgi-delete-01"></i>
            </a>
        </td>
    </tr>
</script>

<?php require_once 'includes/foot.php'; ?>