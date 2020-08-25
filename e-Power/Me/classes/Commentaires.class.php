<?php
	Class Commentaires
	{
		private $Id;
		private $Contenu;
		private $DateC;
		private $Temps;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getContenu()
		{
			return $this->Contenu;
		}
		public function getDateC()
		{
			return $this->DateC;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setContenu($contenu)
		{
			$this->Contenu = $contenu;
		}
		public function setDateC($dateC)
		{
			$this->DateC = $dateC;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		
		public function Ajouter($contenu, $idParti, $identifiantUtilisateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('Erreur');
			mysqli_select_db($connexion, 'encyclopeki');
			if(mysqli_query($connexion, 'INSERT INTO commentaires VALUES ("", "'.$this->getContenu().'", NOW(), NOW(), "'.$idParti.'", "'.$identifiantUtilisateur.'")'))
			{
				echo 'Commentaire ajouté';
			}
			else
			{
				echo 'Erreur dans l\'ajout du commentaire';
			}
		}
		
		public function Afficher()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'encyclopeki'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM commentaires');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idCommentaire']);
				$this->setContenu($info['contenuCommentaire']);
				$this->setDateC($info['dateCommentaire']);
				$jour = substr($this->getDateC(), 8, 2);
				$mois = substr($this->getDateC(), 5, 2);
				$annee = substr($this->getDateC(), 0, 4);
?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<div class="blog-text">
							<h3><a href="#"><b><?php echo $info['identifiantUtilisateur']; ?></b></a></h3>
							<span class="posted_on"><?php echo nl2br($this->getContenu()); ?></span>
							<p><?php echo $jour . ' . ' .$mois. ' . ' .$annee; ?></p>
							
						</div> 
					</div>
				</div><hr>
<?php
			}
		}
		
		public function Choisir()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'encyclopeki'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM partis
													ORDER BY nomParti ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idParti']);
				$this->setNom($info['nomParti']);
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
							<h3><a href="inscription.php?numero=<?php echo $this->getId(); ?>"><?php echo $this->getNom(); ?></a></h3>
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