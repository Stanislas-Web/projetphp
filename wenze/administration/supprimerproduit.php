<?php
	session_start();
	include_once('Produits.class.php');
	$produit = new Produits();
	$produit->setId($_GET['numero']);
	$produit->Supprimer($produit->getId());
?>
