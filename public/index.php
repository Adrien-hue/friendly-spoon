<?php

define('ROOT', dirname(__DIR__));

use App\App;

require_once ROOT . '/app/App.php';

App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 'restaurant.index';
}

$page = explode('.', $page);

if($page[0] === 'admin'){
    $controller_name = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $method = $page[2];
} else {
    $controller_name = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $method = $page[1];
}

$controller = new $controller_name();

$controller->$method();