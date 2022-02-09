<?php

define('ROOT', dirname(__DIR__));

error_reporting(-1);
ini_set('display_errors', 1);

use App\App;

require_once ROOT . '/app/App.php';

App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 'app.index';
}
// URL like : controller.view or admin.controller.view
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



// https://www.tripadvisor.com/Restaurants-g780713-Serris_Marne_la_Vallee_Seine_et_Marne_Ile_de_France.html
// https://codepen.io/LoneFox/pen/OJVjPeg