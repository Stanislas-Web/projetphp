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
			mysqli_select_db($connexion, 'tfc'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM ecoles
													ORDER BY idEcole ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idEcole']);
				$this->setNom($info['nomEcole']);
				$this->setCategorie($info['categorieEcole']);
				$this->setLogo($info['logoEcole']);
				$this->setDateP($info['dateEcole']);
				$this->setTemps($info['tempsEcole']);
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
							<p><?php echo $this->getCategorie(); ?></p>
							<p>
								<a href="modifierparti.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>">Modifier</a> |
								<a href="supprimerparti.php?numero=<?php echo $this->getId(); ?>">Supprimer</a>
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
				echo 'Ecole inexistant';
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