<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    
    $anneeacademique=$_SESSION['annee_academique'];
    $date=date("Y-m-d");
    $id_cours=htmlspecialchars($_POST['cours']);
    $id_promotion=htmlspecialchars($_POST['promotion']);
    
   

   
          
        $req=$connexion->prepare("INSERT INTO affectation (dateaffectation,anneeacademique,id_promotion,id_cours) values (?,?,?,?)");
        $req->execute(array($date,$anneeacademique,$id_promotion,$id_cours,)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header('location:../../views/affectation.php');
        }
               
         
    
                
}

?>