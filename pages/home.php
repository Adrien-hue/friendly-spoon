<ul>
    <?php foreach($db->query('SELECT * FROM restaurant;', 'App\Table\Restaurant') as $restaurant): ?>
        <li>
            <h2><?= $restaurant->getName(); ?></h2>

            <p>Adresse : <?= $restaurant->getAddress() ?>, <?= $restaurant->getCp() ?> <?= $restaurant->getCity() ?></p>

            <p><a href="<?= $restaurant->getUrl(); ?>">Accèder aux détails</a></p>
        </li>
    <?php endforeach; ?>
</ul>