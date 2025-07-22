<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-faculte.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier faculte";
    
    $req=$connexion->prepare("SELECT * from faculte where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from faculte where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-faculte.php";
    $bouton="Enregistrer";
    $titre="Ajouter faculte";

}

$SelData=$connexion->prepare("SELECT * from faculte ");
$SelData->execute();

