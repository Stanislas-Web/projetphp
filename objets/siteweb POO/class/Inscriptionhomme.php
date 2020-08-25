<?php
class Inscriptionhomme{


		private $db_name;
		private $db_user;
		private $db_pass;
		private $db_host;
		private $pdo;

		private $prenom;
		private $nom;
		private $email;
		private $motdepasse;
		private $sexe;
		private $insertioin;



	public function __Construct($db_name,$db_user='root',$db_pass='root',$db_host='localhost',$prenom){

		$this->db_name=$db_name;
		$this->db_user=$db_user;
		$this->db_pass=$db_pass;
		$this->db_host=$db_host;
		$this->prenom=$prenom;
	}

	private function getPDO(){

		$pdo= new PDO('mysql:dbname=site;host=localhost','root','root');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->pdo=$pdo;
		return $pdo; 

	}
	public function insertion(){
		$this->pdo->exec('INSERT INTO utilisateurs SET prenom=$prenom ');

	}

	

	/*public function inscriptionhomme(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=site','root',''); 
		$insertion=$pdo->prepare("INSERT INTO utilisateurs(prenom,nom,email,motdepasse,sexe,photo) VALUES(?,?,?,?,?,?)");
		$insertion->execute(array($this->prenom,$this->nom,$this->email,$this->motdepasse,$this->sexe,"homme.png"));	
	}




	/*

	public function Setbdd(PDO $bdd){
		$this->bdd= $bdd;
	}




	
	


*/

}
?>
