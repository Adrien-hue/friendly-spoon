<?php

use App\App;
use Core\Html\Form;

$cookingStyleTable = App::getInstance()->getTable('CookingStyle');

if(!empty($_POST)){

    $result = $cookingStyleTable->update(
        $_GET['id'],
        [
            'name' => $_POST['name']
        ]
    );

    if($result){
        ?>
        Les informations ont bien été sauvegardées !
        <?php
    }
}

$cookingStyle = $cookingStyleTable->find($_GET['id']);

$form = new Form($cookingStyle)
?>

<h2>Modification d'un style de cuisine</h2>

<form action="" method="post">
    <?= $form->input('name', 'Nom') ?>

    <button type="submit">Sauvegarder</button>
</form>