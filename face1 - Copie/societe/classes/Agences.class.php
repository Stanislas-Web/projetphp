<?php
class Agences{

		private $Id;
		private $Nom;
		private $Commune;
		private $Rue;
		private $Quartier;
		private $Numero;
		private $DateA;
		private $Temps;
		private $Idsociete;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getNom()
		{
			return $this->Nom;
		}
		public function getCommune()
		{
			return $this->Commune;
		}
		public function getRue()
		{
			return $this->Rue;
		}
		public function getQuartier()
		{
			return $this->Quartier;
		}

		public function getNumero()
		{
			return $this->Numero;
		}
		public function getDateA()
		{
			return $this->DateA;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		public function getIdSociete()
		{
			return $this->IdSociete;
		}




		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}
		public function setCommune($commune)
		{
			$this->Commune = $commune;
		}
		public function setRue($rue)
		{
			$this->Rue = $rue;
		}
		public function setQuartier($quartier)
		{
			$this->Quartier = $quartier;
		}
		public function setNumero($numero)
		{
			$this->Numero = $numero;
		}

		public function setDateA($dateA)
		{
			$this->DateA = $dateA;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		public function setIdSociete($temps)
		{
			$this->IdSociete = $idsociete;
		}

		public function ajouter($nom,$commune,$rue,$quartier,$numero,$idSociete,$identifiant){
			$connexion = mysqli_connect('localhost','root','') or die ('Erreur');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM agences
													WHERE nomAgence = "'.$this->getNom().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if(mysqli_query($connexion, 'INSERT INTO agences VALUES ("", "'.$this->getNom().'", "'.$this->getCommune().'","'.$this->getRue().'","'.$this->getQuartier().'","'.$this->getNumero().'", NOW(), NOW(),"'.$this->getSociete().'")'))
				{
?>
					<script>document.location.replace('accueil.php?identifiant=<?php echo $identifiant ; ?>&numero=<?php echo $this->getIdsociete(); ?>');</script>
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
													FROM agences
													WHERE idSociete = "'.$idSociete.'" ');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idAgence']);
				$this->setNom($info['nomAgence']);
				$this->setCommune($info['communeAgence']);
				$this->setRue($info['rueAgence']);
				$this->setQuartier($info['quartierAgence']);
				$this->setNumero($info['numeroAgence']);
				$this->setDateA($info['dateAgence']);
				$this->setTemps($info['tempsAgence']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
		
						<div class="blog-text">
							
							<span class="posted_on"><?php echo $jour . ' . ' .$mois. ' . ' .$annee. ' à ' .$this->getTemps(); ?></span>
							<p><?php echo '<strong>Commune : </strong>'.$this->getCommune(); ?></p>
							<p><?php echo '<strong>Nom d\'agence : </strong>'.$this->getNom(); ?></p>
							<p><?php echo '<strong>Rue d\'agence : </strong>'.$this->getRue(); ?></p>
							<p><?php echo '<strong>Quartier d\'agence : </strong>'.$this->getQuartier(); ?></p>
							<p><?php echo '<strong>N° d\'adresse de l\'agence : </strong>'.$this->getNumero(); ?></p>
							<span class="comment"><a href="#"><?php echo '000' .$this->getId(); ?></a></span>
							
							<p>
								<a href="modifieragence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>&numagence=<?php echo $this->getId(); ?>">Modifier</a> |
								<a href="supprimeragence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>&numagence=<?php echo $this->getId(); ?>">Supprimer</a>
							</p>
						</div> 
					</div>
				</div>
<?php
			}
		}
		
		public function Nom($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getIdSociete().'"');
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
		
		public function Nomagence($id)
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
					echo 'Erreur de chargement du nom de la société';
				}
			}
			else
			{
				echo 'Societe inexistant';
			}
		}
		
		public function Communagence($id)
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
					$this->setCommune($info['communeAgence']);
					echo $this->getCommune();
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
		
		public function Rueagence($id)
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
					$this->setRue($info['rueAgence']);
					echo $this->getRue();
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
		
		public function Quartieragence($id)
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
					$this->setQuartier($info['quartierAgence']);
					echo $this->getQuartier();
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
		
		public function Numeroagence($id)
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
					$this->setNumero($info['numeroAgence']);
					echo $this->getNumero();
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
		
		
		public function IdS($idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM societes
													WHERE idSociete = "'.$this->getIdSociete().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['idSociete']);
					echo $this->getId();
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
		
		
		public function Modifier($id,$nom,$commune,$rue,$quartier,$numero){
		$connexion = mysqli_connect('localhost','root','')or die('Erreur');
		mysqli_select_db($connexion, 'face');
		$requete = mysqli_query($connexion, 'SELECT *
												FROM agences
												WHERE idAgence = "'.$this->getId().'"');
												
		if(mysqli_num_rows($requete) == 1)
						{
		if(mysqli_query($connexion, 'UPDATE agences SET nomAgence = "'.$this->getNom().'", communeAgence = "'.$this->getCommune().'", rueAgence = "'.$this->getRue().'",quartierAgence = "'.$this->getQuartier().'",numeroAgence = "'.$this->getNumero().'" WHERE idAgence = "'.$this->getId().'"'))
					{
?>
				<script>document.location.replace("listagence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>");</script>
<?php
				}
		else
				{
					echo 'Erreur de modification des informations de l\'annonce';
										}
			}
			else
			{
					echo 'Agence inexistant';
			}
		
		}
		
		public function Supprimer($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM agences
													WHERE idAgence = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM agences WHERE idAgence = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace("listagence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>");</script>
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

		
		


	}


?>