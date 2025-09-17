<div class="modal fade" id="mdlSaveSubCategory" tabindex="-1" aria-labelledby="addSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubcategoryModalLabel"><span name="modalHeading">Add</span> Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSubcategoryForm" class="js-form" action="categories" on-success="jdRefreshAndHideModal('subCategories','mdlSaveSubCategory');" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subcategoryName" class="form-label">Subcategory Name*</label>
                            <input type="text" class="form-control" name="name" id="subcategoryName" placeholder="Enter subcategory name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="subcategorySlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" id="subcategorySlug" placeholder="subcategory-slug">
                            <small class="text-muted">Leave empty to generate automatically</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="parentCategory" class="form-label">Parent Category*</label>
                            <select jd-ref="categories" jd-for="categories" class="form-control" id="parentCategory" name="parent_id" required>
                                <option value="${id}">${name}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="subcategoryStatus" class="form-label">Status</label>
                            <select class="form-control" id="subcategoryStatus" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="subcategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="subcategoryDescription" name="description" rows="3" placeholder="Enter subcategory description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subcategory Image</label>
                        <div class="image-upload" id="subcategoryImageUpload">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Drag & drop an image or click to browse</p>
                            <p class="upload-hint">Recommended size: 512x512px (Max: 2MB)</p>
                        </div>
                        <input type="file" id="subcategoryImageInput" name="upload_image" class="d-none" accept="image/*">
                        <input class="d-none" type="text" name="image">
                        <img src="" id="subcategoryImagePreview" class="image-preview">
                    </div>
                    <div class="modal-footer">
                        <input class="d-none" type="text" name="id">
                        <input type="hidden" name="saveSubCategory" value="true">
                        <button type="button" class="btn btn-outline-filter" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-filter" id="saveSubcategoryBtn">Save Subcategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>