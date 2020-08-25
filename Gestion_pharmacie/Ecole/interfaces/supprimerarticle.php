<?php
	include('../classes.php');
	include('../objets.php');
	$article->setId($_GET['numero']);
	$article->Supprimer($article->getId());
?>