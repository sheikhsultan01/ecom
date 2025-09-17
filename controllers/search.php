<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';
require_once DIR . 'includes/Classes/SearchProducts.php';

// Search Products
if (isset($_POST['searchProducts'])) {
    $keyword = _POST('keyword');
    $search_result = $search->searchProducts($keyword, ['limit' => 20]);
    $products = $search_result['products'];
    foreach ($products as &$product) {
        $cart = check_cart_product($product['id']);
        $product['cart_id'] = arr_val($cart, 'cart_id', false);
        $product['product_qty'] = arr_val($cart, 'product_qty', false);

        $primary_image = getPrimaryImage($product['images']);
        $product['primary_image'] = $primary_image;
        unset($product['images']);
    }

    if ($products) returnSuccess($products);
    returnError('No Product Found!');
}
