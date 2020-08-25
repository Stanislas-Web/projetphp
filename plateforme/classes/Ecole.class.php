<?php
class Ecole{
	private $IDECOLE;
	private $NOMECOLE;
	private $CATEGORIE;
	private $NOMADMIN;
	private $PHOTO;
		public function getIdecole(){
			return $this->IDECOLE;
		}
		public function getNomecole(){
			return $this->NOMECOLE;
		}	
		public function getCategorie(){
			return $this->CATEGORIE;
		}
		public function getNomadmin(){
			return $this->NOMADMIN;
		}
		public function getPhoto(){
			return $this->PHOTO;
		}
		public function setIDECOLE($idecole){
			$this->IDECOLE=$idecole;
		}
		public function setNOMECOLE($nomecole){
			$this->NOMECOLE=$nomecole;
		}
		public function setCATEGORIE($categorie){
			$this->CATEGORIE=$categorie;
		}
		public function setNOMADMIN($nomadmin){
			$this->NOMADMIN=$nomadmin;
		}
		public function setPHOTO($photo){
			$this->PHOTO=$photo;
		}
		
		public function ajouter($nomecole,$categorie,$nomadmin){
			$connexion=mysqli_connect('localhost','root','')or die('erreur');
			mysqli_select_db($connexion,'plateforme');

				if(mysqli_query($connexion,'INSERT INTO ecole VALUES("","'.$this->getNomecole().'","'.$this->getCategorie().'","'.$this->getNomadmin().'")'))
				{
					
?>
						<script>document.location.replace("listecole.php?nom=<?php echo $this->getNomadmin();?>");</script>
<?php
			}else{
					echo 'probleme';
			}
			
		}
		
		public function afficher(){
			$connexion=mysqli_connect('localhost','root','')or die('erreur');
				mysqli_select_db($connexion, 'plateforme');
				$requete=mysqli_query($connexion, 'SELECT *
													FROM ecole
													ORDER BY nomecole ASC');
				while($informations=mysqli_fetch_array($requete)){
					$this->setIDECOLE($informations['idecole']);
					$this->setNOMECOLE($informations['nomecole']);
					$this->setCATEGORIE($informations['categorie']);
					$this->setNOMADMIN($informations['nomadmin']);
					?>
					
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_2.jpg" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_2.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?php echo $this->getNomecole();?></h2>
							<p><?php echo '<strong>Matricule :</strong>000'.$this->getIdecole();?></p>
							<p><?php echo '<strong>Ecole: </strong>'.$this->getCategorie();?></p>
							<p><?php echo '<strong>Ajouter par l\' admin : </strong>'.$this->getNomadmin();?></p>
						</div>
					</a>
				</div>
					
					<?php
					}
		
		}
		



	}

?>