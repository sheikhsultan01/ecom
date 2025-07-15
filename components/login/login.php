<form id="signinForm" class="auth-form ajax-form" action="authorize">
    <div class="form-title">
        <h3>Sign In</h3>
    </div>
    <div class="form-subtitle">Enter your credentials to access your account</div>

    <div id="signinAlert"></div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" id="signinEmail" name="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <label class="form-label">Password</label>
        <div class="password-input">
            <input type="password" class="form-control" id="signinPassword" name="password" placeholder="Enter your password" required>
            <i class="hgi hgi-stroke hgi-view password-toggle"></i>
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="loginUser" value="true">
        <button type="submit" class="btn-primary">Sign In</button>
    </div>

    <div class="form-footer">
        <a href="#" class="form-link" onclick="showForm('forgot')">Forgot Password?</a>
    </div>

    <div class="divider">
        <span>or</span>
    </div>

    <div class="form-footer">
        <span>Don't have an account? </span>
        <a href="#" class="form-link" onclick="showForm('signup')">Sign Up</a>
    </div>
</form>