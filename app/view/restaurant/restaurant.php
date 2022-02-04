
<h1><?= $restaurant->getName(); ?></h1>

<p><em><?= $restaurant->showCookingStyles() ?></em></p>

<p>Adresse : <?= $restaurant->getAddress() ?>, <?= $restaurant->getCp() ?> <?= $restaurant->getCity() ?></p>