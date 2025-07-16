<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - GreenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2E8B57 0%, #228B22 50%, #32CD32 100%);
            --secondary-gradient: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
            --accent-color: #228B22;
            --text-dark: #2F4F4F;
            --text-light: #6B8E6B;
            --card-shadow: 0 8px 30px rgba(34, 139, 34, 0.15);
            --hover-shadow: 0 15px 40px rgba(34, 139, 34, 0.25);
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
            --navbar-height: 70px;
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
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--navbar-height);
            background: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 1001;
            transition: all 0.3s ease;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .sidebar-toggle {
            background: var(--primary-gradient);
            border: none;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .sidebar-toggle:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-search {
            position: relative;
        }

        .navbar-search input {
            width: 300px;
            padding: 10px 15px 10px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .navbar-search input:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(34, 139, 34, 0.1);
        }

        .navbar-search i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .navbar-notifications {
            position: relative;
            background: var(--secondary-gradient);
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .navbar-notifications:hover {
            transform: translateY(-2px);
            box-shadow: var(--card-shadow);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4444;
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: 600;
        }

        .navbar-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .navbar-profile:hover {
            background: var(--secondary-gradient);
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
        }

        .profile-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .profile-role {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: var(--navbar-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--navbar-height));
            background: white;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            border-radius: 0 25px 25px 0;
            margin-right: 15px;
        }

        .menu-link:hover {
            background: var(--secondary-gradient);
            color: var(--text-dark);
            transform: translateX(5px);
        }

        .menu-link.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--card-shadow);
        }

        .menu-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .menu-text {
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .menu-badge {
            margin-left: auto;
            background: #ff4444;
            color: white;
            font-size: 0.75rem;
            padding: 3px 8px;
            border-radius: 12px;
            font-weight: 600;
        }

        .sidebar.collapsed .menu-text,
        .sidebar.collapsed .menu-badge {
            opacity: 0;
            transform: translateX(-10px);
        }

        .sidebar.collapsed .menu-link {
            justify-content: center;
            margin-right: 0;
            border-radius: 0;
        }

        .sidebar.collapsed .menu-icon {
            margin-right: 0;
        }

        /* Tooltip for collapsed sidebar */
        .sidebar.collapsed .menu-link {
            position: relative;
        }

        .sidebar.collapsed .menu-link::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 70px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--text-dark);
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
            z-index: 1002;
        }

        .sidebar.collapsed .menu-link:hover::after {
            opacity: 1;
            left: 75px;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--navbar-height);
            padding: 30px;
            transition: all 0.3s ease;
            min-height: calc(100vh - var(--navbar-height));
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed-width);
        }

        .content-header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
        }

        .content-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }

        .content-subtitle {
            color: var(--text-light);
            margin-top: 10px;
            font-size: 1.1rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .navbar-search input {
                width: 200px;
            }

            .profile-info {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .navbar-search {
                display: none;
            }

            .navbar-right {
                gap: 15px;
            }

            .main-content {
                padding: 20px;
            }

            .content-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
            }

            .navbar-brand {
                font-size: 1.5rem;
            }

            .content-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <a href="#" class="navbar-brand">GreenShop</a>
        </div>
        <div class="navbar-right">
            <div class="navbar-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search products, orders, customers...">
            </div>
            <div class="navbar-notifications">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">3</span>
            </div>
            <div class="navbar-profile">
                <div class="profile-avatar">JD</div>
                <div class="profile-info">
                    <div class="profile-name">John Doe</div>
                    <div class="profile-role">Seller</div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <nav class="sidebar-menu">
            <div class="menu-item">
                <a href="#" class="menu-link active" data-tooltip="Dashboard">
                    <div class="menu-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link" data-tooltip="Orders">
                    <div class="menu-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <span class="menu-text">Orders</span>
                    <span class="menu-badge">12</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link" data-tooltip="Reports">
                    <div class="menu-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span class="menu-text">Reports</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link" data-tooltip="Customers">
                    <div class="menu-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="menu-text">Customers</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link" data-tooltip="Transactions">
                    <div class="menu-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="menu-text">Transactions</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link" data-tooltip="Support">
                    <div class="menu-icon">
                        <i class="fas fa-life-ring"></i>
                    </div>
                    <span class="menu-text">Support</span>
                    <span class="menu-badge">5</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link" data-tooltip="Settings">
                    <div class="menu-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="menu-text">Settings</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <div class="content-header">
            <h1 class="content-title">Dashboard</h1>
            <p class="content-subtitle">Welcome back! Here's what's happening with your store today.</p>
        </div>

        <!-- Your dashboard content goes here -->
        <div class="row">
            <div class="col-12">
                <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: var(--card-shadow);">
                    <h3 style="color: var(--text-dark); margin-bottom: 20px;">Dashboard Content</h3>
                    <p style="color: var(--text-light);">This is where your main dashboard content will be displayed. The sidebar can be toggled between expanded and collapsed states using the toggle button in the navbar.</p>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            // Toggle sidebar
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');

                // Change toggle icon
                const icon = sidebarToggle.querySelector('i');
                if (sidebar.classList.contains('collapsed')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-arrow-right');
                } else {
                    icon.classList.remove('fa-arrow-right');
                    icon.classList.add('fa-bars');
                }
            });

            // Handle menu item clicks
            const menuLinks = document.querySelectorAll('.menu-link');
            menuLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all links
                    menuLinks.forEach(l => l.classList.remove('active'));

                    // Add active class to clicked link
                    this.classList.add('active');

                    // Update content title
                    const menuText = this.querySelector('.menu-text').textContent;
                    document.querySelector('.content-title').textContent = menuText;

                    // Update content subtitle
                    const subtitleMap = {
                        'Dashboard': 'Welcome back! Here\'s what\'s happening with your store today.',
                        'Orders': 'Manage and track all your orders in one place.',
                        'Reports': 'View detailed analytics and performance reports.',
                        'Customers': 'Manage your customer relationships and data.',
                        'Transactions': 'Track all financial transactions and payments.',
                        'Support': 'Handle customer support tickets and inquiries.',
                        'Settings': 'Configure your store settings and preferences.'
                    };

                    document.querySelector('.content-subtitle').textContent = subtitleMap[menuText] || 'Manage your store efficiently.';
                });
            });

            // Mobile responsiveness
            function handleResize() {
                if (window.innerWidth <= 992) {
                    sidebar.classList.add('mobile-view');
                    mainContent.style.marginLeft = '0';
                } else {
                    sidebar.classList.remove('mobile-view');
                    if (sidebar.classList.contains('collapsed')) {
                        mainContent.style.marginLeft = 'var(--sidebar-collapsed-width)';
                    } else {
                        mainContent.style.marginLeft = 'var(--sidebar-width)';
                    }
                }
            }

            window.addEventListener('resize', handleResize);
            handleResize(); // Initial call

            // Close sidebar on mobile when clicking outside
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 992) {
                    if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                        sidebar.classList.remove('mobile-open');
                    }
                }
            });

            // Mobile sidebar toggle
            if (window.innerWidth <= 992) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('mobile-open');
                });
            }
        });
    </script>
</body>

</html>