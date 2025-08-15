<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

if (isset($_POST['saveCategoryData'])) {
    $name = _POST('name');
    $slug = _POST('slug');
    $description = _POST('description');
    $status = _POST('status');

    $dbData = [
        'name' => $name,
        'parent_id' => $parent_id,
        'slug' => $slug,
        'description' => $description,
        'status' => $status
    ];
}

if (isset($_POST['saveSubCategory'])) {
    $name = _POST('name');
    $parent_id = _POST('parent_id');
    $slug = _POST('slug');
    $description = _POST('description');
    $status = _POST('status');

    $dbData = [
        'name' => $name,
        'parent_id' => $parent_id,
        'slug' => $slug,
        'description' => $description,
        'status' => $status
    ];
}
