<?php
	Class Annonces
	{
		private $Id;
		private $Titre;
		private $Description;
		private $Image;
		private $DateA;
		private $Temps;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getTitre()
		{
			return $this->Titre;
		}
		public function getDescription()
		{
			return $this->Description;
		}
		public function getImage()
		{
			return $this->Image;
		}
		public function getDateA()
		{
			return $this->DateA;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setTitre($titre)
		{
			$this->Titre = $titre;
		}
		public function setDescription($description)
		{
			$this->Description = $description;
		}
		public function setImage($image)
		{
			$this->Image = $image;
		}
		public function setDateA($dateA)
		{
			$this->DateA = $dateA;
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
		
		public function AfficherMilitant($identifiant, $idParti)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'encyclopeki'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idParti = "'.$idParti.'"');
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
							<a href="annonce.php?identifiant=<?php echo $identifiant; ?>&identifiantAdministrateur=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>" class="btn btn-primary">Lire plus et Commenter</a>
						</div> 
					</div>
				</div>
<?php
			}
		}
		
		public function Image($idAnnonce)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'encyclopeki'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idAnnonce = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setImage($info['imageAnnonce']);
					echo $this->getImage();
				}
				else
				{
					echo 'Erreur de chargement de l\'image de l\'annonce';
				}
			}
			else
			{
				echo 'Annonce inexistant';
			}
		}
		
		public function Details($idAnnonce)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'encyclopeki'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idAnnonce = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
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
								<p><?php echo nl2br($this->getDescription()); ?></p><br><br>
								<a href="#"><p><?php echo 'Par ' .$info['identifiantAdministrateur']; ?></p></a>
							</div> 
						</div>
					</div>
<?php
				}
				else
				{
					echo 'Erreur de chargement des détails de l\'annonce';
				}
			}
			else
			{
				echo 'Annonce inexistant';
			}
		}
		
		public function Verification($idParti)
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
?>
					<script>document.location.replace('inscription.php?numero=<?php echo $this->getId(); ?>');</script>
<?php
				}
				else
				{
					echo 'Erreur de chargement du nom du parti';
				}
			}
			else
			{
				echo 'Parti inexistant';
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
		
		public function Nom($idParti)
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
					$this->setNom($info['nomParti']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom du parti';
				}
			}
			else
			{
				echo 'Parti inexistant';
			}
		}
		
		public function Timing($idParti)
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
					$this->setDateP($info['dateParti']);
					$jour = substr($this->getDateP(), 8, 2);
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
		
		public function Description($idParti)
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
		
		public function Supprimer($idAnnonce)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'encyclopeki');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idAnnonce = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM annonces WHERE idAnnonce = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("accueil.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $info['idParti']; ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la suppression de l\'annonce';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'annonce à supprimer';
				}
			}
			else
			{
				echo 'Annonce inexistant';
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