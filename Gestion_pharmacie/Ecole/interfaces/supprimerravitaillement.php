<?php
	include('../classes.php');
	include('../objets.php');
	$ravitaillement->setId($_GET['numero']);
	$ravitaillement->Supprimer($ravitaillement->getId());
?>