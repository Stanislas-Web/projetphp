<?php
class redirectioninscription{
	private $email;
	private $motdepasse;

	public function redirection(){
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=site','root',''); 
		$reqverif=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=? AND motdepasse=?");
		$reqverif->execute(array($this->email,$this->motdepasse));
		$verifexist=$reqverif->rowCount();
		if ($verifexist==1) {
		$userinfo=$reqverif->fetch();
		$_SESSION['id']=$userinfo['id'];
		$_SESSION['prenom']=$userinfo['prenom'];
		$_SESSION['nom']=$userinfo['nom'];
		$_SESSION['email']=$userinfo['email'];
		$_SESSION['motdepasse']=$userinfo['motdepasse'];
		$_SESSION['sexe']=$userinfo['sexe'];
		}
	}
}
?>