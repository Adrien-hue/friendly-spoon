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

//Auth
$app = App::getInstance();

$auth = new DBAuth($app->getDb());

if(!$auth->logged()){
    $app->forbidden();
}

ob_start();

if($page === 'home'){
    require ROOT . '/pages/admin/index.php';
} else if ($page === 'restaurant'){
    if(isset($_GET['create']) && $_GET['create'] == 1){
        require ROOT . '/pages/admin/restaurant/create.php';
    } else if(isset($_GET['edit']) && $_GET['edit'] == 1){
        require ROOT . '/pages/admin/restaurant/edit.php';
    } else if(isset($_GET['delete']) && $_GET['delete'] == 1){
        require ROOT . '/pages/admin/restaurant/delete.php';
    } else {
        require ROOT . '/pages/admin/restaurant/index.php';
    }
} else if ($page === 'cookingStyle'){
    if(isset($_GET['create']) && $_GET['create'] == 1){
        require ROOT . '/pages/admin/cookingStyle/create.php';
    } else if(isset($_GET['edit']) && $_GET['edit'] == 1){
        require ROOT . '/pages/admin/cookingStyle/edit.php';
    } else if(isset($_GET['delete']) && $_GET['delete'] == 1){
        require ROOT . '/pages/admin/cookingStyle/delete.php';
    } else {
        require ROOT . '/pages/admin/cookingStyle/index.php';
    }
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';