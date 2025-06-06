<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
        exit();
    }
    require "../connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>BI2 Portail - Admin</title>
</head>
<body>
    <?php
        include("partials/header.php");
    ?>
  <div class="container">
    <h1>Ajouter un établissement</h1>
    <a href="works.php" class="btn btn-secondary">Retour</a>
    <?php
        if(isset($_GET['error']))
        {
            echo "<div class='alert alert-danger'>Une erreur est survenue (code erreur: ".$_GET['error'].")</div>";
        }
    ?>
    <form action="treatmentAddWork.php" method="POST" enctype="multipart/form-data">
        <div class="form-group my-3">
            <label for="nom">Nom: </label>
            <input type="text" id="nom" name="nom" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="categorie">Categorie: </label>
            <select name="categorie" id="categorie" class="form-control">
                <?php
                    $req = $bdd->query("SELECT * FROM categories");
                    // que mettre à catégories ? reste comme ça après dans l'interface creer les cate et de a chipote
                    while($don = $req->fetch())
                    {
                        echo "<option value='".$don['id']."'>".$don['nom']."</option>";
                    }
                    $req->closeCursor();
                ?>
            </select>
        </div>
        <div class="form-group my-3">
            <label for="intro">Les programmes utilisés: </label>
            <textarea name="introduction" id="intro" class="form-control"></textarea>
        </div>
        <div class="form-group my-3">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group my-3">
            <label for="image">Image: </label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group my-3">
            <input type="submit" value="Ajouter" class="btn btn-primary">
        </div>
    </form>
  </div>
</body>
</html>