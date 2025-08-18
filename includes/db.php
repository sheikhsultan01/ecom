<?php
if (!defined('DIR')) define('DIR', './');
if (!defined('_DIR_')) define('_DIR_', DIR);
require_once _DIR_ . 'includes/inc/database.php';
@define('CLASSES', []);
$classes = [
    'jd' => _DIR_ . "includes/Classes/AjaxDataManager.php"
];
foreach (CLASSES as $class) {
    $path = arr_val($classes, $class);
    if ($path) require_once $path;
}

define('GOOGLE_MAP_API_KEY', 'AIzaSyBOrKDmZxBbAC6YzHOytavSoIJZWaIm6eY');
define('GOOGLE_MAP_URL', 'https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_MAP_API_KEY . '&libraries=places');
