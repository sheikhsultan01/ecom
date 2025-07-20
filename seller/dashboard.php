<?php
require_once 'includes/db.php';
$page_name = 'Dashboard';

$CSS_FILES = [
    _DIR_ . 'css/daterangepicker.min.css',
    'dashboard.css'
];

$JS_FILES = [
    _DIR_ . 'js/chart.min.js',
    _DIR_ . 'js/daterangepicker.min.js',
    'dashboard.js'
];

require_once 'includes/head.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-12">
            <!-- Welcome Card -->
            <div class="welcome-card">
                <div class="welcome-decoration">
                    <i class="hgi hgi-solid hgi-pie-chart-02"></i>
                </div>
                <h2 class="welcome-title">Welcome back, John!</h2>
                <p class="welcome-subtitle">Your store is performing well. Sales are up 12% from last month.</p>
                <div class="d-flex">
                    <button class="btn btn-light me-2">
                        <i class="fas fa-download me-1"></i> Download Report
                    </button>
                    <button class="btn btn-outline-light">
                        <i class="fas fa-bullhorn me-1"></i> New Campaign
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <?php require_once 'components/dashboard/stats.php'; ?>

            <!-- Date Range Filter -->
            <?php require_once 'components/dashboard/filters.php'; ?>

            <!-- Charts Row -->
            <?php require_once 'components/dashboard/main-charts.php'; ?>

            <!-- Recent Orders and Hot Products -->
            <?php require_once 'components/dashboard/recent-products.php'; ?>

            <!-- Additional Stats Row -->
            <?php require_once 'components/dashboard/stats-chart.php'; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/foot.php'; ?>