<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    $nom=htmlspecialchars($_POST['nom']);
    
   $credit=htmlspecialchars($_POST['credit']);
   $ue=htmlspecialchars($_POST['UE']);
   $heure=htmlspecialchars($_POST['heure']);

    $sel=$connexion->prepare("SELECT * from cours where nomcours=? and credit=? and volumehoraire=? and ");
    $sel->execute(array($ue,$nom,$credit,$heure)); 
    if($exist=$sel->fetch())
    {
      
        $_SESSION['notif']="ce cours existe déjà";
        $_SESSION['color']='danger';
        $_SESSION['icon']="x-circle-fill";
        header('location:../../views/cours.php');
    }
    else
    {
          
        $req=$connexion->prepare("INSERT INTO cours (unitedenseignement,nomcours,credit,volumehoraire) values (?,?,?,?)");
        $req->execute(array($ue,$nom,$credit,$heure)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header('location:../../views/cours.php');
        }
               
         
    }
                
}

?>