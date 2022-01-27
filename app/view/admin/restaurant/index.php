
<h2>Gestion des restaurants</h2>

<p>
    <a href="<?= $createUrl; ?>">Ajouter</a>
</p>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Cp</th>
            <th>Ville</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($restaurants as $restaurant): ?>
            <tr>
                <td><?= $restaurant->getName() ?></td>
                <td><?= $restaurant->getAddress() ?></td>
                <td><?= $restaurant->getCp() ?></td>
                <td><?= $restaurant->getCity() ?></td>
                <td>
                    <a href="<?= $restaurant->getEditUrl() ?>">Modifier</a>
                    <form action="<?= $deleteUrl; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $restaurant->getId(); ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>