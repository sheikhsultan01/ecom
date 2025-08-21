// SignUp Before Callback
callbeforeFns.signUpBC = function ($form) {
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
        showForm('signin');
    } else {
        sAlert(res.data, 'error');
    }
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

    // Sign Up Form
    // $('#signupForm').on('submit', function (e) {
    //     e.preventDefault();
    //     const name = $('#signupName').val();
    //     const email = $('#signupEmail').val();
    //     const password = $('#signupPassword').val();
    //     const confirmPassword = $('#confirmPassword').val();

    //     if (!name || !email || !password || !confirmPassword) {
    //         showAlert('signup', 'Please fill in all fields.');
    //         return;
    //     }

    //     if (password !== confirmPassword) {
    //         showAlert('signup', 'Passwords do not match.');
    //         return;
    //     }

    //     if (password.length < 6) {
    //         showAlert('signup', 'Password must be at least 6 characters long.');
    //         return;
    //     }

    //     // Simulate API call
    //     setTimeout(() => {
    //         showAlert('signup', 'Account created successfully! Please sign in.', 'success');
    //         setTimeout(() => {
    //             showForm('signin');
    //         }, 2000);
    //     }, 1000);
    // });

    // Forgot Password Form
    $('#forgotForm').on('submit', function (e) {
        e.preventDefault();
        const email = $('#forgotEmail').val();

        if (!email) {
            showAlert('forgot', 'Please enter your email address.');
            return;
        }

        // Simulate API call
        setTimeout(() => {
            showAlert('forgot', 'Password reset link sent to your email!', 'success');
            setTimeout(() => {
                showForm('reset');
            }, 2000);
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