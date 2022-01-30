<?php if($errors): ?>
    <div>
        <p>Identifiants incorrects !</p>
    </div>
<?php endif; ?>

<div class="card login-card">
    <div class="me-3">
        <img src="image/signin.jpeg" alt="sign in image" class="img-fluid login-card-img">
    </div>

    <div class="m-2 flex-fill">
        <div class="d-flex align-items-center my-3">
            <a href="index.php?page=app.index">
                <img src="image/logo.svg" width="60" height="60" alt="logo">
            </a>
            <h2>Friendly Spoon</h2>
        </div>
    
    
        <p>Connecter vous à votre espace personnel.<p>
    
        <form action="" method="post">
            <?= $form->input('username', '', ['placeholder' => 'Nom d\'utilisateur']); ?>
            
            <?= $form->input('password', '', ['type' => 'password', 'placeholder' => 'Mot de passe']); ?>
    
            <button class="btn btn-primary" type="submit">Se connecter</button>
        </form>
    </div>
</div>