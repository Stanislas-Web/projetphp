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
		
		public function Afficher($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idSociete = "'.$idSociete.'"');
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
							<p><?php echo $this->getDescription(); ?></p>
							
							<p>
								<a href="modifierannonce.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $_GET['numero']; ?>&numannonce=<?php echo $this->getId(); ?>">Modifier</a> |
								<a href="supprimerannonce.php?numero=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $_GET['numero']; ?>&numannonce=<?php echo $this->getId(); ?>">Supprimer</a>
			
							</p>
						</div> 
					</div>
				</div>
<?php
			}
		}
		
		public function Image($idAnnonce)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
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
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
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
		
		public function Supprimer($idAnnonce)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
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
						<script>document.location.replace("accueil.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $info['idSociete']; ?>");</script>
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
		
		public function Modifier($id, $titre, $descriptionSociete, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idAnnonce = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'UPDATE annonces SET titreAnnonce = "'.$this->getTitre().'", descriptionSociete = "'.$this->getDescription().'" WHERE idSociete = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("societe.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>");</script>
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
		
		public function Titre($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idAnnonce = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setTitre($info['titreAnnonce']);
					echo $this->getTitre();
				}
				else
				{
					echo 'Erreur de chargement du nom de la societe';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
				
		public function DescriptionAnnonce($idAnnonce)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idAnnonce = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setDescription($info['descriptionAnnonce']);
					echo $this->getDescription();
				}
				else
				{
					echo 'Erreur de chargement du nom de la societe';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function TitreAnnonce($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM annonces
													WHERE idAnnomce = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setTitre($info['TiteAnnonce']);
					echo $this->getTitre();
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
		
	}
?>