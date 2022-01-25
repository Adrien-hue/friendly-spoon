<?php

use App\App;
use Core\Html\Form;

$restaurantTable = App::getInstance()->getTable('Restaurant');
$cookingStyleTable = App::getInstance()->getTable('CookingStyle');

if(!empty($_POST)){
    // echo '<pre>' . var_dump($_POST) . '<pre>';die;
    $result = $restaurantTable->create(
        [
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'cp' => $_POST['cp'],
            'city' => $_POST['city'],
            'id_cookingStyle' => $_POST['id_cookingStyle']
        ]
    );

    if($result){
        $location = 'admin.php?page=restaurant';
        header('Location: ' . $location);
    }
}

$cookingStyles = $cookingStyleTable->toArray('id', 'name');

$form = new Form($_POST);
?>

<h2>Création d'un restaurant</h2>

<form action="" method="post">
    <?= $form->input('name', 'Nom') ?>
    <?= $form->input('address', 'Adresse') ?>
    <?= $form->input('cp', 'Code postal') ?>
    <?= $form->input('city', 'Ville') ?>

    <?= $form->select('id_cookingStyle', 'Cuisine', $cookingStyles) ?>

    <button type="submit">Sauvegarder</button>
</form>