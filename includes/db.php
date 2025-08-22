<?php
@session_start();
if (!defined('DIR')) define('DIR', './');
if (!defined('_DIR_')) define('_DIR_', DIR);
require_once _DIR_ . 'includes/inc/database.php';
require_once "inc/asset-templates.php";

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

define('LOGGED_IN_USER', login_user([
    'session_key' => 'user_id',
    'user_table' => 'users'
]));

define('LOGGED_IN_USER_ID', LOGGED_IN_USER ? LOGGED_IN_USER['id'] : null);
$l_user = LOGGED_IN_USER_ID;

define('IS_ADMIN', is_admin());
define('IS_SELLER', is_seller());

$VERIFY_LOGIN = isset($VERIFY_LOGIN) ? $VERIFY_LOGIN : false;
if ($VERIFY_LOGIN && LOGGED_IN_USER) {
    header("Location: home");
}
