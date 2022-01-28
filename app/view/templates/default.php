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
    <title><?= App::getInstance()->title ?></title>
</head>
<body>

    <div class="container">
        <?= $content; ?>
    </div>

</body>
<script src="js/bootstrap/bootstrap.js"></script>
</html>