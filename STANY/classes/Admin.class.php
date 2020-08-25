<?php
    class Admin
		{
			private $IdAdmin;
			private $NomAdmin;
			private $MotdepasseAdmin;
			
			public function getIdAdmin()
			{
				return $this->IdAdmin;
			}
			public function getNomAdmin()
			{
				return $this->NomAdmin;
			}
			public function getMotdepasseAdmin()
			{
				return $this->MotdepasseAdmin;
			}
			
			public function setIdAdmin($idAdmin)
			{
				$this->IdAdmin=$idAdmin;
			}
			public function setNomAdmin($nomAdmin)
			{
				$this->NomAdmin=$nomAdmin;
			}
			public function setMotdepasseAdmin($motdepasseAdmin)
			{
				$this->MotdepasseAdmin=$motdepasseAdmin;
			}
			
		public function Connexion($nomAdmin, $motdepasseAdmin)
		{
				$connexion	= mysqli_connect('localhost', 'root', '') or die ('Erreur');
				mysqli_select_db($connexion, 'snel');
				$requete = mysqli_query($connexion,	'SELECT *
														FROM administrateurs 
														WHERE nomAdmin = "'.$this->getNomAdmin().'"
														AND motdepasseAdmin = "'.$this->getMotdepasseAdmin().'"');
				if(mysqli_num_rows($requete)==1)
					
				{
                   echo 'Ok';
				}
				else
				{
					echo'vous fghjkl';
				}
		}
	   	
			
		}
?>