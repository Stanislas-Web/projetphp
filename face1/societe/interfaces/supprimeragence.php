<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
	$agence->setId($_GET['numagence']);
	$agence->Supprimer($agence->getId());	

		
?>
