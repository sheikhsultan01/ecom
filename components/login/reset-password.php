<form id="resetForm" class="auth-form hidden ajax-form" action="controllers/authorize" data-callbefore="updatePasswordCB" data-callback="updatePasswordCB">
    <div class="form-title">
        <h3>Reset Password</h3>
    </div>
    <div class="form-subtitle">Enter your new password</div>

    <div id="resetAlert"></div>

    <div class="form-group">
        <label class="form-label">New Password</label>
        <div class="password-input">
            <input type="password" name="password" class="form-control" id="newPassword" placeholder="Enter new password" required>
            <i class="hgi hgi-stroke hgi-view password-toggle"></i>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Confirm New Password</label>
        <div class="password-input">
            <input type="password" class="form-control" name="c_password" id="confirmPassword" placeholder="Confirm new password" required>
            <i class="hgi hgi-stroke hgi-view password-toggle password-toggle"></i>
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="updateUserPassword">
        <input type="email" name="email" class="d-none user-email">
        <button type="submit" class="btn-primary">Reset Password</button>
    </div>

    <div class="form-footer">
        <a href="#" class="form-link" onclick="showForm('signin')">Back to Sign In</a>
    </div>
</form>