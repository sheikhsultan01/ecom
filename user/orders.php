<?php
define('_DIR_', '../');
require_once 'includes/db.php';
$page_name = 'Orders';

$CSS_FILES = [
    'orders.css'
];

$JS_FILES = [
    'orders.js'
];

require_once 'includes/head.php';
?>
<div class="orders-container">
    <!-- Page Header -->
    <?php require_once 'components/orders/page-header.php'; ?>

    <!-- Order Tabs -->
    <?php require_once 'components/orders/order-tabs.php'; ?>

    <!-- Tab Content -->
    <?php require_once 'components/orders/tab-content.php'; ?>
</div>
<?php require_once 'includes/foot.php'; ?>