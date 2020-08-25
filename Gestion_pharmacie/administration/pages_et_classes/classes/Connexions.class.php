<?php
	Class Connexions extends Inscriptions
	{
		public function Etablir($identifiantConnexion, $motDePasseConnexion)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die ('error');
			mysqli_select_db($connexion, 'face');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM inscriptions
													WHERE identifiantInscription = "'.$this->getIdentifiant().'"
														AND motDePasseInscription = "'.$this->getMotDePasse().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
?>
					<script>document.location.replace("index.php?identifiant=<?php echo $this->getIdentifiant(); ?>");</script>
<?php
				}
				else
				{
					echo 'Erreur de chargement des informations du compte';
				}
			}
			else
			{
				echo 'Vous n\'avez pas de compte';
			}
		}
		
		public function Admin($identifiantConnexion, $motDePasseConnexion)
		{
			if($this->getIdentifiant() == 'Lobiko' && $this->getMotDePasse() == 'lobiko')
			{
?>
				<script>document.location.replace("pages_et_classes/pages/accueil1.php?identifiant=<?php echo $this->getIdentifiant(); ?>");</script>
<?php
			}
			else
			{
				echo 'Identifiant ou mot de passe incorrect';
			}
		}
	}
?>