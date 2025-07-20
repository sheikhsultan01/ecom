<?php
require_once 'includes/db.php';
$page_name = 'Profile';

$CSS_FILES = [
    _DIR_ . 'css/cropper.min.css',
    'profile.css'
];

$JS_FILES = [
    _DIR_ . 'js/cropper.min.js',
    'profile.js'
];

require_once 'includes/head.php';
?>
<div class="profile-container">
    <!-- Profile Header -->
    <?php require_once 'components/profile/header.php'; ?>
    <!-- Profile Tabs -->
    <?php require_once 'components/profile/profile-tabs.php'; ?>
</div>

<!-- Add/Edit Address Modal -->
<?php require_once 'components/profile/address-modal.php'; ?>

<!-- Profile Picture Upload/Crop Modal -->
<?php require_once 'components/profile/crop-modal.php'; ?>

<!-- Success Notification -->
<div class="notification d-none" id="successNotification">
    <i class="bi bi-check-circle"></i>
    <span id="notificationText">Changes saved successfully!</span>
</div>
<script src="<?= GOOGLE_MAP_URL ?>"></script>
<?php require_once 'includes/foot.php'; ?>