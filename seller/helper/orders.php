<?php
function decodeOrderId($orderId)
{
    $parts = explode('-', strtoupper($orderId));
    $count = count($parts);

    // Map month short names to numbers
    $months = [
        "JAN" => 1, "FEB" => 2, "MAR" => 3,
        "APR" => 4, "MAY" => 5, "JUN" => 6,
        "JUL" => 7, "AUG" => 8, "SEP" => 9,
        "OCT" => 10, "NOV" => 11, "DEC" => 12
    ];

    switch ($count) {
        case 3:
            $id = (int) $parts[2];
            return "o.id = " . $id;

        case 2:
            $month = $months[$parts[0]] ?? null;
            $day   = (int) $parts[1];
            if ($month) {
                return "MONTH(o.created_at) = $month AND DAY(o.created_at) = $day";
            }
            break;

        case 1:
            $month = $months[$parts[0]] ?? null;
            if ($month) {
                return "MONTH(o.created_at) = $month";
            }
            break;
    }

    return true;
}

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
        if (!empty($start_date) && !empty($end_date)) {
            $end_date = parse_end_date($end_date);
            $conditions[] = "DATE(o.created_at) BETWEEN '$start_date' AND '$end_date'";
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

        $total = $db->select("orders", 'COUNT(id) AS total');

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
