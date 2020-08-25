<?php
    class Client{
        private $Id;
        private $Nom;
        private $Mdp;
        private $numTel;
		private $Commune;
		private $Quartier;
		private $Avenue;
        private $Numero;
        private $Logo;
		private $DateClient;
		private $TempsClient;
    //les getters
		public function getId()
		{
			return $this->Id;
		}
		public function getNom()
		{
			return $this->Nom;
		}
		public function getMdp()
		{
			return $this->Mdp;
        }
        public function getNumTel()
		{
			return $this->NumTel;
		}
		public function getCommune()
		{
			return $this->Commune;
		}
		public function getQuartier()
		{
			return $this->Quartier;
		}
		public function getAvenue()
		{
			return $this->Avenue;
		}
		public function getNumero()
		{
			return $this->Numero;
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
		
		//les Setters
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}
		public function setMdp($mdp)
		{
			$this->Mdp = $Mdp;
        }
        public function setNumTel($numTel)
		{
			$this->NumTel = $numTel;
		}
		public function setCommune($commune)
		{
			$this->Commune = $commune;
		}
		public function setQuartier($quartier)
		{
			$this->Quartier = $quartier;
		}
		public function setAvenue($avenue)
		{
			$this->Avenue = $avenue;
		}
		public function setNumero($Numero)
		{
			$this->Numero = $Numero;
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

		
		public function Nom($idClient)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion � la base de donn�es
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
					echo 'Erreur de chargement du nom du produit';
				}
			}
			else
			{
				echo 'Ecole inexistant';
			}
		}






		
	
    }


?>