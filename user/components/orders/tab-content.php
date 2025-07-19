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
                            <div class="tracking-progress-horizontal" id="progressLine"></div>

                            <div class="tracking-steps">
                                <div class="tracking-step-horizontal completed" data-step="1">
                                    <div class="tracking-icon-horizontal completed">
                                        <i class="hgi hgi-stroke hgi-shopping-basket-done-01"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">Order Placed</h6>
                                    <p class="tracking-time-horizontal">Jun 28, 10:30 AM</p>
                                </div>

                                <div class="tracking-step-horizontal completed" data-step="2">
                                    <div class="tracking-icon-horizontal completed">
                                        <i class="hgi hgi-stroke hgi-checkmark-circle-01"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">Confirmed</h6>
                                    <p class="tracking-time-horizontal">Jun 28, 11:45 AM</p>
                                </div>

                                <div class="tracking-step-horizontal completed" data-step="3">
                                    <div class="tracking-icon-horizontal completed">
                                        <i class="hgi hgi-stroke hgi-delivery-box-01"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">Preparing</h6>
                                    <p class="tracking-time-horizontal">Jun 28, 2:15 PM</p>
                                </div>

                                <div class="tracking-step-horizontal active" data-step="4">
                                    <div class="tracking-icon-horizontal active">
                                        <i class="hgi hgi-stroke hgi-shipping-truck-02"></i>
                                    </div>
                                    <h6 class="tracking-title-horizontal">In Transit</h6>
                                    <p class="tracking-time-horizontal">Jun 29, 9:20 AM</p>
                                </div>

                                <div class="tracking-step-horizontal" data-step="5">
                                    <div class="tracking-icon-horizontal">
                                        <i class="hgi hgi-stroke hgi-home-12"></i>
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
                                <i class="hgi hgi-stroke hgi-delivery-box-01"></i>
                                Order Items
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
                                <i class="hgi hgi-stroke hgi-location-01"></i>
                                Shipping Address
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