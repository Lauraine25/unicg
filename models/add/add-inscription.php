<?php 
include('../../connexion/connexion.php');

// $matricule="ETU0001222/2025";
// $valeur = $matricule;



//  if (strlen($valeur) == 12) {
  
//      $numero = sprintf('%04d',substr($valeur, 3, 4)) ;
//             echo $numero;
        

//        }
//        else
//        {
        
//         $nb = strlen($valeur) - 12 + 4;
//          $numero = substr($valeur, 3, $nb) ;
//          echo $numero;
           

//        }
// $pr="L1 ECONO";
//  $partPromotion=substr($pr, 3, 3) ;
//  echo $partPromotion;

if (isset($_POST["valider"])) 
{
    $annee=date("Y");
    $promotion=htmlspecialchars($_POST['promotion']);
    $etudiant=htmlspecialchars($_POST['etudiant']);
    $anneeacademique=$annee."-".$annee+1;
    $dateinscription=date('Y-m-d');
    $SelLast = $connexion->prepare("SELECT * FROM inscription where idpromotion=? ORDER BY matricule DESC LIMIT 1 ");
    $SelLast->execute(array($promotion));
    if ($mat = $SelLast->fetch()) {
        $valeur = $mat['matricule'];
        if (strlen($valeur) == 12) {
             $numero = sprintf('%04d',substr($valeur, 3, 4)) ;
            // echo $numero;
       }
       else
       {
            $nb = strlen($valeur) - 12 + 4;
            $numero = substr($valeur, 3, $nb) ;
            // echo $numero;

       }
    } else {
        $numero = sprintf('%04d',1);
    }
    $selpromotion=$connexion->prepare("SELECT * from promotion where id=?");
    $selpromotion->execute(array($promotion));
    $prom=$selpromotion->fetch();
    $pr=$prom['nompromotion'];
    $partPromotion=substr($pr, 3, 3) ;
    // echo $partPromotion;

     $matricule = $partPromotion.$numero .'/'.$annee;
     echo $matricule ;
     $sel_etu=$connexion->prepare("SELECT * from etudiant where id=?");
     $sel_etu->execute(array($etudiant));
     $etu=$sel_etu->fetch();
     $nom=$etu['nom'];
     $postnom=$etu['postnom'];
     $prenom=$etu['prenom'];
     $telephone=$etu['telephone'];
     $genre=$etu['genre'];
     $motdepasse=strtolower(substr($postnom,1,1)).strtoupper(substr($nom,2,1)).substr($annee,1,1).strtolower(substr($nom,1,1)).substr($telephone,4,3).substr($annee,1,2).$genre.substr($nom,1,2);

    echo $motdepasse;
          
        $req=$connexion->prepare("INSERT INTO inscription (matricule,motdepasse,dateinscription,anneeacademique,idetudiant,idpromotion) values (?,?,?,?,?,?)");
        $req->execute(array($matricule,$motdepasse,$dateinscription,$anneeacademique,$etudiant,$promotion)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header('location:../../views/inscription.php');
        }
               
         
    
                
}

?>