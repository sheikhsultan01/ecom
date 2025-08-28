<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';

if (isset($_POST['placeUserOrder'])) {
    $address_uid = _POST('address_uid');
    $amount = _POST('amount');
    $addresses = json_decode(LOGGED_IN_USER['address'], true);
    $user_id = LOGGED_IN_USER_ID;

    $address = $addresses[$address_uid];

    $query = "SELECT c.id,
                    c.qty,
                    p.price,
                    p.sale_price,
                    p.title,
                    p.images
            FROM carts c
            LEFT JOIN products p
                ON c.product_id = p.id
            WHERE c.user_id = $user_id
            AND c.status = 'pending';
    ";
    $products = $db->squery($query);

    $dbData = [
        'user_id' => $user_id,
        'amount' => $amount,
        'address' => json_encode($address, JSON_UNESCAPED_UNICODE),
        'products' => json_encode($products, JSON_UNESCAPED_UNICODE)
    ];

    $insert = $db->insert('orders', $dbData);
    if ($insert) {
        // Insert order status in order_statuses
        $db->insert('order_statuses', ['status' => 'pending', 'order_id' => $insert]);

        // Update the cart item status to placed
        $cart_update = $db->update('carts', [
            'status' => 'placed'
        ], [
            'user_id' => $user_id,
            'status' => 'pending'
        ]);
        if ($cart_update) returnSuccess('Order Placed Successfully!');
    } else {
        returnError("Failed To Place Order!");
    }
}
