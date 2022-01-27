<?php

use App\App;

$cookingStyleTable = App::getInstance()->getTable('CookingStyle');

if(!empty($_POST)){
    $result = $cookingStyleTable->delete($_POST['id']);

    if($result){
        header('Location: admin.php?page=cookingStyle');
    }
}
