<?php 
class Connexion{
	private $IDADMIN;
	private $NOMADMIN;
	private $MOTDEPASSEADMIN;

		
		public function getIdadmin(){
			return $this->IDADMIN;
		}
		public function getNomadmin(){
			return $this->NOMADMIN;
		}
		public function getMotdepasseadmin(){
			return $this->MOTDEPASSEADMIN;
		}
		
		public function setIDADMIN($idadmin){
			$this->IDADMIN=$idadmin;
		}
		public function setNOMADMIN($nomadmin){
			$this->NOMADMIN=$nomadmin;
		}
		public function setMOTDEPASSEADMIN($motdepasseadmin){
			$this->MOTDEPASSEADMIN=$motdepasseadmin;
		}
		public function Connecter($nomadmin,$motdepasseadmin){
				$connexion=mysqli_connect('localhost','root','')or die('erreur');
				mysqli_select_db($connexion, 'plateforme');
				$requete=mysqli_query($connexion, 'SELECT*
													FROM admin
													WHERE motdepasseadmin="'.$this->getMotdepasseadmin().'"');
		if(mysqli_num_rows($requete)==1){
				?>
					<script>document.location.replace("listecole.php?nomUtilisateur=<?php echo $_POST['nom'];?>");</script>
					<?php

				}
				else{
					echo 'moyibi';
				}
				
		}
		

}


?>