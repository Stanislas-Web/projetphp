<?php
class Admin{
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
		public function Ajouter($nomadmin,$motdepasseadmin){
				$connexion=mysqli_connect('localhost','root','')or die('erreur');
				mysqli_select_db($connexion, 'plateforme');
				$requete=mysqli_query($connexion, 'SELECT*
													FROM admin
													WHERE motdepasseadmin="'.$this->getMotdepasseadmin().'"');
		if(mysqli_num_rows($requete)==0)
				 {
					if(mysqli_query($connexion,'INSERT INTO admin VALUES("","'.$this->getNomadmin().'","'.$this->getMotdepasseadmin().'")'))
					{
						echo 'ok';
					}
					else
					{
						echo'Problème';
					}
				}
				else
				{
					echo'Employé existant';
				}
		}
	
	}




?>