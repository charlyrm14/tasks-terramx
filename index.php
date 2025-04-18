<?php

require 'config/database.php';

define('VIEWS_PATH', __DIR__ . '/app/Views');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        require VIEWS_PATH . '/home.php';
    break;

    case '/add':
        require VIEWS_PATH . '/add.php';
    break;

    default:
        require VIEWS_PATH . '/404.php';
    break;
}