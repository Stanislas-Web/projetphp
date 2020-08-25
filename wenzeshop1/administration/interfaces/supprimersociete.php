<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
	$societe->setId($_GET['numero']);
	$societe->Supprimer($societe->getId());
?>
