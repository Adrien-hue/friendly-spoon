<h2>Gestion des style de cuisine</h2>

<p>
    <a href="<?= $createUrl ?>">Ajouter</a>
</p>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cookingStyles as $cookingStyle): ?>
            <tr>
                <td><?= $cookingStyle->getName() ?></td>
                <td>
                    <a href="<?= $cookingStyle->getEditUrl() ?>">Modifier</a>
                    <form action="<?= $deleteUrl ?>" method="post">
                        <input type="hidden" name="id" value="<?= $cookingStyle->getId(); ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>