<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-filiere.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier filiere";
    
    $req=$connexion->prepare("SELECT * from filiere where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from filiere where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-filiere.php";
    $bouton="Enregistrer";
    $titre="Ajouter filiere";

}
$Seldepartement=$connexion->prepare("SELECT * from departement ");
$Seldepartement->execute();

$SelData=$connexion->prepare("SELECT filiere.*,departement.nomdepartement from filiere,departement where filiere.iddepartement=departement.id ");
$SelData->execute();

