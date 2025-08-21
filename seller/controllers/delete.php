<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';
require_once _DIR_ . "includes/Classes/TCDelete.php";

$_delete->set([
    'category' => 'categories',
    'product' => 'products',
]);

// On Delete Product
$_delete->on('product', function ($self, $data) {
    global $db;
    $product_id = $data['id'];
    $product = $db->select_one('products', 'images', ['id' => $product_id]);
    $images = json_decode($product['images'], true);
    $names = array_column($images, "name");

    foreach ($names as $name) {
        $oldPath = _DIR_ . "images/products/" . $name;
        if (file_exists($oldPath)) {
            @unlink($oldPath);
        }
    }

    return true;
});

$_delete->init();
