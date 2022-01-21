<?php

use App\App;
use App\Table\CookingStyle;
use App\Table\Restaurant;

$app = App::getInstance();

$restaurant = $app->getTable('Restaurant')->find($_GET['id']);

if($restaurant === false){
    $app->notFound();
}
$cookingStyle = $app->getTable('Restaurant')->find($restaurant->id_cookingStyle);

$app->title = $restaurant->getName();
?>

<h1><?= $restaurant->getName(); ?></h1>

<p><em><?= $cookingStyle->getName() ?></em></p>

<p>Adresse : <?= $restaurant->getAddress() ?>, <?= $restaurant->getCp() ?> <?= $restaurant->getCity() ?></p>

<p><a href="index.php">Accueil</a></p>