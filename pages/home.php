<?php

use App\App;

?>

<h2>Restaurants</h2>

<ul>
    <?php foreach(App::getInstance()->getTable('Restaurant')->findAllWithCookingStyle() as  $restaurant): ?>
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
    <?php foreach(App::getInstance()->getTable('CookingStyle')->findAll() as $cookingStyle): ?>
        <li>
            <h3><a href="<?= $cookingStyle->getUrl() ?>"><?= $cookingStyle->getName() ?></a></h3>
        </li>
    <?php endforeach; ?>
</ul>