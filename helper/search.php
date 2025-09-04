<?php
// Featured Products
$jdManager->defineData('products', [
    'data' => function ($params) use ($db, $search_key, $search) {

        $pagination = $params['pagination'];
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;

        $search_result = $search->searchProducts($search_key, ['limit' => $limit, 'offset' => $offset]);
        $products = $search_result['products'];
        foreach ($products as &$product) {
            $cart = check_cart_product($product['id']);
            $product['cart_id'] = arr_val($cart, 'cart_id', false);
            $product['product_qty'] = arr_val($cart, 'product_qty', false);

            $primary_image = getPrimaryImage($product['images']);
            $product['primary_image'] = $primary_image;
            unset($product['images']);
        }

        return [
            'data' => $products,
            'pagination' => [
                'total' => $search_result['total'],  // Total Products
                'page' => $page,
                'limit' => $limit
            ]
        ];
    },
    'paginate' => true
]);

$jdManager->handleRequest();
