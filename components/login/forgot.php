<form id="forgotForm" class="auth-form hidden">
    <div class="form-title">
        <h3>Forgot Password</h3>
    </div>
    <div class="form-subtitle">Enter your email to receive reset instructions</div>

    <div id="forgotAlert"></div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" id="forgotEmail" placeholder="Enter your email" required>
    </div>

    <button type="submit" class="btn-primary">Send Reset Link</button>

    <div class="form-footer">
        <a href="#" class="form-link" onclick="showForm('signin')">Back to Sign In</a>
    </div>
</form>