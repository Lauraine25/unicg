<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    $id=$_GET['id'];
    $nom=htmlspecialchars($_POST['nom']);

   

    $sel=$connexion->prepare("SELECT * from faculte where nom=?  and id!=?");
    $sel->execute(array($nom,$id));
    if($exist=$sel->fetch())
    {
        $_SESSION['titre']='Erreur !!!';
        $_SESSION['notif']="Une faculte avec ce nom existe déjà";
        $_SESSION['color']='danger';
        $_SESSION['icon']="x-circle-fill";
        header("location:../../views/faculte.php?id=$id");
    }
    else
    {
          
        $req=$connexion->prepare("UPDATE  faculte SET nom=?  where id=?");
        $req->execute(array($nom,$id)); 
        if($req)
        {
             $_SESSION['notif']="modification  effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['titre']='success !!!';
             $_SESSION['icon']="check";
             header('location:../../views/faculte.php');
        }
               
         
    }
                
}

?>