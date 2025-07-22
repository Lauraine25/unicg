<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
    
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $genre=htmlspecialchars($_POST['genre']);
    $adresse=htmlspecialchars($_POST['adresse']);
    $telephone=htmlspecialchars($_POST['telephone']);
    $nationalite=htmlspecialchars($_POST['nationalite']);
    $etatcivil=htmlspecialchars($_POST['etatcivil']);
    $lieudenaissance=htmlspecialchars($_POST['lieudenaissance']);
    $datedenaissance=htmlspecialchars($_POST['datedenaissance']);
    $provincedorigine=htmlspecialchars($_POST['provincedorigine']);
    $villedorigine=htmlspecialchars($_POST['villedorigine']);
    $ecoleorigine=htmlspecialchars($_POST['ecoledorigine']);
    $territoirecommune=htmlspecialchars($_POST['territoirecommune']);
    $pourcentage=htmlspecialchars($_POST['pourcentage']);
    $anneediplome=htmlspecialchars($_POST['anneediplome']);
    
   

    $sel=$connexion->prepare("SELECT * from etudiant where telephone=? ");
    $sel->execute(array($telephone));
    if($exist=$sel->fetch())
    {
      
        $_SESSION['notif']="cette etudiant existe déjà";
        $_SESSION['color']='danger';
        
        $_SESSION['icon']="x-circle-fill";
        header('location:../../views/etudiant.php');
    }
    else
    {
          
        $req=$connexion->prepare("INSERT INTO etudiant (nom,postnom,prenom,genre,telephone,etatcivil,lieudenaissance,datedenaissance,adresse,nationalite,provincedorigine,villedorigine,territoirecommune,ecoleorigine,pourcentage,anneediplome) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $req->execute(array($nom,$postnom,$prenom,$genre,$telephone,$etatcivil,$lieudenaissance,$datedenaissance,$adresse,$nationalite,$provincedorigine,$villedorigine,$territoirecommune,$ecoleorigine,$pourcentage,$anneediplome)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
            
             $_SESSION['icon']="check";
             header('location:../../views/etudiant.php');
        }
               
         
    }
                
}

?>