<?php 

$promotion=$_SESSION['promotion'];

$Selpromotion=$connexion->prepare("SELECT * from promotion where id=?");
$Selpromotion->execute(array($promotion));
$prom=$Selpromotion->fetch();

$SelData=$connexion->prepare("SELECT affectation.*,cours.unitedenseignement,cours.nomcours,cours.credit,cours.volumehoraire,promotion.nompromotion from affectation,cours,promotion WHERE affectation.id_promotion=promotion.id and affectation.id_cours=cours.id and affectation.id_promotion=?");
$SelData->execute(array($promotion));