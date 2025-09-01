<!-- Modern Navbar using Bootstrap's Dropdown -->
<nav class="navbar navbar-expand-lg modern-navbar">
    <div class="container">
        <a class="navbar-brand" href="./">GreenShop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">
                        <i class="hgi hgi-stroke hgi-dashboard-square-01 nav-icon"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown" data-hoverable="true">
                    <a class="nav-link" href="#" id="inventoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="hgi hgi-stroke hgi-layers-01 nav-icon"></i>
                        Inventory
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="inventoryDropdown">
                        <li><a class="dropdown-item" href="add-product"><i class="fas fa-plus"></i>Add Product</a></li>
                        <li><a class="dropdown-item" href="inventory"><i class="fas fa-list"></i>Manage Products</a></li>
                        <li><a class="dropdown-item" href="categories"><i class="fas fa-tags"></i>Categories</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown" data-hoverable="true">
                    <a class="nav-link" href="#" id="ordersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="hgi hgi-stroke hgi-shopping-cart-01 nav-icon"></i>
                        Orders
                        <span class="nav-badge">12</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="ordersDropdown">
                        <li><a class="dropdown-item" href="orders"><i class="fas fa-clock"></i>Pending Orders</a></li>
                        <li><a class="dropdown-item" href="orders?status=completed"><i class="fas fa-check-circle"></i>Completed Orders</a></li>
                        <li><a class="dropdown-item" href="orders?status=cancelled"><i class="fas fa-times-circle"></i>Cancelled Orders</a></li>
                        <li><a class="dropdown-item" href="orders?status=in_transit"><i class="fas fa-truck"></i>Shipping</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown" data-hoverable="true">
                    <a class="nav-link" href="#" id="advertisingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="hgi hgi-stroke hgi-megaphone-01 nav-icon"></i>
                        Advertising
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
                        <i class="hgi hgi-stroke hgi-store-01 nav-icon"></i>
                        Stores
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="storesDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-paint-brush"></i>Store Builder</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-palette"></i>Themes</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-bar"></i>Store Analytics</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown" data-hoverable="true">
                    <a class="nav-link" href="#" id="reportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="hgi hgi-stroke hgi-chart-histogram nav-icon"></i>
                        Reports
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
                        <i class="hgi hgi-stroke hgi-settings-01 nav-icon"></i>
                        Settings
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
<!-- Main Container -->
<div class="main-container p-3">