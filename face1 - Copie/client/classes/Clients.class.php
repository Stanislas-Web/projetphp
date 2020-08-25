<?php
	Class Clients
	{
		private $Id;
		private $Nom;
		private $Commune;
		private $Quartier;
		private $Rue;
		private $Numero;
		private $Type;
		private $DateClient;
		private $TempsClient;
		
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
		public function getQuartier()
		{
			return $this->Quartier;
		}
		public function getRue()
		{
			return $this->Rue;
		}
		public function getNumero()
		{
			return $this->Numero;
		}
		public function getType()
		{
			return $this->Type;
		}
		public function getDateClient()
		{
			return $this->DateClient;
		}
		public function getTempsClient()
		{
			return $this->TempsClient;
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
		public function setType($type)
		{
			$this->Type = $type;
		}
		public function setDateClient($dateClient)
		{
			$this->DateClient = $dateClient;
		}
		public function setTempsClient($tempsClient)
		{
			$this->TempsClient = $tempsClient;
		}
		
		public function Ajouter($nom, $commune, $rue, $quartier, $numero, $type, $idAgence, $idSociete)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('Erreur');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM clients
													WHERE nomClient = "'.$this->getNom().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if(mysqli_query($connexion, 'INSERT INTO clients VALUES ("", "'.$this->getNom().'", "'.$this->getCommune().'", "'.$this->getQuartier().'", "'.$this->getRue().'", "'.$this->getNumero().'", "'.$this->getType().'", NOW(), NOW(), "'.$idAgence.'", "'.$idSociete.'")'))
				{
?>
					<script>document.location.replace("../listeclient.php");</script>
<?php
				}
				else
				{
					echo 'Erreur dans l\'ajout du client';
				}
			}
			else
			{
				echo 'Client déjà enregistré';
			}
		}
		
		public function Afficher($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM clients
													WHERE idAgence="'.$this->getId().'"');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idClient']);
				$this->setNom($info['nomClient']);
				$this->setCommune($info['communeClient']);
				$this->setQuartier($info['quartierClient']);
				$this->setRue($info['rueClient']);
				$this->setNumero($info['numeroClient']);
				$this->setType($info['typeClient']);
				$this->setDateClient($info['dateClient']);
				$this->setTempsClient($info['tempsClient']);
				$jour = substr($this->getDateClient(), 8, 2);
				$mois = substr($this->getDateClient(), 5, 2);
				$annee = substr($this->getDateClient(), 0, 4);
?>

				<div class="col-lg-4 col-md-4"><br><br><br><br>
					<div class="fh5co-blog animate-box">
						<a href="" ><img class="img-responsive" alt=""></a>
						<div class="blog-text">
							<span class="posted_on"><?php echo $jour . ' . ' .$mois. ' . ' .$annee. ' à ' .$this->getTempsClient(); ?></span>
							<p><?php echo 'Nom du Client : <strong>'.$this->getNom().'</strong>';?></p>
							<p><?php echo 'Commune du Client : <strong>'.$this->getCommune().'</strong>';?></p>
							<p><?php echo 'Quartier du Client : <strong>'. $this->getQuartier().'</strong>';?></p>
							<p><?php echo 'Rue du Client : <strong>'.$this->getRue().'</strong>';?></p>
							<p><?php echo 'Numero du Client : <strong>'.$this->getNumero().'</strong>';?></p>
							<p><?php echo 'Type du Client : <strong>'.$this->getType().'</strong>';?></p>

							
							<a href="ajouterfacture.php?numeroClient=<?php echo $info['idClient']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>" class="btn btn-primary">Envoyer Facture</a><br><br>
							<p>
							<span class="comment"><a href="#"><?php echo '000' .$this->getId(); ?></a></span>
								<a href="modifierclient.php?numeroClient=<?php echo $info['idClient']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>">Modifier</a> |
								<a href="supprimerclient.php?numeroClient=<?php echo $info['idClient']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>">Supprimer</a>
							</p>
							
						</div> 
					</div>
				</div>
				
<?php
			}
		}
		
		public function Admin($idClient)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM clients
													WHERE idClient = "'.$this->getId().'"');
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
		
		public function Verification($idClient)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM clients
													WHERE idClient = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
?>
					<script>document.location.replace("interfaces/accueil.php?numeroClient=<?php echo $info['idClient']; ?>&numeroSociete=<?php echo $info['idSociete']; ?>&numeroAgence=<?php echo $info['idAgence']; ?>");</script>
<?php
				}
				else
				{
					echo 'Erreur de chargement du nom du Client';
				}
			}
			else
			{
				echo 'Client inexistant';
			}
		}
		
		public function Matricule($idClient)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM partis
													WHERE idClient = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setId($info['idClient']);
					echo $this->getId();
				}
				else
				{
					echo 'Erreur de chargement du matricule du Client';
				}
			}
			else
			{
				echo 'Client inexistant';
			}
		}
		
		public function Nom($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM clients
													WHERE idClient = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomClient']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom du parti';
				}
			}
			else
			{
				echo 'client inexistant';
			}
		}
		
		public function NomSociete($idAgence)
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
					echo 'Erreur de chargement du nom du parti';
				}
			}
			else
			{
				echo 'Parti inexistant';
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
		
		public function TotalFacture($id)
		{
			$connexion = mysqli_connect('localhost','root','')or die('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT COUNT(pdfFacture) AS totalFacture
													FROM factures
													WHERE idClient="'.$this->getId().'"');
			if($info = mysqli_fetch_array($requete))
			
			{
				echo 'Total facture: '.$info['totalFacture'].'<br/><br/>';
			}
		}
	
	}
?>