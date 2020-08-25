<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
	$annonce->setId($_GET['numannonce']);
	$annonce->Supprimer($annonce->getId());
?>
