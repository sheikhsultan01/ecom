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
            --sidebar-bg: #1a1d29;
            --sidebar-item: #2a2d3a;
            --sidebar-hover: #3a3d4a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 0 25px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .sidebar-brand .brand-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-nav {
            margin-top: 30px;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 25px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0;
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: var(--sidebar-hover);
            transform: translateX(5px);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-gradient);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        .nav-badge {
            background: #ff4444;
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.75rem;
            margin-left: auto;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
        }

        .dashboard-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .dashboard-subtitle {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-export {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-export:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-dark);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
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

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
        }

        .stat-icon.pending {
            background: linear-gradient(135deg, #ff9800, #f57c00);
        }

        .stat-icon.revenue {
            background: linear-gradient(135deg, #4caf50, #388e3c);
        }

        .stat-icon.orders {
            background: linear-gradient(135deg, #2196f3, #1976d2);
        }

        .stat-icon.products {
            background: linear-gradient(135deg, #9c27b0, #7b1fa2);
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .trend-up {
            color: #28a745;
        }

        .trend-down {
            color: #dc3545;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .chart-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .chart-filter {
            display: flex;
            gap: 10px;
        }

        .filter-btn {
            background: none;
            border: 1px solid #e0e0e0;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
        }

        /* Orders Section */
        .orders-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .orders-card {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .orders-header {
            padding: 20px 25px;
            background: var(--secondary-gradient);
            border-bottom: 1px solid #e0e0e0;
        }

        .orders-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }

        .orders-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .order-item {
            padding: 15px 25px;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.3s ease;
        }

        .order-item:hover {
            background: #f8f9fa;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .order-id {
            font-weight: 600;
            color: var(--text-dark);
        }

        .order-status {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-processing {
            background: #d4edda;
            color: #155724;
        }

        .status-shipped {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-delivered {
            background: #d4edda;
            color: #155724;
        }

        .order-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .order-amount {
            font-weight: 600;
            color: var(--accent-color);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .orders-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }

            .dashboard-header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <div class="brand-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    GreenShop
                </a>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        Orders
                        <span class="nav-badge">12</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-box"></i>
                        Products
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        Analytics
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        Customers
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-truck"></i>
                        Shipping
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-dollar-sign"></i>
                        Revenue
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-star"></i>
                        Reviews
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <div>
                    <h1 class="dashboard-title">Seller Dashboard</h1>
                    <p class="dashboard-subtitle">Welcome back! Here's what's happening with your store today.</p>
                </div>
                <div class="header-actions">
                    <button class="btn-export">
                        <i class="fas fa-download"></i> Export Data
                    </button>
                    <div class="user-profile">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <span>John Seller</span>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon pending">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            +12%
                        </div>
                    </div>
                    <div class="stat-value">23</div>
                    <div class="stat-label">Pending Orders</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon revenue">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            +8.5%
                        </div>
                    </div>
                    <div class="stat-value">\$47,832</div>
                    <div class="stat-label">Monthly Revenue</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon orders">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="stat-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            +15%
                        </div>
                    </div>
                    <div class="stat-value">1,247</div>
                    <div class="stat-label">Total Orders</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon products">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="stat-trend trend-down">
                            <i class="fas fa-arrow-down"></i>
                            -3%
                        </div>
                    </div>
                    <div class="stat-value">89</div>
                    <div class="stat-label">Active Products</div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="charts-section">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">Revenue Overview</h3>
                        <div class="chart-filter">
                            <button class="filter-btn active">7D</button>
                            <button class="filter-btn">1M</button>
                            <button class="filter-btn">3M</button>
                            <button class="filter-btn">1Y</button>
                        </div>
                    </div>
                    <canvas id="revenueChart" width="400" height="200"></canvas>
                </div>

                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">Order Status</h3>
                    </div>
                    <canvas id="orderStatusChart" width="300" height="200"></canvas>
                </div>
            </div>

            <!-- Orders Section -->
            <div class="orders-section">
                <div class="orders-card">
                    <div class="orders-header">
                        <h3 class="orders-title">Recent Orders</h3>
                    </div>
                    <div class="orders-list">
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#ORD-2024-001</span>
                                <span class="order-status status-pending">Pending</span>
                            </div>
                            <div class="order-details">
                                <span>Premium Headphones</span>
                                <span class="order-amount">\$129.99</span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#ORD-2024-002</span>
                                <span class="order-status status-processing">Processing</span>
                            </div>
                            <div class="order-details">
                                <span>Smart Fitness Watch</span>
                                <span class="order-amount">\$249.99</span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#ORD-2024-003</span>
                                <span class="order-status status-shipped">Shipped</span>
                            </div>
                            <div class="order-details">
                                <span>Organic Skincare Set</span>
                                <span class="order-amount">\$89.99</span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#ORD-2024-004</span>
                                <span class="order-status status-delivered">Delivered</span>
                            </div>
                            <div class="order-details">
                                <span>Kitchen Blender</span>
                                <span class="order-amount">\$99.99</span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#ORD-2024-005</span>
                                <span class="order-status status-pending">Pending</span>
                            </div>
                            <div class="order-details">
                                <span>Wireless Speaker</span>
                                <span class="order-amount">\$159.99</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="orders-card">
                    <div class="orders-header">
                        <h3 class="orders-title">Quick Actions</h3>
                    </div>
                    <div class="orders-list">
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">Low Stock Alert</span>
                                <span class="order-status status-pending">Action Required</span>
                            </div>
                            <div class="order-details">
                                <span>5 products need restocking</span>
                                <span class="order-amount">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff9800;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">Customer Reviews</span>
                                <span class="order-status status-processing">3 New</span>
                            </div>
                            <div class="order-details">
                                <span>New reviews to respond to</span>
                                <span class="order-amount">
                                    <i class="fas fa-star" style="color: #ffc107;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">Payment Issues</span>
                                <span class="order-status status-pending">2 Orders</span>
                            </div>
                            <div class="order-details">
                                <span>Payment verification needed</span>
                                <span class="order-amount">
                                    <i class="fas fa-credit-card" style="color: #dc3545;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">Shipping Updates</span>
                                <span class="order-status status-shipped">8 Orders</span>
                            </div>
                            <div class="order-details">
                                <span>Tracking numbers updated</span>
                                <span class="order-amount">
                                    <i class="fas fa-truck" style="color: #28a745;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Revenue Chart
        // const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        // const revenueChart = new Chart(revenueCtx, {
        //     type: 'line',
        //     data: {
        //         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        //         datasets: [{
        //             label: 'Revenue',
        //             data: [12000, 19000, 15000, 25000, 32000, 28000, 47832],
        //             borderColor: '#228B22',
        //             backgroundColor: 'rgba(34, 139, 34, 0.1)',
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

        // // Order Status Chart
        // const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
        // const orderStatusChart = new Chart(orderStatusCtx, {
        //     type: 'doughnut',
        //     data: {
        //         labels: ['Pending', 'Processing', 'Shipped', 'Delivered'],
        //         datasets: [{
        //             data: [23, 45, 67, 89],
        //             backgroundColor: [
        //                 '#ff9800',
        //                 '#2196f3',
        //                 '#ff5722',
        //                 '#4caf50'
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
        //                     usePointStyle: true,
        //                     padding: 20
        //                 }
        //             }
        //         }
        //     }
        // });

        // Filter buttons functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Update chart data based on filter
                // This would typically involve an API call
                console.log('Filter changed to:', this.textContent);
            });
        });

        // Mobile sidebar toggle (if needed)
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.transform = sidebar.style.transform === 'translateX(0px)' ? 'translateX(-100%)' : 'translateX(0px)';
        }
    </script>
</body>

</html>