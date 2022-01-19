<?php

$restaurant = $db->prepare('SELECT * FROM restaurant WHERE id = :id', [':id' => $_GET['id']], 'App\Table\Restaurant', true);

?>

<h1><?= $restaurant->getName(); ?></h1>

<p>Adresse : <?= $restaurant->getAddress() ?>, <?= $restaurant->getCp() ?> <?= $restaurant->getCity() ?></p>

<p><a href="index.php">Accueil</a></p>