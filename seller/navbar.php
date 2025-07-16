<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Navbar - GreenShop</title>
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
        }

        /* Modern Navbar */
        .modern-navbar {
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            padding: 15px 0;
        }

        /* Bottom animation line for navbar items */
        .nav-item {
            position: relative;
        }

        .nav-link {
            color: var(--text-dark) !important;
            padding: 1.25rem 1.5rem !important;
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
        }

        .nav-link:focus-visible {
            outline: none !important;
            box-shadow: none !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--primary-gradient);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link.active {
            color: var(--accent-color) !important;
            font-weight: 600;
        }

        /* Dropdown styling */
        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            padding: 0.5rem 0;
            min-width: 280px;
            margin-top: 0;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dropdown-item {
            padding: 0.75rem 1.5rem;
            color: var(--text-dark);
            font-size: 0.9rem;
            position: relative;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--secondary-gradient);
            color: var(--accent-color);
            transform: translateX(5px);
            border-radius: 10px;
            width: 95%;
        }

        .dropdown-item i {
            margin-right: 10px;
            width: 16px;
            text-align: center;
        }

        /* Badge for notifications */
        .nav-badge {
            position: absolute;
            top: 8px;
            right: 5px;
            background: #ff4444;
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: 600;
        }

        /* Arrow for dropdown toggle */
        .dropdown-toggle::after {
            margin-left: 0.5rem;
            vertical-align: middle;
            transition: transform 0.3s ease;
        }

        .dropdown:hover .dropdown-toggle::after {
            transform: rotate(180deg);
        }

        /* Show dropdown on hover */
        @media (min-width: 992px) {
            .dropdown:hover .dropdown-menu {
                display: block;
            }
        }

        /* Navbar Icons */
        .nav-icon {
            margin-right: 8px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .nav-link {
                padding: 0.75rem 1.5rem !important;
            }

            .nav-link::after {
                display: none;
            }

            .navbar-collapse {
                background: white;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                border-radius: 0 0 15px 15px;
                padding: 1rem;
            }

            .dropdown-menu {
                border: none;
                box-shadow: none;
                background: #f8f9fa;
                padding-left: 1rem;
            }

            .navbar-toggler {
                border: none;
                padding: 0.5rem;
            }

            .navbar-toggler:focus {
                box-shadow: none;
            }
        }

        /* Add these styles to your existing CSS */
        .dropdown-menu.dropdown-menu-end {
            right: 0;
            left: auto;
        }

        .dropdown-menu.dropdown-menu-start {
            left: 0;
            right: auto;
        }

        /* Demo Content */
        .demo-content {
            padding: 40px 20px;
            text-align: center;
        }

        .demo-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
        }

        .demo-content p {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Modern Navbar using Bootstrap's Dropdown -->
    <nav class="navbar navbar-expand-lg modern-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">GreenShop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-tachometer-alt nav-icon"></i>Dashboard
                        </a>
                    </li>

                    <li class="nav-item dropdown" data-hoverable="true">
                        <a class="nav-link" href="#" id="inventoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-box nav-icon"></i>Inventory
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="inventoryDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-plus"></i>Add Product</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-list"></i>Manage Products</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-tags"></i>Categories</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-warehouse"></i>Stock Management</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" data-hoverable="true">
                        <a class="nav-link" href="#" id="ordersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-shopping-cart nav-icon"></i>Orders
                            <span class="nav-badge">12</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="ordersDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-clock"></i>Pending Orders</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-check-circle"></i>Completed Orders</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-times-circle"></i>Cancelled Orders</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-truck"></i>Shipping</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" data-hoverable="true">
                        <a class="nav-link" href="#" id="advertisingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bullhorn nav-icon"></i>Advertising
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="advertisingDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line"></i>Campaign Manager</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-star"></i>Early Reviewer Program</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-crown"></i>Prime Exclusive Discounts</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-percentage"></i>Coupons</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" data-hoverable="true">
                        <a class="nav-link" href="#" id="storesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-store nav-icon"></i>Stores
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="storesDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-paint-brush"></i>Store Builder</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-palette"></i>Themes</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chart-bar"></i>Store Analytics</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" data-hoverable="true">
                        <a class="nav-link" href="#" id="reportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-chart-line nav-icon"></i>Reports
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-dollar-sign"></i>Sales Reports</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-users"></i>Customer Analytics</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-box"></i>Product Performance</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-export"></i>Export Data</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" data-hoverable="true">
                        <a class="nav-link" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog nav-icon"></i>Settings
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i>Profile Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-bell"></i>Notifications</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-lock"></i>Security</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i>Help & Support</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Demo Content -->
    <div class="demo-content">
        <h2>Improved Navbar Design</h2>
        <p>This navbar now features bottom animation lines and uses Bootstrap's native dropdown system. Hover over the menu items to see the animations and dropdowns in action.</p>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Active link switching
            $('.nav-link').click(function(e) {
                if (!$(this).hasClass('dropdown-toggle')) {
                    $('.nav-link').removeClass('active');
                    $(this).addClass('active');
                }
            });

            function initializeHoverableDropdowns() {
                // Check each dropdown for data-hoverable attribute
                $('.dropdown').each(function() {
                    var $dropdown = $(this);
                    var isHoverable = $dropdown.attr('data-hoverable') === 'true';

                    if (isHoverable) {
                        // For hoverable dropdowns
                        $dropdown.hover(
                            // Mouse enter
                            function() {
                                // Hide all other sibling dropdowns first
                                $(this).siblings('.dropdown').find('.dropdown-menu').hide();
                                $(this).siblings('.dropdown').removeClass('show');

                                // Before showing dropdown, check positioning
                                positionDropdown($(this));

                                // Show current dropdown
                                $(this).find('.dropdown-menu').show();
                                $(this).addClass('show');
                            },
                            // Mouse leave
                            function() {
                                // Hide current dropdown
                                $(this).find('.dropdown-menu').hide();
                                $(this).removeClass('show');
                            }
                        );

                        // Prevent click behavior for hoverable dropdowns
                        $dropdown.find('.nav-link').click(function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        });

                        // Keep dropdown open when hovering over dropdown menu itself
                        $dropdown.find('.dropdown-menu').hover(
                            function() {
                                $(this).show();
                                $(this).closest('.dropdown').addClass('show');
                            },
                            function() {
                                $(this).hide();
                                $(this).closest('.dropdown').removeClass('show');
                            }
                        );
                    }
                });

                // Handle sibling dropdown hiding when hovering over parent container
                $('.dropdown[data-hoverable="true"]').on('mouseenter', function() {
                    // Hide all sibling dropdowns
                    $(this).siblings('.dropdown[data-hoverable="true"]').each(function() {
                        $(this).find('.dropdown-menu').hide();
                        $(this).removeClass('show');
                    });
                });

                // Function to position the dropdown based on available space
                function positionDropdown($dropdown) {
                    var $menu = $dropdown.find('.dropdown-menu');
                    var dropdownOffset = $dropdown.offset();
                    var dropdownWidth = $dropdown.outerWidth();
                    var menuWidth = $menu.outerWidth();
                    var windowWidth = $(window).width();

                    // Remove any positioning classes first
                    $menu.removeClass('dropdown-menu-end dropdown-menu-start');

                    // Calculate available space on the right
                    var spaceOnRight = windowWidth - (dropdownOffset.left + dropdownWidth);

                    // Calculate available space on the left
                    var spaceOnLeft = dropdownOffset.left;

                    // Check if there's enough space on the right
                    if (spaceOnRight < menuWidth) {
                        // Not enough space on right, check if there's enough on left
                        if (spaceOnLeft >= menuWidth) {
                            // Position dropdown to the left
                            $menu.addClass('dropdown-menu-end');
                        } else {
                            // Not enough space on either side, determine which side has more space
                            if (spaceOnLeft > spaceOnRight) {
                                $menu.addClass('dropdown-menu-end');
                            } else {
                                // Default (right side) position
                                $menu.addClass('dropdown-menu-start');
                            }
                        }
                    } else {
                        // Enough space on right, use default positioning
                        $menu.addClass('dropdown-menu-start');
                    }
                }
            }

            $(window).resize(function() {
                $('.dropdown.show').each(function() {
                    positionDropdown($(this));
                });
            });

            function positionDropdown($dropdown) {
                let $menu = $dropdown.find('.dropdown-menu');
                let dropdownOffset = $dropdown.offset();
                let dropdownWidth = $dropdown.outerWidth();
                let menuWidth = $menu.outerWidth();
                let windowWidth = $(window).width();

                $menu.removeClass('dropdown-menu-end dropdown-menu-start');

                // Calculate available space on the right
                let spaceOnRight = windowWidth - (dropdownOffset.left + dropdownWidth);
                let spaceOnLeft = dropdownOffset.left;

                // Check if there's enough space on the right
                if (spaceOnRight < menuWidth) {
                    if (spaceOnLeft >= menuWidth) {
                        $menu.addClass('dropdown-menu-end');
                    } else {
                        if (spaceOnLeft > spaceOnRight) {
                            $menu.addClass('dropdown-menu-end');
                        } else {
                            $menu.addClass('dropdown-menu-start');
                        }
                    }
                } else {
                    $menu.addClass('dropdown-menu-start');
                }
            }

            initializeHoverableDropdowns();
        });
    </script>
</body>

</html>