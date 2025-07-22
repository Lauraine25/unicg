<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-inscription.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier inscription";
    
    $req=$connexion->prepare("SELECT * from inscription where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from inscription where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-inscription.php";
    $bouton="Enregistrer";
    $titre="Ajouter inscription";

}
$Selpromotion=$connexion->prepare("SELECT promotion.*,filiere.nomfiliere,departement.nomdepartement,faculte.nom from promotion,filiere,departement,faculte where promotion.idfiliere=filiere.id and filiere.iddepartement=departement.id and departement.idfaculte=faculte.id;");
$Selpromotion->execute();

$Seletudiant=$connexion->prepare("SELECT * from etudiant where (id) not in (SELECT idetudiant from inscription)");
$Seletudiant->execute();

$SelData=$connexion->prepare("SELECT inscription.*,promotion.nompromotion from inscription,promotion where inscription.idpromotion=promotion.id ");
$SelData->execute();

