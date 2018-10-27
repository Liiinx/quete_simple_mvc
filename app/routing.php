<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['add', '/item/add', ['GET', 'POST']],
        ['delete', '/item/delete/{id:\d+}', 'GET'],
        ['edit', '/item/edit/{id:\d+}', ['GET', 'POST']],
        ['show', '/item/{id:\d+}', 'GET'], // action, url, HTTP method

    ],
    'Category' => [ // Controller
        ['categories', '/categories', 'GET'], // action, url, HTTP method
        ['add', '/category/add', ['GET', 'POST']],
        ['edit', '/category/edit/{id:\d+}', ['GET', 'POST']],
        ['delete', '/category/delete/{id:\d+}', 'GET'],
        ['category', '/category/{id:\d+}', 'GET'], // action, url, HTTP method
    ],
];