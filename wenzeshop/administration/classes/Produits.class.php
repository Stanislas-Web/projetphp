<?php
	class Produits
	{
		private $Id;
		private $Nom;
		private $Categorie;
		private $Logo;
		private $Prix;
		private $Libelle;
		private $DateP;
		private $Temps;
		
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
		public function getLogo()
		{
			return $this->Logo;
		}
		public function getPrix()
		{
			return $this->Prix;
		}
		public function getLibelle()
		{
			return $this->Libelle;
		}
		public function getDateP()
		{
			return $this->DateP;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}
		public function setCategorie($Categorie)
		{
			$this->Categorie = $Categorie;
		}
		public function setLogo($logo)
		{
			$this->Logo = $logo;
		}
		public function setPrix($prix)
		{
			$this->Prix = $prix;
		}
		public function setLibelle($libelle)
		{
			$this->Libelle = $libelle;
		}
		public function setDateP($dateP)
		{
			$this->DateP = $dateP;
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
													FROM produits
													ORDER BY idProduit ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idProduit']);
				$this->setNom($info['nomProduit']);
				$this->setCategorie($info['categorieProduit']);
				$this->setLogo($info['logoProduit']);
				$this->setDateP($info['dateProduit']);
				$this->setTemps($info['tempsProduit']);
				$this->setPrix($info['prixProduit']);
?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<img class="img-responsive" src="../logos/<?php echo $this->getLogo(); ?>" alt="">
						<div class="blog-text">
							<h3><a href=""#><?php echo $this->getNom(); ?></a></h3>
							<span class="posted_on"><?php //echo $jour . ' . ' .$mois. ' . ' .$annee; ?></span>
							<span class="comment"><a href="#"><?php //echo '000' .$this->getId(); ?></a></span>
							<p><?php echo $this->getCategorie(); ?></p>
							<p>
								<a href="modifierproduit.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>">Modifier</a> |
								<a href="supprimerproduit.php?numero=<?php echo $this->getId(); ?>">Supprimer</a>
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