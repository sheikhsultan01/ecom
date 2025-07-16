<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inventory - GreenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2E8B57 0%, #228B22 50%, #32CD32 100%);
            --secondary-gradient: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
            --accent-color: #228B22;
            --text-dark: #2F4F4F;
            --text-light: #6B8E6B;
            --card-shadow: 0 8px 30px rgba(34, 139, 34, 0.15);
            --hover-shadow: 0 15px 40px rgba(34, 139, 34, 0.25);
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
            --navbar-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            color: var(--text-dark);
        }

        /* Navbar Styles */
        .navbar {
            background: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Main Content */
        .main-content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .btn-primary-custom {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.total {
            background: var(--primary-gradient);
        }

        .stat-icon.active {
            background: linear-gradient(135deg, #4caf50, #388e3c);
        }

        .stat-icon.out-of-stock {
            background: linear-gradient(135deg, #f44336, #d32f2f);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .inventory-filters {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
        }

        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filters-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .filters-body {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-control,
        .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(34, 139, 34, 0.1);
        }

        .inventory-table-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            overflow-x: auto;
        }

        .inventory-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .inventory-table th {
            background: var(--secondary-gradient);
            color: var(--text-dark);
            font-weight: 600;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .inventory-table th:first-child {
            border-top-left-radius: 10px;
        }

        .inventory-table th:last-child {
            border-top-right-radius: 10px;
        }

        .inventory-table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }

        .inventory-table tr:hover {
            background: #f8f9fa;
        }

        .product-cell {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        .product-info {
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .product-sku {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .badge-custom {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-in-stock {
            background: #e8f5e9;
            color: #388e3c;
        }

        .badge-low-stock {
            background: #fff8e1;
            color: #ffa000;
        }

        .badge-out-of-stock {
            background: #ffebee;
            color: #d32f2f;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: white;
            border: none;
        }

        .edit-btn {
            background: var(--primary-gradient);
        }

        .delete-btn {
            background: linear-gradient(135deg, #f44336, #d32f2f);
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination {
            display: flex;
            gap: 10px;
        }

        .page-item .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            color: var(--text-dark);
        }

        .page-item:hover .page-link {
            background: var(--secondary-gradient);
        }

        .page-item.active .page-link {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--card-shadow);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .main-content {
                padding: 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .filters-body {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {

            .inventory-table th,
            .inventory-table td {
                padding: 10px;
            }

            .product-image {
                width: 40px;
                height: 40px;
            }

            .product-title {
                font-size: 0.9rem;
            }

            .product-sku {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GreenShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-box"></i> Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog"></i> Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Manage Inventory</h1>
            <div class="header-actions">
                <button class="btn-primary-custom">
                    <i class="fas fa-plus"></i> Add New Product
                </button>
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
                <button class="btn-primary-custom" id="applyFilters">
                    <i class="fas fa-filter"></i> Apply Filters
                </button>
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
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="Delete Product">
                                    <i class="fas fa-trash"></i>
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
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="Delete Product">
                                    <i class="fas fa-trash"></i>
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
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="Delete Product">
                                    <i class="fas fa-trash"></i>
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
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="Delete Product">
                                    <i class="fas fa-trash"></i>
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
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" title="Delete Product">
                                    <i class="fas fa-trash"></i>
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
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Edit button click handler
            $('.edit-btn').click(function() {
                // In a real application, you would fetch the product data from your backend
                // For now, we'll just show the modal with pre-filled data
                $('#editProductModal').modal('show');
            });

            // Delete button click handler
            $('.delete-btn').click(function() {
                if (confirm('Are you sure you want to delete this product?')) {
                    // In a real application, you would send a delete request to your backend
                    alert('Product deleted successfully!');
                }
            });

            // Search functionality
            $('#searchProducts').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                $('.inventory-table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>

</html>