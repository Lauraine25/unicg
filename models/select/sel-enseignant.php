<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-enseignant.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier enseignant";
    
    $req=$connexion->prepare("SELECT * from enseignant where matricule=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from enseignant where matricule=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-enseignant.php";
    $bouton="Enregistrer";
    $titre="Ajouter enseignant";

}

$SelData=$connexion->prepare("SELECT * from enseignant ");
$SelData->execute();

