<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    $annee=date('Y');
    
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $genre=htmlspecialchars($_POST['genre']);
    
    $telephone=htmlspecialchars($_POST['telephone']);
   
   $matricule="";
    $motdepasse=strtolower(substr($postnom,1,1)).strtoupper(substr($nom,2,1)).substr($annee,1,1).strtolower(substr($nom,1,1)).substr($telephone,4,3).substr($annee,1,2).$genre.substr($nom,1,2);
   

    $sel=$connexion->prepare("SELECT * from enseignant where telephone=? ");
    $sel->execute(array($telephone));
    if($exist=$sel->fetch())
    {
      
        $_SESSION['notif']="cet enseignant existe déjà";
        $_SESSION['color']='danger';
        
        $_SESSION['icon']="x-circle-fill";
        header('location:../../views/enseignant.php');
    }
    else
    {
         if(!is_numeric($telephone))
        {
            $_SESSION['notif']="numero incorrect";
            $_SESSION['color']='danger';
            $_SESSION['icon']="x-circle-fill";
            header('location:../../views/enseignant.php');
        }
        else if(strlen($telephone)!=10)
        {
            $_SESSION['notif']="nombre de chiffre  du numero est incorrect";
            $_SESSION['color']='danger';
            $_SESSION['icon']="x-circle-fill";
            header('location:../../views/enseignant.php');
        }
        else
        {
            $sellastenseignant=$connexion->prepare("SELECT * from enseignant order by matricule desc  limit 1");
            $sellastenseignant->execute();
            if($lastenseignant=$sellastenseignant->fetch())
            {
                $matricule="ENS".sprintf('%04d', substr($lastenseignant['matricule'],3)+1);
            }
            else 
            {
                $matricule="ENS0001";
            }         
            $req=$connexion->prepare("INSERT INTO enseignant(matricule,nom,postnom,prenom,genre,telephone,motdepasse) values (?,?,?,?,?,?,?)");
            $req->execute(array($matricule,$nom,$postnom,$prenom,$genre,$telephone,$motdepasse)); 
            if($req)
            {
                $_SESSION['notif']="Enregistrement effectuer avec succes";
                $_SESSION['color']='success';
                
                $_SESSION['icon']="check";
                header('location:../../views/enseignant.php');
            }
        }  
         
    }
                
}

?>