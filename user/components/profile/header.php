<div class="profile-header">
    <div class="row align-items-center">
        <div class="col-md-4 text-center text-md-start">
            <div class="profile-avatar-container">
                <img src="<?= merge_url(SITE_URL, 'images/users/', LOGGED_IN_USER['image']);  ?>" alt="User Avatar" class="profile-avatar" id="profileAvatar" data-old-image="<?= LOGGED_IN_USER['image'] ?>">
                <div class="avatar-upload-btn" id="uploadAvatarBtn">
                    <i class="hgi hgi-stroke hgi-camera-02"></i>
                </div>
            </div>
        </div>
        <?php
        $addresses = json_decode(LOGGED_IN_USER['address'], true);
        $selected = null;
        foreach ($addresses as $key => $addr) {
            if (!empty($addr['is_default']) && $addr['is_default'] == 1) {
                $selected = $addr;
                break;
            }
        }
        if (!$selected) $selected = reset($addresses);
        $user_address = $selected['state'] . ", " . $selected['town_city'] . " " . $selected['postal_code'];
        ?>
        <div class="col-md-8 text-center text-md-start mt-3 mt-md-0">
            <div class="profile-info">
                <h3 class="login-user-name"><?= LOGGED_IN_USER['name'] ?></h3>
                <p><?= LOGGED_IN_USER['email'] ?></p>
                <p><i class="hgi hgi-stroke hgi-location-01 me-1"></i> <?= $user_address ?></p>
                <p><small>Member since: <?= date('F Y', strtotime(LOGGED_IN_USER['created_at'])) ?></small></p>
            </div>
        </div>
    </div>
</div>