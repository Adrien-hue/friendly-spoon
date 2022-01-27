<?php if($errors): ?>
    <div>
        <p>Identifiants incorrects !</p>
    </div>
<?php endif; ?>

<h2>Connexion</h2>

<form action="" method="post">
    
    <?= $form->input('username', 'Nom d\'utilisateur'); ?>
    
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>

    <input type="submit" value="Se connecter">
</form>