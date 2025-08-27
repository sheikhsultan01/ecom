<div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-hidden="true" data-callback="showCustomerOrderDetailsCB">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px; border: none; overflow: hidden;">
            <div class="modal-header" style="background: var(--primary-gradient); color: white;">
                <h5 class="modal-title">Order Details #<span class="order-id">ORD-7829</span></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="customer-details">
                            <h6 class="text-muted mb-2">Customer Information</h6>
                            <h5 class="mb-1 customer-name">Emma Johnson</h5>
                            <p class="mb-1 customer-email">emma.johnson@example.com</p>
                            <p class="mb-0 customer-phone">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="order-information">
                            <h6 class="text-muted mb-2">Order Information</h6>
                            <p class="mb-1">Date: <span class="order-date">June 15, 2023</span></p>
                            <p class="mb-1">Status: <span class="badge order-status">Completed</span></p>
                            <p class="mb-0">Payment: <span class="payment-method">Cash On Delivery</span></p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table" id="modal-order-items">
                        <thead style="background: var(--secondary-gradient);">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody class="products-table"></tbody>
                        <tfoot class="product-summary">
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Subtotal:</td>
                                <td class="text-end fw-bold subtotal"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end">Shipping:</td>
                                <td class="text-end">Free</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end">Discount:</td>
                                <td class="text-end discount"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Total:</td>
                                <td class="text-end fw-bold fs-5 total-amount"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="card h-100" style="border-radius: 10px; border: none; box-shadow: var(--card-shadow);">
                            <div class="card-body">
                                <h6 class="card-title">Shipping Address</h6>
                                <address class="mb-0 shipping-address">
                                    <span class="street-address"></span><br>
                                    <span class="street-number"></span><br>
                                    <span class="town-city"></span><br>
                                    <span class="country"></span>
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
                <button type="button" class="btn btn-reset btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <div class="dropdown">
                    <button class="btn btn-primary btn-filter dropdown-toggle" type="button" id="updateStatusDropdown" data-bs-toggle="dropdown">
                        Update Status
                    </button>
                    <ul class="dropdown-menu curr-order-id update-order-status" aria-labelledby="updateStatusDropdown">
                        <li><a class="dropdown-item" data-type="pending" href="#">Pending</a></li>
                        <li><a class="dropdown-item" data-type="confirmed" href="#">Confirmed</a></li>
                        <li><a class="dropdown-item" data-type="in_transit" href="#">In Transit</a></li>
                        <li><a class="dropdown-item" data-type="completed" href="#">Completed</a></li>
                        <li><a class="dropdown-item" data-type="cancelled" href="#">Cancelled</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>