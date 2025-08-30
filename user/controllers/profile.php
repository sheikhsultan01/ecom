<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

// Update User Profile
if (isset($_POST['updateUserProfile'])) {
    $fname = _POST('fname');
    $lname = _POST('lname');
    $phone = _POST('phone');
    $date_of_birth = _POST('date_of_birth');
    $gender = _POST('gender');
    $bio = _POST('bio');


    $dbData = [
        'fname' => $fname,
        'lname' => $lname,
        'name' => $fname . " " . $lname,
        'phone' => $phone,
        'date_of_birth' => $date_of_birth,
        'gender' => $gender,
        'bio' => $bio
    ];

    $update = $db->update('users', $dbData, ['id' => LOGGED_IN_USER_ID]);
    if ($update) returnSuccess([
        'msg' => "Profile Updated Successfully!",
        'name' => $fname . " " . $lname
    ]);
}

// Delete address from addresses in users
if (isset($_POST['deleteData'])) {
    $action = _POST('action');
    $target = _POST('target');

    // Select user address from db
    $addresses = json_decode(LOGGED_IN_USER['address'], true);

    if (isset($addresses[$target])) {
        unset($addresses[$target]);

        $addresses = json_encode($addresses, JSON_UNESCAPED_UNICODE);

        $update = $db->update('users', ['address' => $addresses], ['id' => LOGGED_IN_USER_ID]);
        if ($update) {
            returnSuccess("Address Deleted Successfully!");
        } else {
            returnError("Failed To Delete Address!");
        }
    }
}

// Update User Profile Image
if (isset($_POST['updateUserProfilePicture'])) {
    $already_exist_image = _post_param('image');

    // save employee image
    $image = isset($_FILES['upload_image']) ? $_FILES['upload_image'] : null;
    if ($image) {
        // Unlink employee image
        if ($already_exist_image != 'avatar.png') {
            if (file_exists(_DIR_ . "images/users/" . $already_exist_image)) {
                @unlink(_DIR_ . "images/users/" . $already_exist_image);
            }
        }
        // Upload avatar
        $image_name = upload_image(_DIR_ . 'images/users/', $_FILES['upload_image']);
    } else {
        if ($already_exist_image !== '') {
            $image_name = $already_exist_image;
        } else {
            $image_name = 'avatar.png';  // Default image name
        }
    }

    $update = $db->update('users', ['image' => $image_name], ['id' => LOGGED_IN_USER_ID]);
    if ($update) {
        returnSuccess([
            'msg' => 'Profile Image Updated Successfully!',
            'image' => $image_name
        ]);
    } else {
        returnError("Failed to Update Picture!");
    }
}

// Update Password
if (isset($_POST['updateUserPassword'])) {
    $password = _POST('password');
    $new_password = _POST('new_password');
    $c_password = _POST('c_password');

    if (password_verify($password, LOGGED_IN_USER['password'])) {

        if ($new_password === $c_password) $password_ = password_hash($new_password, PASSWORD_DEFAULT);

        $update = $db->update("users", ['password' => $password_], ['id' => LOGGED_IN_USER_ID]);
        if ($update) returnSuccess("Password Updated Successfully!");
    } else {
        returnError('Current Password is not matched!');
    }
}
