<?php 
try{
	$bdd=new PDO('mysql:host=localhost;dbname=MC','root','');
}
catch(Exception $e)
{
	die ('Erreur:'.$e->getMessage());

}

$req=$bdd->prepare('INSERT INTO minichat(prenom, message)
VALUES(?, ?) ');
$req->execute(array($_POST['prenom'], $_POST['message']));
header('location:formulaire.php');
 ?>