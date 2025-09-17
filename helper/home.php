<?php
// Featured Products
$jdManager->defineData('featureProducts', [
    'data' => function ($params) use ($db) {

        $pagination = $params['pagination'];
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;

        $p_query = "SELECT p.uid,
                        p.title,
                        p.id,
                        p.sku,
                        p.images,
                        p.price,
                        p.sale_price,
                        p.quantity,
                        p.alert_qty,
                        c.name AS category_name
                    FROM products p
                    LEFT JOIN categories c
                    ON p.category_id = c.id
                    LIMIT $limit OFFSET $offset
        ";
        $products = $db->squery($p_query);
        foreach ($products as &$product) {
            $cart = check_cart_product($product['id']);
            $product['cart_id'] = arr_val($cart, 'cart_id', false);
            $product['product_qty'] = arr_val($cart, 'product_qty', false);

            $product['image'] = getPrimaryImage($product['images']);
            unset($product['images']);
        }

        // Total Products
        $total_prod = $db->squery("SELECT COUNT(p.id) AS total FROM products p");

        return [
            'data' => $products,
            'pagination' => [
                'total' => $total_prod[0]['total'],
                'page' => $page,
                'limit' => $limit
            ]
        ];
    },
    'paginate' => true
]);

$jdManager->handleRequest();
