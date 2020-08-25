<?php
	Class Agences
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
		
		public function Ajouter($nomParti, $descriptionParti, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('Erreur');
			mysqli_select_db($connexion, 'encyclopeki');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM partis
													WHERE nomParti = "'.$this->getNom().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if(mysqli_query($connexion, 'INSERT INTO partis VALUES ("", "'.$this->getNom().'", "'.$this->getDescription().'", NOW(), NOW(), "'.$identifiantAdministrateur.'")'))
				{
?>
					<script>document.location.replace("../index.php?identifiant=<?php echo $identifiantAdministrateur; ?>");</script>
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
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM clients
													ORDER BY nomClient ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idClient']);
				$this->setNom($info['nomClient']);
				$this->setDescription($info['descriptionParti']);
				$this->setLogo($info['logoParti']);
				$this->setDateP($info['dateParti']);
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
		
		public function Admin($idParti)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'encyclopeki'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM partis
													WHERE idParti = "'.$this->getId().'"');
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
				echo 'Parti inexistant';
			}
		}
		
		public function Verification($idAgence)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM agences
													WHERE idAgence = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
?>
					<script>document.location.replace("interfaces/accueil.php?numeroAgence=<?php echo $info['idAgence']; ?>&numeroSociete=<?php echo $info['idSociete']; ?>");</script>
<?php
				}
				else
				{
					echo 'Erreur de chargement du nom de l Agence';
				}
			}
			else
			{
				echo 'Agence inexistante';
			}
		}
		
		public function Matricule($idParti)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'encyclopeki'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM partis
													WHERE idParti = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setId($info['idParti']);
					echo $this->getId();
				}
				else
				{
					echo 'Erreur de chargement du matricule du parti';
				}
			}
			else
			{
				echo 'Parti inexistant';
			}
		}
		
		public function Nom($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM agences
													WHERE idAgence = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomAgence']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom de l\'agence';
				}
			}
			else
			{
				echo 'agence inexistante';
			}
		}
		
		public function NomSociete($id)
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
					echo 'Erreur de chargement du nom du parti';
				}
			}
			else
			{
				echo 'Societe inexistante';
			}
		}
		
		public function AfficherAnnonce($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idSociete = "'.$this->getId().'"');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idAnnonce']);
				$this->setTitre($info['titreAnnonce']);
				$this->setDescription($info['descriptionAnnonce']);
				$this->setImage($info['imageAnnonce']);
				$this->setDateA($info['dateAnnonce']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<img class="img-responsive" src="../logos/<?php echo $this->getImage(); ?>" alt="">
						<div class="blog-text">
							<h3><a href="annonce.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>"><?php echo $this->getTitre(); ?></a></h3>
							<span class="posted_on"><?php echo $jour . ' . ' .$mois. ' . ' .$annee; ?></span>
							<p><?php echo substr(nl2br($this->getDescription()), 0, 97). '...'; ?></p>
							<a href="#" class="btn btn-primary">Lire plus...</a><br><br>
						</div> 
					</div>
				</div>
<?php
			}
		}
		
		public function Timing($idAgence)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM agences
													WHERE idAgence = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setDateP($info['date']);
					$jour = substr($this->getDatep(), 8, 2);
					$mois = substr($this->getDateP(), 5, 2);
					$annee = substr($this->getDateP(), 0, 4);
					echo $jour. ' . ' .$mois. ' . ' .$annee;
				}
				else
				{
					echo 'Erreur de chargement de la date d\'enregistrement du parti';
				}
			}
			else
			{
				echo 'Parti inexistant';
			}
		}
		
		public function Description($idAgence)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM agences
													WHERE idAgence = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setDescription($info['descriptionParti']);
					echo $this->getDescription();
				}
				else
				{
					echo 'Erreur de chargement de la description du parti';
				}
			}
			else
			{
				echo 'Parti inexistant';
			}
		}
		
		public function Supprimer($idParti)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'encyclopeki');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM partis
													WHERE idParti = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM partis WHERE idParti = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("accueil.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la suppression du parti';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations du parti à supprimer';
				}
			}
			else
			{
				echo 'Parti inexistant';
			}
		}
		
		public function Modifier($idParti, $nomParti, $descriptionParti, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'encyclopeki');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM partis
													WHERE idParti = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'UPDATE partis SET nomParti = "'.$this->getNom().'", descriptionParti = "'.$this->getDescription().'" WHERE idParti = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("parti.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la modification du parti';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations du parti à modifier';
				}
			}
			else
			{
				echo 'Parti inexistant';
			}
		}
	}
?>