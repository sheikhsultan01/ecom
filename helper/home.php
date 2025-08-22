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
            $images = json_decode($product['images'], true);
            $primaryImage = null;
            if (is_array($images)) {
                foreach ($images as $img) {
                    if (!empty($img['isPrimary'])) {
                        $primaryImage = $img['name'];
                        break;
                    }
                }
                // If not primary then select first image
                if ($primaryImage === null && !empty($images)) {
                    $primaryImage = $images[0]['name'];
                }
            }

            $product['image'] = $primaryImage;
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
