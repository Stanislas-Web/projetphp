<?php
	class Articles
	{
		private $Id;
		private $Nom;
		private $Prix;
		private $DateA;
		private $Temps;
		
		public function getId()
		{
			return $this->Id;
		}
		public function getNom()
		{
			return $this->Nom;
		}
		public function getPrix()
		{
			return $this->Prix;
		}
		public function getDateA()
		{
			return $this->DateA;
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
		public function setPrix($prix)
		{
			$this->Prix = $prix;
		}
		public function setDateA($dateA)
		{
			$this->DateA = $dateA;
		}
		public function setTemps($temps)
		{
			$this->Temps = $temps;
		}
		
		public function Ajouter($nomArticle, $prixArticle, $identifiantAdministrateur)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE nomArticle = "'.$this->getNom().'"');
			if(mysqli_num_rows($requete) == 0)
			{
				if(mysqli_query($connexion, 'INSERT INTO articles VALUES ("", "'.$this->getNom().'", "'.$this->getPrix().'", NOW(), NOW(), "'.$identifiantAdministrateur.'")'))
				{
?>
					<script>document.location.replace('../index.php?identifiant=<?php echo $identifiantAdministrateur; ?>');</script>
<?php
				}
				else
				{
					echo 'Article non ajouté';
				}
			}
			else
			{
				echo 'Article déjà ajouté';
			}
		}
		
		public function AfficherIndexSiConnecte()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													ORDER BY nomArticle ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idArticle']);
				$this->setNom($info['nomArticle']);
				$this->setPrix($info['prixArticle']);
				$this->setDateA($info['dateArticle']);
				$this->setTemps($info['tempsArticle']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
?>
				<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
					<figure>
						<a href="interfaces/article.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>"><img style="border-radius:50%" src="images/person1.jpg" alt="Image" class="img-responsive">
					</figure>
					<h2 class="fh5co-article-title"><a href="interfaces/article.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>"><?php echo '<b>' .$this->getNom(). '</b>'; ?></a></h2>
					<span class="fh5co-meta fh5co-date"><?php echo $jour. ' . ' .$mois. ' . ' .$annee; ?></span>
					<h5 class="fh5co-article-title"><?php //echo '<b>' .$this->getQuantite(). '</b> pièces en stock'; ?></h5>
					<h5 class="fh5co-article-title"><?php echo '<b>' .$this->getPrix(). '</b> Fc par pièce'; ?></h5>
					
				</article>
<?php
			}
		}
		
		public function AfficherPageAjouter()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													ORDER BY nomArticle ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idArticle']);
				$this->setNom($info['nomArticle']);
				//$this->setQuantite($info['quantiteArticle']);
				$this->setPrix($info['prixArticle']);
				$this->setDateA($info['dateArticle']);
				$this->setTemps($info['tempsArticle']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
?>
				<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
					<figure>
						<a href="article.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>"><img style="border-radius:50%" src="images/person1.jpg" alt="Image" class="img-responsive">
					</figure>
					<h2 class="fh5co-article-title"><a href="article.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>"><?php echo '<b>' .$this->getNom(). '</b>'; ?></a></h2>
					<span class="fh5co-meta fh5co-date"><?php echo $jour. ' . ' .$mois. ' . ' .$annee; ?></span>
					<h5 class="fh5co-article-title"><?php //echo '<b>' .$this->getQuantite(). '</b> pièces en stock'; ?></h5>
					<h5 class="fh5co-article-title"><?php echo '<b>' .$this->getPrix(). '</b> Fc par pièce'; ?></h5>
					
				</article>
<?php
			}
		}
		
		public function AfficherIndexNonConnecte()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													ORDER BY nomArticle ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idArticle']);
				$this->setNom($info['nomArticle']);
				//$this->setQuantite($info['quantiteArticle']);
				$this->setPrix($info['prixArticle']);
				$this->setDateA($info['dateArticle']);
				$this->setTemps($info['tempsArticle']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
?>
				<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
					<figure>
						<a href="interfaces/article.php?numero=<?php echo $this->getId(); ?>"><img style="border-radius:50%" src="images/person1.jpg" alt="Image" class="img-responsive">
					</figure>
					<h2 class="fh5co-article-title"><a href="interfaces/article.php?numero=<?php echo $this->getId(); ?>"><?php echo '<b>' .$this->getNom(). '</b>'; ?></a></h2>
					<span class="fh5co-meta fh5co-date"><?php echo $jour. ' . ' .$mois. ' . ' .$annee; ?></span>
					<h5 class="fh5co-article-title"><?php //echo '<b>' .$this->getQuantite(). '</b> pièces en stock'; ?></h5>
					<h5 class="fh5co-article-title"><?php echo '<b>' .$this->getPrix(). '</b> Fc par pièce'; ?></h5>
					
				</article>
<?php
			}
		}
		
		public function AfficherConnexion()
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													ORDER BY nomArticle ASC');
			while($info = mysqli_fetch_array($requete))
			{
				$this->setId($info['idArticle']);
				$this->setNom($info['nomArticle']);
				//$this->setQuantite($info['quantiteArticle']);
				$this->setPrix($info['prixArticle']);
				$this->setDateA($info['dateArticle']);
				$this->setTemps($info['tempsArticle']);
				$jour = substr($this->getDateA(), 8, 2);
				$mois = substr($this->getDateA(), 5, 2);
				$annee = substr($this->getDateA(), 0, 4);
?>
				<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
					<figure>
						<a href="article.php?numero=<?php echo $this->getId(); ?>"><img style="border-radius:50%" src="images/person1.jpg" alt="Image" class="img-responsive">
					</figure>
					<h2 class="fh5co-article-title"><a href="article.php?numero=<?php echo $this->getId(); ?>"><?php echo '<b>' .$this->getNom(). '</b>'; ?></a></h2>
					<span class="fh5co-meta fh5co-date"><?php echo $jour. ' . ' .$mois. ' . ' .$annee; ?></span>
					<h5 class="fh5co-article-title"><?php //echo '<b>' .$this->getQuantite(). '</b> pièces en stock'; ?></h5>
					<h5 class="fh5co-article-title"><?php echo '<b>' .$this->getPrix(). '</b> Fc par pièce'; ?></h5>
					
				</article>
<?php
			}
		}
		
		public function ModifierNom($idArticle, $nomArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'UPDATE articles SET nomArticle = "'.$this->getNom().'" WHERE idArticle = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace('article.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>');</script>
<?php
					}
					else
					{
						echo 'Erreur de modification du nom de l\'article';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'article à modifier';
				}
			}
			else
			{
				echo 'Article inexistant';
			}
		}
		
		public function Supprimer($idArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'DELETE FROM articles WHERE idArticle = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace('../index.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>');</script>
<?php
					}
					else
					{
						echo 'Erreur dans la suppression de l\'article';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'article à supprimer';
				}
			}
			else
			{
				echo 'Article inexistant';
			}
		}
		
		public function ModifierPrix($idArticle, $prixArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					if(mysqli_query($connexion, 'UPDATE articles SET prixArticle = "'.$this->getPrix().'" WHERE idArticle = "'.$this->getId().'"') and mysqli_query($connexion, 'UPDATE ravitaillements SET prixArticle = "'.$this->getPrix().'" WHERE idArticle = "'.$this->getId().'"'))
					{
?>
						<script>document.location.replace('article.php?identifiant=<?php echo $info['identifiantAdministrateur']; ?>&numero=<?php echo $this->getId(); ?>');</script>
<?php
					}
					else
					{
						echo 'Erreur de modification du prix de l\'article';
					}
				}
				else
				{
					echo 'Erreur de chargement des informations de l\'article à modifier';
				}
			}
			else
			{
				echo 'Article inexistant';
			}
		}
		
		public function Nom($idArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomArticle']);
					echo $this->getNom();
				}
				else
				{
					echo 'Erreur de chargement du nom de l\'article';
				}
			}
			else
			{
				echo 'Article inexistant';
			}
		}
		
		public function Details($idArticle)
		{
			$connexion = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($connexion, 'boutique');
			$requete = mysqli_query($connexion, 'SELECT *
													FROM articles
													WHERE idArticle = "'.$this->getId().'"');
			if(mysqli_num_rows($requete) == 1)
			{
				if($info = mysqli_fetch_array($requete))
				{
					$this->setNom($info['nomArticle']);
					//$this->setQuantite($info['quantiteArticle']);
					$this->setPrix($info['prixArticle']);
					//echo $this->getQuantite(). ' pièces en stock<br>';
					echo $this->getPrix(). ' Fc la pièce<br>';
				
				}
				else
				{
					echo 'Erreur de chargement du nom de l\'article';
				}
			}
			else
			{
				echo 'Article inexistant';
			}
		}
	}
?>