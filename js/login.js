// SignUp Before Callback
ss.fn.bc.signUpBC = function ($form) {
    let password = $form.find('.password').val(),
        cPassword = $form.find('.c-password').val();
    if (password !== cPassword) {
        let $el = $form.find('.password-label');
        appendErrorMessage($el, "Password & Confirm Password Not Matching!");
        return false;
    }
    return true;
}

// SignUp Callback
ss.fn.cb.signUpCB = function ($form, res) {
    if (res.status === "success") {
        $form.trigger('reset');
        sAlert(res.data, 'success');
        location.assign(res.redirect);
    } else {
        sAlert(res.data, 'error');
    }
}

// Forget callback
ss.fn.cb.forgotCB = function ($form, res) {
    let { data, status } = res;
    if (status === "success") {
        notify(data.msg, status);
        showForm('verifyOtp');
        $('#verifyOtpForm').find('.user-email').val(data.email);
        $('#verifyOtpForm').find('.resend-pass-otp-btn').attr('data-submit', JSON.stringify({ "resendPassVerifyOtp": true, "email": data.email }));
        $('#resetForm').find('.user-email').val(data.email);
    } else {
        notify(res.data, 'error');
    }
}

// Verify OTP callback
ss.fn.cb.verifyOtpCB = function ($form, res) {
    if (res.status === "success") {
        $form.trigger('reset');
        notify(res.data, 'success');
        showForm('reset');
    } else {
        sAlert(res.data, 'error');
    }
}

// Callbefore of update password
ss.fn.bc.updatePasswordCB = function ($form) {
    const newPassword = $form.find('#newPassword').val();
    const confirmPassword = $form.find('#confirmPassword').val();

    console.log(newPassword, " - ", confirmPassword);

    // Check if new password and confirm password match
    if (newPassword !== confirmPassword) {
        notify("New Password is not matching with confirm Password", 'error');
        return false;
    }
    return true;
}

ss.fn.cb.updatePasswordCB = function ($form, res) {
    let { data, status } = res;
    if (status == 'success') {
        $form.trigger('reset');
        notify(data, status);
        showForm('signin');
        return;
    }
    notify(data, status);
}

// Form switching functionality
function showForm(formType) {
    // Hide all forms
    $('.auth-form').addClass('hidden');

    // Show selected form
    $('#' + formType + 'Form').removeClass('hidden');

    // Update welcome message
    const welcomeTitle = $('#welcomeTitle');
    const welcomeSubtitle = $('#welcomeSubtitle');

    switch (formType) {
        case 'signin':
            welcomeTitle.text('Welcome Back!');
            welcomeSubtitle.text('Sign in to your account to continue your journey with us.');
            break;
        case 'signup':
            welcomeTitle.text('Join Us Today!');
            welcomeSubtitle.text('Create your account and start your amazing journey.');
            break;
        case 'forgot':
            welcomeTitle.text('Reset Password');
            welcomeSubtitle.text('Don\'t worry, we\'ll help you get back to your account.');
            break;
        case 'verifyOtp':
            welcomeTitle.text('Verify OTP');
            welcomeSubtitle.text('Enter OTP to verify your account');
            break;
        case 'reset':
            welcomeTitle.text('New Password');
            welcomeSubtitle.text('Create a strong password for your account.');
            break;
    }
}

// Show alert message
function showAlert(formType, message, type = 'danger') {
    const alertDiv = $(formType + 'Alert');
    alertDiv.html(`<div class="alert alert-${type}">${message}</div>`);
    setTimeout(() => {
        alertDiv.html('');
    }, 5000);
}

// Form validation and submission
$(document).ready(function () {
    // Sign In Form
    $('#signinForm').on('submit', function (e) {
        e.preventDefault();
        const email = $('#signinEmail').val();
        const password = $('#signinPassword').val();

        if (!email || !password) {
            showAlert('signin', 'Please fill in all fields.');
            return;
        }

        // Simulate API call
        setTimeout(() => {
            showAlert('signin', 'Sign in successful! Redirecting...', 'success');
        }, 1000);
    });

    // Reset Password Form
    $('#resetForm').on('submit', function (e) {
        e.preventDefault();
        const newPassword = $('#resetPassword').val();
        const confirmPassword = $('#confirmResetPassword').val();

        if (!newPassword || !confirmPassword) {
            showAlert('reset', 'Please fill in all fields.');
            return;
        }

        if (newPassword !== confirmPassword) {
            showAlert('reset', 'Passwords do not match.');
            return;
        }

        if (newPassword.length < 6) {
            showAlert('reset', 'Password must be at least 6 characters long.');
            return;
        }

        // Simulate API call
        setTimeout(() => {
            showAlert('reset', 'Password reset successful! Please sign in.', 'success');
            setTimeout(() => {
                showForm('signin');
            }, 2000);
        }, 1000);
    });
});