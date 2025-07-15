<form id="resetForm" class="auth-form hidden">
    <div class="form-title">
        <h3>Reset Password</h3>
    </div>
    <div class="form-subtitle">Enter your new password</div>

    <div id="resetAlert"></div>

    <div class="form-group">
        <label class="form-label">New Password</label>
        <div class="password-input">
            <input type="password" class="form-control" id="resetPassword" placeholder="Enter new password" required>
            <i class="hgi hgi-stroke hgi-view password-toggle"></i>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Confirm New Password</label>
        <div class="password-input">
            <input type="password" class="form-control" id="confirmResetPassword" placeholder="Confirm new password" required>
            <i class="hgi hgi-stroke hgi-view password-toggle password-toggle"></i>
        </div>
    </div>

    <button type="submit" class="btn-primary">Reset Password</button>

    <div class="form-footer">
        <a href="#" class="form-link" onclick="showForm('signin')">Back to Sign In</a>
    </div>
</form>