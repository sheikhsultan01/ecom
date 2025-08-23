<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';

// Add to cart product
if (isset($_POST['addToCartProduct'])) {
    $unit_price = _POST('unit_price');
    $product_id = _POST('product_id');

    $dbData = [
        'qty' => 1,
        'unit_price' => $unit_price,
        'product_id' => $product_id,
        'user_id' => LOGGED_IN_USER_ID
    ];

    $insert = $db->insert("carts", $dbData);
    if ($insert) returnSuccess([
        'msg' => "Product Added Successfully!",
        'id' => $insert
    ]);
    returnError("Failed To Add Product!");
}

// Update Product quantity
if (isset($_POST['updateProductQty'])) {
    $id = _POST('id');
    $qty = _POST('qty');

    $update = $db->update('carts', ['qty' => $qty], ['id' => $id]);
    if ($update) returnSuccess("Quantity Updated Successfully");
    returnError("Failed to add Quantity!");
}
