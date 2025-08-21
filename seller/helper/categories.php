<?php
$jdManager->defineData('categories', [
    'data' => function ($params) use ($db) {

        $pagination = $params['pagination'];
        $filters = $params['filters'];
        // Pagination settings
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;
        $query = $filters['query'] ?? '';

        $condition = " WHERE c.parent_id = 0";
        if (!empty($query)) {
            $condition .= " AND (c.name LIKE '%$query%' OR c.description LIKE '%$query%')";
        }

        $cat_query = "SELECT c.id,
                    c.name,
                    c.slug,
                    c.description,
                    c.image,
                    c.status,
                    c.created_at
                    FROM categories c
                    $condition 
                    ORDER BY c.id DESC LIMIT $limit OFFSET $offset";
        $categories = $db->squery($cat_query);

        // All categories 
        $all_categories = $db->select("categories", 'id,name', ['parent_id' => 0]);

        return [
            'data' => $categories,
            'categories' => $all_categories,
            'pagination' => [
                'total' => count($all_categories),
                'page' => $page,
                'limit' => $limit,
            ]
        ];
    },
    'paginate' => true
]);

// Sub Categories
$jdManager->defineData('subCategories', [
    'data' => function ($params) use ($db) {

        $pagination = $params['pagination'];
        $filters = $params['filters'];
        // Pagination settings
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;
        $query = $filters['query'] ?? '';

        $condition = " WHERE c.parent_id != 0";
        if (!empty($query)) {
            $condition .= " AND (c.name LIKE '%$query%' OR c.description LIKE '%$query%')";
        }

        $cat_query = "SELECT c.id,
                    c.name,
                    c.slug,
                    c.description,
                    c.image,
                    c.status,
                    p.name as parent_name,
                    c.created_at
                    FROM categories c
                    LEFT JOIN categories p
                        ON c.parent_id  = p.id
                    $condition 
                    ORDER BY c.id DESC LIMIT $limit OFFSET $offset";
        $subCategories = $db->squery($cat_query);

        $total_sub_cat = $db->squery("SELECT COUNT(*) AS total FROM categories WHERE parent_id != 0");

        return [
            'data' => $subCategories,
            'pagination' => [
                'total' => $total_sub_cat[0]['total'],
                'page' => $page,
                'limit' => $limit,
            ]
        ];
    },
    'paginate' => true
]);

$jdManager->handleRequest();
