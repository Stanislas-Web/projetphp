<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
	$annonce->setId($_GET['numero']);
	$annonce->Supprimer($annonce->getId());
?>
