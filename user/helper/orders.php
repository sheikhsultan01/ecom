<?php
// User Orders
$jdManager->defineData('orders', [
    'data' => function ($params) use ($db, $l_user) {

        $pagination = $params['pagination'];
        $filters = $params['filters'];
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;
        $query = $filters['query'] ?? '';
        $status = $filters['status'] ? $filters['status'] : '*';
        $start_date = $filters['start_date'] ?? '';
        $end_date = $filters['end_date'] ? $filters['end_date'] : date('Y-m-d');

        $conditions = [];
        if (!empty($query)) {
            $order_id = decodeOrderId($query);
            $conditions[] = "$order_id";
        }
        // Status Condition
        if (!empty($status) && $status != '*') {
            $conditions[] = "o.status = '$status'";
        }
        // From and to date condition
        if (!empty($start_date) && !empty($end_date)) {
            $end_date = parse_end_date($end_date);
            $conditions[] = "DATE(o.created_at) BETWEEN '$start_date' AND '$end_date'";
        }

        // Combine all WHERE conditions
        $condition = "";
        if (!empty($conditions)) {
            $condition = "WHERE " . implode(" AND ", $conditions) . " AND o.user_id = '$l_user'";
        }

        $order_query = "SELECT o.*
                        FROM orders o
                            $condition
                        ORDER BY o.id ASC LIMIT $limit OFFSET $offset";
        $orders = $db->squery($order_query);

        foreach ($orders as &$order) {
            $products = json_decode($order['products'], true);
            $order['total_items'] = count($products);
        }

        $total = $db->select("orders", 'COUNT(id) AS total', ['user_id' => $l_user]);

        return [
            'data' => $orders,
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
