<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

function get_old_images($uid)
{
    global $db;
    $product = $db->select_one('products', 'images', ['uid' => $uid]);
    $images = json_decode($product['images'], true);
    $names = array_column($images, "name");
    return $names;
}

// Save Products data
if (isset($_POST['saveProductData'])) {
    $uid = _post_param('uid', false);
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
    $product_images_str = _post_param('product_images', '');
    $product_images = array_filter(explode(',', $product_images_str));

    // Encode the tags
    $tags_array = explode(',', $tags);
    $json_tags = json_encode(array_map('trim', $tags_array));

    // Unlink if product is updating
    if ($uid) {
        // Database Images
        $oldImagesFromDB = get_old_images($uid);

        // Check removed images
        $removedImages = array_diff($oldImagesFromDB, $product_images);

        foreach ($removedImages as $oldImage) {
            $oldPath = _DIR_ . "images/products/" . $oldImage;
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }
    }

    // Process new uploads
    $imagesData = [];

    if (!empty($files['name']) && is_array($files['name'])) {
        foreach ($files['name'] as $index => $fileName) {
            if ($fileName && $files['error'][$index] === UPLOAD_ERR_OK) {
                $tmpFile = [
                    'name'     => $files['name'][$index],
                    'type'     => $files['type'][$index],
                    'tmp_name' => $files['tmp_name'][$index],
                    'error'    => $files['error'][$index],
                    'size'     => $files['size'][$index]
                ];

                $imageName = upload_image(_DIR_ . 'images/products/', $tmpFile);

                $imagesData[] = [
                    "index"     => intval($positions[$index] ?? $index),
                    "isPrimary" => ($primary !== null && intval($primary) === $index),
                    "name"      => $imageName
                ];

                // Replace frontend file name with final uploaded name
                $key = array_search($fileName, $product_images);
                if ($key !== false) {
                    $product_images[$key] = $imageName;
                }
            }
        }
    }

    // Create final JSON (old + new)
    $finalImagesData = [];
    foreach ($product_images as $i => $imgName) {
        $finalImagesData[] = [
            "index"     => $i,
            "isPrimary" => ($primary !== null && intval($primary) === $i),
            "name"      => $imgName
        ];
    }
    $jsonImages = json_encode($finalImagesData);

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

    $save = false;
    if ($uid) {
        $save = $db->update("products", $dbData, ['uid' => $uid]);
    } else {
        $dbData['uid'] = getRandom(25);
        $save = $db->insert("products", $dbData);
    }
    if ($save) returnSuccess("Product Saved Successfully!", ['redirect' => 'inventory']);
}

// Update Product Quantity
if (isset($_POST['updateProductQuantity'])) {
    $id = _POST('id');
    $quantity = _POST('quantity');

    $update = $db->update('products', ['quantity' => $quantity], ['id' => $id]);
    if ($update) returnSuccess("Quantity Updated Successfully!");
}
