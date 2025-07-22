<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    $nom=htmlspecialchars($_POST['nom']);
    
   $departement=htmlspecialchars($_POST['departement']);

    $sel=$connexion->prepare("SELECT * from filiere where nomfiliere=?");
    $sel->execute(array($nom));
    if($exist=$sel->fetch())
    {
      
        $_SESSION['notif']="cette filiere existe déjà";
        $_SESSION['color']='danger';
        $_SESSION['icon']="x-circle-fill";
        header('location:../../views/filiere.php');
    }
    else
    {
          
        $req=$connexion->prepare("INSERT INTO filiere (nomfiliere,iddepartement) values (?,?)");
        $req->execute(array($nom,$departement)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header('location:../../views/filiere.php');
        }
               
         
    }
                
}

?>