<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method
        ['categories', '/categories', 'GET'], // action, url, HTTP method
        ['category', '/category/{id}', 'GET'], // action, url, HTTP method
    ],
];