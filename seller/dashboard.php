<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - GreenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fffe 0%, #e8f5e8 100%);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar */
        .navbar {
            background: var(--primary-gradient);
            padding: 20px 0;
            box-shadow: var(--card-shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #e0e0e0 !important;
        }

        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            margin: 20px 0;
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .filter-section.active {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .filter-btn {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .filter-btn.active {
            background: var(--accent-color);
        }

        /* Stats Cards */
        .stats-section {
            margin: 30px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            background: var(--primary-gradient);
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .trend-up {
            color: #28a745;
        }

        .trend-down {
            color: #dc3545;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 1rem;
            font-weight: 500;
        }

        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin: 30px 0;
        }

        .chart-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .chart-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .chart-container {
            position: relative;
            height: 350px;
        }

        .pie-chart-container {
            position: relative;
            height: 350px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Recent Orders */
        .recent-orders {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            margin: 30px 0;
        }

        .recent-orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .order-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--card-shadow);
        }

        .order-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
        }

        .order-details {
            flex: 1;
        }

        .order-id {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 1.1rem;
        }

        .order-customer {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .order-amount {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--accent-color);
        }

        .order-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: #ffeaa7;
            color: #fdcb6e;
        }

        .status-fulfilled {
            background: #d4edda;
            color: #28a745;
        }

        .status-transit {
            background: #cce5ff;
            color: #007bff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .charts-section {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-value {
                font-size: 2rem;
            }

            .filter-section {
                margin: 10px 0;
            }
        }

        /* Animation */
        @keyframes slideDown {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid dashboard-container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-leaf"></i>
                GreenShop Seller
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        <!-- Filter Button -->
        <div class="d-flex justify-content-between align-items-center" style="margin: 20px 0;">
            <h2 style="color: var(--text-dark); font-weight: 600;">Dashboard Overview</h2>
            <button class="filter-btn" id="filterToggle">
                <i class="fas fa-filter"></i>
                Filter
            </button>
        </div>

        <!-- Filter Section -->
        <div class="filter-section" id="filterSection">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Quick Filters</label>
                    <select class="form-select" id="quickFilter">
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="this_week">This Week</option>
                        <option value="last_week">Last Week</option>
                        <option value="this_month">This Month</option>
                        <option value="last_month">Last Month</option>
                        <option value="custom">Custom Date Range</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">From Date</label>
                    <input type="date" class="form-control" id="fromDate">
                </div>
                <div class="col-md-3">
                    <label class="form-label">To Date</label>
                    <input type="date" class="form-control" id="toDate">
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-success w-100" id="applyFilter">Apply</button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            12.5%
                        </div>
                    </div>
                    <div class="stat-value">1,247</div>
                    <div class="stat-label">Total Orders</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            8.2%
                        </div>
                    </div>
                    <div class="stat-value">\$47,482</div>
                    <div class="stat-label">Total Sales</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-trend trend-down">
                            <i class="fas fa-arrow-down"></i>
                            3.1%
                        </div>
                    </div>
                    <div class="stat-value">143</div>
                    <div class="stat-label">Pending Orders</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            15.3%
                        </div>
                    </div>
                    <div class="stat-value">\$2,341</div>
                    <div class="stat-label">Today's Sales</div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-section">
            <!-- Sales Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Monthly Sales</h3>
                    <select class="form-select" style="width: auto;">
                        <option>This Year</option>
                        <option>Last Year</option>
                    </select>
                </div>
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Order Status Pie Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">Order Status</h3>
                </div>
                <div class="pie-chart-container">
                    <canvas id="orderStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="recent-orders">
            <div class="recent-orders-header">
                <h3 class="chart-title">Recent Orders</h3>
                <a href="#" class="btn btn-outline-success">View All</a>
            </div>
            <div class="order-item">
                <img src="https://via.placeholder.com/60x60/228B22/FFFFFF?text=P1" alt="Product">
                <div class="order-details">
                    <div class="order-id">#ORD-2024-001</div>
                    <div class="order-customer">John Doe • 2 hours ago</div>
                </div>
                <div class="order-amount">\$129.99</div>
                <div class="order-status status-pending">Pending</div>
            </div>
            <div class="order-item">
                <img src="https://via.placeholder.com/60x60/2E8B57/FFFFFF?text=P2" alt="Product">
                <div class="order-details">
                    <div class="order-id">#ORD-2024-002</div>
                    <div class="order-customer">Jane Smith • 4 hours ago</div>
                </div>
                <div class="order-amount">\$89.50</div>
                <div class="order-status status-fulfilled">Fulfilled</div>
            </div>
            <div class="order-item">
                <img src="https://via.placeholder.com/60x60/32CD32/FFFFFF?text=P3" alt="Product">
                <div class="order-details">
                    <div class="order-id">#ORD-2024-003</div>
                    <div class="order-customer">Mike Johnson • 6 hours ago</div>
                </div>
                <div class="order-amount">\$199.99</div>
                <div class="order-status status-transit">In Transit</div>
            </div>
            <div class="order-item">
                <img src="https://via.placeholder.com/60x60/90EE90/FFFFFF?text=P4" alt="Product">
                <div class="order-details">
                    <div class="order-id">#ORD-2024-004</div>
                    <div class="order-customer">Sarah Wilson • 8 hours ago</div>
                </div>
                <div class="order-amount">\$75.25</div>
                <div class="order-status status-pending">Pending</div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter Toggle
        document.getElementById('filterToggle').addEventListener('click', function() {
            const filterSection = document.getElementById('filterSection');
            const isActive = filterSection.classList.contains('active');

            if (isActive) {
                filterSection.classList.remove('active');
                this.classList.remove('active');
            } else {
                filterSection.classList.add('active');
                this.classList.add('active');
            }
        });

        // Quick Filter Change
        document.getElementById('quickFilter').addEventListener('change', function() {
            const fromDate = document.getElementById('fromDate');
            const toDate = document.getElementById('toDate');
            const today = new Date();

            if (this.value === 'custom') {
                fromDate.disabled = false;
                toDate.disabled = false;
            } else {
                fromDate.disabled = true;
                toDate.disabled = true;

                // Set dates based on selection
                const formatDate = (date) => date.toISOString().split('T');

                switch (this.value) {
                    case 'today':
                        fromDate.value = formatDate(today);
                        toDate.value = formatDate(today);
                        break;
                    case 'yesterday':
                        const yesterday = new Date(today);
                        yesterday.setDate(yesterday.getDate() - 1);
                        fromDate.value = formatDate(yesterday);
                        toDate.value = formatDate(yesterday);
                        break;
                    case 'this_week':
                        const startOfWeek = new Date(today);
                        startOfWeek.setDate(today.getDate() - today.getDay());
                        fromDate.value = formatDate(startOfWeek);
                        toDate.value = formatDate(today);
                        break;
                    case 'this_month':
                        const startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
                        fromDate.value = formatDate(startOfMonth);
                        toDate.value = formatDate(today);
                        break;
                }
            }
        });

        // Apply Filter
        document.getElementById('applyFilter').addEventListener('click', function() {
            // Implement filter logic here
            console.log('Filter applied');
            updateCharts();
        });

        // Sales Chart
        // const salesCtx = document.getElementById('salesChart').getContext('2d');
        // const salesChart = new Chart(salesCtx, {
        //     type: 'line',
        //     data: {
        //         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        //         datasets: [{
        //             label: 'Sales',
        //             data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 32000, 40000, 38000, 45000],
        //             borderColor: '#228B22',
        //             backgroundColor: 'rgba(34, 139, 34, 0.1)',
        //             borderWidth: 3,
        //             fill: true,
        //             tension: 0.4
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         plugins: {
        //             legend: {
        //                 display: false
        //             }
        //         },
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //                 ticks: {
        //                     callback: function(value) {
        //                         return '$' + value.toLocaleString();
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // });

        // // Order Status Pie Chart
        // const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
        // const orderStatusChart = new Chart(orderStatusCtx, {
        //     type: 'doughnut',
        //     data: {
        //         labels: ['Fulfilled', 'Pending', 'In Transit'],
        //         datasets: [{
        //             data: [65, 20, 15],
        //             backgroundColor: [
        //                 '#28a745',
        //                 '#ffc107',
        //                 '#007bff'
        //             ],
        //             borderWidth: 0
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         plugins: {
        //             legend: {
        //                 position: 'bottom',
        //                 labels: {
        //                     padding: 20,
        //                     usePointStyle: true
        //                 }
        //             }
        //         }
        //     }
        // });

        // Update charts function
        function updateCharts() {
            // Simulate data update
            const newData = Array.from({
                length: 12
            }, () => Math.floor(Math.random() * 50000));
            salesChart.data.datasets.data = newData;
            salesChart.update();

            const newPieData = [
                Math.floor(Math.random() * 100),
                Math.floor(Math.random() * 30),
                Math.floor(Math.random() * 20)
            ];
            orderStatusChart.data.datasets.data = newPieData;
            orderStatusChart.update();
        }

        // Initialize with today's date
        document.getElementById('quickFilter').dispatchEvent(new Event('change'));
    </script>
</body>

</html>