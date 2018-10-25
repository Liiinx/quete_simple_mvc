<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['add', '/item/add', ['GET', 'POST']],
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method

    ],
    'Category' => [ // Controller
        ['categories', '/categories', 'GET'], // action, url, HTTP method
        ['category', '/category/{id}', 'GET'], // action, url, HTTP method
    ],
];