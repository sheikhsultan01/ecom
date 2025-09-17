<form id="verifyOtpForm" class="auth-form hidden ajax-form" action="controllers/authorize" data-callback="verifyOtpCB">
    <div class="form-title">
        <h3>Verify OTP</h3>
    </div>
    <div class="form-subtitle">Enter your OTP to verify your account</div>

    <div class="otp-group">
        <input type="text" maxlength="1" class="form-control otp-input" required>
        <input type="text" maxlength="1" class="form-control otp-input" required>
        <input type="text" maxlength="1" class="form-control otp-input" required>
        <input type="text" maxlength="1" class="form-control otp-input" required>
        <input type="text" maxlength="1" class="form-control otp-input" required>
        <input type="text" maxlength="1" class="form-control otp-input" required>
    </div>
    <a href="#" class="text-decoration-none ss-jx-element resend-pass-otp-btn" data-target="authorize" data-callback="resendOtpCB">Resend OTP</a>
    <div class="form-group">
        <input type="hidden" name="verifyForgotPassOtp" value="true">
        <input type="email" name="email" class="d-none user-email">
        <input type="hidden" name="otp" id="otpFull">
        <button type="submit" class="btn-primary">Verify</button>
    </div>

    <div class="form-footer">
        <a href="#" class="form-link" onclick="showForm('signin')">Back to Sign In</a>
    </div>
</form>