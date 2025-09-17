<div class="modal fade" id="mdlSaveCategory" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel"><span name="modalHeading">Add</span> Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm" class="js-form" action="categories" on-success="jdRefreshAndHideModal('categories','mdlSaveCategory')" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="categoryName" class="form-label">Category Name*</label>
                            <input type="text" class="form-control" name="name" id="categoryName" placeholder="Enter category name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="categorySlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" id="categorySlug" placeholder="category-slug">
                            <small class="text-muted">Leave empty to generate automatically</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="categoryDescription" rows="3" placeholder="Enter category description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category Image</label>
                        <div class="image-upload" id="categoryImageUpload">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Drag & drop an image or click to browse</p>
                            <p class="upload-hint">Recommended size: 512x512px (Max: 2MB)</p>
                        </div>
                        <input type="file" id="categoryImageInput" name="upload_image" class="d-none" accept="image/*">
                        <input class="d-none" type="text" name="image">
                        <img src="" id="categoryImagePreview" class="image-preview">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="categoryStatus" class="form-label">Status</label>
                            <select class="form-control" id="categoryStatus" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="d-none" type="text" name="id">
                        <input type="hidden" name="saveCategoryData" vlaue='true'>
                        <button type="button" class="btn btn-outline-filter" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-filter">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>