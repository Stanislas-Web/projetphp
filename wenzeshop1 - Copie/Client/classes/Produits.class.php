<?php
class Produits{

		private $Id;
		private $Nom;
		private $Categorie;
		private $Logo;
		private $Prix;
		private $Libelle;
		private $DateP;
		private $Temps;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getNom()
		{
			return $this->Nom;
		}
		public function getCategorie()
		{
			return $this->Categorie;
		}
		public function getLogo()
		{
			return $this->Logo;
		}
		public function getPrix()
		{
			return $this->Prix;
		}
		public function getLibelle()
		{
			return $this->Libelle;
		}
		public function getDateP()
		{
			return $this->DateP;
		}
		public function getTemps()
		{
			return $this->Temps;
		}
		
		public function setId($id)
		{
			$this->Id = $id;
		}
		public function setNom($nom)
		{
			$this->Nom = $nom;
		}
		public function setCategorie($Categorie)
		{
			$this->Categorie = $Categorie;
		}
		public function setLogo($logo)
		{
			$this->Logo = $logo;
		}
		public function setPrix($prix)
		{
			$this->Prix = $prix;
		}
		public function setLibelle($libelle)
		{
			$this->Libelle = $libelle;
		}
		public function setDateP($dateP)
		{
			$this->DateP = $dateP;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		
		public function Legumes()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE categorieProduit= "legume" 
													ORDER BY nomProduit');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idProduit']);
				$this->setNom($info['nomProduit']);
				$this->setCategorie($info['categorieProduit']);
				$this->setPrix($info['prixProduit']);
				$this->setLogo($info['logoProduit']);
				$this->setDateP($info['dateProduit']);
				$this->setTemps($info['tempsProduit']);
				
?>
				
				
				
				
				<div class="col-md-3 product-men women_two">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<a href="interfaces/panier.php?action=ajout&amp;l=<?php echo $this->getNom(); ?>&amp;q=1&amp;p=<?php echo $this->getPrix().'FC'; ?>" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;" ><img src="../administration/logos/<?php echo $this->getLogo(); ?>" class="img-fluid" alt=""></a>
									
									
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<h4>
													<a href="single.html"><?php echo $this->getNom(); ?></a>
												</h4>
												<div class="grid-price mt-2">
													<span class="money ">Fc <?php echo $this->getPrix(); ?>,00</span>
												</div>
											</div>
											<ul class="stars">
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div>
										<div class="googles single-item hvr-outline-out">
											<form action="interfaces/panier.php?id=<?php echo $this->getId(); ?>&libelleProduit=<?php echo $this->getNom(); ?>&prixProduit=<?php echo $this->getPrix(); ?>" method="post">
												
												
												<button type="submit" class="googles-cart pgoogles-cart">
													<a style="color:#000" href="interfaces/panier.php?action=ajout&amp;l=<?php echo $this->getNom(); ?>&amp;q=1&amp;p=<?php echo $this->getPrix().'FC'; ?>" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;" ><i class="fas fa-cart-plus">  </i></a>
												</button>

											</form>

										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				
				
				
				

				
				
<?php
			}
		}
		

		
		
		
		public function VivresFrais()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE categorieProduit= "vivres frais" 
													ORDER BY nomProduit');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idProduit']);
				$this->setNom($info['nomProduit']);
				$this->setCategorie($info['categorieProduit']);
				$this->setPrix($info['prixProduit']);
				$this->setLogo($info['logoProduit']);
				$this->setDateP($info['dateProduit']);
				$this->setTemps($info['tempsProduit']);
				
?>
				
				
				
				
				<div class="col-md-3 product-men women_two">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
								<a href="interfaces/panier.php?action=ajout&amp;l=<?php echo $this->getNom(); ?>&amp;q=1&amp;p=<?php echo $this->getPrix().'FC'; ?>" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;" ><img src="../administration/logos/<?php echo $this->getLogo(); ?>" class="img-fluid" alt=""></a>	
									
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<h4>
													<a href="single.html"><?php echo $this->getNom(); ?></a>
												</h4>
												<div class="grid-price mt-2">
													<span class="money ">Fc <?php echo $this->getPrix(); ?>,00</span>
												</div>
											</div>
											<ul class="stars">
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div>
										<div class="googles single-item hvr-outline-out">
											<form action="interfaces/panier.php?id=<?php echo $this->getId(); ?>" method="post">
												<input type="hidden" name="cmd" value="_cart">
												
												<input type="hidden" name="googles_item" value="<?php echo $this->getNom(); ?>">
												<input type="hidden" name="amount" value="<?php echo $this->getPrix(); ?>">
												<button type="submit" class="googles-cart pgoogles-cart">
													<a style="color:#000" href="interfaces/panier.php?action=ajout&amp;l=<?php echo $this->getNom(); ?>&amp;q=1&amp;p=<?php echo $this->getPrix().'FC'; ?>" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;" ><i class="fas fa-cart-plus">  </i></a>
												</button>

												
											</form>

										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				
				
				
				

				
				
<?php
			}
		}
		
		
		
		public function Fruits()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('error'); // Connexion au serveur
			mysqli_select_db($connexion, 'wenzeshop'); // Connexion à la base de données
			$requete = mysqli_query($connexion, 'SELECT *
													FROM produits
													WHERE categorieProduit= "fruit" 
													ORDER BY nomProduit');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idProduit']);
				$this->setNom($info['nomProduit']);
				$this->setCategorie($info['categorieProduit']);
				$this->setPrix($info['prixProduit']);
				$this->setLogo($info['logoProduit']);
				$this->setDateP($info['dateProduit']);
				$this->setTemps($info['tempsProduit']);
				
?>
				
				
				
				
				<div class="col-md-3 product-men women_two">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
					<a href="interfaces/panier.php?action=ajout&amp;l=<?php echo $this->getNom(); ?>&amp;q=1&amp;p=<?php echo $this->getPrix().'FC'; ?>" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;" ><img src="../administration/logos/<?php echo $this->getLogo(); ?>" class="img-fluid" alt=""></a>		
									
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<h4>
													<a href="single.html"><?php echo $this->getNom(); ?></a>
												</h4>
												<div class="grid-price mt-2">
													<span class="money ">Fc <?php echo $this->getPrix(); ?>,00</span>
												</div>
											</div>
											<ul class="stars">
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div>
										<div >
											<form action="interfaces/ajouterpannier.php?id=<?php echo $this->getId(); ?>" method="post">
												<input type="hidden" name="cmd" value="_cart">
												
												<input type="hidden" name="googles_item" value="<?php echo $this->getNom(); ?>">
												<input type="hidden" name="amount" value="<?php echo $this->getPrix(); ?>">
												<button type="submit" class="googles-cart pgoogles-cart">
													<a style="color:#000" href="interfaces/panier.php?action=ajout&amp;l=<?php echo $this->getNom(); ?>&amp;q=1&amp;p=<?php echo $this->getPrix().'FC'; ?>" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;" ><i class="fas fa-cart-plus">  </i></a>
												</button>



												
											</form>

										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				
				
				
				

				
				
<?php
			}
		}
		
}

?>