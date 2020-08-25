<?php
	Class Societes
	{
		private $Id;
		private $Nom;
		private $Description;
		private $Logo;
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
		public function getDescription()
		{
			return $this->Description;
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
		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}
		public function setDescription($description)
		{
			$this->Description = $description;
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
		
		public function Ajouter($nomSociete, $descriptionSociete, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('Erreur');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE nomSociete = "'.$this->getNom().'"');
			if(mysqli_num_rows($requete) == 0)
		 	{
				if(mysqli_query($connexion, 'INSERT INTO societes VALUES ("", "'.$this->getNom().'", "'.$this->getDescription().'", NOW(), NOW(), "'.$identifiantAdministrateur.'")'))
				{
?>
					<script>document.location.replace("../index.php?identifiant=<?php echo $identifiantAdministrateur; ?>");</script>
<?php
				}
				else
				{
					echo 'Erreur dans l\'ajout de la société';
				}
			}
			else
			{
				echo 'Societe déjà enregistré';
			}
		}
		
		public function Afficher()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													ORDER BY nomSociete ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idSociete']);
				$this->setNom($info['nomSociete']);
				$this->setDescription($info['descriptionSociete']);
				$this->setLogo($info['logoSociete']);
				$this->setDateP($info['dateSociete']);
				$jour = substr($this->getDateP(), 8, 2);
				$mois = substr($this->getDateP(), 5, 2);
				$annee = substr($this->getDateP(), 0, 4);
?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<img class="img-responsive" src="../logos/<?php echo $this->getLogo(); ?>" alt="">
						<div class="blog-text">
							<h3><a href=""#><?php echo $this->getNom(); ?></a></h3>
							<span class="posted_on"><?php echo $jour . ' . ' .$mois. ' . ' .$annee; ?></span>
							<span class="comment"><a href="#"><?php echo '000' .$this->getId(); ?></a></span>
							<p><?php echo $this->getDescription(); ?></p>
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
		
		public function Admin($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					echo $info['identifiantAdministrateur'];
				}
				else
				{
					echo 'Erreur de chargement du nom de l\'administrateur';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Verification($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
?>
					<script>document.location.replace('inscription.php?numero=<?php echo $this->getId(); ?>');</script>
<?php
				}
				else
				{
					echo 'Erreur de chargement du nom de la société';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Matricule($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setId($info['idSociete']);
					echo $this->getId();
				}
				else
				{
					echo 'Erreur de chargement du matricule de la société';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Nom($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomSociete']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom de la société';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Photo($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setLogo($info['logoSociete']);
					echo $this->getLogo();
				}
				else
				{
					echo 'Erreur de chargement du nom de la société';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Timing($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setDateP($info['dateSociete']);
					$jour = substr($this->getDateP(), 8, 2);
					$mois = substr($this->getDateP(), 5, 2);
					$annee = substr($this->getDateP(), 0, 4);
					echo $jour. ' . ' .$mois. ' . ' .$annee;
				}
				else
				{
					echo 'Erreur de chargement de la date d\'enregistrement de la société';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Description($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setDescription($info['descriptionSociete']);
					echo $this->getDescription();
				}
				else
				{
					echo 'Erreur de chargement de la description de la société';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Supprimer($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM societes WHERE idSociete = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("accueil.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la suppression de la société';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de la société à supprimer';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Modifier($idSociete, $nomSociete, $descriptionSociete, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'UPDATE societes SET nomSociete = "'.$this->getNom().'", descriptionSociete = "'.$this->getDescription().'" WHERE idSociete = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("parti.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la modification de la société';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de la société à modifier';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
	}
?>