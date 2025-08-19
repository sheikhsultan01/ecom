<?php
define('_DIR_', '../');
require_once 'includes/db.php';
require_once "./helper/categories.php";
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
                            <div class="d-flex justify-content-end w-50">
                                <div class="search-container me-3 w-50" jd-filters="categories">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" name="query" class="form-control" placeholder="Search categories..." jd-filter="query">
                                </div>
                                <button class="btn btn-filter reset-img-btn editTableInfo" data-bs-toggle="modal" data-bs-target="#mdlSaveCategory" onclick="$('#addCategoryForm').trigger('reset');">
                                    <code class="d-none">{"modalHeading": "Add"}</code>
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
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th style="width: 150px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody jd-source="categories" jd-pick="#singleCategory" jd-drop="this" jd-pagination="#categoryPagination">
                                        <?= skeleton("table", [
                                            'columns' => 6,
                                        ]) ?>
                                    </tbody>
                                </table>
                                <div class="jd-pagination">
                                    <ul id="categoryPagination" class="mt-2 pagination"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Subcategories Tab -->
                <div class="tab-pane fade" id="subcategories" role="tabpanel" aria-labelledby="subcategories-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Subcategories</h5>
                            <div class="d-flex justify-content-end w-50">
                                <div class="search-container me-3 w-50" jd-filters="subCategories">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" name="query" class="form-control" placeholder="Search subcategories..." jd-filter="query">
                                </div>
                                <button class="btn btn-filter reset-img-btn editTableInfo" data-bs-toggle="modal" data-bs-target="#mdlSaveSubCategory" onclick="$('#addSubcategoryForm').trigger('reset');">
                                    <code class="d-none">{"modalHeading": "Add"}</code>
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
                                            <th>Status</th>
                                            <th style="width: 150px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody jd-source="subCategories" jd-pick="#singleSubCategory" jd-drop="this" jd-pagination="#subCategoryPagination">
                                        <?= skeleton("table", [
                                            'columns' => 6,
                                        ]) ?>
                                    </tbody>
                                </table>
                                <div class="jd-pagination">
                                    <ul id="subCategoryPagination" class="mt-2 pagination"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- Single Category Template -->
<script type="text/html" id="singleCategory">
    <js-script>
        let editJson = {
        ...item,
        modalHeading: "Edit"
        };
    </js-script>
    <tr>
        <td>
            <span class="category-id">#C001</span>
        </td>
        <td>
            <div class="category-image">
                <img src="<?= merge_url(SITE_URL, 'images/assets/') ?>${image}" alt="Cat Img">
            </div>
        </td>
        <td>
            <span class="category-name">${name}</span>
        </td>
        <td>
            <span class="category-status status-${status}">${toCapitalize(status)}</span>
        </td>
        <td>
            <div>
                <p class="mb-0">June 10, 2023</p>
                <p class="category-date">10:30 AM</p>
            </div>
        </td>
        <td>
            <div class="category-actions">
                <button class="btn btn-edit reset-img-btn editTableInfo" data-bs-toggle="modal" data-bs-target="#mdlSaveCategory">
                    <code class="d-none">${editJson}</code>
                    <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                </button>
                <button class="btn btn-delete delete-data-btn" data-target="${id}" data-action="category">
                    <i class="hgi hgi-stroke hgi-delete-01"></i>
                </button>
            </div>
        </td>
    </tr>
</script>

<!-- Single Sub Category Template -->
<script type="text/html" id="singleSubCategory">
    <js-script>
        let editJson = {
        ...item,
        modalHeading: "Edit"
        };
    </js-script>
    <tr>
        <td>
            <span class="category-id">#SC001</span>
        </td>
        <td>
            <div class="category-image">
                <img src="<?= merge_url(SITE_URL, 'images/assets/') ?>${image}" alt="Cat Img">
            </div>
        </td>
        <td>
            <span class="category-name">${name}</span>
        </td>
        <td>${parent_name}</td>
        <td>
            <span class="category-status status-${status}">${toCapitalize(status)}</span>
        </td>
        <td>
            <div class="category-actions">
                <button class="btn btn-edit reset-img-btn editTableInfo" data-bs-toggle="modal" data-bs-target="#mdlSaveSubCategory">
                    <code class="d-none">${editJson}</code>
                    <i class="hgi hgi-stroke hgi-pencil-edit-02"></i>
                </button>
                <button class="btn btn-delete delete-data-btn" data-target="${id}" data-action="category">
                    <i class="hgi hgi-stroke hgi-delete-01"></i>
                </button>
            </div>
        </td>
    </tr>
</script>

<!-- Save Category Modal -->
<?php require_once "components/modals/categories.php" ?>

<!-- Save Subcategory Modal -->
<?php require_once "components/modals/subcategories.php" ?>

<?php require_once 'includes/foot.php'; ?>