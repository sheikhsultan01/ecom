<?php
$VERIFY_LOGIN = false;
require_once 'includes/db.php';
$is_verified = is_user_verified();
if (!$VERIFY_LOGIN && $is_verified) header("Location: login");
$page_name = 'Verify OTP';

$CSS_FILES = [
    'verify-otp.css'
];

$JS_FILES = [
    'verify-otp.js'
];

define('INCLUDE_NAVBAR', false);
define('INCLUDE_FOOTER', false);
require_once 'includes/head.php';
?>

<div class="auth-container">
    <div class="row g-0 h-100">
        <div class="col-lg-12">
            <div class="auth-right">
                <form id="signinForm" class="auth-form ajax-form" action="controllers/authorize">
                    <div class="form-title">
                        <h3>Verify OTP</h3>
                    </div>
                    <div class="form-subtitle">Enter OTP to verify your account</div>

                    <div class="otp-group">
                        <input type="text" maxlength="1" class="form-control otp-input" required>
                        <input type="text" maxlength="1" class="form-control otp-input" required>
                        <input type="text" maxlength="1" class="form-control otp-input" required>
                        <input type="text" maxlength="1" class="form-control otp-input" required>
                        <input type="text" maxlength="1" class="form-control otp-input" required>
                        <input type="text" maxlength="1" class="form-control otp-input" required>
                    </div>
                    <a href="#" class="text-decoration-none ss-jx-element" data-target="authorize" data-submit='{"resendUserVerifyOtp" : true}' data-callback="resendOtpCB">Resend OTP</a>
                    <div class="form-group">
                        <input type="hidden" name="verifyUserOtp" value="true">
                        <input type="hidden" name="otp" id="otpFull">
                        <button type="submit" class="btn-primary">Verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/foot.php'; ?>