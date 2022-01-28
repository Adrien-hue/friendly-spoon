<div class="row align-items-center">
    <div class="col-6">
        <h2>Gestion des style de cuisine</h2>
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cookingStyles as $cookingStyle): ?>
            <tr>
                <td><?= $cookingStyle->getName() ?></td>
                <td>
                    <a href="<?= $cookingStyle->getEditUrl() ?>" class="btn btn-outline-primary">Modifier</a>
                    <form action="<?= $deleteUrl ?>" method="post" class="inline-block">
                        <input type="hidden" name="id" value="<?= $cookingStyle->getId(); ?>">
                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>