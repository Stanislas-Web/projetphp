<?php
	Class Inscriptions
	{
		private $Id;
		private $Identifiant;
		private $MotDePasse;
		private $RepeterMotDePasse;
		private $DateI;
		private $Temps;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getIdentifiant()
		{
			return $this->Identifiant;
		}
		public function getMotDePasse()
		{
			return $this->MotDePasse;
		}
		public function getRepeterMotDePasse()
		{
			return $this->RepeterMotDePasse;
		}
		public function getDateI()
		{
			return $this->DateI;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setIdentifiant($identifiant)
		{
			$this->Identifiant = $identifiant;
		}
		public function setMotDePasse($motDePasse)
		{
			$this->MotDePasse = $motDePasse;
		}
		public function setRepeterMotDePasse($repeterMotDePasse)
		{
			$this->RepeterMotDePasse = $repeterMotDePasse;
		}
		public function setDateI($dateI)
		{
			$this->DateI = $dateI;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		
		public function Effectuer($identifiantInscription, $motDePasseInscription, $repeterMotDePasseInscription, $idAdministrateur, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM inscriptions
													WHERE identifiantInscription = "'.$this->getIdentifiant().'"
														AND motDePasseInscription = "'.$this->getMotDePasse().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if($this->getMotDePasse() == $this->getRepeterMotDePasse())
				{
					if(mysqli_query($connexion, 'INSERT INTO inscriptions VALUES ("", "'.$this->getIdentifiant().'", "'.$this->getMotDePasse().'", NOW(), NOW(), "'.$idAdministrateur.'", "", "'.$identifiantAdministrateur.'")'))
					{
?>
						<script>document.location.replace("listeadministrateurs.php?identifiant=<?php echo $identifiantAdministrateur; ?>");</script>
<?php
					}
					else
					{
						echo 'Erreur d\'inscription';
					}
				}
				else
				{
					echo 'Les mots de passe ne sont pas identiques';
				}
			}
			else
			{
				echo 'Vous avez déjà un compte';
			}
		}
		
		public function Effectuer2($identifiantInscription, $motDePasseInscription, $repeterMotDePasseInscription, $idCorrecteur, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM inscriptionscorrecteurs
													WHERE identifiantInscription = "'.$this->getIdentifiant().'"
														AND motDePasseInscription = "'.$this->getMotDePasse().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if($this->getMotDePasse() == $this->getRepeterMotDePasse())
				{
					if(mysqli_query($connexion, 'INSERT INTO inscriptionscorrecteurs VALUES ("", "'.$this->getIdentifiant().'", "'.$this->getMotDePasse().'", NOW(), NOW(), "'.$idCorrecteur.'", "'.$identifiantAdministrateur.'")'))
					{
?>
						<script>document.location.replace("listecorrecteurs.php?identifiant=<?php echo $identifiantAdministrateur; ?>");</script>
<?php
					}
					else
					{
						echo 'Erreur d\'inscription';
					}
				}
				else
				{
					echo 'Les mots de passe ne sont pas identiques';
				}
			}
			else
			{
				echo 'Vous avez déjà un compte';
			}
		}
		
		public function Titre($idInscription)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM inscriptions
													WHERE idInscription = "'.$idInscription.'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setIdentifiant($info['identifiantInscription']);
					echo $this->getIdentifiant();
				}
				else
				{
					echo 'Erreur de chargement du nom de la compagnie';
				}
			}
			else
			{
				echo 'Compte inexistant';
			}
		}
		
		public function Afficher()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM inscriptions');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setIdentifiant($info['identifiantInscription']);
?>
				<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
					<div class="blog-entry">
						<a href="#" class="blog-img"><img src="images/img-1.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
						<div class="desc">
							<h3>
								<a href="listevols.php?identifiant=<?php echo $this->getIdentifiant(); ?>">
									<?php echo substr($this->getIdentifiant(), 0, 19); ?>
								</a>
							</h3>
						</div>
					</div>
				</div>
<?php	
			}
		}
	}
?>