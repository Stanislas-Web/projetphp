<?php
	Class Administrateurs extends Personnes
	{
		public function Ajouter($nomAdministrateur, $postnomAdministrateur, $prenomAdministrateur, $sexeAdministrateur, $telephoneAdministrateur, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE nomAdministrateur = "'.$this->getNom().'"
														AND postnomAdministrateur = "'.$this->getPostnom().'"
														AND prenomAdministrateur = "'.$this->getPrenom().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if(mysqli_query($connexion, 'INSERT INTO administrateurs VALUES ("", "'.$this->getNom().'", "'.$this->getPostnom().'", "'.$this->getPrenom().'", "'.$this->getSexe().'", "'.$this->getTelephone().'", NOW(), NOW(), "'.$identifiantAdministrateur.'")'))
				{
					$requete = mysqli_query($connexion, 'SELECT MAX(idAdministrateur)
															AS dernierAdministrateur
															FROM administrateurs');
					if($info = mysqli_fetch_array($requete))
					{
						$this->setId($info['dernierAdministrateur']);
						$_SESSION['identifiant'] = $identifiantAdministrateur;
?>
						<script>document.location.replace("inscriptionadministrateur.php?numero=<?php echo $this->getId(); ?>");</script>
<?php
					}
					else
					{
						echo 'Erreur dans la récupération du dernier administrateur';
					}
				}
				else
				{
					echo 'Erreur dans l\'enregistrement de l\'administrateur';
				}
			}
			else
			{
				echo 'Administrateur déjà inscrit';
			}
		}
		
		public function Afficher()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													ORDER BY nomAdministrateur, postnomAdministrateur, prenomAdministrateur ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idAdministrateur']);
				$this->setNom($info['nomAdministrateur']);
				$this->setPostnom($info['postnomAdministrateur']);
				$_SESSION['identifiant'] = $info['identifiantAdministrateur'];
?>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<div class="fh5co-blog animate-box">
								<a href="#"><img class="img-responsive" src="images/img-4.jpg" alt=""></a>
								<div class="blog-text">
									<span class="posted_on"><?php echo $this->getNom(); ?></span>
									<span class="posted_on"><?php echo $this->getPostnom(); ?></span><br>
									<span class="posted_on">
										<a href="modifieradministrateur.php?numero=<?php echo $this->getId(); ?>">Modif.</a> |
										<a href="supprimeradministrateur.php?numero=<?php echo $this->getId(); ?>">Suppr.</a>
									</span><br>
								</div> 
							</div>
						</div>
					</div>
				</div>
<?php
			}
		}
		
		public function Titre($idAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$idAdministrateur.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomAdministrateur']);
					$this->setPostnom($info['postnomAdministrateur']);
					echo $this->getNom(). ' ' .$this->getPostnom();
				}
				else
				{
					echo 'Erreur de chargement de l\'identité de l\'administrateur';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
		
		public function Nom($idAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$idAdministrateur.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomAdministrateur']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom de l\'administrateur';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
		
		public function Postnom($idAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$idAdministrateur.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setPostnom($info['postnomAdministrateur']);
					echo $this->getPostnom();
				}
				else
				{
					echo 'Erreur de chargement du postnom de l\'administrateur';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
		
		public function Prenom($idAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$idAdministrateur.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setPrenom($info['prenomAdministrateur']);
					echo $this->getPrenom();
				}
				else
				{
					echo 'Erreur de chargement du prenom de l\'administrateur';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
		
		public function Sexe($idAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$idAdministrateur.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setSexe($info['sexeAdministrateur']);
					echo $this->getSexe();
				}
				else
				{
					echo 'Erreur de chargement du sexe de l\'administrateur';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
		
		public function Telephone($idAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$idAdministrateur.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setTelephone($info['telephoneAdministrateur']);
					echo $this->getTelephone();
				}
				else
				{
					echo 'Erreur de chargement du téléphone de l\'administrateur';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
		
		public function Supprimer($idAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM administrateurs WHERE idAdministrateur = "'.$this->getId().'"') and mysqli_query($connexion, 'DELETE FROM inscriptions WHERE idAdministrateur = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("listeadministrateurs.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur dans la suppression de l\'administrateur';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'administrateur à supprimer';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
		
		public function Modifier($idAdministrateur, $nomAdministrateur, $postnomAdministrateur, $prenomAdministrateur, $sexeAdministrateur, $telephoneAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM administrateurs
													WHERE idAdministrateur = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'UPDATE administrateurs SET nomAdministrateur = "'.$this->getNom().'", postnomAdministrateur = "'.$this->getPostnom().'", prenomAdministrateur = "'.$this->getPrenom().'", sexeAdministrateur = "'.$this->getSexe().'", telephoneAdministrateur = "'.$this->getTelephone().'" WHERE idAdministrateur = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("listeadministrateurs.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>");</script>
<?php	
					}
					else
					{
						echo 'Erreur de modification des informations de l\'administrateur';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'administrateur à modifier';
				}
			}
			else
			{
				echo 'Administrateur inexistant';
			}
		}
	}
?>