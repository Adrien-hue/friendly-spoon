<?php

use App\App;
use App\Table\CookingStyle;
use App\Table\Restaurant;

$app = App::getInstance();

$cookingStyle = $app->getTable('CookingStyle')->find($_GET['id']);

if ($cookingStyle === false) {
    $app->notFound();
}

$app->title = $cookingStyle->getName();

$restaurants = $app->getTable('Restaurant')->findAllByCookingStyle($_GET['id']);

$cookingStyles = $app->getTable('CookingStyle')->findAll();
?>

<h1><?= $cookingStyle->getName() ?></h1>

<h2>Restaurants</h2>

<ul>
    <?php foreach ($restaurants as $restaurant) : ?>
        <li>
            <h3><?= $restaurant->getName(); ?></h3>

            <p><em><?= $restaurant->cookingStyle ?></em></p>

            <p>Adresse : <?= $restaurant->getAddress() ?>, <?= $restaurant->getCp() ?> <?= $restaurant->getCity() ?></p>

            <p><a href="<?= $restaurant->getUrl(); ?>">Accèder aux détails</a></p>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Styles de cuisine</h2>

<ul>
    <?php foreach ($cookingStyles as $cookingStyle) : ?>
        <li>
            <h3><a href="<?= $cookingStyle->getUrl() ?>"><?= $cookingStyle->getName() ?></a></h3>
        </li>
    <?php endforeach; ?>
</ul>