<div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="avatarModalLabel">Update Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <input type="file" class="d-none" id="avatarUpload" accept="image/*">
                    <button class="btn btn-outline-primary" id="selectImageBtn">
                        <i class="bi bi-upload me-2"></i>Select Image
                    </button>
                </div>

                <div class="img-container d-none">
                    <img id="avatarImage" src="" alt="Avatar to crop">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary d-none" id="cropImageBtn">Crop & Save</button>
            </div>
        </div>
    </div>
</div>