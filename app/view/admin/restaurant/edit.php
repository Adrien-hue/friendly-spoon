<h2><?= $title ?></h2>

<form action="" method="post">
    <?= $form->input('name', 'Nom') ?>
    <?= $form->input('address', 'Adresse') ?>
    <?= $form->input('cp', 'Code postal') ?>
    <?= $form->input('city', 'Ville') ?>

    <?= $form->select('id_cookingStyle', 'Cuisine', $cookingStyles) ?>

    <button type="submit">Sauvegarder</button>
</form>