$(document).ready(function () {
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
    $('#apply-filter').click(function () {
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
    $('#reset-filter').click(function () {
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
    $(document).on('click', '.view-order', function () {
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
    $('.page-link').click(function (e) {
        e.preventDefault();
        if ($(this).parent().hasClass('disabled')) return;

        $('.page-item').removeClass('active');
        $(this).parent().addClass('active');

        // In a real application, this would fetch the appropriate page of data
        // For this demo, we'll just keep showing the same data
    });
});