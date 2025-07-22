<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-departement.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier departement";
    
    $req=$connexion->prepare("SELECT * from departement where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from departement where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-departement.php";
    $bouton="Enregistrer";
    $titre="Ajouter departement";

}
$SelFaculte=$connexion->prepare("SELECT * from faculte ");
$SelFaculte->execute();

$SelData=$connexion->prepare("SELECT departement.*,faculte.nom from departement,faculte where departement.idfaculte=faculte.id ");
$SelData->execute();

