<?php



if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $action="../models/update/up-coter.php?id=$id";
    $bouton="Modifier";
    $titre="Modifier cote";
    
    $req=$connexion->prepare("SELECT * from cote where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}

else if(isset($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $req=$connexion->prepare("SELECT * from cote where id=?");
    $req->execute(array($id));
    $supprimer=$req->fetch();
    $titre="";

}
else if(isset($_GET['affectation']))
{
    $affectation=$_GET['affectation'];
    $attribution=$_GET['attribution'];
    $annee_academique=$_GET['anneeacademique'];
    $Seletudiant=$connexion->prepare("SELECT etudiant.nom,etudiant.postnom,etudiant.prenom,inscription.matricule,inscription.anneeacademique,inscription.id as idinscription from etudiant,inscription,affectation,promotion WHERE etudiant.id=inscription.idetudiant and promotion.id=inscription.idpromotion and affectation.id_promotion=promotion.id and affectation.id=? and affectation.anneeacademique=? and (inscription.id) not in(SELECT id_inscription from cote where cote.anneeacademique=? and cote.id_attribution=?)
 ");
    $Seletudiant->execute(array($affectation,$annee_academique,$annee_academique,$attribution));
    $action="../models/add/add-coter.php?attribution=$attribution&affectation=$affectation&anneeacademique=$annee_academique";
    $bouton="Enregistrer";
    $titre="Ajouter cote";
    $SelData=$connexion->prepare("SELECT etudiant.nom,etudiant.postnom,etudiant.prenom,inscription.matricule,cote.* from etudiant,inscription,cote WHERE etudiant.id=inscription.idetudiant and cote.id_inscription=inscription.id  and cote.anneeacademique=? and cote.id_attribution=? ");
$SelData->execute(array($annee_academique,$attribution));
}
else{
    $action="../models/add/add-coter.php";
    $bouton="Enregistrer";
    $titre="Ajouter cote";

}

$SelAttribution=$connexion->prepare("SELECT attribution.*,cours.unitedenseignement,cours.nomcours,cours.credit,cours.volumehoraire,affectation.id as affectation,semestre.nomsemestre,enseignant.*,promotion.nompromotion,filiere.nomfiliere,departement.nomdepartement,faculte.nom as nomfaculte from attribution,cours,semestre,enseignant,promotion,filiere,departement,faculte,affectation WHERE attribution.id_semestre=semestre.id_semestre and attribution.id_cours=cours.id and attribution.matriculeenseignant=enseignant.matricule and affectation.id_cours=cours.id and affectation.id_promotion=promotion.id and promotion.idfiliere=filiere.id and filiere.iddepartement=departement.id and departement.idfaculte=faculte.id   and enseignant.matricule=? ");
$SelAttribution->execute(array($_SESSION['matricule']));


