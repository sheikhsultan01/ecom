<?php
require_once 'includes/db.php';
$page_name = 'Add Product';

$CSS_FILES = [
    _DIR_ . 'css/sortable.min.css',
    'add-product.css'
];

$JS_FILES = [
    _DIR_ . 'js/sortable.min.js',
    _DIR_ . 'js/tinymce/tinymce.min.js',
    'add-product.js'
];

require_once 'includes/head.php';
?>
<div class="admin-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-plus-circle"></i>
            Add New Product
        </h1>
        <nav class="breadcrumb-nav">
            <a href="#" class="breadcrumb-item">Dashboard</a>
            <span class="breadcrumb-separator"> / </span>
            <a href="#" class="breadcrumb-item">Products</a>
            <span class="breadcrumb-separator"> / </span>
            <span class="breadcrumb-item active">Add Product</span>
        </nav>
    </div>

    <form id="addProductForm" class="form-container">
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
                <input type="file" class="file-input" id="fileInput" accept="image/*" multiple>
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
                        <input type="text" class="form-control" id="productTitle" placeholder="Enter a compelling product title" maxlength="100">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label required">SKU</label>
                        <input type="text" class="form-control" id="productSku" placeholder="Enter unique SKU" maxlength="50">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label required">Category</label>
                        <select class="form-select" id="productCategory">
                            <option value="">Select Category</option>
                            <option value="electronics">Electronics</option>
                            <option value="fashion">Fashion</option>
                            <option value="home">Home & Garden</option>
                            <option value="health">Health & Beauty</option>
                            <option value="sports">Sports & Fitness</option>
                            <option value="books">Books & Media</option>
                            <option value="toys">Toys & Games</option>
                            <option value="automotive">Automotive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" id="productBrand" placeholder="Enter brand name" maxlength="50">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Tags</label>
                <div class="tags-container" id="tagsContainer">
                    <input type="text" class="tag-input" placeholder="Add tags and press Enter">
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
                    <textarea id="productDescription" name="productDescription">
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
                        <input type="number" class="form-control" id="regularPrice" placeholder="0.00" step="0.01" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Sale Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="salePrice" placeholder="0.00" step="0.01" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Cost Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="costPrice" placeholder="0.00" step="0.01" min="0">
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
                    <input type="number" class="form-control" id="stockQuantity" placeholder="0" min="0">
                </div>
                <div class="form-group">
                    <label class="form-label">Low Stock Alert</label>
                    <input type="number" class="form-control" id="lowStockAlert" placeholder="5" min="0">
                </div>
                <div class="form-group">
                    <label class="form-label">Weight (kg)</label>
                    <input type="number" class="form-control" id="productWeight" placeholder="0.00" step="0.01" min="0">
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
                        <select class="form-select" id="productStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Visibility</label>
                        <select class="form-select" id="productVisibility">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                            <option value="hidden">Hidden</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Action Section -->
    <div class="action-section">
        <div class="progress-indicator">
            <span>Form Completion:</span>
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill" style="width: 0%"></div>
            </div>
            <span id="progressText">0%</span>
        </div>
        <div class="btn-group">
            <button type="button" class="btn-custom btn-outline-custom" id="saveDraftBtn">
                <i class="hgi hgi-stroke hgi-floppy-disk"></i>
                Save as Draft
            </button>
            <button type="button" class="btn-custom btn-secondary-custom" id="previewBtn">
                <i class="hgi hgi-stroke hgi-view"></i>
                Preview
            </button>
            <button type="button" class="btn-custom btn-primary-custom" id="publishBtn">
                <i class="hgi hgi-stroke hgi-rocket"></i>
                Publish Product
            </button>
        </div>
    </div>
</div>

<?php require_once 'includes/foot.php'; ?>