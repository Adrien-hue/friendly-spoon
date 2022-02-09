<h2><?= $title ?></h2>

<form action="" method="post">
    <?= $form->input('name', 'Nom') ?>
    <?= $form->input('address', 'Adresse') ?>
    <?= $form->input('cp', 'Code postal') ?>
    <?= $form->input('city', 'Ville') ?>

    <?= $form->select('cookingStyles[]', 'Cuisine', $cookingStyles, ['multiple' => 1, 'placeholder' => 'Sélectionner un style de cuisine']) ?>

    <button type="submit">Sauvegarder</button>
</form>