<?php
$page_name .= " - User";
array_unshift($CSS_FILES, [
    'navbar.css',
    'sidebar.css',
    _DIR_ . 'css/AjaxHandler/skeleton.css',
]);
require_once global_file("header");
// Navbar
require_once 'components/navbar.php';
// Sidebar
require_once 'components/sidebar.php';
