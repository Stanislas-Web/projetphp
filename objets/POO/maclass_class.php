<?php
class Personnage{
	private $nom;
	private $atk=30;
	private $vie;
	public function __construct($nom){
		$this->nom=$nom;
	}
	public function mort(){
		return $this->vie<=0;
	}
	public function regenerer($vie=null){
		if (is_null($vie)) {
			$this->vie=100;
		}else{
			$this->vie+=$vie;
		}
	}
}


  ?>
