<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-etudiant.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier etudiant";
    
    $req=$connexion->prepare("SELECT * from etudiant where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from etudiant where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-etudiant.php";
    $bouton="Enregistrer";
    $titre="Ajouter etudiant";

}

$SelData=$connexion->prepare("SELECT * from etudiant ");
$SelData->execute();

