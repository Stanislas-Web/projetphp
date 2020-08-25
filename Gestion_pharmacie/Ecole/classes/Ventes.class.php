<?php
	class Ventes extends Ravitaillements
	{
		public function getTotal()
		{
			return $this->Total;
		}
		
		public function setTotal($total)
		{
			$this->Total = $total;
		}
		
		public function Effectuer($idArticle, $quantiteArticle, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ravitaillements
													WHERE idArticle = "'.$idArticle.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomArticle']);
					$this->setPrix($info['prixArticle']);
					if($this->getQuantite() <= $info['quantiteArticle'])
					{
						$nouveauStock = $info['quantiteArticle'] - $this->getQuantite();
						if(mysqli_query($connexion, 'INSERT INTO ventes VALUES ("", "'.$this->getNom().'", "'.$this->getQuantite().'", "'.$this->getPrix().'", "'.$quantiteArticle * $this->getPrix().'", NOW(), NOW(), "'.$idArticle.'", "'.$identifiantAdministrateur.'")') and mysqli_query($connexion, 'UPDATE ravitaillements SET quantiteArticle = "'.$nouveauStock.'" WHERE idArticle = "'.$idArticle.'"'))
						{
?>
							<script>document.location.replace('article.php?identifiant=<?php echo $identifiantAdministrateur; ?>&numero=<?php echo $idArticle; ?>');</script>
<?php
						}
						else
						{
							echo 'Erreur dans la vente de l\'article';
						}
					}
					else
					{
						echo 'Le stock est insuffisant par rapport à la demande';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'article à vendre';
				}
			}
			else
			{
				echo 'Article inexistant dans le stock';
			}
		}
		
		public function Afficher($idArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ventes
													WHERE idArticle = "'.$idArticle.'"');
			echo '<br>';
			echo 'Les ventes<hr>';
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idVente']);
				$this->setDateA($info['dateVente']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
				$this->setQuantite($info['quantiteArticle']);
				$this->setPrix($info['prixArticle']);
				$this->setTotal($info['totalArticle']);
?>
				<a href="#">Supprimer</a> | 
<?php
				echo $jour. ' . ' .$mois. ' . ' .$annee. ' : ' .$this->getQuantite(). ' pièces x ' .$this->getPrix(). ' = ' .$this->getTotal(). '<br>';
			}
		}
	}
?>