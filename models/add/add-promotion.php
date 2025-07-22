<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    $nom=strtoupper(htmlspecialchars($_POST['nom']));
    
   $filiere=htmlspecialchars($_POST['filiere']);
   

    $sel=$connexion->prepare("SELECT * from promotion where nompromotion=? and idfiliere=?");
    $sel->execute(array($nom,$filiere));
    if($exist=$sel->fetch())
    {
      
        $_SESSION['notif']="cette promotion existe déjà";
        $_SESSION['color']='danger';
        $_SESSION['icon']="x-circle-fill";
        header('location:../../views/promotion.php');
    }
    
    else
    {
          
        $req=$connexion->prepare("INSERT INTO promotion (nompromotion,idfiliere) values (?,?)");
        $req->execute(array($nom,$filiere)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header('location:../../views/promotion.php');
        }
               
         
    }
                
}

?>