<?php
session_start();
if(!isset($_SESSION['login']))
{
    header("LOCATION:index.php");
    exit();
}

// gestion de la dépendance du GET id
if(isset($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    if(!is_numeric($id))
    {
        header("LOCATION:works.php");
        exit();
    }
}else{
    header("LOCATION:works.php");
    exit();
}

require "../connexion.php";
// requête à la bdd
$work = $bdd->prepare("SELECT * FROM oeuvre WHERE id=?");
$work->execute([$id]);
$donWork = $work->fetch();
$work->closeCursor();
if(!$donWork)
{
    header("LOCATION:works.php");
    exit();
}
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
    <h1>Ajouter une image à <?= $donWorks['nom'] ?></h1>
    <a href="updateWorks.php?id=<?= $id ?>" class="btn btn-secondary">Retour</a>
    <?php
    if(isset($_GET['error']))
    {
        echo "<div class='alert alert-danger'>Une erreur est survenue (code erreur: ".$_GET['error'].")</div>";
    }
    ?>
    <form action="treatmentAddImg.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
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