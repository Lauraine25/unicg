<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-promotion.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier promotion";
    
    $req=$connexion->prepare("SELECT * from promotion where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from promotion where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-promotion.php";
    $bouton="Enregistrer";
    $titre="Ajouter promotion";

}
$Selfiliere=$connexion->prepare("SELECT * from filiere ");
$Selfiliere->execute();

$SelData=$connexion->prepare("SELECT promotion.*,filiere.nomfiliere from promotion,filiere where promotion.idfiliere=filiere.id ");
$SelData->execute();

