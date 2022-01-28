<?php

use App\App;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?= App::getInstance()->title ?></title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=restaurant.index">
                    <img src="image/logo.svg" width="40" height="40" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=restaurant.index">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=admin.app.index">Administration</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <a class="nav-link" href="index.php?page=user.login">Se connecter</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <?= $content; ?>
        </div>
    </main>

</body>
<script src="js/bootstrap/bootstrap.js"></script>
</html>