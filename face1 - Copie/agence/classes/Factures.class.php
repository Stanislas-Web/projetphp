

<?php
	class Factures{
		private $Id;
		private $Nom;
		private $Mois;
		private $Pdf;
		private $Date;
		private $Temps;
		private $Idc;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getNom()
		{
			return $this->Nom;
		}		
		public function getMois()
		{
			return $this->Mois;
		}		
		public function getPdf()
		{
			return $this->Pdf;
		}		
		public function getDate()
		{
			return $this->Date;
		}		
		public function getTemps()
		{
			return $this->Temps;
		}
		public function getIdc()
		{
			return $this->Idc;
		}


		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}

		public function setMois($mois)
		{
			$this->Mois = $mois;
		}
		public function setPdf($pdf)
		{
			$this->Pdf = $pdf;
		}
		public function setDate($date)
		{
			$this->Date = $date;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		public function setIdc($idc)
		{
			$this->Idc = $idc;
		}
		
		public function Afficher($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM factures
													WHERE idAgence="'.$this->getId().'"');


			
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idFacture']);
				$this->setNom($info['nomFacture']);
				$this->setMois($info['moisFacture']);
				$this->setPdf($info['pdfFacture']);
				$this->setDate($info['dateFacture']);
				$this->setTemps($info['tempsFacture']);
				$jour = substr($this->getDate(), 8, 2);
				$mois = substr($this->getDate(), 5, 2);
				$annee = substr($this->getDate(), 0, 4);
?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
					
						
						<a href="../pdfs/<?php echo $this->getPdf();?>"><img class="img-responsive" src="../pdfs/imgf.jpg" alt=""><span></span></a>
						<div class="blog-text">
							<h3><?php echo  'Client : '.$this->getNom(); ?></h3>
							<h4><?php echo $this->getMois(); ?></h4>
							<span class="posted_on"><?php echo $jour . ' . ' .$mois. ' . ' .$annee. ' à ' .$this->getTemps(); ?></span>
							<span class="comment"><a href="#"><?php echo '000' .$this->getId(); ?></a></span>
								<a href="modifierfacture.php?numeroFacture=<?php echo $info['idFacture']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>">Modifier</a> |
								<a href="supprimerfacture.php?numeroFacture=<?php echo $info['idFacture']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>">Supprimer</a>
							</p>
						</div> 
					</div>
				</div>
<?php
			}
		}
		
		public function Nom($id)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'face'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM clients
													WHERE idClient = "'.$this->getIdc().'"');
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








	}
?>