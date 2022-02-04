<h1>Bienvenue sur Friendly Spoon</h1>

<h2>Où manger ce soir ?</h2>

<p>The Fork mais version Spoon</p>

<div class="row my-4 text-dark">

    <?php foreach($restaurants as $restaurant): ?>
        <div class="col-sm-4 m2">
            <div class="card text-center">
                <div class="card-body">
                    <img src="image/restaurant/default.svg" class="card-img" width="300" height="300" alt="Restaurant image">
                    <div class="card-img-overlay d-flex flex-column justify-content-between">
                        <div class="card-title bg-light bg-opacity-75">
                            <h5><?= $restaurant->getName(); ?></h5>
                            <em><?= $restaurant->showCookingStyles(); ?></em>
                        </div>
                        <a href="<?= $restaurant->getUrl(); ?>" class="btn btn-primary">Miam !!</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>