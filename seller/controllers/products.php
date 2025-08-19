<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

if (isset($_POST['saveProductData'])) {
    $title = _POST('title');
    $sku = _POST('sku');
    $category_id = _POST('category_id');
    $brand = _POST('brand');
    $tags = _POST('tags');
    $description = _POST('description');
    $price = _POST('price');
    $sale_price = _POST('sale_price');
    $cost_price = _POST('cost_price');
    $quantity = _POST('quantity');
    $alert_qty = _POST('alert_qty');
    $weight = _POST('weight');
    $status = _POST('status');
    $visibility = _POST('visibility');
    $files     = $_FILES['files'] ?? [];
    $positions = _post_param('positions', []);
    $primary = _post_param('primary', null);
    $already_exist_images = _post_param('images', '[]');

    $tags_array = explode(',', $tags);
    $json_tags = json_encode(array_map('trim', $tags_array));

    // Remove already existing images
    if (!empty($already_exist_images)) {
        foreach ($already_exist_images as $oldImage) {
            $oldPath = _DIR_ . "images/products/" . $oldImage['name'];
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }
    }

    $imagesData = [];

    if (!empty($files['name']) && is_array($files['name'])) {
        foreach ($files['name'] as $index => $fileName) {
            $tmpFile = [
                'name'     => $files['name'][$index],
                'type'     => $files['type'][$index],
                'tmp_name' => $files['tmp_name'][$index],
                'error'    => $files['error'][$index],
                'size'     => $files['size'][$index]
            ];

            if ($tmpFile['error'] === UPLOAD_ERR_OK) {
                // Upload Image
                $imageName = upload_image(_DIR_ . 'images/products/', $tmpFile);

                $imagesData[] = [
                    "index"     => intval($positions[$index] ?? $index),
                    "isPrimary" => ($primary !== null && intval($primary) === $index),
                    "name"      => $imageName
                ];
            }
        }
    }

    // Convert to JSON
    $jsonImages = json_encode($imagesData);

    $dbData = [
        'title' => $title,
        'sku' => $sku,
        'images' => $jsonImages,
        'category_id' => $category_id,
        'brand' => $brand,
        'tags' => $json_tags,
        'description' => $description,
        'price' => $price,
        'sale_price' => $sale_price,
        'cost_price' => $cost_price,
        'quantity' => $quantity,
        'alert_qty' => $alert_qty,
        'weight' => $weight,
        'status' => $status,
        'visibility' => $visibility
    ];

    $insert = $db->insert("products", $dbData);
    if ($insert) returnSuccess("Product Saved Successfully!", ['redirect' => 'inventory']);
}
