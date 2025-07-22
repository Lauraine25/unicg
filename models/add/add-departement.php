<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    $nom=htmlspecialchars($_POST['nom']);
    
   $faculte=htmlspecialchars($_POST['faculte']);

    $sel=$connexion->prepare("SELECT * from departement where nomdepartement=?");
    $sel->execute(array($nom));
    if($exist=$sel->fetch())
    {
      
        $_SESSION['notif']="ce departement existe déjà";
        $_SESSION['color']='danger';
        $_SESSION['icon']="x-circle-fill";
        header('location:../../views/departement.php');
    }
    else
    {
          
        $req=$connexion->prepare("INSERT INTO departement (nomdepartement,idfaculte) values (?,?)");
        $req->execute(array($nom,$faculte)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header('location:../../views/departement.php');
        }
               
         
    }
                
}

?>