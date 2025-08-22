<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

// Update User Profile
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

// Save user addresses
if (isset($_POST['saveUserAddressData'])) {
    $uid = _POST('uid');
    $address_uid = _post_param('address_uid', false);
    $street_address = _POST('street_address');
    $street_number = _POST('street_number');
    $town_city = _POST('town_city');
    $state = _POST('state');
    $postal_code = _POST('postal_code');
    $country = _POST('country');
    $address_type = _POST('address_type');
    $is_default = _post_check('is_default');
    $latitude = _post_param('latitude', false);
    $longitude = _post_param('longitude', false);
    $rand_id  = $address_uid ?: getRandom(10);

    // ek address block banayein
    $newAddress[$rand_id] = [
        'street_address' => $street_address,
        'street_number' => $street_number,
        'address_uid' => $rand_id,
        'town_city'     => $town_city,
        'state'         => $state,
        'postal_code'   => $postal_code,
        'country'       => $country,
        'address_type'  => $address_type,
        'latitude'      => $latitude,
        'longitude'     => $longitude,
        'is_default'    => $is_default
    ];

    // Select User data
    $user = $db->select_one("users", 'address', ['uid' => $uid]);

    $finalAddresses = [];

    if (!empty($user['address']) && $user['address'] != '{}') {
        $finalAddresses = json_decode($user['address'], true);
    }

    // Overwrite the address array if address is editable
    $finalAddresses[$rand_id] = $newAddress[$rand_id];

    // Make other addresses uncheck from default if current is defualt
    if ($is_default == 1) {
        foreach ($finalAddresses as $key => &$addr) {
            $addr['is_default'] = ($key === $rand_id) ? 1 : 0;
        }
    }

    $address_enc = json_encode($finalAddresses, JSON_UNESCAPED_UNICODE);

    // Update User address in db
    $update = $db->update('users', ['address' => $address_enc], ['uid' => $uid]);

    if ($update) {
        returnSuccess('Save Address Successfully!');
    } else {
        returnError('Failed to save address!');
    }
};

// Delete address from addresses in users
if (isset($_POST['deleteData'])) {
    $action = _POST('action');
    $target = _POST('target');

    // Select user from db
    $user = $db->select_one($action, 'address', ['id' => $extra_data]);
    $addresses = json_decode($user['address'], true);

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
