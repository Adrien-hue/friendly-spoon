<div class="row align-items-center">
    <div class="col-6">
        <h2>Gestion des restaurants</h2>
    </div>
    <div class="col-6 text-end">
        <p>
            <a href="<?= $createUrl; ?>" class="btn btn-primary">Ajouter</a>
        </p>
    </div>
</div>

<table class="table table-dark table-hover">
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
                    <a href="<?= $restaurant->getEditUrl() ?>" class="btn btn-outline-primary">Modifier</a>
                    <form action="<?= $deleteUrl; ?>" method="post" class="inline-block">
                        <input type="hidden" name="id" value="<?= $restaurant->getId(); ?>">
                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>