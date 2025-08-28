<div class="tab-content" id="orderTabContent">
    <!-- Order Tracking Tab -->
    <div class="tab-pane fade show active" id="tracking" role="tabpanel" aria-labelledby="tracking-tab">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Order Details <span class="order-number"></span></h5>
                        <div class="dropdown">
                            <button class="btn btn-outline-filter" type="button" id="orderDropdown" data-bs-toggle="dropdown">
                                Select Order
                            </button>
                            <?php
                            $curr_orders = $db->squery("SELECT id,created_at,status FROM orders WHERE user_id = '$l_user' AND (status != 'refunded' OR status != 'cancelled' OR status != 'completed')");
                            ?>
                            <ul class="dropdown-menu dropdown-menu-end orders-select-btn" aria-labelledby="orderDropdown">
                                <?php foreach ($curr_orders as $order) { ?>
                                    <li><a class="dropdown-item" href="#" data-id=<?= $order['id'] ?>>Order <?= generateOrderId($order['created_at'], $order['id']) ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- New Horizontal Order Tracking -->
                        <div class="order-tracking-horizontal d-none">
                            <div class="tracking-line-horizontal"></div>
                            <div class="tracking-progress-horizontal" id="progressLine"></div>

                            <div class="tracking-steps">
                                <div class="tracking-step-horizontal" data-step="1">
                                    <div class="tracking-icon-horizontal">
                                        <i class="hgi hgi-stroke hgi-shopping-basket-done-01"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">Order Placed</h6>
                                    <p class="tracking-time-horizontal"></p>
                                </div>

                                <div class="tracking-step-horizontal" data-step="2">
                                    <div class="tracking-icon-horizontal">
                                        <i class="hgi hgi-stroke hgi-checkmark-circle-01"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">Confirmed</h6>
                                    <p class="tracking-time-horizontal"></p>
                                </div>

                                <div class="tracking-step-horizontal" data-step="3">
                                    <div class="tracking-icon-horizontal">
                                        <i class="hgi hgi-stroke hgi-delivery-box-01"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">Preparing</h6>
                                    <p class="tracking-time-horizontal"></p>
                                </div>

                                <div class="tracking-step-horizontal" data-step="4">
                                    <div class="tracking-icon-horizontal">
                                        <i class="hgi hgi-stroke hgi-shipping-truck-02"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">In Transit</h6>
                                    <p class="tracking-time-horizontal"></p>
                                </div>

                                <div class="tracking-step-horizontal" data-step="5">
                                    <div class="tracking-icon-horizontal">
                                        <i class="hgi hgi-stroke hgi-home-12"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">Delivered</h6>
                                    <p class="tracking-time-horizontal"></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 order-tracking-vertical d-none">
                            <h6 class="mb-3">Shipping Updates</h6>
                            <div class="order-timeline">
                            </div>
                        </div>

                        <div class="empty-select-order">
                            <div class="order-msg-container my-5">
                                <div class="d-flex flex-column align-items-center gap-3">
                                    <span>
                                        <i class="hgi hgi-stroke hgi-package-remove"></i>
                                    </span>
                                    <span class="text mt-2">No Order Selected!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none" id="orderDetailCard">
                <div class="order-detail-card">
                    <div class="order-detail-header">
                        <h5 class="order-detail-title">Order Details</h5>
                        <p class="order-detail-subtitle">Order #GC78945 | June 28, 2023</p>
                    </div>
                    <div class="order-detail-body">
                        <div class="order-detail-section">
                            <h6 class="order-detail-section-title">
                                <i class="hgi hgi-stroke hgi-delivery-box-01"></i>
                                Order Items
                            </h6>
                            <div class="order-products">
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
                            </div>
                        </div>

                        <div class="order-summary mt-3">
                            <div class="summary-item">
                                <span class="summary-label">Subtotal</span>
                                <span class="summary-value subtotal">$62.97</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Shipping</span>
                                <span class="summary-value">Free</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Discount</span>
                                <span class="summary-value discount"></span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Total</span>
                                <span class="summary-total total-amount">$73.06</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none" id="shippingDetailCard">
                <div class="order-detail-card shipping-details">
                    <div class="order-detail-header">
                        <h5 class="order-detail-title">Shipping & Payment</h5>
                        <p class="order-detail-subtitle">Estimated Delivery: June 30, 2023</p>
                    </div>
                    <div class="order-detail-body">
                        <div class="order-detail-section">
                            <h6 class="order-detail-section-title">
                                <i class="hgi hgi-stroke hgi-location-01"></i>
                                Shipping Address
                            </h6>
                            <div class="address-card">
                                <h6 class="address-title"><?= LOGGED_IN_USER['name'] ?></h6>
                                <p class="address-text">
                                    <span class="street-address">123 Green Street</span><br>
                                    <span class="street-number">Apt 4B</span><br>
                                    <span class="town-city">Eco City, EC 12345</span><br>
                                    <span class="country">United States</span><br>
                                    <span>Phone: <?= LOGGED_IN_USER['phone'] ?></span>
                                </p>
                            </div>
                        </div>

                        <div class="order-detail-section mt-4">
                            <h6 class="order-detail-section-title">
                                <i class="hgi hgi-stroke hgi-credit-card"></i>
                                Payment Information
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
                                <i class="hgi hgi-stroke hgi-help-circle me-2"></i>
                                Need Help?
                            </button>
                            <button class="btn btn-primary-action">
                                <i class="hgi hgi-stroke hgi-invoice-01 me-2"></i>
                                View Invoice
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
            </div>
            <div class="card-body">
                <div class="order-filter-bar" jd-filters="orders">
                    <div class="row w-100">
                        <div class="col-md-6">
                            <div class="search-container">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text" name="query" class="form-control search-input" placeholder="Search orders by ID..." jd-filter="query">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-item">
                                <select class="form-control filter-select" name="status" jd-filter="status">
                                    <option value="*" selected>All Statuses</option>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="in_transit">In Transit</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="returned">Returned</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter-item">
                                <?php __gcomp('date-input'); ?>
                            </div>
                        </div>
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
                        <tbody jd-source="orders" jd-pick="#singleOrderTemplate" jd-drop="this" jd-pagination="#ordersPagination">
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
</div>

<script type="text/html" id="singleOrderTemplate">
    <tr>
        <td>
            <span class="order-id">${generateOrderId(created_at, id)}</span>
        </td>
        <td>
            <div>
                <p class="mb-0">${formatDate(created_at,'MMM DD, YYYY')}</p>
                <p class="order-date">${formatDate(created_at,'h:mm A')}</p>
            </div>
        </td>
        <td>${total_items} ${total_items === 1 ? 'item' : 'items'}</td>
        <td>
            <span class="order-amount">${'$' + amount}</span>
        </td>
        <td>
            <span class="order-status ${status}">${toCapitalize(status)}</span>
        </td>
        <td>
            <div class="order-actions">
                <button class="btn btn-outline-filter me-2 order-action-btn" data-type="track" data-id="${id}">Track</button>
                <button class="btn btn-outline-filter order-action-btn" data-type="details" data-id="${id}">Details</button>
            </div>
        </td>
    </tr>
</script>