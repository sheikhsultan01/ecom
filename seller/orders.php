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
        <button class="btn btn-filter btn-main">
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
                        <option value="confirmed">Confirmed</option>
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
<?php require_once 'components/modals/order-details.php'; ?>

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
        <td><span class="status-badge ${status}">${toCapitalize(status)}</span></td>
        <td>
            <a href="#" class="action-btn view-btn view-order" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                <code class="d-none">${item}</code>
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