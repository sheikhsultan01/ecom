<?php
define('_DIR_', '../');
require_once 'includes/db.php';
require_once "./Functions/inventory.php";
require_once "./helper/inventory.php";
$page_name = 'Inventory';

$CSS_FILES = [
    'inventory.css'
];

$JS_FILES = [
    'inventory.js'
];

require_once 'includes/head.php';
?>
<!-- Main Content -->
<div class="main-content">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Manage Inventory</h1>
        <div class="header-actions">
            <a href="add-product" class="btn-primary-custom">
                <i class="fas fa-plus"></i> Add New Product
            </a>
            <button class="btn-primary-custom">
                <i class="fas fa-file-export"></i> Export
            </button>
        </div>
    </div>

    <!-- Inventory Stats -->
    <div class="stats-grid" jd-ref="products">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-value" jd-data>${stats.total_products}</div>
            <div class="stat-label" jd-data>Total Products</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon active">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value" jd-data>${stats.active_products}</div>
            <div class="stat-label" jd-data>Active Products</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon out-of-stock">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-value" jd-data>${stats.out_stock_products}</div>
            <div class="stat-label" jd-data>Out of Stock</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon out-of-stock">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-value" jd-data>${stats.low_stock_products}</div>
            <div class="stat-label" jd-data>Low Stock</div>
        </div>
    </div>

    <!-- Inventory Filters -->
    <div class="inventory-filters" jd-filters="products">
        <div class="filters-header">
            <h2 class="filters-title">Filter Products</h2>
        </div>
        <div class="filters-body">
            <div class="filter-group">
                <label for="searchProducts">Search Products</label>
                <input type="text" class="form-control" name="query" id="searchProducts" placeholder="Search by name, SKU, etc." jd-filter="query">
            </div>
            <div class="filter-group">
                <label for="categoryFilter">Category</label>
                <select class="form-select" id="categoryFilter" name="category_id" jd-filter="category_id">
                    <option value="">All Categories</option>
                    <?php $categories = $db->squery("SELECT id,name FROM categories WHERE parent_id != 0");
                    foreach ($categories as $category) {   ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="filter-group">
                <label for="stockFilter">Stock Status</label>
                <select class="form-select" id="stockFilter" name="stock" jd-filter="stock">
                    <option value="">All</option>
                    <option value="inStock">In Stock</option>
                    <option value="lowStock">Low Stock</option>
                    <option value="outOfStock">Out of Stock</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="sortBy">Sort By</label>
                <select class="form-select" id="sortBy" name="sort" jd-filter="sort">
                    <option value="name-asc">Name (A-Z)</option>
                    <option value="name-desc">Name (Z-A)</option>
                    <option value="price-asc">Price (Low to High)</option>
                    <option value="price-desc">Price (High to Low)</option>
                    <option value="stock-asc">Stock (Low to High)</option>
                    <option value="stock-desc">Stock (High to Low)</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Inventory Table -->
    <div class="inventory-table-container">
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productsContainer" jd-source="products" jd-pick="#singleProduct" jd-drop="this" jd-pagination="#productPagination" jd-success="SuccessCB">
                <?= skeleton("table", [
                    'columns' => 7,
                ]) ?>
            </tbody>
        </table>
        <div id="productPagination" class="mt-2 jd-pagination"></div>
    </div>
</div>

<script>
    function SuccessCB(res, $ele) {
        initSsJxElements('.ss-jx-element'); // Jx Elements
        // Update Product Quantity Callback
        ss.fn.cb.QuantityUpdateCB = function($form, res) {
            if (res.status === "success") {
                notify(res.data, res.status)
            } else {
                notify(res.data, res.status)
            }
        }
    }
</script>

<script type="text/html" id="singleProduct">
    <tr>
        <td>
            <div class="product-cell">
                <img src="<?= merge_url(SITE_URL, 'images/products/') ?>${image}" alt="Product" class="product-image">
                <div class="product-info">
                    <div class="product-title">${title}</div>
                    <div class="product-sku">${sku}</div>
                </div>
            </div>
        </td>
        <td>${sku}</td>
        <td>${category_name}</td>
        <td>${price}</td>
        <td>
            <div class="d-flex justify-content-center">
                <input type="number" name="quantity" class="form-control w-50 ss-jx-element" value="${quantity}" data-target="add-product" data-submit='{"updateProductQuantity" : true, "id" : ${id}}' data-listener="change" data-callback="QuantityUpdateCB">
            </div>
        </td>
        <td><span class="badge-custom badge-${checkStockStatus(quantity,alert_qty,'class')}">${checkStockStatus(quantity,alert_qty)}</span></td>
        <td>
            <div class="d-flex gap-2">
                <a href="add-product?uid=${uid}" class="action-btn edit-btn">
                    <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                </a>
                <button class="action-btn delete-btn delete-data-btn" data-target="${id}" data-action="product">
                    <i class="hgi hgi-stroke hgi-delete-01"></i>
                </button>
            </div>
        </td>
    </tr>
</script>

<?php require_once 'includes/foot.php'; ?>