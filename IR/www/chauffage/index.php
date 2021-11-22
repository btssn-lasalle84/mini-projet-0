<?php
require_once ('./include/chauffage.inc.php');
?>
<!DOCTYPE html>
<html lang="fr-FR">
 <head>
  <meta charset="<?= $config['charset'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="./css/industrial.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <title><?= $config['titre'] ?></title>
  <style>
    html {font-size: 0.8rem;}
    @include media-breakpoint-up(sm) { html {font-size: 1.0rem;} }
    @include media-breakpoint-up(md) { html {font-size: 1.2rem;} }
    @include media-breakpoint-up(lg) { html {font-size: 1.4rem;} }
  </style>
 </head>
 <body class="bg-dark">
    <header>
        <div class="container my-1">
            <div class="card bg-secondary text-center">
                <img src="./images/logo-chauffage.png" class="card-img-top mx-auto my-2" style="width: 14rem;" alt="<?= $config['description'] ?>">
                <div class="card-body pb-0">
                    <h2 class="card-title text-dark"><?= $config['description'] ?></h2>
                    <p id="horodatage-serveur" class="card-text text-center"></p>
                </div>
            </div>
        </div>
    </header>
    <!-- <nav>Navigation</nav> -->
    <main>
        <div class="container mt-2">
            <div class="row justify-content-center"> <!-- around -->
                <div class="col-auto">
                    <div class="card text-white bg-primary mb-2">
                        <div class="card-header text-center text-uppercase">Température</div>
                        <div class="card-body mx-auto">
                            <input id="periode-acquisition" type="hidden" value="<?= $config['periode-acquisition'] ?>">
                            <h1 id="valeurTemperature" class="card-title text-center text-monospace">&nbsp;</h1>
                            <p id="horodatageTemperature" class="card-text text-center"></p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="card text-white bg-info mb-2">
                        <div class="card-header text-center text-uppercase">Chauffage</div>
                        <div class="card-body mx-auto">
                            <div class="industrial led size one my-3 mx-auto">
                                <div id="led" class="meter red"></div>
                            </div>
                            <button id="commande" type="button" class="btn btn-secondary">Allumer</button>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="card text-white bg-warning mb-2">
                        <div class="card-header text-center text-uppercase">Humidité</div>
                        <div class="card-body mx-auto">
                            <h1 id="valeurHumidite" class="card-title text-center text-monospace">&nbsp;</h1>
                            <p id="horodatageHumidite" class="card-text text-center"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row justify-content-center"> <!-- around -->
                <div class="col-12">
                    <div class="card bg-success">
                    <div class="card-header text-center text-uppercase">Tableau de bord</div>
                    <div class="row justify-content-center"> <!-- around -->
                    <div class="col-auto">
                        <div class="card-body mx-auto">
                            <input id="periode-bdd" type="hidden" value="<?= $config['periode-bdd'] ?>">
                            <h3 id="valeur" class="card-title text-center text-monospace"><span class="badge badge-light bg-secondary">Période : <?= ($config['periode-acquisition']/1000) ?> s</span></h3>
                            <h3 class="card-title text-center text-monospace"><span id="nb-mesures" class="badge badge-light bg-secondary">Nb mesures : 0</span></h3>
                            <p class="card-text text-center"><button id="purge" type="button" class="btn btn-secondary">Purger</button></p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card-body mx-auto">
                            <h3 class="card-title text-center text-monospace"><span id="last" class="badge badge-light bg-secondary">Mesure : -- °C</span></h3>
                            <h3 class="card-title text-center text-monospace"><span id="moyenne" class="badge badge-light bg-secondary">Moyenne : -- °C</span></h3>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-1">
            <div class="row justify-content-center"> <!-- around -->
                <div class="col-12">
                    <div class="card bg-light">
                        <div class="card-header text-center text-uppercase">Graphiques</div>
                        <div class="card-body mx-auto px-0 py-0">
                            <div id="graphiqueTemperature" class="responsive-plot mx-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container my-2">
            <p class="text-white bg-secondary px-1 rounded"><?= $config['signature'] ?></p>
        </div>
    </footer>
    <!-- Pour Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- La bibliothèque plotly.js -->
    <script src='https://cdn.plot.ly/plotly-2.6.3.min.js'></script>
    <!-- La bibliothèque jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/industrial.js"></script>
    <script src="./js/chauffage.js"></script>
    </body>
</html>
