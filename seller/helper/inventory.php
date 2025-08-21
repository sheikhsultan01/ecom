<?php
// Sub Categories
$jdManager->defineData('products', [
    'data' => function ($params) use ($db) {

        $pagination = $params['pagination'];
        $filters = $params['filters'];
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;
        $query = $filters['query'] ?? '';
        $category_id  = $filters['category_id'] ?? '';
        $stock = $filters['stock'] ?? '';
        $sort = $filters['sort'] ?? '';

        $conditions = [];

        // Name & SKU condition
        if (!empty($query)) {
            $conditions[] = "(p.title LIKE '%$query%' OR p.sku LIKE '%$query%')";
        }
        // Category Condition
        if (!empty($category_id)) {
            $conditions[] = "p.category_id = $category_id";
        }

        // Stock Status Condition
        if (!empty($stock)) {
            $stock_cond = getStockFilter($stock);
            $conditions[] = $stock_cond;
        }

        // Combine all WHERE conditions
        $condition = "";
        if (!empty($conditions)) {
            $condition = "WHERE " . implode(" AND ", $conditions);
        }

        // Sort Condition
        if (!empty($sort)) {
            $order_by = getOrderByClause($sort);
            $condition .= " ORDER BY $order_by";
        }

        $p_query = "SELECT p.uid,
                        p.title,
                        p.id,
                        p.sku,
                        p.images,
                        p.price,
                        p.quantity,
                        p.alert_qty,
                        c.name AS category_name
                    FROM products p
                    LEFT JOIN categories c
                    ON p.category_id = c.id
                    $condition 
                    LIMIT $limit OFFSET $offset
        ";
        $products = $db->squery($p_query);
        foreach ($products as &$product) {
            $images = json_decode($product['images'], true);
            $primaryImage = null;
            if (is_array($images)) {
                foreach ($images as $img) {
                    if (!empty($img['isPrimary'])) {
                        $primaryImage = $img['name'];
                        break;
                    }
                }
                // If not primary then select first image
                if ($primaryImage === null && !empty($images)) {
                    $primaryImage = $images[0]['name'];
                }
            }

            $product['image'] = $primaryImage;
            unset($product['images']);
        }

        // Total Products
        $total_prod = $db->squery("SELECT COUNT(p.id) AS total FROM products p $condition");

        $active_cond = "";
        $out_stock_cond = "";
        $low_stock_cond = "";
        if (!empty($conditions)) {
            $active_cond = "WHERE " . implode(" AND ", $conditions) . " AND p.status = 'active'";
            $out_stock_cond = "WHERE " . implode(" AND ", $conditions) . " AND p.quantity = 0";
            $low_stock_cond = "WHERE " . implode(" AND ", $conditions) . " AND p.quantity > 0 AND p.quantity <= p.alert_qty";
        } else {
            $active_cond = "WHERE p.status = 'active'";
            $out_stock_cond = "WHERE p.quantity = 0";
            $low_stock_cond = "WHERE p.quantity > 0 AND p.quantity <= p.alert_qty";
        }

        // Actvie Products
        $active_prod = $db->squery("SELECT COUNT(p.id) AS total FROM products p $active_cond");

        // Out of Stock products
        $out_stock_prod = $db->squery("SELECT COUNT(p.id) AS total FROM products p $out_stock_cond");

        // Low stock Products
        $low_stock_prod = $db->squery("SELECT COUNT(p.id) AS total FROM products p $low_stock_cond");

        return [
            'data' => $products,
            'stats' => [
                'total_products' => $total_prod[0]['total'],
                'active_products' => $active_prod[0]['total'],
                'out_stock_products' => $out_stock_prod[0]['total'],
                'low_stock_products' => $low_stock_prod[0]['total']
            ],
            'pagination' => [
                'total' => $total_prod[0]['total'],
                'page' => $page,
                'limit' => $limit,
            ]
        ];
    },
    'paginate' => true
]);

$jdManager->handleRequest();
