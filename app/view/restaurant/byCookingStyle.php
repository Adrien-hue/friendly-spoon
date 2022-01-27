
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
            <h3><a href="<?= $cookingStyle->getByCookingStyleUrl() ?>"><?= $cookingStyle->getName() ?></a></h3>
        </li>
    <?php endforeach; ?>
</ul>