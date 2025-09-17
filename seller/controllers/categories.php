<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

if (isset($_POST['saveCategoryData'])) {
    $id = _post_param('id', false);
    $name = _POST('name');
    $slug = _POST('slug');
    $description = _POST('description');
    $status = _POST('status');
    $already_exist_image = _post_param('image');

    // save employee image
    $image = isset($_FILES['upload_image']) ? $_FILES['upload_image'] : null;
    if ($image) {
        // Unlink employee image
        if ($already_exist_image != '') {
            if (file_exists(_DIR_ . "images/assets/" . $already_exist_image)) {
                @unlink(_DIR_ . "images/assets/" . $already_exist_image);
            }
        }
        // Upload avatar
        $image_name = upload_image(_DIR_ . 'images/assets/', $_FILES['upload_image']);
    } else {
        if ($already_exist_image !== '') {
            $image_name = $already_exist_image;
        }
    }

    $dbData = [
        'name' => $name,
        'slug' => $slug,
        'image' => $image_name,
        'description' => $description,
        'status' => $status
    ];

    $save = false;
    if ($id) {
        $save = $db->update("categories", $dbData, ['id' => $id]);
    } else {
        $dbData['uid'] = getRandom(25);
        $save = $db->insert("categories", $dbData);
    }

    if ($save) returnSuccess("Saved Category Successfully!");
}

if (isset($_POST['saveSubCategory'])) {
    $id = _post_param('id', false);
    $name = _POST('name');
    $parent_id = _POST('parent_id');
    $slug = _POST('slug');
    $description = _POST('description');
    $status = _POST('status');
    $already_exist_image = _post_param('image');

    // save employee image
    $image = isset($_FILES['upload_image']) ? $_FILES['upload_image'] : null;
    if ($image) {
        // Unlink employee image
        if ($already_exist_image != '') {
            if (file_exists(_DIR_ . "images/assets/" . $already_exist_image)) {
                @unlink(_DIR_ . "images/assets/" . $already_exist_image);
            }
        }
        // Upload avatar
        $image_name = upload_image(_DIR_ . 'images/assets/', $_FILES['upload_image']);
    } else {
        if ($already_exist_image !== '') {
            $image_name = $already_exist_image;
        }
    }

    $dbData = [
        'name' => $name,
        'parent_id' => $parent_id,
        'slug' => $slug,
        'description' => $description,
        'image' => $image_name,
        'status' => $status
    ];

    $save = false;
    if ($id) {
        $save = $db->update("categories", $dbData, ['id' => $id]);
    } else {
        $dbData['uid'] = getRandom(25);
        $save = $db->insert("categories", $dbData);
    }

    if ($save) returnSuccess("Saved Sub Category Successfully!");
}
