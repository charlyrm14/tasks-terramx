<?php

require 'config/database.php';
require 'app/Controllers/TaskController.php';

define('VIEWS_PATH', __DIR__ . '/app/Views');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        $controller = new TaskController();
        $controller->home();
    break;

    case '/add':
        $controller = new TaskController();
        $controller->add();
    break;

    case '/create':
        $controller = new TaskController();
        $controller->create();
    break;

    case '/edit':

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if($id){
            $controller = new TaskController();
            $controller->edit($id);
        } else {
            require VIEWS_PATH . '/404.php';
            return;
        }

    break;

    case '/update':

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if($id) {
            $controller = new TaskController();
            $controller->update($id);
        } else {
            require VIEWS_PATH . '/404.php';
            return;
        }

    break;

    default:
        require VIEWS_PATH . '/404.php';
    break;
}