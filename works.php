<?php
    require "connexion.php";

    $req = $bdd->query("SELECT * FROM works ORDER BY id");
    $realisations = $req->fetchAll();
    $req->closeCursor();

     // Requêtes SQL qui les infos de l'oeuvre
    if(empty($realisations))
    {
     
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="short icon" href="images/logo.svg" type="image/x-icon">    <title>Portfolio Liza</title>
    </head>
    <body>

    <section id="realisations">
         <?php include("partials/header.php"); ?>
        <h2 class="iceberg">MES REALISATIONS</h2>
         <button onclick="history.back()" class="btn-retour">← Retour</button>
        <div class="fish-container">
            <!-- Boucle qui permet d'afficher les 8 dernières réalisations -->
            <?php foreach ($realisations as $realisation): ?>

            <a href="/work.php?id=<?= $realisation['id'] ?>" class="fish-link">
                <div class="fish">
                    <img class="fish-losange" src="images/realisation.png" alt="Realisaition 1">

                    <div class="fish-image">
                        <img src="images/<?= $realisation['image']?>" alt="<?= $realisation['nom'] ?> ">
                    </div>                

                    <div class="overlay">
                        <h3><?= $realisation['nom']?></h3>
                    </div>
                </div>
            </a>

            <?php endforeach; ?>

        </div>
    </section>

        <!-- le script doit être déclaré en dernier (juste avant la fermeture du body) car les élements doivent exister pour que javascripts les select -->
        <script src="assets/script.js"></script>
    </body>
</html>