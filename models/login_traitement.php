<?php
include_once('../connexion/connexion.php');
if(isset($_POST['valider']) && $_GET['fonction'])
{
    $fonction=$_GET['fonction'];
    
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);
   if($fonction=='admin' )
    {
        $req=$connexion->prepare("SELECT * from utilisateur where username=? and password=?");
        $req->execute(array($username,$password));
        if($user=$req->fetch())
        { 
            unset($_SESSION['notif']);
            unset($_SESSION['color']);
            unset($_SESSION['icon']);
            $_SESSION['fonction']=$fonction;
            $_SESSION['noms']=$user['prenom']." ".$user['postnom'];
            $_SESSION['matricule']=$user['matricule'];
            header("location:../views/index.php");

        }
        else
        {
            $_SESSION['notif']="username ou mot de passe incorrect";
            $_SESSION['color']='danger';
            $_SESSION['icon']="x-circle-fill";
            header("location:../login.php?fonction=$fonction");
        }
        echo "admin";
    }
    else if($fonction=='enseignant' )
    {
        $req=$connexion->prepare("SELECT * from enseignant where matricule=? and motdepasse=?");
        $req->execute(array($username,$password));
        if($user=$req->fetch())
        { 
            unset($_SESSION['notif']);
            unset($_SESSION['color']);
            unset($_SESSION['icon']);
            $_SESSION['fonction']=$fonction;
            $_SESSION['noms']=$user['prenom']." ".$user['postnom'];
            $_SESSION['matricule']=$user['matricule'];
            header("location:../views/index.php");

        }
        else
        {
            $_SESSION['notif']="username ou mot de passe incorrect";
            $_SESSION['color']='danger';
            $_SESSION['icon']="x-circle-fill";
            header("location:../login.php?fonction=$fonction");
        }
       
    }
     else if($fonction=='etudiant' )
    {
        $req=$connexion->prepare("SELECT * from inscription where matricule=? and motdepasse=? order by id DESC");
        $req->execute(array($username,$password));
        if($user=$req->fetch())
        { 
            unset($_SESSION['notif']);
            unset($_SESSION['color']);
            unset($_SESSION['icon']);
            $_SESSION['fonction']=$fonction;
            $_SESSION['noms']=$user['prenom']." ".$user['postnom'];
            $_SESSION['promotion']=$user['idpromotion'];
            $_SESSION['matricule']=$user['matricule'];
            header("location:../views/index.php");

        }
        else
        {
            $_SESSION['notif']="username ou mot de passe incorrect";
            $_SESSION['color']='danger';
            $_SESSION['icon']="x-circle-fill";
            header("location:../login.php?fonction=$fonction");
           
             
        }
       
    }
    
    else
        {
            header("location:../index.php");
        }

    }
else
{
    header("location:../index.html");
}
?>