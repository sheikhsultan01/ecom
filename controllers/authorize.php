<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';

// Register User
if (isset($_POST['registerUser'])) {
    $name = _post_param('name');
    $email = _POST('email', ['default' => false]);
    $phone = _POST('phone', ['default' => '0']);
    $password = _post_param('password');
    $c_password = _post_param('c_password');

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
        'image' => 'avatar.png'
    ];

    // Register with phone or email
    if ($phone && $phone != '0') {
        $dbData['phone'] = $phone;
    } else {
        $dbData['email'] = $email;
    }

    $insert = $db->insert('users', $dbData);
    if ($insert) returnSuccess("User Registered Successfully!");
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
        returnSuccess("User Logged In Successfully!", ['redirect' => 'home']);
    } else {
        returnError("Invalid Email or Password!");
    }
}
