<?php
	Class Connexions
	{
		private $Identifiant;
		private $MotDePasse;
		
		public function getIdentifiant()
		{
			return $this->Identifiant;
		}
		public function getMotDePasse()
		{
			return $this->MotDePasse;
		}
		
		public function setIdentifiant($identifiant)
		{
			$this->Identifiant = $identifiant;
		}
		public function setMotDePasse($motDePasse)
		{
			$this->MotDePasse = $motDePasse;
		}
		
		public function Admin($identifiantConnexion, $motDePasseConnexion)
		{
			if($this->getIdentifiant() == 'ib' && $this->getMotDePasse() == 'ib')
			{
?>
				<script>document.location.replace("../index.php?identifiant=<?php echo 'Admin'; ?>");</script>
<?php
			}
			else
			{
				echo 'Identifiant ou mot de passe incorrect';
			}
		}
	}
?>