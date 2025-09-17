<form id="signupForm" class="auth-form ajax-form hidden" action="controllers/authorize" data-callback="signUpCB" data-callbefore="signUpBC">
    <div class="form-title">
        <h3>Sign Up</h3>
    </div>
    <div class="form-subtitle">Create a new account to get started</div>

    <div class="form-group">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" id="signupName" placeholder="Enter your full name" required>
    </div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="signupEmail" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <div class="label-group password-label">
            <label class="form-label">Password</label>
        </div>
        <div class="password-input">
            <input type="password" class="form-control password" name="password" id="signupPassword" placeholder="Create a password" required>
            <i class="hgi hgi-stroke hgi-view password-toggle"></i>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Confirm Password</label>
        <div class="password-input">
            <input type="password" class="form-control c-password" name="c_password" id="confirmPassword" placeholder="Confirm your password" required>
            <i class="hgi hgi-stroke hgi-view password-toggle"></i>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn-primary">Sign Up</button>
        <input type="hidden" name="registerUser" value="true">
    </div>

    <div class="form-footer">
        <span>Already have an account? </span>
        <a href="#" class="form-link" onclick="showForm('signin')">Sign In</a>
    </div>
</form>