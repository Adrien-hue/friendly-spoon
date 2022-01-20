<?php

use App\App;
use App\Autoloader;
use App\Config;

require '../app/Autoloader.php';

Autoloader::register();

$app = App::getInstance();

$config = new Config();

$restaurant = $app->getTable('restaurant');
$cookingStyle = $app->getTable('cookingStyle');

var_dump($restaurant);
var_dump($cookingStyle);