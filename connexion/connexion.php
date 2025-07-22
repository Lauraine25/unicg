<?php
try {
session_start();	
$connexion=new PDO('mysql:dbname=ucg; host=localhost', 'root', '');
} catch (Exception $e) {
	echo $e;
	
}
$a=date("Y");
$_SESSION['annee_academique']=$a."-".$a+1;
?>
