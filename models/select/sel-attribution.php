<?php 

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-attribution.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier attribution";
    
    $req=$connexion->prepare("SELECT * from attribution where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from attribution where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else{
    $action="../models/add/add-attribution.php";
    $bouton="Enregistrer";
    $titre="Ajouter attribution";

}
$Selpromotion=$connexion->prepare("SELECT promotion.*,filiere.nomfiliere,departement.nomdepartement,faculte.nom from promotion,filiere,departement,faculte where promotion.idfiliere=filiere.id and filiere.iddepartement=departement.id and departement.idfaculte=faculte.id;");
$Selpromotion->execute();

$Selenseignant=$connexion->prepare("SELECT * from enseignant");
$Selenseignant->execute();

$Selcours=$connexion->prepare("SELECT * from cours where (id) not in (SELECT id_cours from attribution where anneeacademique=?)");
$Selcours->execute(array($_SESSION['annee_academique']));
$Selsemestre=$connexion->prepare("SELECT * from semestre");
$Selsemestre->execute();

$SelData=$connexion->prepare("SELECT attribution.*,cours.unitedenseignement,cours.nomcours,cours.credit,cours.volumehoraire,semestre.nomsemestre,enseignant.* from attribution,cours,semestre,enseignant WHERE attribution.id_semestre=semestre.id_semestre and attribution.id_cours=cours.id and attribution.matriculeenseignant=enseignant.matricule; ");
$SelData->execute();

