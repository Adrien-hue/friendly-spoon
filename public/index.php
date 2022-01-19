<?php

use App\App;
use App\Autoloader;
use App\Config;

require '../app/Autoloader.php';

Autoloader::register();

$app = App::getInstance();

$config = new Config();

