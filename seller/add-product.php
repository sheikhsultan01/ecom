<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product - GreenShop Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2E8B57 0%, #228B22 50%, #32CD32 100%);
            --secondary-gradient: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
            --accent-color: #228B22;
            --text-dark: #2F4F4F;
            --text-light: #6B8E6B;
            --card-shadow: 0 8px 30px rgba(34, 139, 34, 0.15);
            --hover-shadow: 0 15px 40px rgba(34, 139, 34, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fffe 0%, #e8f5e8 100%);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-header {
            background: white;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
            border-left: 5px solid var(--accent-color);
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .breadcrumb-nav {
            margin-top: 10px;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .breadcrumb-nav a {
            color: var(--accent-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            text-decoration: underline;
        }

        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .form-section {
            padding: 40px;
            border-bottom: 1px solid #f5f5f5;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--secondary-gradient);
        }

        .section-title i {
            color: var(--accent-color);
            font-size: 1.4rem;
        }

        /* Image Upload Section */
        .image-upload-zone {
            border: 3px dashed #e0e0e0;
            border-radius: 20px;
            padding: 60px 40px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: linear-gradient(135deg, #fafafa 0%, #f0f0f0 100%);
            position: relative;
            overflow: hidden;
        }

        .image-upload-zone:hover {
            border-color: var(--accent-color);
            background: var(--secondary-gradient);
            transform: translateY(-2px);
        }

        .image-upload-zone.drag-over {
            border-color: var(--accent-color);
            background: var(--secondary-gradient);
            transform: scale(1.02);
            box-shadow: var(--hover-shadow);
        }

        .upload-content {
            pointer-events: none;
        }

        .upload-icon {
            font-size: 4rem;
            color: var(--accent-color);
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .upload-text {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .upload-subtext {
            color: var(--text-light);
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .upload-button {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            pointer-events: all;
        }

        .upload-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        /* Image Preview Grid */
        .image-preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .image-preview-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            cursor: move;
            transition: all 0.3s ease;
            background: white;
        }

        .image-preview-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .image-preview-item.sortable-ghost {
            opacity: 0.5;
            background: var(--secondary-gradient);
        }

        .image-preview-item.sortable-chosen {
            transform: scale(1.05);
        }

        .image-preview-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-preview-item:hover .image-overlay {
            opacity: 1;
        }

        .overlay-btn {
            background: white;
            border: none;
            padding: 12px;
            border-radius: 50%;
            cursor: pointer;
            color: var(--text-dark);
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        .overlay-btn:hover {
            background: var(--accent-color);
            color: white;
            transform: scale(1.1);
        }

        .overlay-btn.primary {
            background: var(--accent-color);
            color: white;
        }

        .primary-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--accent-color);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
            z-index: 10;
        }

        .drag-handle {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px;
            border-radius: 50%;
            cursor: move;
            z-index: 10;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            display: block;
            font-size: 1.1rem;
        }

        .form-label.required::after {
            content: "*";
            color: #ff4444;
            margin-left: 5px;
        }

        .form-control {
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(34, 139, 34, 0.1);
            outline: none;
        }

        .form-control:hover {
            border-color: var(--accent-color);
        }

        .form-select {
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 16px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 50px;
        }

        .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(34, 139, 34, 0.1);
            outline: none;
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            background: var(--secondary-gradient);
            border: 2px solid #e8e8e8;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: var(--text-dark);
            font-weight: 600;
            padding: 16px 20px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }

        /* TinyMCE Container */
        .tinymce-wrapper {
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            overflow: hidden;
            transition: border-color 0.3s ease;
        }

        .tinymce-wrapper:hover {
            border-color: var(--accent-color);
        }

        .tinymce-wrapper.focused {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(34, 139, 34, 0.1);
        }

        /* Tags Input */
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 12px 16px;
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            min-height: 60px;
            align-items: center;
            background: white;
            transition: border-color 0.3s ease;
        }

        .tags-container:focus-within {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(34, 139, 34, 0.1);
        }

        .tag-item {
            background: var(--secondary-gradient);
            color: var(--text-dark);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .tag-remove {
            background: none;
            border: none;
            color: var(--text-dark);
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .tag-remove:hover {
            background: #ff4444;
            color: white;
        }

        .tag-input {
            border: none;
            outline: none;
            padding: 8px 4px;
            flex: 1;
            min-width: 120px;
            font-size: 1rem;
        }

        /* Pricing Section */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        /* Inventory Section */
        .inventory-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        /* Action Buttons */
        .action-section {
            margin: 1rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn-group {
            display: flex;
            gap: 15px;
        }

        .btn-custom {
            padding: 16px 32px;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-custom::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: all 0.6s ease;
            transform: translate(-50%, -50%);
        }

        .btn-custom:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary-custom {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--card-shadow);
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: var(--hover-shadow);
        }

        .btn-secondary-custom {
            background: #6c757d;
            color: white;
        }

        .btn-secondary-custom:hover {
            background: #5a6268;
            transform: translateY(-3px);
        }

        .btn-outline-custom {
            background: white;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }

        .btn-outline-custom:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(-3px);
        }

        /* Progress Indicator */
        .progress-indicator {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-light);
        }

        .progress-bar {
            width: 200px;
            height: 6px;
            background: #e0e0e0;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary-gradient);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .admin-container {
                padding: 20px 15px;
            }

            .page-header,
            .form-section {
                padding: 25px 20px;
            }

            .page-title {
                font-size: 2rem;
            }

            .action-section {
                flex-direction: column;
                padding: 25px 20px;
            }

            .btn-group {
                width: 100%;
                flex-direction: column;
            }

            .btn-custom {
                width: 100%;
                justify-content: center;
            }

            .image-preview-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .pricing-grid,
            .inventory-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--accent-color);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
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
                <div class="image-upload-zone" id="imageUploadZone">
                    <div class="upload-content">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="upload-text">Drag & Drop Images Here</div>
                        <div class="upload-subtext">Or click to browse files</div>
                        <button type="button" class="upload-button">
                            <i class="fas fa-folder-open"></i>
                            Browse Files
                        </button>
                    </div>
                    <input type="file" id="imageInput" multiple accept="image/*" style="display: none;">
                </div>
                <div class="image-preview-grid" id="imagePreviewGrid">
                    <!-- Dynamic image previews will be inserted here -->
                </div>
            </div>

            <!-- Basic Information Section -->
            <div class="form-section">
                <h2 class="section-title">
                    <i class="fas fa-info-circle"></i>
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
                    <i class="fas fa-align-left"></i>
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
                    <i class="fas fa-dollar-sign"></i>
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
                    <i class="fas fa-boxes"></i>
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
                    <i class="fas fa-save"></i>
                    Save as Draft
                </button>
                <button type="button" class="btn-custom btn-secondary-custom" id="previewBtn">
                    <i class="fas fa-eye"></i>
                    Preview
                </button>
                <button type="button" class="btn-custom btn-primary-custom" id="publishBtn">
                    <i class="fas fa-rocket"></i>
                    Publish Product
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function() {
            let imageFiles = [];
            let primaryImageIndex = 0;
            let sortableInstance = null;

            // Initialize TinyMCE
            tinymce.init({
                selector: '#productDescription',
                height: 400,
                menubar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic forecolor backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family: Inter, Arial, sans-serif; font-size: 16px; }',
                setup: function(editor) {
                    editor.on('focus', function() {
                        $('#tinymceWrapper').addClass('focused');
                    });
                    editor.on('blur', function() {
                        $('#tinymceWrapper').removeClass('focused');
                        updateProgress();
                    });
                    editor.on('change', function() {
                        updateProgress();
                    });
                }
            });

            // Image Upload Handling
            $('#imageUploadZone, .upload-button').click(function() {
                $('#imageInput').click();
            });

            $('#imageInput').change(function(e) {
                handleFiles(e.target.files);
            });

            // Drag and Drop
            let dragCounter = 0;

            $('#imageUploadZone').on({
                dragenter: function(e) {
                    e.preventDefault();
                    dragCounter++;
                    $(this).addClass('drag-over');
                },
                dragleave: function(e) {
                    e.preventDefault();
                    dragCounter--;
                    if (dragCounter <= 0) {
                        $(this).removeClass('drag-over');
                    }
                },
                dragover: function(e) {
                    e.preventDefault();
                },
                drop: function(e) {
                    e.preventDefault();
                    dragCounter = 0;
                    $(this).removeClass('drag-over');
                    handleFiles(e.originalEvent.dataTransfer.files);
                }
            });

            function handleFiles(files) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (file.type.startsWith('image/')) {
                        imageFiles.push(file);
                        displayImagePreview(file, imageFiles.length - 1);
                    }
                }
                updateProgress();
            }

            function displayImagePreview(file, index) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewHtml = `
                        <div class="image-preview-item" data-index="${index}">
                            ${index === primaryImageIndex ? '<div class="primary-badge">Primary</div>' : ''}
                            <div class="drag-handle">
                                <i class="fas fa-grip-vertical"></i>
                            </div>
                            <img src="${e.target.result}" alt="Product Image ${index + 1}">
                            <div class="image-overlay">
                                <button type="button" class="overlay-btn ${index === primaryImageIndex ? 'primary' : ''}" 
                                        onclick="setPrimaryImage(${index})" title="Set as Primary">
                                    <i class="fas fa-star"></i>
                                </button>
                                <button type="button" class="overlay-btn" onclick="removeImage(${index})" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    $('#imagePreviewGrid').append(previewHtml);

                    // Initialize or update Sortable
                    if (sortableInstance) {
                        sortableInstance.destroy();
                    }
                    initializeSortable();
                };
                reader.readAsDataURL(file);
            }

            function initializeSortable() {
                const el = document.getElementById('imagePreviewGrid');
                if (el) {
                    sortableInstance = Sortable.create(el, {
                        animation: 150,
                        ghostClass: 'sortable-ghost',
                        chosenClass: 'sortable-chosen',
                        handle: '.drag-handle',
                        onEnd: function(evt) {
                            // Update the imageFiles array order
                            const movedItem = imageFiles.splice(evt.oldIndex, 1);
                            imageFiles.splice(evt.newIndex, 0, movedItem);

                            // Update primary image index
                            if (evt.oldIndex === primaryImageIndex) {
                                primaryImageIndex = evt.newIndex;
                            } else if (evt.oldIndex < primaryImageIndex && evt.newIndex >= primaryImageIndex) {
                                primaryImageIndex--;
                            } else if (evt.oldIndex > primaryImageIndex && evt.newIndex <= primaryImageIndex) {
                                primaryImageIndex++;
                            }

                            updateImageIndexes();
                        }
                    });
                }
            }

            function updateImageIndexes() {
                $('#imagePreviewGrid .image-preview-item').each(function(index) {
                    $(this).attr('data-index', index);

                    // Update primary badge
                    if (index === primaryImageIndex) {
                        if (!$(this).find('.primary-badge').length) {
                            $(this).prepend('<div class="primary-badge">Primary</div>');
                        }
                        $(this).find('.overlay-btn').first().addClass('primary');
                    } else {
                        $(this).find('.primary-badge').remove();
                        $(this).find('.overlay-btn').first().removeClass('primary');
                    }

                    // Update button onclick attributes
                    $(this).find('.overlay-btn').first().attr('onclick', `setPrimaryImage(${index})`);
                    $(this).find('.overlay-btn').last().attr('onclick', `removeImage(${index})`);
                });
            }

            window.setPrimaryImage = function(index) {
                primaryImageIndex = index;
                updateImageIndexes();
            };

            window.removeImage = function(index) {
                imageFiles.splice(index, 1);
                $(`.image-preview-item[data-index="${index}"]`).remove();

                // Adjust primary image index
                if (index === primaryImageIndex) {
                    primaryImageIndex = 0;
                } else if (index < primaryImageIndex) {
                    primaryImageIndex--;
                }

                updateImageIndexes();
                updateProgress();
            };

            // Tags functionality
            const tagsContainer = $('#tagsContainer');
            const tagInput = tagsContainer.find('.tag-input');
            let tags = [];

            tagInput.on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    const tag = $(this).val().trim();
                    if (tag && !tags.includes(tag)) {
                        tags.push(tag);
                        addTagToUI(tag);
                        $(this).val('');
                        updateProgress();
                    }
                }
            });

            function addTagToUI(tag) {
                const tagHtml = `
                    <div class="tag-item">
                        ${tag}
                        <button type="button" class="tag-remove" onclick="removeTag('${tag}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                tagInput.before(tagHtml);
            }

            window.removeTag = function(tag) {
                tags = tags.filter(t => t !== tag);
                $(`.tag-item:contains("${tag}")`).remove();
                updateProgress();
            };

            // Form validation and progress tracking
            function updateProgress() {
                const requiredFields = ['#productTitle', '#productSku', '#productCategory', '#regularPrice'];
                let filledFields = 0;
                let totalFields = requiredFields.length + 2; // +2 for images and description

                // Check required fields
                requiredFields.forEach(field => {
                    if ($(field).val().trim()) {
                        filledFields++;
                    }
                });

                // Check images
                if (imageFiles.length > 0) {
                    filledFields++;
                }

                // Check description
                if (tinymce.get('productDescription') && tinymce.get('productDescription').getContent().trim()) {
                    filledFields++;
                }

                const progress = Math.round((filledFields / totalFields) * 100);
                $('#progressFill').css('width', `${progress}%`);
                $('#progressText').text(`${progress}%`);
            }

            // Form inputs change tracking
            $('input, select, textarea').on('input change', function() {
                updateProgress();
            });

            // Button actions
            $('#saveDraftBtn').click(function() {
                const button = $(this);
                button.addClass('loading');
                button.html('<div class="spinner"></div> Saving...');

                setTimeout(() => {
                    button.removeClass('loading');
                    button.html('<i class="fas fa-save"></i> Save as Draft');
                    showNotification('Product saved as draft!', 'success');
                }, 2000);
            });

            $('#previewBtn').click(function() {
                // Open preview in new tab
                window.open('#', '_blank');
            });

            $('#publishBtn').click(function() {
                if (validateForm()) {
                    const button = $(this);
                    button.addClass('loading');
                    button.html('<div class="spinner"></div> Publishing...');

                    setTimeout(() => {
                        button.removeClass('loading');
                        button.html('<i class="fas fa-rocket"></i> Publish Product');
                        showNotification('Product published successfully!', 'success');
                    }, 3000);
                }
            });

            function validateForm() {
                const title = $('#productTitle').val().trim();
                const sku = $('#productSku').val().trim();
                const category = $('#productCategory').val();
                const price = $('#regularPrice').val();

                if (!title) {
                    showNotification('Product title is required!', 'error');
                    return false;
                }
                if (!sku) {
                    showNotification('SKU is required!', 'error');
                    return false;
                }
                if (!category) {
                    showNotification('Please select a category!', 'error');
                    return false;
                }
                if (!price) {
                    showNotification('Regular price is required!', 'error');
                    return false;
                }
                if (imageFiles.length === 0) {
                    showNotification('Please upload at least one product image!', 'error');
                    return false;
                }

                return true;
            }

            function showNotification(message, type) {
                const notification = $(`
                    <div class="alert alert-${type === 'error' ? 'danger' : 'success'} alert-dismissible fade show" 
                         style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);

                $('body').append(notification);

                setTimeout(() => {
                    notification.alert('close');
                }, 5000);
            }

            // Initialize progress tracking
            updateProgress();
        });
    </script>
</body>

</html>