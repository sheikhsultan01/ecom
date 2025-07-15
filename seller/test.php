<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Image Upload - GreenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.css" rel="stylesheet">
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

        body {
            font-family: 'Inter', 'Arial', sans-serif;
            background: linear-gradient(135deg, #f8fffe 0%, #e8f5e8 100%);
            color: var(--text-dark);
            padding: 40px 20px;
        }

        .upload-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            padding: 40px;
        }

        .upload-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 30px;
            text-align: center;
        }

        .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .image-item {
            position: relative;
            aspect-ratio: 16/10;
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: grab;
        }

        .image-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .image-item.dragging {
            cursor: grabbing;
            transform: rotate(5deg);
            z-index: 1000;
        }

        .image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-item:hover img {
            transform: scale(1.05);
        }

        .image-controls {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-item:hover .image-controls {
            opacity: 1;
        }

        .control-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .remove-btn {
            background: rgba(255, 68, 68, 0.9);
            color: white;
        }

        .remove-btn:hover {
            background: #ff4444;
            transform: scale(1.1);
        }

        .move-btn {
            background: rgba(255, 255, 255, 0.9);
            color: var(--text-dark);
        }

        .move-btn:hover {
            background: var(--accent-color);
            color: white;
        }

        .primary-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--accent-color);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .image-position {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        .add-photo-item {
            position: relative;
            aspect-ratio: 16/10;
            background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%);
            border: 2px dashed #e0e0e0;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .add-photo-item:hover {
            border-color: var(--accent-color);
            background: var(--secondary-gradient);
            transform: translateY(-3px);
        }

        .add-photo-item.drag-over {
            border-color: var(--accent-color);
            background: var(--secondary-gradient);
            transform: scale(1.02);
        }

        .upload-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .upload-icon i {
            font-size: 24px;
            color: white;
        }

        .add-photo-item:hover .upload-icon {
            transform: scale(1.1);
        }

        .upload-text {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .upload-subtext {
            font-size: 0.9rem;
            color: var(--text-light);
            text-align: center;
            max-width: 200px;
        }

        .upload-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: var(--secondary-gradient);
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent-color);
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-custom {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--card-shadow);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        .btn-secondary-custom {
            background: white;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }

        .btn-secondary-custom:hover {
            background: var(--accent-color);
            color: white;
        }

        .file-input {
            display: none;
        }

        .sortable-ghost {
            opacity: 0.4;
        }

        .sortable-chosen {
            transform: rotate(5deg);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .images-grid {
                grid-template-columns: 1fr;
            }

            .upload-container {
                padding: 20px;
            }

            .upload-title {
                font-size: 2rem;
            }

            .upload-stats {
                flex-direction: column;
                gap: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .images-grid {
                grid-template-columns: 1fr;
            }

            .image-controls {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="upload-container">
        <h1 class="upload-title">Upload Product Images</h1>

        <!-- Upload Stats -->
        <div class="upload-stats">
            <div class="stat-item">
                <div class="stat-number" id="totalImages">0</div>
                <div class="stat-label">Total Images</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" id="primaryImages">0</div>
                <div class="stat-label">Primary Images</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" id="totalSize">0 MB</div>
                <div class="stat-label">Total Size</div>
            </div>
        </div>

        <!-- Images Grid -->
        <div class="images-grid" id="imagesGrid">
            <!-- Add Photo Item -->
            <div class="add-photo-item" id="addPhotoItem">
                <div class="upload-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <div class="upload-text">Add a photo</div>
                <div class="upload-subtext">Drag & drop or click to upload</div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn-custom btn-primary-custom" id="uploadAllBtn">
                <i class="fas fa-upload"></i>
                Upload All Images
            </button>
            <button class="btn-custom btn-secondary-custom" id="clearAllBtn">
                <i class="fas fa-trash"></i>
                Clear All
            </button>
        </div>

        <!-- Hidden File Input -->
        <input type="file" class="file-input" id="fileInput" accept="image/*" multiple>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        $(document).ready(function() {
            let images = [];
            let totalSize = 0;
            let dragCounter = 0;

            // Initialize Sortable
            const sortable = Sortable.create(document.getElementById('imagesGrid'), {
                animation: 150,
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                dragClass: 'dragging',
                filter: '.add-photo-item',
                onStart: function(evt) {
                    evt.item.classList.add('dragging');
                },
                onEnd: function(evt) {
                    evt.item.classList.remove('dragging');
                    updateImagePositions();
                },
                onUpdate: function(evt) {
                    // Update images array based on new order
                    const newOrder = Array.from(evt.to.children)
                        .filter(child => !child.classList.contains('add-photo-item'))
                        .map(child => parseInt(child.dataset.index));

                    const reorderedImages = newOrder.map(index => images[index]);
                    images = reorderedImages;
                    updateStats();
                }
            });

            // File input change handler
            $('#fileInput').on('change', function(e) {
                handleFiles(e.target.files);
            });

            // Add photo item click handler
            $('#addPhotoItem').on('click', function() {
                $('#fileInput').click();
            });

            // Drag and drop handlers
            $('#addPhotoItem').on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('drag-over');
            });

            $('#addPhotoItem').on('dragleave', function(e) {
                e.preventDefault();
                $(this).removeClass('drag-over');
            });

            $('#addPhotoItem').on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('drag-over');
                handleFiles(e.originalEvent.dataTransfer.files);
            });

            // Handle file processing
            function handleFiles(files) {
                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const imageData = {
                                src: e.target.result,
                                name: file.name,
                                size: file.size,
                                file: file,
                                isPrimary: images.length === 0
                            };
                            images.push(imageData);
                            totalSize += file.size;
                            renderImages();
                            updateStats();
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Render images
            function renderImages() {
                const grid = $('#imagesGrid');
                const addPhotoItem = $('#addPhotoItem');

                // Remove existing image items
                grid.find('.image-item').remove();

                // Add image items before the add-photo-item
                images.forEach((image, index) => {
                    const imageItem = createImageItem(image, index);
                    addPhotoItem.before(imageItem);
                });

                updateImagePositions();
            }

            // Create image item HTML
            function createImageItem(image, index) {
                const sizeInMB = (image.size / (1024 * 1024)).toFixed(2);
                return `
                    <div class="image-item" data-index="${index}">
                        <img src="${image.src}" alt="${image.name}">
                        ${image.isPrimary ? '<div class="primary-badge">Primary</div>' : ''}
                        <div class="image-position">${index + 1}</div>
                        <div class="image-controls">
                            <button class="control-btn move-btn" onclick="moveImage(${index}, 'left')" title="Move Left">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="control-btn move-btn" onclick="moveImage(${index}, 'right')" title="Move Right">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            <button class="control-btn remove-btn" onclick="removeImage(${index})" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                `;
            }

            // Update image positions
            function updateImagePositions() {
                $('#imagesGrid .image-item').each(function(index) {
                    $(this).find('.image-position').text(index + 1);
                    $(this).attr('data-index', index);
                });
            }

            // Move image function
            window.moveImage = function(index, direction) {
                if (direction === 'left' && index > 0) {
                    [images[index], images[index - 1]] = [images[index - 1], images[index]];
                } else if (direction === 'right' && index < images.length - 1) {
                    [images[index], images[index + 1]] = [images[index + 1], images[index]];
                }
                renderImages();
                updateStats();
            };

            // Remove image function
            window.removeImage = function(index) {
                totalSize -= images[index].size;
                images.splice(index, 1);

                // Set new primary if removed image was primary
                if (images.length > 0 && !images.some(img => img.isPrimary)) {
                    images.isPrimary = true;
                }

                renderImages();
                updateStats();
            };

            // Update stats
            function updateStats() {
                const primaryCount = images.filter(img => img.isPrimary).length;
                const totalSizeInMB = (totalSize / (1024 * 1024)).toFixed(2);

                $('#totalImages').text(images.length);
                $('#primaryImages').text(primaryCount);
                $('#totalSize').text(totalSizeInMB + ' MB');
            }

            // Upload all images
            $('#uploadAllBtn').on('click', function() {
                if (images.length === 0) {
                    alert('Please add some images first!');
                    return;
                }

                // Simulate upload process
                const formData = new FormData();
                images.forEach((image, index) => {
                    formData.append(`image_${index}`, image.file);
                    formData.append(`image_${index}_primary`, image.isPrimary);
                });

                // Replace this with your actual upload logic
                console.log('Uploading images:', images);
                alert('Images uploaded successfully!');
            });

            // Clear all images
            $('#clearAllBtn').on('click', function() {
                if (images.length === 0) {
                    alert('No images to clear!');
                    return;
                }

                if (confirm('Are you sure you want to clear all images?')) {
                    images = [];
                    totalSize = 0;
                    renderImages();
                    updateStats();
                }
            });

            // Set image as primary
            $(document).on('click', '.image-item img', function() {
                const index = parseInt($(this).closest('.image-item').data('index'));

                // Remove primary from all images
                images.forEach(img => img.isPrimary = false);

                // Set clicked image as primary
                images[index].isPrimary = true;

                renderImages();
                updateStats();
            });
        });
    </script>
</body>

</html>