<?php
define('_DIR_', '../');
require_once 'includes/db.php';
$uid = _get_param('uid', false);

// Get Location
$_product = null;
if ($uid) {
    $_product = $db->select_one('products', '*', ['uid' => $uid]);

    if (!$_product) redirectTo("inventory");
    $images = json_decode($_product['images'], true);
    if (!empty($images)) {
        $names = array_column($images, "name");
        $img_names = implode(',', $names);
        $_product['product_images'] = $img_names;
    } else {
        $_product['product_images'] = '';
    }
    $_product['images'] = $images;

    // Encode the tags
    $tags = implode(',', json_decode($_product['tags'], true));
    $_product['tags'] = $tags;
}
$title = $uid ?  'Update Product' : 'Add Product';
$page_name = $title;

$CSS_FILES = [
    _DIR_ . 'css/sortable.min.css',
    _DIR_ . 'css/tags.css',
    'add-product.css'
];

$JS_FILES = [
    _DIR_ . 'js/sortable.min.js',
    _DIR_ . 'js/tinymce/tinymce.min.js',
    _DIR_ . 'js/SS/tags.js',
    'add-product.js'
];

require_once 'includes/head.php';
?>
<div class="admin-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-plus-circle"></i>
            <?= $title ?>
        </h1>
        <nav class="breadcrumb-nav">
            <a href="#" class="breadcrumb-item">Dashboard</a>
            <span class="breadcrumb-separator"> / </span>
            <a href="#" class="breadcrumb-item">Products</a>
            <span class="breadcrumb-separator"> / </span>
            <span class="breadcrumb-item active"><?= $title ?></span>
        </nav>
    </div>

    <form id="addProductForm" action="add-product" class="form-container js-form" data-custom-files="true">
        <!-- Product Images Section -->
        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-images"></i>
                Product Images
            </h2>
            <!-- image upload section -->
            <div class="upload-container">

                <!-- Images Grid -->
                <div class="images-grid" id="imagesGrid">
                    <!-- Add Photo Item -->
                    <div class="add-photo-item" id="addPhotoItem">
                        <div class="upload-icon">
                            <i class="hgi hgi-stroke hgi-camera-02"></i>
                        </div>
                        <div class="upload-text">Add a photo</div>
                        <div class="upload-subtext">Drag & drop or click to upload</div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn-custom btn-secondary-custom" id="clearAllBtn">
                        <i class="hgi hgi-stroke hgi-delete-01"></i>
                        Clear All
                    </button>
                </div>

                <!-- Hidden File Input -->
                <input type="file" name="files" class="file-input" id="fileInput" accept="image/*" multiple>
                <input class="d-none" type="text" name="product_images">
            </div>
        </div>

        <!-- Basic Information Section -->
        <div class="form-section">
            <h2 class="section-title">
                <i class="hgi hgi-stroke hgi-information-circle"></i>
                Basic Information
            </h2>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-label required">Product Title</label>
                        <input type="text" name="title" class="form-control" id="productTitle" placeholder="Enter a compelling product title" maxlength="100">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label required">SKU</label>
                        <input type="text" name="sku" class="form-control" id="productSku" placeholder="Enter unique SKU" maxlength="50">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label required">Category</label>
                        <select class="form-select" id="productCategory" name="category_id">
                            <option value="0" disabled>-- Select Category --</option>
                            <?php $categories = $db->squery("SELECT id,name FROM categories WHERE parent_id != 0");
                            foreach ($categories as $category) {   ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control" id="productBrand" placeholder="Enter brand name" maxlength="50">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Tags</label>
                <div class="tags tc-tags form-control">
                    <input type="text" class="tag-text">
                    <input type="text" data-tc-tag="true" name="tags" class="iTags  d-none">
                </div>
            </div>
        </div>

        <!-- Product Description Section -->
        <div class="form-section">
            <h2 class="section-title">
                <i class="hgi hgi-stroke hgi-text-align-justify-left"></i>
                Product Description
            </h2>
            <div class="form-group">
                <label class="form-label required">Description</label>
                <div class="tinymce-wrapper" id="tinymceWrapper">
                    <textarea id="productDescription" name="description">
                            <p>Write a compelling product description here...</p>
                        </textarea>
                </div>
            </div>
        </div>

        <!-- Pricing Section -->
        <div class="form-section">
            <h2 class="section-title">
                <i class="hgi hgi-stroke hgi-dollar-01"></i>
                Pricing
            </h2>
            <div class="pricing-grid">
                <div class="form-group">
                    <label class="form-label required">Regular Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="price" class="form-control" id="regularPrice" placeholder="0.00" step="0.01" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Sale Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="sale_price" class="form-control" id="salePrice" placeholder="0.00" step="0.01" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Cost Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="cost_price" class="form-control" id="costPrice" placeholder="0.00" step="0.01" min="0">
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Section -->
        <div class="form-section">
            <h2 class="section-title">
                <i class="hgi hgi-stroke hgi-dropbox"></i>
                Inventory
            </h2>
            <div class="inventory-grid">
                <div class="form-group">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="stockQuantity" placeholder="0" min="0">
                </div>
                <div class="form-group">
                    <label class="form-label">Low Stock Alert</label>
                    <input type="number" name="alert_qty" class="form-control" id="lowStockAlert" placeholder="5" min="0">
                </div>
                <div class="form-group">
                    <label class="form-label">Weight (kg)</label>
                    <input type="number" name="weight" class="form-control" id="productWeight" placeholder="0.00" step="0.01" min="0">
                </div>
            </div>
        </div>

        <!-- Product Status Section -->
        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-toggle-on"></i>
                Product Status
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="productStatus" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Visibility</label>
                        <select class="form-select" id="productVisibility" name="visibility">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Action Section -->
        <div class="action-section">
            <div class="progress-indicator">
                <span>Progress:</span>
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill" style="width: 0%"></div>
                </div>
                <span id="progressText">0%</span>
            </div>
            <div class="btn-group">
                <input type="hidden" name="saveProductData" value="true">
                <input class="d-none" type="text" name="uid">
                <button type="button" class="btn-custom btn-outline-custom" id="saveDraftBtn">
                    <i class="hgi hgi-stroke hgi-floppy-disk"></i>
                    Save as Draft
                </button>
                <button type="submit" class="btn-custom btn-primary-custom" id="publishBtn">
                    <i class="hgi hgi-stroke hgi-rocket"></i>
                    Publish Product
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    const PRODUCT_DATA = <?= json_encode($_product) ?>;
</script>

<?php require_once 'includes/foot.php'; ?>