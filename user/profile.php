<?php
define('_DIR_', '../');
require_once 'includes/db.php';
require_once 'helper/profile.php';
$page_name = 'Profile';

$CSS_FILES = [
    _DIR_ . 'css/cropper.min.css',
    'profile.css'
];

$JS_FILES = [
    _DIR_ . 'js/cropper.min.js',
    'profile.js'
];
add_assets_template('map-selector');

require_once 'includes/head.php';
?>
<div class="profile-container">
    <!-- Profile Header -->
    <?php require_once 'components/profile/header.php'; ?>
    <!-- Profile Tabs -->
    <?php require_once 'components/profile/profile-tabs.php'; ?>
</div>

<!-- Add/Edit Address Modal -->
<?php
$request_name = 'userAddress';
require_once _DIR_ . 'components/modals/address-modal.php';
?>

<!-- Profile Picture Upload/Crop Modal -->
<?php require_once 'components/profile/crop-modal.php'; ?>

<script src="<?= GOOGLE_MAP_URL ?>"></script>
<?php require_once 'includes/foot.php'; ?>