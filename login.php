<?php
require_once 'includes/db.php';
$page_name = 'Login';

$CSS_FILES = [
    'login.css'
];

$JS_FILES = [
    'login.js'
];

require_once 'includes/head.php';
?>

<div class="auth-container">
    <div class="row g-0 h-100">
        <div class="col-lg-5 d-none d-lg-block">
            <div class="auth-left h-100">
                <div class="logo">
                    <i class="hgi hgi-stroke hgi-accident"></i>
                </div>
                <h2 id="welcomeTitle">Welcome Back!</h2>
                <p id="welcomeSubtitle">Sign in to your account to continue your journey with us.</p>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="auth-right">
                <!-- Sign In Form -->
                <?php require_once 'components/login/login.php'; ?>

                <!-- Sign Up Form -->
                <?php require_once 'components/login/register.php'; ?>

                <!-- Forgot Password Form -->
                <?php require_once 'components/login/forgot.php'; ?>

                <!-- Reset Password Form -->
                <?php require_once 'components/login/reset-password.php'; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/foot.php'; ?>