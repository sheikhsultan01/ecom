<?php
define('INCLUDE_CUSTOM_CSS', false);
$page_name .= " - User";
array_unshift($CSS_FILES, [
    DIR . 'css/navbar.css',
    DIR . 'css/sidebar.css',
]);
require_once global_file("header");
// Navbar
require_once 'components/navbar.php';
// Sidebar
require_once 'components/sidebar.php';
