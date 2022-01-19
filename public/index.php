<?php
require '../app/Autoloader.php';

App\Autoloader::register();

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 'home';
}

// Initializing objects
$db = new App\Database('friendly_spoon');

ob_start();

switch ($page) {
    case 'home':
        require '../pages/home.php';
        break;
    case 'restaurant':
        require '../pages/restaurant.php';
        break;
    default:
        break;
}

$content = ob_get_clean();

require '../pages/templates/default.php';