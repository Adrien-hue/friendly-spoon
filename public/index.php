<?php

use App\App;
use App\Autoloader;

require '../app/Autoloader.php';

Autoloader::register();

$app = App::getInstance();


$restaurant = $app->getTable('restaurant');
$cookingStyle = $app->getTable('cookingStyle');

$restaurant->findAll();

echo '<pre>';
var_dump($restaurant->findAll());
echo '</pre>';
