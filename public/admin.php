<?php

define('ROOT', dirname(__DIR__));

use App\App;
use Core\Auth\DBAuth;

require_once ROOT . '/app/App.php';

App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 'home';
}

ob_start();

if($page === 'home'){
    require ROOT . '/app/pages/admin/index.php';
} else if ($page === 'restaurant'){
        require ROOT . '/pages/admin/restaurant/index.php';
} elseif($page === 'restaurant.create'){
    require ROOT . '/pages/admin/restaurant/create.php';
} else if($page === 'restaurant.edit'){
    require ROOT . '/pages/admin/restaurant/edit.php';
} else if($page === 'restaurant.delete'){
    require ROOT . '/pages/admin/restaurant/delete.php';
} else if ($page === 'cookingStyle'){
    require ROOT . '/pages/admin/cookingStyle/index.php';
} else if($page === 'cookingStyle.create'){
    require ROOT . '/pages/admin/cookingStyle/create.php';
} else if($page === 'cookingStyle.edit'){
    require ROOT . '/pages/admin/cookingStyle/edit.php';
} else if($page === 'cookingStyle.delete'){
    require ROOT . '/pages/admin/cookingStyle/delete.php';
}


$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';