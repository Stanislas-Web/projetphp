<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
	$produit->setId($_GET['numero']);
	$produit->Supprimer($produit->getId());
?>
