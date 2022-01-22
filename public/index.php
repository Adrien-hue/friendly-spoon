<?php

define('ROOT', dirname(__DIR__));

use App\App;

require_once ROOT . '/app/App.php';

App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 'home';
}

ob_start();

if($page === 'home'){
    require ROOT . '/pages/home.php';
} else if ($page === 'restaurant'){
    require ROOT . '/pages/restaurant/restaurant.php';
} else if ($page === 'cookingStyle'){
    require ROOT . '/pages/cookingStyle/cookingStyle.php';
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';