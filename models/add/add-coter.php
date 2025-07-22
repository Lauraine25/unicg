<?php 
include('../../connexion/connexion.php');


if (isset($_POST["valider"])) 
{
        $gradedevaluation="";
        $affectation=$_GET['affectation'];
        $dateevalaluation=date('Y-m-d');
        $anneeacademique=$_GET['anneeacademique'];
        $id_attribution=$_GET['attribution'];
        $id_inscription=htmlspecialchars($_POST['etudiant']);
        $cote_tp=htmlspecialchars($_POST['cote_tp']);
        $cote_interro=htmlspecialchars($_POST['cote_interro']);
        $cote_exam=htmlspecialchars($_POST['cote_exam']);
    

   
          
        $req=$connexion->prepare("INSERT INTO cote (gradedevaluation,dateevalaluation,anneeacademique,id_attribution,id_inscription,cote_tp,cote_interro,cote_exam) values (?,?,?,?,?,?,?,?)");
        $req->execute(array($gradedevaluation,$dateevalaluation,$anneeacademique,$id_attribution,$id_inscription,$cote_tp,$cote_interro,$cote_exam)); 
        if($req)
        {
             $_SESSION['notif']="Enregistrement effectuer avec succes";
             $_SESSION['color']='success';
             $_SESSION['icon']="check";
             header("location:../../views/coter.php?attribution=$id_attribution&affectation=$affectation&anneeacademique=$anneeacademique");
        }
               
         
    
                
}

?>