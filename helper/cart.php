<?php
function getUserCartItems($user_id, $type = 'total_amount')
{
    global $db;
    $cart_items = $db->squery("SELECT c.qty,
                        p.price,
                        p.sale_price 
                FROM carts c 
                    LEFT JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = $user_id
                    AND 
                      c.status = 'pending'
                ");

    // Calculate total and subTotal
    $sub_total = 0;
    $total_amount = 0;
    foreach ($cart_items as &$item) {
        $sub_total += $item['sale_price'] * $item['qty'];
        $total_amount += $item['price'] * $item['qty'];
    }

    $data = [
        'sub_total' => $sub_total,
        'total_amount' => $total_amount
    ];

    return $data[$type];
}
// Cart Items
$jdManager->defineData('cartItems', [
    'data' => function ($params) use ($db) {

        $pagination = $params['pagination'];
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;
        $user_id = LOGGED_IN_USER_ID;

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
                AND c.status = 'pending'
                ORDER BY id DESC
                LIMIT $limit OFFSET $offset
        ";
        $cart_items = $db->squery($query);

        foreach ($cart_items as &$item) {
            $primary_image = getPrimaryImage($item['images']);
            $item['primary_image'] = $primary_image;
            unset($item['images']);
        }

        // Total Cart Items
        $total_amount = getUserCartItems($user_id, 'total_amount');
        $sub_total = getUserCartItems($user_id, 'sub_total');

        $discount = $total_amount - $sub_total;

        // Total Cart items
        $total_items = $db->select("carts", 'COUNT(id) AS total', ['user_id' => $user_id, 'status' => 'pending']);

        return [
            'data' => $cart_items,
            'summary' => [
                'sub_total' => $sub_total,
                'discount' => $discount,
                'total_amount' => $total_amount,
                'addresses' => json_decode(LOGGED_IN_USER['address'], true)
            ],
            'pagination' => [
                'total' => $total_items[0]['total'],
                'page' => $page,
                'limit' => $limit
            ]
        ];
    },
    'paginate' => true
]);

$jdManager->handleRequest();
