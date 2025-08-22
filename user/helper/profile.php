<?php
// User Addresses
$jdManager->defineData('userAddress', [
    'data' => function ($params) use ($db) {

        $pagination = $params['pagination'];
        $limit = intval(arr_val($pagination, 'limit', 10));
        $page = intval(arr_val($pagination, 'page', 1));
        $offset = ($page - 1) * $limit;

        $user = $db->select_one('users', 'address,phone,name', ['id' => LOGGED_IN_USER_ID]);
        $address = json_decode($user['address'], true);
        $addresses = array_values($address);
        foreach ($addresses as &$value) {
            $value['phone'] = $user['phone'];
            $value['name'] = $user['name'];
        }

        return [
            'data' => $addresses,
            'pagination' => [
                'total' => count($address),
                'page' => $page,
                'limit' => $limit
            ]
        ];
    },
    'paginate' => true
]);

$jdManager->handleRequest();
