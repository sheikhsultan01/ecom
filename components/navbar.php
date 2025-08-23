<!-- Sale Banner -->
<div class="sale-banner d-none">
    <i class="hgi hgi-stroke hgi-fire-02"></i>
    Limited Time Sale - Up to 70% Off Selected Items!
</div>

<!-- Header -->
<header class="header main-navbar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="./" class="logo">
                    <i class="hgi hgi-stroke hgi-leaf-01"></i>
                    GreenShop
                </a>
            </div>
            <div class="col-md-6">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search in GreenShop" id="searchInput">
                    <button class="search-btn">
                        <i class="hgi hgi-stroke hgi-search-01"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3 text-end">
                <div class="d-flex justify-content-between align-center">
                    <a href="cart" class="cart-btn">
                        <i class="hgi hgi-stroke hgi-shopping-cart-01"></i>
                        Cart
                        <span class="cart-count <?= countCartItems() == 0 ? 'd-none' : '' ?>" data-count="<?= countCartItems(); ?>"><?= countCartItems() !== 0 ? countCartItems() : '' ?></span>
                    </a>
                    <div class="nav-item dropdown" data-hoverable="true">
                        <a class="profile-btn" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="hgi hgi-stroke hgi-user-circle-02 me-1"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown" style="display: none;">
                            <?php if (LOGGED_IN_USER) { ?>
                                <li><a class="dropdown-item" href="user/profile"><i class="fas fa-clock"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="user/orders"><i class="fas fa-check-circle"></i>Orders</a></li>
                                <?php
                                if (IS_ADMIN) echo '<li><a class="dropdown-item" href="admin/dashboard"><i class="fas fa-times-circle"></i>Admin Dashboard</a></li>';
                                if (IS_SELLER) echo '<li><a class="dropdown-item" href="seller/dashboard"><i class="fas fa-times-circle"></i>Seller Dashboard</a></li>';
                                ?>
                                <li><a class="dropdown-item" href="logout"><i class="fas fa-times-circle"></i>Logout</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="login"><i class="fas fa-times-circle"></i>Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>