<div class="profile-header">
    <div class="row align-items-center">
        <div class="col-md-4 text-center text-md-start">
            <div class="profile-avatar-container">
                <img src="<?= SITE_URL ?>images/users/avatar.png" alt="User Avatar" class="profile-avatar" id="profileAvatar">
                <div class="avatar-upload-btn" id="uploadAvatarBtn">
                    <i class="hgi hgi-stroke hgi-camera-02"></i>
                </div>
            </div>
        </div>
        <div class="col-md-8 text-center text-md-start mt-3 mt-md-0">
            <div class="profile-info">
                <h3><?= LOGGED_IN_USER['name'] ?></h3>
                <p><?= LOGGED_IN_USER['email'] ?></p>
                <p><i class="bi bi-geo-alt me-1"></i> New York, USA</p>
                <p><small>Member since: <?= date('F Y', strtotime(LOGGED_IN_USER['created_at'])) ?></small></p>
            </div>
        </div>
    </div>
</div>