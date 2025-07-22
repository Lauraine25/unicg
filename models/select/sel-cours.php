<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-cours.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier cours";
    
    $req=$connexion->prepare("SELECT * from cours where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from cours where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-cours.php";
    $bouton="Enregistrer";
    $titre="Ajouter cours";

}
$Selpromotion=$connexion->prepare("SELECT promotion.*,filiere.nomfiliere,departement.nomdepartement,faculte.nom from promotion,filiere,departement,faculte where promotion.idfiliere=filiere.id and filiere.iddepartement=departement.id and departement.idfaculte=faculte.id;");
$Selpromotion->execute();

$SelData=$connexion->prepare("SELECT * from cours ");
$SelData->execute();

