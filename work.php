<?php
    require "connexion.php";

    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);
        // is_numeric => si c'est numérique
        // !is_numeric => si pas numérique
        if(!is_numeric($id))
        {
            header("LOCATION:404.php");
        }
    }else{
        header("LOCATION:404.php");
    }

    $req = $bdd->query("SELECT works.nom, works.description, works.image FROM works WHERE works.id = '" . $_GET['id'] . "' ORDER BY id DESC LIMIT 0,8");
    $realisation = $req->fetch();
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
        <section id="home" class="work-page">
            <?php include("partials/header.php"); ?>      
            <main>   
                
                <div class="page-container">
                    <div class="col left">
                        <div class="work-image">
                            <img src="images/<?= $realisation['image']?>" alt="<?= $realisation['nom'] ?> ">
                        </div>
                    </div>

                    <div class="col right">
                        <div class="work-info">
                            <h2><?= $realisation['nom']?></h2>
                            <p><?= $realisation['description']?></p>
                            <?php include("partials/bouton.php"); ?>
                        </div>
                    </div>
                </div>
            </main>
        </section>

        <!-- le script doit être déclaré en dernier (juste avant la fermeture du body) car les élements doivent exister pour que javascripts les select -->
        <script src="assets/script.js"></script>
    </body>
</html>