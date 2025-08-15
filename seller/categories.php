<?php
define('_DIR_', '../');
require_once 'includes/db.php';
$page_name = 'Categories';

$CSS_FILES = [
    'categories.css'
];

$JS_FILES = [
    'categories.js'
];

require_once 'includes/head.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-12">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                <div>
                    <h2 class="mb-1">Category Management</h2>
                    <p class="text-muted mb-0">Organize your products with categories and subcategories</p>
                </div>
            </div>

            <!-- Category Tabs -->
            <ul class="nav nav-pills category-tabs" id="categoryTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="categories-tab" data-bs-toggle="pill" data-bs-target="#categories" type="button" role="tab">Main Categories</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="subcategories-tab" data-bs-toggle="pill" data-bs-target="#subcategories" type="button" role="tab">Subcategories</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="categoryTabContent">
                <!-- Main Categories Tab -->
                <div class="tab-pane fade show active" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Main Categories</h5>
                            <div class="d-flex">
                                <div class="search-container me-3">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="search-input" placeholder="Search categories...">
                                </div>
                                <button class="btn btn-filter" data-bs-toggle="modal" data-bs-target="#mdlSaveCategory">
                                    <i class="fas fa-plus me-2"></i> Add Category
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table categories-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 80px;">ID</th>
                                            <th style="width: 80px;">Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Products</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th style="width: 150px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="category-id">#C001</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-leaf"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Organic Vegetables</span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Fresh organic vegetables sourced from local farms.</span>
                                            </td>
                                            <td>24</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0">June 10, 2023</p>
                                                    <p class="category-date">10:30 AM</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#mdlSaveCategory">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#C002</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-apple-alt"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Fresh Fruits</span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Seasonal and exotic fruits from around the world.</span>
                                            </td>
                                            <td>18</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0">June 8, 2023</p>
                                                    <p class="category-date">2:15 PM</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#C003</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-bread-slice"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Bakery</span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Freshly baked bread, pastries, and desserts.</span>
                                            </td>
                                            <td>12</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0">June 5, 2023</p>
                                                    <p class="category-date">9:45 AM</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#C004</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-cheese"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Dairy & Eggs</span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Farm-fresh dairy products and free-range eggs.</span>
                                            </td>
                                            <td>15</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0">June 3, 2023</p>
                                                    <p class="category-date">11:20 AM</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#C005</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-fish"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Meat & Seafood</span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Premium cuts of meat and fresh seafood.</span>
                                            </td>
                                            <td>20</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0">May 30, 2023</p>
                                                    <p class="category-date">3:40 PM</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#C006</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-wine-bottle"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Beverages</span>
                                            </td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Refreshing drinks, juices, and specialty beverages.</span>
                                            </td>
                                            <td>16</td>
                                            <td>
                                                <span class="category-status status-inactive">Inactive</span>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="mb-0">May 25, 2023</p>
                                                    <p class="category-date">1:15 PM</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <p class="text-muted mb-0">Showing 6 of 12 categories</p>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subcategories Tab -->
                <div class="tab-pane fade" id="subcategories" role="tabpanel" aria-labelledby="subcategories-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Subcategories</h5>
                            <div class="d-flex">
                                <div class="search-container me-3">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="search-input" placeholder="Search subcategories...">
                                </div>
                                <button class="btn btn-filter" data-bs-toggle="modal" data-bs-target="#mdlSaveSubCategory">
                                    <i class="fas fa-plus me-2"></i> Add Subcategory
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table categories-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 80px;">ID</th>
                                            <th style="width: 80px;">Image</th>
                                            <th>Name</th>
                                            <th>Parent Category</th>
                                            <th>Description</th>
                                            <th>Products</th>
                                            <th>Status</th>
                                            <th style="width: 150px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="category-id">#SC001</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-carrot"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Root Vegetables</span>
                                            </td>
                                            <td>Organic Vegetables</td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Carrots, potatoes, onions, and other root vegetables.</span>
                                            </td>
                                            <td>8</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#mdlSaveSubCategory">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#SC002</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-seedling"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Leafy Greens</span>
                                            </td>
                                            <td>Organic Vegetables</td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Spinach, kale, lettuce, and other leafy vegetables.</span>
                                            </td>
                                            <td>6</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#SC003</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-apple-alt"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Citrus Fruits</span>
                                            </td>
                                            <td>Fresh Fruits</td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Oranges, lemons, limes, and other citrus fruits.</span>
                                            </td>
                                            <td>5</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#SC004</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-lemon"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Berries</span>
                                            </td>
                                            <td>Fresh Fruits</td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Strawberries, blueberries, raspberries, and other berries.</span>
                                            </td>
                                            <td>7</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#SC005</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-bread-slice"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Bread</span>
                                            </td>
                                            <td>Bakery</td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Artisan bread, sourdough, whole grain, and specialty loaves.</span>
                                            </td>
                                            <td>4</td>
                                            <td>
                                                <span class="category-status status-active">Active</span>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="category-id">#SC006</span>
                                            </td>
                                            <td>
                                                <div class="category-image">
                                                    <i class="fas fa-cookie"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="category-name">Pastries</span>
                                            </td>
                                            <td>Bakery</td>
                                            <td>
                                                <span class="text-truncate d-inline-block" style="max-width: 200px;">Croissants, muffins, cookies, and other sweet treats.</span>
                                            </td>
                                            <td>8</td>
                                            <td>
                                                <span class="category-status status-inactive">Inactive</span>
                                            </td>
                                            <td>
                                                <div class="category-actions">
                                                    <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <p class="text-muted mb-0">Showing 6 of 18 subcategories</p>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Save Category Modal -->
<?php require_once "components/modals/categories.php" ?>

<!-- Save Subcategory Modal -->
<?php require_once "components/modals/subcategories.php" ?>

<?php require_once 'includes/foot.php'; ?>