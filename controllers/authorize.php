<?php
define('CLASSES', ['vendor']);
define('DIR', '../');
require_once DIR . 'includes/db.php';
require_once DIR . "includes/Classes/SendEmail.php";


// Register User
if (isset($_POST['registerUser'])) {
    $name = _post_param('name');
    $email = _POST('email', ['default' => false]);
    $phone = _POST('phone', ['default' => '0']);
    $password = _post_param('password');
    $c_password = _post_param('c_password');
    $otp = getRandomNum();

    if ($password === $c_password) $password = password_hash($password, PASSWORD_DEFAULT);

    $is_already_user = $db->select_one('users', 'id', [
        'operator' => [
            'OR' => [
                'email' => $email,
                'phone' => $phone
            ]
        ]
    ]);
    if ($is_already_user) returnError("This email or phone number is already registered!");

    $dbData = [
        'name' => $name,
        'password' => $password,
        'image' => 'avatar.png',
        'verify_token' => $otp
    ];

    // Register with phone or email
    if ($phone && $phone != '0') {
        $dbData['phone'] = $phone;
    } else {
        $dbData['email'] = $email;
    }

    $_email->send([
        'template' => 'loginEmail',
        'to' => [
            [
                'email' => $email,
                'name' => $name
            ]
        ],
        'vars' => [
            'otp' => $otp
        ]
    ]);

    $insert = $db->insert('users', $dbData);
    $_SESSION['user_id'] = $insert;  // Set the user session
    if ($insert) returnSuccess("User Registered Successfully!", ['redirect' => 'verify-otp']);
}

// Login User
if (isset($_POST['loginUser'])) {
    $email = _POST('email', ['default' => false]);
    $password = _post_param('password');

    $user = $db->select_one('users', 'id, password', [
        'email' => $email
    ]);

    if (!$user) returnError("User not found!");
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $is_verified = is_user_verified();
        $redirect = $is_verified ? 'home' : 'verify-otp';
        returnSuccess("User Logged In Successfully!", ['redirect' => $redirect]);
    } else {
        returnError("Invalid Email or Password!");
    }
}

// Verified user
if (isset($_POST['verifyUserOtp'])) {
    $otp = _POST('otp', ['default' => false]);
    $user_otp = LOGGED_IN_USER['verify_token'];

    if ($otp == $user_otp) {
        $db->update('users', [
            'verify_token' => null,
            'verify_status' => 1
        ], [
            'id' => LOGGED_IN_USER_ID
        ]);
        returnSuccess("OTP Verified Successfully!", ['redirect' => 'home']);
    } else {
        returnError("Invalid OTP!");
    }
}

// Resend User Verification OTP
if (isset($_POST['resendUserVerifyOtp'])) {
    $otp = getRandomNum();
    $_email->send([
        'template' => 'loginEmail',
        'to' => [
            [
                'email' => LOGGED_IN_USER['email'],
                'name' => LOGGED_IN_USER['name']
            ]
        ],
        'vars' => [
            'otp' => $otp
        ]
    ]);

    $db->update('users', [
        'verify_token' => $otp
    ], [
        'id' => LOGGED_IN_USER_ID
    ]);

    returnSuccess("OTP Resent Successfully!");
}

// Send forget password
if (isset($_POST['forgotUserOtpSend'])) {
    $email = _POST('email', ['default' => false]);
    $user = $db->select_one('users', 'id', [
        'email' => $email
    ]);

    if ($user) {
        $otp = getRandomNum();
        $db->update('users', [
            'password_forgot_token' => $otp
        ], [
            'id' => $user['id']
        ]);

        $_email->send([
            'template' => 'loginEmail',
            'to' => [
                [
                    'email' => $email,
                    'name' => 'User'
                ]
            ],
            'vars' => [
                'otp' => $otp
            ]
        ]);

        returnSuccess([
            'msg' => "Password reset OTP has been sent to your email!",
            'email' => $email
        ]);
    } else {
        returnError("User with this email not found!");
    }
}

// Verify user forgot password
if (isset($_POST['verifyForgotPassOtp'])) {
    $otp = _POST('otp');
    $email = _POST('email');
    $user = $db->select_one('users', 'password_forgot_token', ['email' => $email]);
    $user_otp = $user['password_forgot_token'];

    if ($otp == $user_otp) {
        $db->update('users', [
            'password_forgot_token' => null
        ], [
            'email' => $email
        ]);
        returnSuccess("OTP Verified Successfully!");
    } else {
        returnError("Invalid OTP!");
    }
}

// Update Password
if (isset($_POST['updateUserPassword'])) {
    $email = _POST('email');
    $password = _POST('password');
    $c_password = _POST('c_password');

    if ($password === $c_password) $password_ = password_hash($password, PASSWORD_DEFAULT);

    $update = $db->update("users", ['password' => $password_], ['email' => $email]);
    if ($update) returnSuccess("Password Updated Successfully!");
}

if (isset($_POST['resendPassVerifyOtp'])) {
    exit;
    $email = _POST('email');
    $otp = getRandomNum();
    $db->update('users', [
        'password_forgot_token' => $otp
    ], [
        'email' => $email
    ]);
    returnSuccess("OTP Resent Successfully!");
}
