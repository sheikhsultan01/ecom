<?php
define('_DIR_', '../');
require_once 'includes/db.php';
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
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-value">247</div>
            <div class="stat-label">Total Products</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon active">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">215</div>
            <div class="stat-label">Active Products</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon out-of-stock">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-value">32</div>
            <div class="stat-label">Out of Stock</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon out-of-stock">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-label">Low Stock</div>
        </div>
    </div>

    <!-- Inventory Filters -->
    <div class="inventory-filters">
        <div class="filters-header">
            <h2 class="filters-title">Filter Products</h2>
        </div>
        <div class="filters-body">
            <div class="filter-group">
                <label for="searchProducts">Search Products</label>
                <input type="text" class="form-control" id="searchProducts" placeholder="Search by name, SKU, etc.">
            </div>
            <div class="filter-group">
                <label for="categoryFilter">Category</label>
                <select class="form-select" id="categoryFilter">
                    <option value="">All Categories</option>
                    <option value="electronics">Electronics</option>
                    <option value="fashion">Fashion</option>
                    <option value="home">Home & Garden</option>
                    <option value="health">Health & Beauty</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="stockFilter">Stock Status</label>
                <select class="form-select" id="stockFilter">
                    <option value="">All</option>
                    <option value="in-stock">In Stock</option>
                    <option value="low-stock">Low Stock</option>
                    <option value="out-of-stock">Out of Stock</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="sortBy">Sort By</label>
                <select class="form-select" id="sortBy">
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
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product Row 1 -->
                <tr>
                    <td>
                        <div class="product-cell">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Wireless Headphones" class="product-image">
                            <div class="product-info">
                                <div class="product-title">Premium Wireless Headphones</div>
                                <div class="product-sku">WH-001</div>
                            </div>
                        </div>
                    </td>
                    <td>WH-001</td>
                    <td>Electronics</td>
                    <td>\$129.99</td>
                    <td>45</td>
                    <td><span class="badge-custom badge-in-stock">In Stock</span></td>
                    <td>Jul 15, 2024</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="action-btn edit-btn" title="Edit Product">
                                <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                            </button>
                            <button class="action-btn delete-btn" title="Delete Product">
                                <i class="hgi hgi-stroke hgi-delete-01"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Product Row 2 -->
                <tr>
                    <td>
                        <div class="product-cell">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Smart Watch" class="product-image">
                            <div class="product-info">
                                <div class="product-title">Smart Fitness Watch</div>
                                <div class="product-sku">SW-002</div>
                            </div>
                        </div>
                    </td>
                    <td>SW-002</td>
                    <td>Electronics</td>
                    <td>\$149.99</td>
                    <td>8</td>
                    <td><span class="badge-custom badge-low-stock">Low Stock</span></td>
                    <td>Jul 14, 2024</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="action-btn edit-btn" title="Edit Product">
                                <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                            </button>
                            <button class="action-btn delete-btn" title="Delete Product">
                                <i class="hgi hgi-stroke hgi-delete-01"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Product Row 3 -->
                <tr>
                    <td>
                        <div class="product-cell">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Organic Skincare" class="product-image">
                            <div class="product-info">
                                <div class="product-title">Organic Skincare Set</div>
                                <div class="product-sku">OS-003</div>
                            </div>
                        </div>
                    </td>
                    <td>OS-003</td>
                    <td>Health & Beauty</td>
                    <td>\$89.99</td>
                    <td>0</td>
                    <td><span class="badge-custom badge-out-of-stock">Out of Stock</span></td>
                    <td>Jul 12, 2024</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="action-btn edit-btn" title="Edit Product">
                                <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                            </button>
                            <button class="action-btn delete-btn" title="Delete Product">
                                <i class="hgi hgi-stroke hgi-delete-01"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Product Row 4 -->
                <tr>
                    <td>
                        <div class="product-cell">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Kitchen Blender" class="product-image">
                            <div class="product-info">
                                <div class="product-title">High-Speed Kitchen Blender</div>
                                <div class="product-sku">KB-004</div>
                            </div>
                        </div>
                    </td>
                    <td>KB-004</td>
                    <td>Home & Garden</td>
                    <td>\$99.99</td>
                    <td>23</td>
                    <td><span class="badge-custom badge-in-stock">In Stock</span></td>
                    <td>Jul 10, 2024</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="action-btn edit-btn" title="Edit Product">
                                <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                            </button>
                            <button class="action-btn delete-btn" title="Delete Product">
                                <i class="hgi hgi-stroke hgi-delete-01"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Product Row 5 -->
                <tr>
                    <td>
                        <div class="product-cell">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=200&fit=crop" alt="Running Shoes" class="product-image">
                            <div class="product-info">
                                <div class="product-title">Professional Running Shoes</div>
                                <div class="product-sku">RS-005</div>
                            </div>
                        </div>
                    </td>
                    <td>RS-005</td>
                    <td>Fashion</td>
                    <td>\$119.99</td>
                    <td>17</td>
                    <td><span class="badge-custom badge-in-stock">In Stock</span></td>
                    <td>Jul 08, 2024</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="action-btn edit-btn" title="Edit Product">
                                <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                            </button>
                            <button class="action-btn delete-btn" title="Delete Product">
                                <i class="hgi hgi-stroke hgi-delete-01"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <i class="hgi hgi-stroke hgi-arrow-left-01"></i>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <i class="hgi hgi-stroke hgi-arrow-right-01"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" value="Premium Wireless Headphones">
                        </div>
                        <div class="col-md-6">
                            <label for="productSku" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="productSku" value="WH-001">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="productCategory" class="form-label">Category</label>
                            <select class="form-select" id="productCategory">
                                <option value="electronics" selected>Electronics</option>
                                <option value="fashion">Fashion</option>
                                <option value="home">Home & Garden</option>
                                <option value="health">Health & Beauty</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="productPrice" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="productPrice" value="129.99">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="productStock" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="productStock" value="45">
                        </div>
                        <div class="col-md-6">
                            <label for="productStatus" class="form-label">Status</label>
                            <select class="form-select" id="productStatus">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="productDescription" rows="4">Premium wireless headphones with active noise cancellation, 30-hour battery life, and comfortable ear cups.</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn-primary-custom">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/foot.php'; ?>