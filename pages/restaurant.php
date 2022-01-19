<?php

use App\App;
use App\Table\CookingStyle;
use App\Table\Restaurant;

$restaurant = Restaurant::find($_GET['id']);

if($restaurant === false){
    App::notFound();
}

App::setTitle($restaurant->getName());

$cookingStyle = CookingStyle::find($restaurant->id_cookingStyle);

?>

<h1><?= $restaurant->getName(); ?></h1>

<p><em><?= $cookingStyle->getName() ?></em></p>

<p>Adresse : <?= $restaurant->getAddress() ?>, <?= $restaurant->getCp() ?> <?= $restaurant->getCity() ?></p>

<p><a href="index.php">Accueil</a></p>