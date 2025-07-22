<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    $nom=htmlspecialchars($_POST['nom']);
    
   

    $sel=$connexion->prepare("SELECT * from faculte where nom=? ");
    $sel->execute(array($nom));
    if($exist=$sel->fetch())
    {
      
        $_SESSION['notif']="cette faculte existe déjà";
        $_SESSION['color']='danger';
        
        $_SESSION['icon']="x-circle-fill";
        header('location:../../views/faculte.php');
    }
    else
    {
          
        $req=$connexion->prepare("INSERT INTO faculte (nom) values (?)");
        $req->execute(array($nom)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
            
             $_SESSION['icon']="check";
             header('location:../../views/faculte.php');
        }
               
         
    }
                
}

?>