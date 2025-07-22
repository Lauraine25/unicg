<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    
    $anneeacademique=$_SESSION['annee_academique'];
    $id_semestre=htmlspecialchars($_POST['semestre']);
    $id_cours=htmlspecialchars($_POST['cours']);
    $matriculeenseignant=htmlspecialchars($_POST['enseignant']);
    

   
          
        $req=$connexion->prepare("INSERT INTO attribution (anneeacademique,id_semestre,id_cours,matriculeenseignant) values (?,?,?,?)");
        $req->execute(array($anneeacademique,$id_semestre,$id_cours,$matriculeenseignant)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header('location:../../views/attribution.php');
        }
               
         
    
                
}

?>