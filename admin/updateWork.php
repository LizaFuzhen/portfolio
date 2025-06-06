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
    $work = $bdd->prepare("SELECT * FROM works WHERE id=?");
    $work->execute([$id]);
    $donWork = $work->fetch();
    $work->closeCursor();
    if(!$donWork)
    {
        header("LOCATION:works.php");
        exit();
    }

if(isset($_GET['delete']))
{
    // vérifier si delete est numérique
    $idDel = htmlspecialchars($_GET['delete']);
    if(!is_numeric($idDel))
    {
        header("LOCATION:updateWork.php?id=".$id);
        exit();
    }


    // vérifier si delete existe dans la bdd
    $image = $bdd->prepare("SELECT * FROM images WHERE id=?");
    $image->execute([$idDel]);
    $donImg = $image->fetch();
    $image->closeCursor();
    if(!$donImg)
    {
        header("LOCATION:updateWork.php?id=".$id);
        exit();
    }

    // supprimer le fichier
    unlink("../images/".$donImg['fichier']);

    // supprimer la donnée dans la bdd
    $delete = $bdd->prepare("DELETE FROM images WHERE id=?");
    $delete->execute([$idDel]);
    $delete->closeCursor();

    // prévenir l'utilisateur
    header("LOCATION:updateWork.php?id=".$id."&successdel=".$idDel);
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
      <div class="row">
          <div class="col-md-6">
              <h1>Modifier un établissement</h1>
              <a href="works.php" class="btn btn-secondary">Retour</a>
              <form action="treatmentUpdateWork.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group my-3">
                      <label for="nom">Nom: </label>
                      <input type="text" id="nom" name="nom" class="form-control" value="<?= $donWork['nom'] ?>">
                  </div>
                  <div class="form-group my-3">
                      <label for="categorie">Categorie: </label>
                      <select name="categorie" id="categorie" class="form-control">
                          <?php
                          $req = $bdd->query("SELECT * FROM categories");
                          while($don = $req->fetch())
                          {
                              if($donWork['categorie']==$don['id'])
                              {
                                  echo "<option value='".$don['id']."' selected>".$don['nom']."</option>";
                              }else{
                                  echo "<option value='".$don['id']."'>".$don['nom']."</option>";
                              }
                          }
                          $req->closeCursor();
                          ?>
                      </select>
                  </div>
                  <div class="form-group my-3">
                      <label for="intro">Les programmes utilisés: </label>
                      <textarea name="introduction" id="intro" class="form-control"><?= $donWork['programmes'] ?></textarea>
                  </div>
                  <div class="form-group my-3">
                      <label for="description">Description: </label>
                      <textarea name="description" id="description" class="form-control"><?= $donWork['description'] ?></textarea>
                  </div>
                  <div class="form-group my-3">
                      <div class="col-4">
                          <img src="../images/<?= $donWork['image'] ?>" alt="image de <?= $donWork['nom'] ?>" class="img-fluid">
                      </div>
                      <label for="image">Image: </label>
                      <input type="file" name="image" id="image" class="form-control" value="">
                  </div>
                  <div class="form-group my-3">
                      <input type="submit" value="Modifier" class="btn btn-warning">
                  </div>
              </form>
          </div>
          <div class="col-md-6">
              <h2>Galerie Image</h2>
              <a href="addImg.php?id=<?= $id ?>" class="btn btn-primary">Ajouter</a>
              <?php
                if(isset($_GET['insert']))
                {
                    echo "<div class='alert alert-success my-3'>Vous avez bien ajouté une image</div>";
                }
                if(isset($_GET['successdel']))
                {
                    echo "<div class='alert alert-danger my-3'>Vous avez bien suppprimé l'image n°".$_GET['successdel']."</div>";
                }
              ?>
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $works = $bdd->prepare("SELECT * FROM images WHERE id_works=?");
                  $works->execute([$id]);
                  while($don = $works->fetch())
                  {
                      echo "<tr>";
                      echo "<td>".$don['id']."</td>";
                      echo "<td><img src='../images/".$don['fichier']."' alt='image de' class='img-fluid col-6'></td>";
                      echo "<td>";
                      echo "<a href='updateWork.php?id=".$id."&delete=".$don['id']."' class='btn btn-danger mx-1'>Supprimer</a>";
                      echo "</td>";
                      echo "</tr>";
                  }
                  $works->closeCursor();
                  ?>
                  </tbody>
              </table>
          </div>
      </div>

  </div>
</body>
</html>