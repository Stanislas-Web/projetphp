<?php
	class Commandes
	{
		private $Id;
		private $NomClient;
		private $Telephone;
		private $Commune;
		private $Quartier;
		private $Avenue;
		private $numero;
		private $NomProduit;
		private $Quantite;
		private $PrixProduit;
		private $PrixTotal;
		private $Date;
		private $Temps;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getNomClient()
		{
			return $this->NomClient;
		}
		public function getTelephone()
		{
			return $this->Telephone;
		}
		public function getCommune()
		{
			return $this->Commune;
		}
		public function getQuartier()
		{
			return $this->Quartier;
		}
		public function getAvenue()
		{
			return $this->Avenue;
		}
		public function getNumero()
		{
			return $this->Numero;
		}
		public function getNomProduit()
		{
			return $this->NomProduit;
		}
		public function getQuantite()
		{
			return $this->Quantite;
		}
		public function getPrixProduit()
		{
			return $this->PrixProduit;
		}
		public function getPrixTotal()
		{
			return $this->PrixTotal;
		}
		public function getDate()
		{
			return $this->Date;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		
		
		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNomClient($nomclient)
		{
			$this->NomClient = $nomclient ;
		}
		public function setTelephone($telephone)
		{
			$this->Telephone = $telephone;
		}
		public function setCommune($commune)
		{
			$this->Commune=$commune;
		}
		public function setQuartier($quartier)
		{
			$this->Quartier = $quartier;
		}
		public function setAvenue($avenue)
		{
			$this->Avenue = $avenue;
		}
		public function setNumero($numero)
		{
			$this->Numero = $numero;
		}
		public function setNomProduit($nomproduit)
		{
			$this->NomProduit = $nomproduit;
		}
		public function setQuantite($quantite)
		{
			$this->Quantite = $quantite;
		}
		public function setPrixProduit($prixproduit)
		{
			$this->PrixProduit = $prixproduit;
		}
		public function setPrixTotal($prixtotal)
		{
			$this->PrixTotal = $prixtotal;
		}
		public function setDate($date)
		{
			$this->Date = $date;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		
		public function Afficher()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM commandes
													ORDER BY tempsCommande DESC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idCommande']);
				$this->setNomClient($info['nomClient']);
				$this->setTelephone($info['telephoneClient']);
				$this->setCommune($info['communeClient']);
				$this->setQuartier($info['quartierClient']);
				$this->setAvenue($info['avenueClient']);
				$this->setNumero($info['numeroClient']);
				$this->setNomProduit($info['nomProduit']);
				$this->setQuantite($info['quantiteProduit']);
				$this->setPrixProduit($info['prixProduit']);
				$this->setPrixTotal($info['prixTotal']);
				$this->setDate($info['dateCommande']);
				$this->setTemps($info['tempsCommande']);
?>
				
				<div class="col-lg-4 col-md-4"><br>
					<div class="fh5co-blog animate-box"><br>
						<br>
						<div class="blog-text">
							<h3><a href=""#>Nom du Client : <?php echo $this->getNomClient(); ?></a></h3>

							<span class="posted_on"><?php //echo $jour . ' . ' .$mois. ' . ' .$annee; ?></span>
							<span class="comment"><a href="#"><?php echo '000' .$this->getId(); ?></a></span>
							<p>Phone : <strong style="color:#000"><?php echo $this->getTelephone(); ?></strong></p>
							<p>Commune : <strong style="color:#000"><?php echo $this->getCommune(); ?></strong></p>
							<p>Quartier : <strong style="color:#000"><?php echo $this->getQuartier(); ?></strong></p>
							<p>Avenue : <strong style="color:#000"><?php echo $this->getAvenue(); ?></strong></p>
							<p>Numero d'adresse : <strong style="color:#000"><?php echo $this->getNumero(); ?></strong></p>
							<p>Nom du Produit : <strong style="color:#000"><?php echo $this->getNomProduit(); ?></strong></p>
							<p>Quantité du Produit : <strong style="color:#000"><?php echo $this->getQuantite(); ?></strong></p>
							<p>Date de la Commande : <strong style="color:#000"><?php echo $this->getDate(); ?></strong></p>
							<p>Heure de la Commande : <strong style="color:#000"><?php echo $this->getTemps(); ?></strong></p>
							<p>Prix Unitaire : <strong style="color:#000"><?php echo $this->getPrixProduit().'Fc'; ?></strong></p>
							<p>Prix Total : <strong style="color:red"><?php echo $this->getPrixTotal().'Fc'; ?></strong></p>

							<p>
								<a href="modifiercommande.php?numero=<?php echo $this->getId(); ?>&numero=<?php echo $this->getId(); ?>" style="color:#158147">Modifier</a> |
								<a href="supprimercommande.php?numero=<?php echo $this->getId(); ?>" style="color:#158147">Supprimer</a>
							</p>
						</div> 
					</div>
				</div><br><br>
<?php
			}
		}
		
		public function Modifier($idProduit, $nomProduit, $categorieProduit, $logoProduit, $prixProduit, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'wenzeshop');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE idProduit = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'UPDATE produits SET nomProduit = "'.$this->getNom().'", categorieProduit = "'.$this->getCategorie().'", logoProduit = "'.$this->getLogo().'", prixProduit = "'.$this->getPrix().'" WHERE idProduit = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("produit.php?identifiant=<?php echo $info['identifiantAdministrateur'];</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la modification du produit';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations du produit à modifier';
				}
			}
			else
			{
				echo 'Produit inexistant';
			}
		}
		
		public function Nom($idProduit)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE idProduit = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomProduit']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom du produit';
				}
			}
			else
			{
				echo 'Produit inexistant';
			}
		}
		
		public function Categorie($idProduit)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE idProduit = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setCategorie($info['categorieProduit']);
					echo $this->getCategorie();
				}
				else
				{
					echo 'Erreur de chargement du categorie du produit';
				}
			}
			else
			{
				echo 'Categorie inexistant';
			}
		}
		
		public function Prix($idProduit)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE idProduit = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setPrix($info['prixProduit']);
					echo $this->getPrix();
				}
				else
				{
					echo 'Erreur de chargement du prix du produit';
				}
			}
			else
			{
				echo 'Prix du produit inexistant';
			}
		}

		public function Logo($idProduit)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE idProduit = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setLogo($info['logoProduit']);
					echo $this->getLogo();
				}
				else
				{
					echo 'Erreur de chargement du logo du produit';
				}
			}
			else
			{
				echo 'Logo du produit inexistant';
			}
		}
		
		public function Supprimer($idProduit)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'wenzeshop');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE idProduit = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM produits WHERE idProduit = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("listeproduit.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la suppression de la societe';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations du parti à supprimer';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}


	}
?>