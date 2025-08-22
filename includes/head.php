<?php
array_unshift($CSS_FILES, [
    DIR . 'css/navbar.css',
    DIR . 'css/footer.css',
    _DIR_ . 'css/AjaxHandler/skeleton.css'
]);
require_once global_file("header");
@define('INCLUDE_NAVBAR', true);
// Navbar
if (INCLUDE_NAVBAR)
    require_once 'components/navbar.php';
