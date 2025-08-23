<?php
// Featured Products
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

        $sub_total = 0;
        $total_amount = 0;
        foreach ($cart_items as &$item) {
            $primary_image = getPrimaryImage($item['images']);
            $item['primary_image'] = $primary_image;
            unset($item['images']);

            // Calculate total and subTotal
            $sub_total += $item['price'] * $item['qty'];
            $total_amount += $item['sale_price'] * $item['qty'];
        }

        $discount = $sub_total - $total_amount;

        // Total Cart items
        $total_items = $db->select("carts", 'COUNT(id) AS total', ['user_id' => $user_id, 'status' => 'pending']);

        return [
            'data' => $cart_items,
            'summary' => [
                'sub_total' => CURRENCY . $sub_total,
                'discount' => CURRENCY . $discount,
                'total_amount' => CURRENCY . $total_amount
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
