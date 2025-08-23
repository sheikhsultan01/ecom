<?php
// Function to check already product added to cart
function is_product_added($product_id, $param = 'id')
{
    global $db;
    $cart = $db->select_one('carts', 'qty,id', [
        'product_id' => $product_id,
        'user_id' => LOGGED_IN_USER_ID
    ]);
    if ($cart) return $cart[$param];
    return false;
}
