<?php
    require "connexion.php";
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
        <section id="home" class="skills-page">
            <?php include("partials/header.php"); ?>      
            <main>   
                <div class="page-container">
                    <div class="col left">
                       
                    </div>

                    <div class="col right">
                        
                    </div>
                </div>
            </main>
        </section>

        <!-- le script doit être déclaré en dernier (juste avant la fermeture du body) car les élements doivent exister pour que javascripts les select -->
        <script src="assets/script.js"></script>
    </body>
</html>