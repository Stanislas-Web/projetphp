<?php
class Panier{
		/*public function __construct(){
			if(!isset($_SESSION)){
				session_start();
			}
			if(!isset($_SESSION['panier'])){
				$_SESSION['panier']= array();		
			}
		}
		
		public function add($requete){
			$_SESSION['panier'][$requete->id] = 1;
		}*/
		
		
		public function creationPanier(){
			if (!isset($_SESSION['panier'])){
			  $_SESSION['panier']=array();
			  $_SESSION['panier']['libelleProduit'] = array();
			  $_SESSION['panier']['qteProduit'] = array();
			  $_SESSION['panier']['prixProduit'] = array();
			  $_SESSION['panier']['verrou'] = false;
		   }
		   return true;
		}
		
		public function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

			//Si le panier existe
			if (creationPanier() && !isVerrouille())
				{
					//Si le produit existe déjà on ajoute seulement la quantité
					$positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

				if ($positionProduit !== false)
					{
							$_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
					}
					else
					{
						//Sinon on ajoute le produit
					array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
					array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
					array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
					}
				}
				else
					echo "Un problème est survenu veuillez contacter l'administrateur du site.";
		}
		
		public function modifierQTeArticle($libelleProduit,$qteProduit){
		   //Si le panier éxiste
		   if (creationPanier() && !isVerrouille())
		   {
			  //Si la quantité est positive on modifie sinon on supprime l'article
			  if ($qteProduit > 0)
			  {
				 //Recharche du produit dans le panier
				 $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

				 if ($positionProduit !== false)
				 {
					$_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
				 }
			  }
			  else
			  supprimerArticle($libelleProduit);
		   }
		   else
		   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
		}
		
		public function MontantGlobal(){
		   $total=0;
		   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
		   {
			  $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
		   }
		   return $total;
		}	

			
		public function isVerrouille(){
		   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
		   return true;
		   else
		   return false;
		}

		public function compterArticles()
		{
		   if (isset($_SESSION['panier']))
		   return count($_SESSION['panier']['libelleProduit']);
		   else
		   return 0;

		}
		
		function supprimePanier(){
			unset($_SESSION['panier']);
		}

    }
?>