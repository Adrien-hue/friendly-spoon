<?php

use App\App;
use Core\Auth\DBAuth;
use Core\Html\Form;

if(!empty($_POST)){
    $auth = new DBAuth(App::getInstance()->getDb());

    if($auth->login($_POST['username'], $_POST['password'])){
        header('Location: admin.php');
    } else {
        ?>
            <p>Les identifiants sont incorrects.</p>
        <?php
    }

}
$form = new Form($_POST);
?>

<h2>Connexion</h2>

<form action="" method="post">
    
    <?= $form->input('username', 'Nom d\'utilisateur'); ?>
    
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>

    <input type="submit" value="Se connecter">
</form>