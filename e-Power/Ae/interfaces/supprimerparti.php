<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
	$parti->setId($_GET['numero']);
	$parti->Supprimer($parti->getId());
?>
