<?php
	class Ravitaillements extends Articles
	{
		public function getQuantite()
		{
			return $this->Quantite;
		}
		
		public function setQuantite($quantite)
		{
			$this->Quantite = $quantite;
		}
		
		public function Faire($idArticle, $quantiteArticle, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$idArticle.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomArticle']);
					$this->setPrix($info['prixArticle']);
					$requete = mysqli_query($connexion, 'SELECT *
															FROM ravitaillements
															WHERE idArticle = "'.$idArticle.'"');
					if(mysqli_num_rows($requete) == 0)
					{
						if(mysqli_query($connexion, 'INSERT INTO ravitaillements VALUES ("", "'.$this->getNom().'", "'.$this->getQuantite().'", "'.$this->getPrix().'", NOW(), NOW(), "'.$idArticle.'", "'.$identifiantAdministrateur.'")'))
						{
?>
							<script>document.location.replace('article.php?identifiant=<?php echo $identifiantAdministrateur?>&numero=<?php echo $idArticle; ?>');</script>
<?php	
						}
						else
						{
							echo 'Erreur dans le ravitaillement de l\'article';
						}
					}
					else
					{
						echo 'Le stock n\'est pas encore à terme';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'article à ravitailler';
				}
			}
			else
			{
				echo 'Article inexistant';
			}
		}
		
		public function Total($idArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$idArticle.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				$requete = mysqli_query($connexion, 'SELECT *
														FROM ravitaillements
														WHERE idArticle = "'.$idArticle.'"');
				if(mysqli_num_rows($requete) == 1)
				{
					if($info = mysqli_fetch_array($requete))
					{
						$this->setQuantite($info['quantiteArticle']);
						if($this->getQuantite() != 0)
						{
							echo $this->getQuantite(). ' pièces en stock';
						}
						else
						{
							echo 'Veuillez supprimer la date du dernier ravitaillement puisque le stock est épuisé';
						}
					}
					else
					{
						echo 'Erreur de chargement des informations du stock';
					}	
				}
				else
				{
					echo 'Stock inexistant';
				}
			}
			else
			{
				echo 'Article inexistant';
			}
		}
		
		public function Afficher($idArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ravitaillements
													WHERE idArticle = "'.$idArticle.'"');
			echo 'Dernier ravitaillement en date<hr>';
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idRavitaillement']);
				$this->setDateA($info['dateRavitaillement']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
				$this->setQuantite($info['quantiteArticle']);
?>
				<a href="supprimerravitaillement.php?numero=<?php echo $this->getId(); ?>">Supprimer</a> | 
<?php
				echo $jour. ' . ' .$mois. ' . ' .$annee. ' : ' .$this->getQuantite(). ' pièces<br>';
			}
		}
		
		public function Supprimer($idRavitaillement)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ravitaillements
													WHERE idRavitaillement = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM ravitaillements WHERE idRavitaillement = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace('article.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $info['idArticle']; ?>');</script>
<?php
					}
					else
					{
						echo 'Erreur dans la suppression du ravitaillement';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations du ravitaillement à supprimer';
				}
			}
			else
			{
				echo 'Ravitaillement inexistant';
			}
		}
	}
?>