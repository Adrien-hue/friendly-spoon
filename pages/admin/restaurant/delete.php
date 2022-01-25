<?php

use App\App;

$restaurantTable = App::getInstance()->getTable('Restaurant');

if(!empty($_POST)){
    $result = $restaurantTable->delete($_POST['id']);

    if($result){
        header('Location: admin.php?page=restaurant');
    }
}
