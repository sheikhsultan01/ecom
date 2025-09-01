<?php
// Orders
$jdManager->defineData('orders', [
    'data' => function ($params) use ($db) {

        $pagination = $params['pagination'];
        $filters = $params['filters'];
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;
        $query = $filters['query'] ?? '';
        $status = $filters['status'] ? $filters['status'] : 'pending';
        $start_date = $filters['start_date'] ?? '';
        $end_date = $filters['end_date'] ? $filters['end_date'] : date('Y-m-d');

        $conditions = [];
        if (!empty($query)) {
            $order_id = decodeOrderId($query);
            $conditions[] = "(u.name LIKE '%$query%' OR ($order_id))";
        }
        // Status Condition
        if (!empty($status) && $status != '*') {
            $conditions[] = "o.status = '$status'";
        }
        // From and to date condition
        $stat_cond = '';
        if (!empty($start_date) && !empty($end_date)) {
            $end_date = parse_end_date($end_date);
            $conditions[] = "DATE(o.created_at) BETWEEN '$start_date' AND '$end_date'";
            $stat_cond = " AND DATE(created_at) BETWEEN '$start_date' AND '$end_date'";
        }

        // Combine all WHERE conditions
        $condition = "";
        if (!empty($conditions)) {
            $condition = "WHERE " . implode(" AND ", $conditions);
        }

        $order_query = "SELECT o.*,
                            u.name,
                            u.fname,
                            u.lname,
                            u.phone,
                            u.image,
                            u.email
                        FROM orders o
                        LEFT JOIN users u
                            ON o.user_id  = u.id
                            $condition
                        ORDER BY o.id ASC LIMIT $limit OFFSET $offset";
        $orders = $db->squery($order_query);

        // Total Orders
        $total = $db->select("orders", 'COUNT(id) AS total');

        // Totoal Orders
        $total_orders = $db->squery("SELECT COUNT(id) AS total FROM orders $stat_cond");

        // Pending Orders
        $p_orders = $db->squery("SELECT COUNT(id) AS total FROM orders WHERE status = 'pending' $stat_cond");

        // Completed Orders
        $c_orders = $db->squery("SELECT COUNT(id) AS total FROM orders WHERE status = 'completed' $stat_cond");

        // In Transit Orders
        $transit_orders = $db->squery("SELECT COUNT(id) AS total FROM orders WHERE status = 'in_transit' $stat_cond");

        // Cancelled Orders
        $cancelled_orders = $db->squery("SELECT COUNT(id) AS total FROM orders WHERE status = 'cancelled' $stat_cond");

        return [
            'data' => $orders,
            'stats' => [
                'total' => $total_orders[0]['total'],
                'pending' => $p_orders[0]['total'],
                'completed' => $c_orders[0]['total'],
                'in_transit' => $transit_orders[0]['total'],
                'cancelled' => $cancelled_orders[0]['total'],
            ],
            'pagination' => [
                'total' => $total[0]['total'],
                'page' => $page,
                'limit' => $limit,
            ]
        ];
    },
    'paginate' => true
]);

$jdManager->handleRequest();
