<?php
	include('../classes.php');
	include('../objets.php');

if(isset($_GET['id'])){
	$requete=$DB->query('SELECT * FROM produits WHERE idProduit=:id ', array('id' => $_GET['id']));
	if(empty($requete)){
		die("Ce produit n'existe pas");
	}
	$_SESSION['panier']['$requete[0]->id'] = 1;
	var_dump($_SESSION);
	die('le produit a bien �t� ajouter � votre panier <a href="javascript:history.back()">retourner sur le catalogue</a>');
}else{
 die("Vous n'avez pas s�lectionn� un produit � ajouter au panier");
}

?>