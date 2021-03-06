<?php
	class Ecoles
	{
		private $Id;
		private $Nom;
		private $Categorie;
		private $Commune;
		private $Quartier;
		private $Avenue;
		private $Numero;
		private $Logo;
		private $DateP;
		private $Temps;
		private $Identifiant;
		//les getters
		public function getId()
		{
			return $this->Id;
		}
		public function getNom()
		{
			return $this->Nom;
		}
		public function getCategorie()
		{
			return $this->Categorie;
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
		public function getLogo()
		{
			return $this->Logo;
		}
		public function getDateP()
		{
			return $this->DateP;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		public function getIdentifiant()
		{
			return $this->Identifiant;
		}		
		//les Setters
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}
		public function setCategorie($categorie)
		{
			$this->Categorie = $categorie;
		}
		public function setCommune($commune)
		{
			$this->Commune = $commune;
		}
		public function setQuartier($quartier)
		{
			$this->Quartier = $quartier;
		}
		public function setAvenue($avenue)
		{
			$this->Avenue = $avenue;
		}
		public function setNumero($Numero)
		{
			$this->Numero = $Numero;
		}
		public function setLogo($logo)
		{
			$this->Logo = $logo;
		}
		public function setDateP($dateP)
		{
			$this->DateP = $dateP;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		public function setIdentifiant($identifiant)
		{
			$this->Identifiant = $identifiant;
		}
		
		public function Ajouter($nom,$categorie,$commune,$quartier,$avenue,$numero,$logo,$identifiant)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('Erreur');
			mysqli_select_db($connexion, 'tfc');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ecoles
													WHERE nomEcoles = "'.$this->getNom().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if(mysqli_query($connexion, 'INSERT INTO ecoles VALUES ("", "'.$this->getNom().'", "'.$this->getCategorie().'", "'.$this->getCommune().'", "'.$this->getQuartier().'", "'.$this->getAvenue().'", "'.$this->getNumero().'", "'.$this->getLogo().'", NOW(), NOW(), "'.$this->getIdentifiant().'")'))
				{
?>
					<script>document.location.replace("index.php?identifiant=<?php  echo $this->getIdentifiant(); ?>");</script>
<?php
				}
				else
				{
					echo 'Erreur dans l\'ajout du parti';
				}
			}
			else
			{
				echo 'Parti déjà enregistré';
     			}			
		}
		
		public function Afficher()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'lobiko'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
	 												ORDER BY idArticle ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idArticle']);
				$this->setNom($info['nomArticle']);
				$this->setCategorie($info['quantiteArticle']);
				$this->setLogo($info['logoArticle']);
				$this->setDateP($info['dateArticle']);
				$this->setTemps($info['seuilArticle']);
				$this->setIdentifiant($info['typeArticle']);
				$jour = substr($this->getDateP(), 8, 2);
				$mois = substr($this->getDateP(), 5, 2);
				$annee = substr($this->getDateP(), 0, 4);
?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<img class="img-responsive" src="logos/<?php echo $this->getLogo(); ?>" alt="">
						<div class="blog-text">
							<h3><a href=""#><?php echo $this->getNom(); ?></a></h3>
							<span class="posted_on"><?php echo $jour . ' . ' .$mois. ' . ' .$annee; ?></span>
							<span class="comment"><a href="#"><?php echo '000' .$this->getId(); ?></a></span>
							<p>La Quantité en Stock : <?php echo $this->getCategorie(); ?> Cartons</p>
							<p>Le prix : <?php echo $this->getIdentifiant(); ?> Fc</p>
							<p>Date d'expiration : <span><?php echo $this->getTemps(); ?> </span></p>
							<p>
								<a href="#">Modifier</a> |
								<a href="supprimerecole.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>">Supprimer</a>
							</p>
						</div> 
					</div>
				</div>
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
				echo 'Ecole inexistant';
			}
		}
		
		public function Nom($idEcole)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'lobiko'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomArticle']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom du produit';
				}
			}
			else
			{
				echo 'Ecole inexistant';
			}
		}
		
		public function Categorie($idCategorie)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'tfc'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ecoles
													WHERE idEcole = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setCategorie($info['categorieEcole']);
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
		
		public function Identifiant($idProduit)
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
				echo 'Identifiant du produit inexistant';
			}
		}

		public function Commune($idEcole)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'tfc'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ecoles
													WHERE idEcole = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setCommune($info['communeEcole']);
					echo $this->getCommune();
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
		
		public function Quartier($idEcole)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'tfc'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ecoles
													WHERE idEcole = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setQuartier($info['quartierEcole']);
					echo $this->getQuartier();
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
		

		public function Avenue($idEcole)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'tfc'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ecoles
													WHERE idEcole = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setAvenue($info['avenueEcole']);
					echo $this->getAvenue();
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
		

		public function Numero($idEcole)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'tfc'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ecoles
													WHERE idEcole = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNumero($info['numeroEcole']);
					echo $this->getNumero();
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
			mysqli_select_db($connexion, 'lobiko');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM articles WHERE idArticle = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("accueil1.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>");</script>
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