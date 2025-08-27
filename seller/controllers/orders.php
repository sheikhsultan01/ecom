<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

// Update order status
if (isset($_POST['updateOrderStatus'])) {
    $id = _POST('id');
    $status = _POST('status');

    $update = $db->update('orders', ['status' => $status], ['id' => $id]);
    if ($update) returnSuccess('Order Status Updated Successfully!');
    returnError('Failed to update status!');
}
