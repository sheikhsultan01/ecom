<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

if (isset($_POST['updateUserProfile'])) {
    $uid = _POST('uid');
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

    $update = $db->update('users', $dbData, ['uid' => $uid]);
    if ($update) returnSuccess("Profile Updated Successfully!");
}
