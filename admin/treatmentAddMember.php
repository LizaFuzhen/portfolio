<?php
// sécurité
session_start();
if(!isset($_SESSION['login']))
{
    header("LOCATION:index.php");
    exit();
}

//vérifier si mon formulaire à été envoyé oui ou non?
if(isset($_POST['login']))
{

    // vérifier si mon formulaire à envoyé des données (pas vide)
    // initialiser une variable erreur à 0 pour dire pas encore d'erreur à ce stade
    $err=0;

    // tester chaque login du form
    // si vide = erreur
    if(empty($_POST['login']))
    {
        // vrai
        $err=1;
    }else{
        // faux
        require "../connexion.php";
        $login = htmlspecialchars($_POST['login']);
        // pense question dans la tete prepare avec $req (prepare = ? ==> un inconnu)
        $req = $bdd->prepare("SELECT login FROM admin WHERE login=?");
        // pose la question à la bdd en lien avc ce que tu penses
        $req->execute([$login]);
        if($donnees = $req->fetch())
        {
            $err=2;
        }
    }

     if(empty($_POST['password']))
    {
        $err=3;
    }else{
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }
    // tester s'il y a eu une erreur
    if($err == 0)
    {

        // insertion dans la base de données
        require "../connexion.php";
        // insérer (complete le tableau) dans la base de données avec PDO et SQL (pense y)
        $insert = $bdd->prepare("INSERT INTO admin(login,password) VALUES(:login,:password)");
        // fait le
        $insert->execute([
            // lien ligne 27 et 42
            ":login" => $login,
            ":password" => $hash
        ]);
        $insert->closeCursor();
        // rediriger vers le tableau des écoles avec un signalement que c'est ajouté
        header("LOCATION:members.php?insert=success");
        exit();

    }else{
        // il y a eu au moins une erreur
        // rediriger vers le formulaire avec le code erreur généré
        header("LOCATION:addMember.php?error=".$err);
        exit();
    }


}else{
    header("LOCATION:addMember.php");
    exit();
}





?>