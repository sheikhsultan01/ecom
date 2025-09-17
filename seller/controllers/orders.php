<?php
define('DIR', '../');
define('_DIR_', DIR . '../');
require_once _DIR_ . 'includes/db.php';

// Update order status
if (isset($_POST['updateOrderStatus'])) {
    $id = _POST('id');
    $status = _POST('status');

    // Insert status history if already not exist
    $is_status_exist = $db->select_one('order_statuses', 'id', ['status' => $status, 'order_id' => $id]);
    if (!$is_status_exist) {
        $update = $db->update('orders', ['status' => $status], ['id' => $id]);
        if ($update) {
            $insert = $db->insert('order_statuses', ['status' => $status, 'order_id' => $id]);
            if ($insert) returnSuccess('Order Status Updated Successfully!');
        }
    }
    returnError('Failed to update status!');
}
