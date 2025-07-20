<?php
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
                                <button class="btn btn-filter" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
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
                                <button class="btn btn-filter" data-bs-toggle="modal" data-bs-target="#addSubcategoryModal">
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

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="categoryName" class="form-label">Category Name*</label>
                            <input type="text" class="form-control" id="categoryName" placeholder="Enter category name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="categorySlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="categorySlug" placeholder="category-slug">
                            <small class="text-muted">Leave empty to generate automatically</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="categoryDescription" rows="3" placeholder="Enter category description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category Image</label>
                        <div class="image-upload" id="categoryImageUpload">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Drag & drop an image or click to browse</p>
                            <p class="upload-hint">Recommended size: 512x512px (Max: 2MB)</p>
                        </div>
                        <input type="file" id="categoryImageInput" class="d-none" accept="image/*">
                        <img src="" id="categoryImagePreview" class="image-preview">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="categoryStatus" class="form-label">Status</label>
                            <select class="form-control" id="categoryStatus">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="categoryDisplayOrder" class="form-label">Display Order</label>
                            <input type="number" class="form-control" id="categoryDisplayOrder" placeholder="0" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="categorySEOTitle" class="form-label">SEO Title</label>
                        <input type="text" class="form-control" id="categorySEOTitle" placeholder="Enter SEO title">
                    </div>

                    <div class="mb-3">
                        <label for="categorySEODescription" class="form-label">SEO Description</label>
                        <textarea class="form-control" id="categorySEODescription" rows="2" placeholder="Enter SEO description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-filter" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-filter" id="saveCategoryBtn">Save Category</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editCategoryName" class="form-label">Category Name*</label>
                            <input type="text" class="form-control" id="editCategoryName" value="Organic Vegetables" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editCategorySlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="editCategorySlug" value="organic-vegetables">
                            <small class="text-muted">Leave empty to generate automatically</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editCategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editCategoryDescription" rows="3">Fresh organic vegetables sourced from local farms.</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category Image</label>
                        <div class="image-upload" id="editCategoryImageUpload">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Drag & drop an image or click to browse</p>
                            <p class="upload-hint">Recommended size: 512x512px (Max: 2MB)</p>
                        </div>
                        <input type="file" id="editCategoryImageInput" class="d-none" accept="image/*">
                        <div class="d-flex align-items-center mt-2">
                            <div class="category-image me-3">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div>
                                <p class="mb-0">Current image</p>
                                <button type="button" class="btn btn-sm btn-outline-danger mt-1">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editCategoryStatus" class="form-label">Status</label>
                            <select class="form-control" id="editCategoryStatus">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="editCategoryDisplayOrder" class="form-label">Display Order</label>
                            <input type="number" class="form-control" id="editCategoryDisplayOrder" value="1" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editCategorySEOTitle" class="form-label">SEO Title</label>
                        <input type="text" class="form-control" id="editCategorySEOTitle" value="Organic Vegetables - GreenCart">
                    </div>

                    <div class="mb-3">
                        <label for="editCategorySEODescription" class="form-label">SEO Description</label>
                        <textarea class="form-control" id="editCategorySEODescription" rows="2">Shop our selection of fresh organic vegetables sourced from local farms.</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-filter" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-filter" id="updateCategoryBtn">Update Category</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Subcategory Modal -->
<div class="modal fade" id="addSubcategoryModal" tabindex="-1" aria-labelledby="addSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubcategoryModalLabel">Add New Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSubcategoryForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subcategoryName" class="form-label">Subcategory Name*</label>
                            <input type="text" class="form-control" id="subcategoryName" placeholder="Enter subcategory name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="parentCategory" class="form-label">Parent Category*</label>
                            <select class="form-control" id="parentCategory" required>
                                <option value="">Select parent category</option>
                                <option value="1">Organic Vegetables</option>
                                <option value="2">Fresh Fruits</option>
                                <option value="3">Bakery</option>
                                <option value="4">Dairy & Eggs</option>
                                <option value="5">Meat & Seafood</option>
                                <option value="6">Beverages</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subcategorySlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="subcategorySlug" placeholder="subcategory-slug">
                            <small class="text-muted">Leave empty to generate automatically</small>
                        </div>
                        <div class="col-md-6">
                            <label for="subcategoryStatus" class="form-label">Status</label>
                            <select class="form-control" id="subcategoryStatus">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="subcategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="subcategoryDescription" rows="3" placeholder="Enter subcategory description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subcategory Image</label>
                        <div class="image-upload" id="subcategoryImageUpload">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Drag & drop an image or click to browse</p>
                            <p class="upload-hint">Recommended size: 512x512px (Max: 2MB)</p>
                        </div>
                        <input type="file" id="subcategoryImageInput" class="d-none" accept="image/*">
                        <img src="" id="subcategoryImagePreview" class="image-preview">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subcategoryDisplayOrder" class="form-label">Display Order</label>
                            <input type="number" class="form-control" id="subcategoryDisplayOrder" placeholder="0" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="subcategorySEOTitle" class="form-label">SEO Title</label>
                        <input type="text" class="form-control" id="subcategorySEOTitle" placeholder="Enter SEO title">
                    </div>

                    <div class="mb-3">
                        <label for="subcategorySEODescription" class="form-label">SEO Description</label>
                        <textarea class="form-control" id="subcategorySEODescription" rows="2" placeholder="Enter SEO description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-filter" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-filter" id="saveSubcategoryBtn">Save Subcategory</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Subcategory Modal -->
<div class="modal fade" id="editSubcategoryModal" tabindex="-1" aria-labelledby="editSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubcategoryModalLabel">Edit Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubcategoryForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editSubcategoryName" class="form-label">Subcategory Name*</label>
                            <input type="text" class="form-control" id="editSubcategoryName" value="Root Vegetables" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editParentCategory" class="form-label">Parent Category*</label>
                            <select class="form-control" id="editParentCategory" required>
                                <option value="1" selected>Organic Vegetables</option>
                                <option value="2">Fresh Fruits</option>
                                <option value="3">Bakery</option>
                                <option value="4">Dairy & Eggs</option>
                                <option value="5">Meat & Seafood</option>
                                <option value="6">Beverages</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editSubcategorySlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="editSubcategorySlug" value="root-vegetables">
                            <small class="text-muted">Leave empty to generate automatically</small>
                        </div>
                        <div class="col-md-6">
                            <label for="editSubcategoryStatus" class="form-label">Status</label>
                            <select class="form-control" id="editSubcategoryStatus">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editSubcategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editSubcategoryDescription" rows="3">Carrots, potatoes, onions, and other root vegetables.</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subcategory Image</label>
                        <div class="image-upload" id="editSubcategoryImageUpload">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Drag & drop an image or click to browse</p>
                            <p class="upload-hint">Recommended size: 512x512px (Max: 2MB)</p>
                        </div>
                        <input type="file" id="editSubcategoryImageInput" class="d-none" accept="image/*">
                        <div class="d-flex align-items-center mt-2">
                            <div class="category-image me-3">
                                <i class="fas fa-carrot"></i>
                            </div>
                            <div>
                                <p class="mb-0">Current image</p>
                                <button type="button" class="btn btn-sm btn-outline-danger mt-1">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editSubcategoryDisplayOrder" class="form-label">Display Order</label>
                            <input type="number" class="form-control" id="editSubcategoryDisplayOrder" value="1" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editSubcategorySEOTitle" class="form-label">SEO Title</label>
                        <input type="text" class="form-control" id="editSubcategorySEOTitle" value="Root Vegetables - Organic Vegetables - GreenCart">
                    </div>

                    <div class="mb-3">
                        <label for="editSubcategorySEODescription" class="form-label">SEO Description</label>
                        <textarea class="form-control" id="editSubcategorySEODescription" rows="2">Shop our selection of organic root vegetables including carrots, potatoes, onions, and more.</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-filter" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-filter" id="updateSubcategoryBtn">Update Subcategory</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category? This action cannot be undone.</p>
                <p class="text-danger"><strong>Warning:</strong> Deleting this category will also remove all associated products from this category.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-filter" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/foot.php'; ?>