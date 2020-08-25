<?php
class Inscriptionfemme{
	private $prenom;
	private $nom;
	private $email;
	private $motdepasse;
	private $sexe;
	
	public function inscriptionfemme(){
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=site','root','');
		$this->motdepasse=sha1($this->motdepasse); 
		$insertion=$bdd->prepare("INSERT INTO utilisateurs(prenom,nom,email,motdepasse,sexe,photo) VALUES(?,?,?,?,?,?)");
		$insertion->execute(array($this->prenom,$this->nom,$this->email,$this->motdepasse,$this->sexe,"femme.png"));

	}


}
?>
