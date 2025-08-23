<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';
require_once DIR . "includes/Classes/TCDelete.php";

$_delete->set([
    'cart' => 'carts'
]);

$_delete->init();
