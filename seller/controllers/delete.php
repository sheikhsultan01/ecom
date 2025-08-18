<?php
define('DIR', '../');
require_once DIR . 'includes/db.php';
require_once _DIR_ . "includes/Classes/TCDelete.php";
$_delete->set([
    'category' => 'categories',
]);

$_delete->init();
