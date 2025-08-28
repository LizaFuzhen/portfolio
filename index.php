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
        <!-- Section principale -->
        <section id="home">
            <?php include("partials/header.php"); ?>
            <main>   
                <div class="home-container">
                    <div>
                        <h1>
                            <span class="infographiste oswald ft-medium">Infographiste</span>
                            <span class="liza iceberg">Liza</span>
                            <span class="van-caillie iceberg">Van Caillie</span>
                        </h1>
                    </div>
                    <div class="call-to-action">
                        <a href="#contact"" class="boat-btn oswald ft-bold contact">CONTACT</a>
                        <a href="#realisations" class="boat-btn oswald ft-bold decouvrir">DÉCOUVRIR</a>
                    </div>
                </div>
            </main>
        </section>

        <!-- Sections Présentation -->
         <section id="presentation">
            <div class="page-container pt-2">
                    <div class="col left">
                        <div class="work-image">
                            <img src="images/pptel.png" alt="Photo de Liza Van Caillie" style="width: 100%">
                        </div>
                    </div>

                    <div class="col right">
                        <div class="work-info presentation-bg oswald-light">
                            <p>
                                Je m’appelle <strong>Liza Van Caillle</strong> et je suis né en 2005. <br>
                                Je me passionne pour l’infographie depuis 2023 en l’étudiant dans tous ses domaines. <br>
                                Afin de développer ma créativité et ma soif d’apprendre, je vous présente l’ensemble de mes réalisations dans mon <strong>Portfolio</strong>. <br>
                                Je suis déterminée à en apprendre plus grâce à un stage en entreprise. <brW>
                                <strong>Contactez</strong> moi pour travailler ensemble.
                            </p>
                            <p>
                                <img src="images/ndls.svg" alt="Drapeau Nederlands">Ik kan zonder probleem in het Nederlands pranten omdat ik al tijdens 13 jaar deze taal heb geleerd.
                            </p>
                            <p>
                                <img src="images/angl.svg" alt="Drapeau Nederlands">I’m learning English since 2020 so I can easily understand.
                            </p>
                        </div>
                    </div>
                </div>
         </section>

        <!-- Section skills -->
         <section id="skills">
            <div class="page-container pt-2">
                <div class="col right">
                    <h2 class="iceberg">MES APTITUDES</h2>
                    <ul class="iceberg">
                        <li>Stop-Motion</li>
                        <li>Animation 2D</li>
                        <li>Croquis</li>
                        <li>Storyboard</li>
                        <li>Magazine et autres impressions</li>
                        <li>Sonorisation de création visuel</li>
                    </ul>
                </div>
                <div class="col left">
                    <h2 class="iceberg">LOGICIELS</h2>
                        <!-- Requêtes SQL qui récupère les 8 dernières Oeuvres-->
                        <?php
                            $req = $bdd->query("SELECT * FROM skills;");
                            $skills = $req->fetchAll();
                        ?>

                        <!-- Boucle qui permet d'afficher les 8 dernières réalisations -->
                            <div class="skills-icons-board">
                                <?php foreach ($skills as $skill): ?>
                                    <img src="images/skills/<?= $skill['image']?>" alt="<?= $skill['nom'] ?> ">
                                <?php endforeach; ?>
                            </div>                            
                </div>
            </div>
         </section>


        <!-- Section realisations -->
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
                <a href="/works.php" alt="En découvrir plus" class="rounded-btn iceberg">En découvrir plus</a>
            </div>
        </section>

        <!-- Section contact -->
        <section id="contact">
            <div class="page-container">
                <div class="col right">
                    <div class="form-contact">
                        <h2 class="oswald">RESTONS EN CONTACT</h2>
                        <div class="form-wrapper">
                            <form class="oswald" action="traitement.php" method="post">
                            <label for="lastname">Nom</label>
                            <input type="text" name="lastname" required>
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" required><br>
                            <label for="email">Email</label>
                            <input type="email" name="email" required><br>
                            <label for="message">Message</label>
                            <textarea name="message" required></textarea><br>
                            <button type="submit" class="rounded-btn">Envoyer</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col left">
                    <div class="tasse-wrapper">
                        <img class="tasse-image" src="images/tasse.png" alt="Tasse">
                        <div class="tasse-infos">
                            <h3 class="oswald">Retrouvez moi également ici :</h3>
                            <ul>
                                <li><a href="#" target="_blank"><img src="images/lins.svg" alt="Linkedin"></a></li>
                                <li><a href="#" target="_blank"><img src="images/instagrams.svg" alt="Instagram"></a></li>
                                <li><a href="#" target="_blank"><img src="images/facebook.png" alt="facebook"></a></li>
                                <li><a href="#" target="_blank"><img src="images/ytbs.svg" alt="youtube"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </section>

        <!-- le script doit être déclaré en dernier (juste avant la fermeture du body) car les élements doivent exister pour que javascripts les select -->
        <script src="assets/script.js"></script>
    </body>
</html>