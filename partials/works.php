<?php
    require "connexion.php";

    $req = $bdd->query("SELECT works.nom, works.description, works.image FROM works ORDER BY id DESC LIMIT 0,8");
    $realisation = $req->fetchAll();
    $req->closeCursor();

     // Requêtes SQL qui les infos de l'oeuvre
    if(empty($realisation))
    {
        header("LOCATION:404.php");
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

    <?php include("partials/header.php"); ?>
    
    <section id="realisations">
        <h2 class="iceberg">Mes dernières réalisations</h2>
        <div class="fish-container">
            <!-- Requêtes SQL qui récupère les 8 dernières Oeuvres-->
            <?php
                $req = $bdd->query("SELECT * FROM works ORDER BY id DESC LIMIT 0,8");
                $realisations = $req->fetchAll();
            ?>

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

            <!--
                Requêtes SQL pour les skills :
                $req = $bdd->query("SELECT * FROM skills ORDER BY id DESC LIMIT 0,8");
                $skills = $req->fetchAll();

                Code pour afficher les skills
                < ?php foreach ($skills as $skill): ?>
                    
                    CODE HTML ICI
                    <img src="images/skills/< ?= $skill['image']?>" alt="< ?= $skill['nom'] ?>">

                    < ?= revient au même que < ?php echo

                < ?php endforeach; ?>
            -->

            <?php endforeach; ?>

        </div>
        <div class="discover-more-container">
            <a href="#" alt="En découvrir plus" class="rounded-btn iceberg">En découvrir plus</a>
        </div>
    </section>

        <!-- le script doit être déclaré en dernier (juste avant la fermeture du body) car les élements doivent exister pour que javascripts les select -->
        <script src="assets/script.js"></script>
    </body>
</html>