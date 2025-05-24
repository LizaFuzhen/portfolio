<?php
    session_start();
    if(!$_SESSION['login'])
    {
        header("LOCATION:index.php");
        exit();
    }
    require "../connexion.php";

    if(isset($_GET['delete']))
    {
        // vérifier si delete est numérique
        $idDel = htmlspecialchars($_GET['delete']);
        if(!is_numeric($idDel))
        {
            header("LOCATION:skills.php");
            exit();
        }

        
        // vérifier si delete existe dans la bdd
        $skills = $bdd->prepare("SELECT * FROM skills WHERE id=?");
        $skills->execute([$idDel]);
        $donSkills = $skills->fetch();
        $skills->closeCursor();
        if(!$donSkills)
        {
            header("LOCATION:skills.php");
            exit();
        } 

        // supprimer le fichier
        // /skills/ = dossier >< /skills = fichier
        unlink("../images/skills/".$donSkills['image']);

        // supprimer la donnée dans la bdd
        $delete = $bdd->prepare("DELETE FROM skills WHERE id=?");
        $delete->execute([$idDel]);
        $delete->closeCursor();

        // prévenir l'utilisateur
        header("LOCATION:skills.php?successdel=".$idDel);
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
  <div class="container-fluid">
    <h1>Les skills</h1>
    <a href="addSkill.php" class="btn btn-success">Ajouter</a>
    <?php
        if(isset($_GET['insert']))
        {
            if($_GET['insert']=="success")
            {
                echo "<div class='alert alert-success my-3'>Vous avez bien ajouté une compétence à la liste</div>";
            }
        }
        
        if(isset($_GET['successdel']))
        {
            echo "<div class='alert alert-danger my-3'>Vous avez bien supprimé l'id numéro ".$_GET['successdel']."</div>";
        }
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $req = $bdd->query("SELECT * FROM skills");
                while($don = $req->fetch())
                {
                    echo "<tr>";
                        echo "<td class='align-middle'>".$don['id']."</td>";
                        echo "<td class='align-middle'>".$don['nom']."</td>";
                        echo "<td>";
                            echo "<div class='col-3'><img src='../images/skills/".$don['image']."' alt='".$don['nom']."' class='col-3 img-fluid'></div>";
                        echo "<td class='align-middle'>";
                            echo "<a href='skills.php?delete=".$don['id']."' class='btn btn-danger mx-1'>Supprimer</a>";
                        echo "</td>";
                    echo "</tr>";
                }
                $req->closeCursor();
            ?>
        </tbody>
    </table>
  </div>
</body>
</html>