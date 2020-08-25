<?php
class Panier{
	public function __construct(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(!isset($_SESSION['panier'])){
			$_SESSION['panier']= array();
			$_SESSION['panier']['nomProduit']= array();
			$_SESSION['panier']['categorieProduit']= array();
			$_SESSION['panier']['prixProduit']= array();
			$_SESSION['panier']['logoProduit']= array();
			$_SESSION['panier']['verrou']=array();
		}
	}
	
	public function add($requete){
		$_SESSION['panier'][$requete->id] = 1;
	}

}
?>