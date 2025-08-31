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
                <div class="navbar-logo">
                    <a href="<?= page_url('') ?>" class="logo">
                        <i class="hgi hgi-stroke hgi-leaf-01"></i>
                        GreenShop
                    </a>
                    <ul class="main-nav categories-container">
                        <li class="categories-item">
                            <a href="#" class="categories-btn">
                                Categories
                                <i class="hgi hgi-stroke hgi-arrow-right-01 dropdown-arrow"></i>
                            </a>
                            <div class="mega-dropdown">
                                <div class="dropdown-content">
                                    <?php
                                    $categories = $db->select('categories', 'id,uid,name,slug', ['parent_id' => 0], ['order_by' => 'id DESC']);
                                    $cat_ids = array_column($categories, 'id');
                                    $cat_ids = implode(',', $cat_ids);
                                    $sub_categories = $db->squery("SELECT id,uid,name,parent_id,slug FROM categories WHERE parent_id IN ($cat_ids) AND parent_id != 0");
                                    $sub_cat_group = [];
                                    foreach ($sub_categories as $sub) {
                                        $sub_cat_group[$sub['parent_id']][] = $sub;
                                    }
                                    ?>
                                    <div class="categories-list">
                                        <?php $is_first = true;
                                        foreach ($categories as &$category) {
                                            $cat_id = $category['id'];
                                            $category['sub_cat'] = $sub_cat_group[$cat_id] ?? [];
                                        ?>
                                            <div class="category-item <?= $is_first ? 'active' : '' ?>" data-id="<?= $cat_id ?>">
                                                <a href="#" class="category-link">
                                                    <?= $category['name'] ?>
                                                </a>
                                            </div>
                                        <?php
                                            $is_first = false;
                                        }
                                        ?>
                                    </div>

                                    <div class="subcategories-panel">
                                        <?php $is_first = true;
                                        foreach ($categories as $cat) { ?>
                                            <div class="subcategory-content <?= $is_first ? 'active' : '' ?>" id="<?= $cat['id'] ?>">
                                                <h3 class="subcategory-title"><?= $cat['name'] ?></h3>
                                                <ul class="subcategory-links">
                                                    <?php foreach ($cat['sub_cat'] as $sub_cat) {
                                                        $sub_cat_slug = $sub_cat['slug'] . "-" . $sub_cat['uid'];
                                                    ?>
                                                        <li>
                                                            <a href="<?= page_url('products') . "/" . $sub_cat_slug  ?>"><?= $sub_cat['name'] ?></a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        <?php
                                            $is_first = false;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
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
                    <a href="<?= page_url('cart') ?>" class="cart-btn">
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
                                <li><a class="dropdown-item" href="<?= page_url('user/profile') ?>"><i class="fas fa-clock"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="<?= page_url('user/orders') ?>"><i class="fas fa-check-circle"></i>Orders</a></li>
                                <?php
                                if (IS_ADMIN) echo '<li><a class="dropdown-item" href="' . page_url('admin/dashboard') . '"><i class="fas fa-times-circle"></i>Admin Dashboard</a></li>';
                                if (IS_SELLER) echo '<li><a class="dropdown-item" href="' . page_url('seller/dashboard') . '"><i class="fas fa-times-circle"></i>Seller Dashboard</a></li>';
                                ?>
                                <li><a class="dropdown-item" href="<?= page_url('logout') ?>"><i class="fas fa-times-circle"></i>Logout</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="<?= page_url('login') ?>"><i class="fas fa-times-circle"></i>Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>