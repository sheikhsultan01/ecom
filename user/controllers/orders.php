<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

if (isset($_POST['getOrderDetails'])) {
    $id = _POST('id');

    $order = $db->select_one('orders', '*', ['id' => $id]);
    $order_statuses = $db->select('order_statuses', 'status,created_at', ['order_id' => $id]);

    $order['order_statuses'] = $order_statuses;
    if ($order && $order_statuses) returnSuccess($order);
    returnError("Failed to Fetch Order Details!");
}
