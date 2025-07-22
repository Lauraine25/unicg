<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-affectation.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier affectation";
    
    $req=$connexion->prepare("SELECT * from affectation where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from affectation where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-affectation.php";
    $bouton="Enregistrer";
    $titre="Ajouter affectation";

}
$Selpromotion=$connexion->prepare("SELECT promotion.*,filiere.nomfiliere,departement.nomdepartement,faculte.nom from promotion,filiere,departement,faculte where promotion.idfiliere=filiere.id and filiere.iddepartement=departement.id and departement.idfaculte=faculte.id;");
$Selpromotion->execute();

$Selenseignant=$connexion->prepare("SELECT * from enseignant");
$Selenseignant->execute();

$Selcours=$connexion->prepare("SELECT * from cours where (id) not in (SELECT id_cours from affectation where anneeacademique=?)");
$Selcours->execute(array($_SESSION['annee_academique']));

$Selsemestre=$connexion->prepare("SELECT * from semestre");
$Selsemestre->execute();

$SelData=$connexion->prepare("SELECT affectation.*,cours.unitedenseignement,cours.nomcours,cours.credit,cours.volumehoraire,promotion.nompromotion from affectation,cours,promotion WHERE affectation.id_promotion=promotion.id and affectation.id_cours=cours.id");
$SelData->execute();

