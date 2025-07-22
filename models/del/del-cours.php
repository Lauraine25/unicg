<?php include_once('../../connexion/connexion.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
   
    $req=$connexion->prepare("DELETE  from cours where id=?");
    $req->execute(array($id));
    if($req)
    {
        $_SESSION['notif']="Suppression  reussie";
        $_SESSION['color']='success';
        $_SESSION['icon']="trash-fill";
        header('location:../../views/cours.php');
    }
}
?>