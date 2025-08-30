<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';

// Save user addresses
if (isset($_POST['saveUserAddressData'])) {
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
    $user = LOGGED_IN_USER;

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
    $update = $db->update('users', ['address' => $address_enc], ['id' => LOGGED_IN_USER_ID]);

    if ($update) {
        returnSuccess('Save Address Successfully!');
    } else {
        returnError('Failed to save address!');
    }
};
