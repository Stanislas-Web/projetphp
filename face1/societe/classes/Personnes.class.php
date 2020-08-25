<?php
	Class Personnes
	{
		private $Id;
		private $Prenom;
		private $Nom;
		private $Postnom;
		private $Sexe;
		private $Telephone;
		private $DateP;
		private $Temps;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getPrenom()
		{
			return $this->Prenom;
		}
		public function getNom()
		{
			return $this->Nom;
		}
		public function getPostnom()
		{
			return $this->Postnom;
		}
		public function getSexe()
		{
			return $this->Sexe;
		}
		public function getTelephone()
		{
			return $this->Telephone;
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
		public function setPrenom($prenom)
		{
			$this->Prenom = $prenom;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}
		public function setPostnom($postnom)
		{
			$this->Postnom = $postnom;
		}
		public function setSexe($sexe)
		{
			$this->Sexe = $sexe;
		}
		public function setTelephone($telephone)
		{
			$this->Telephone = $telephone;
		}
		public function setDateP($dateP)
		{
			$this->DateP = $dateP;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
	}
?>