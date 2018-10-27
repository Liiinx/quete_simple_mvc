<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['add', '/item/add', ['GET', 'POST']],
        ['delete', '/item/delete/{id:\d+}', 'GET'],
        ['show', '/item/{id:\d+}', 'GET'], // action, url, HTTP method

    ],
    'Category' => [ // Controller
        ['categories', '/categories', 'GET'], // action, url, HTTP method
        ['category', '/category/{id:\d+}', 'GET'], // action, url, HTTP method
    ],
];