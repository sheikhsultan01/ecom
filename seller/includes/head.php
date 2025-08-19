<?php
$page_name .= " - Seller";
array_unshift($CSS_FILES, [
    'navbar.css',
    _DIR_ . 'css/AjaxHandler/skeleton.css',
]);
require_once global_file("header");
// Navbar
require_once 'components/navbar.php';
