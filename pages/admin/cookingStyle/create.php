<?php

use App\App;
use Core\Html\Form;

$cookingStyleTable = App::getInstance()->getTable('CookingStyle');

if(!empty($_POST)){

    $result = $cookingStyleTable->create(
        [
            'name' => $_POST['name']
        ]
    );

    if($result){
        $location = 'admin.php?page=cookingStyle';
        header('Location: ' . $location);
    }
}

$form = new Form($_POST);
?>

<h2>Création d'un style de cuisine</h2>

<form action="" method="post">
    <?= $form->input('name', 'Nom') ?>

    <button type="submit">Sauvegarder</button>
</form>