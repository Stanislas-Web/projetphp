<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>face | Modifier une agence</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top" style="background-color:steelblue">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="num"></p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="listagence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>"><img src="images/face.png"><span></span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="ajouterannonce.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>">Ajouter une annonce</a></li>
							<li><a href="ajouteragence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>">Ajouter une agence</a></li>
							<li><a href="listagence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>">Liste des agences Disponibles</a></li>
							<li class="has-dropdown">
								<a href="#"><?php echo $_GET['identifiant']; ?></a>
								<ul class="dropdown">
									<li><a href="#">Profil</a></li>
									<li><a href="deconnexion.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>">Déconnexion</a></li>
								</ul>
							</li><!-- <li class="btn-cta"><a href="#"><span>Login</span></a></li> -->
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(../../administration/logos/<?php echo $societe->setId($_GET['numero']);$societe->Photo($societe->getId()); ?>);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<br><br>
						<p style="color:#fff"><?php $societe->setId($_GET['numero']);$societe->Nom($societe->getId());?></p>
						<p style="color:#fff"><?php $societe->setId($_GET['numero']);$societe->Description($societe->getId());?></p>
					</div>
				</div>
			</div>
		</div>
	</header>	
	<div id="map" class="fh5co-map"></div>
		<!-- END map -->
	
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 animate-box">
					<h3>Modifier une agence pour le compte de la Société nommé <b><?php $societe->setId($_GET['numero']); $societe->Nom($societe->getId()); ?></b></h3>
					<form action="modifieragence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>&numagence=<?php echo $_GET['numagence']; ?>" method="post" enctype="multipart/form-data">

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="nomAgence" type="text" id="email" class="form-control" placeholder="Nom de l'agence" value="<?php
																													$agence->setId($_GET['numagence']);
																													$agence->Nomagence($agence->getId()); ?>">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="communeAgence" type="text" id="email" class="form-control" placeholder="Commune de l'agence" value="<?php
																																$agence->setId($_GET['numagence']);
																																$agence->Communagence($agence->getId()); ?>">
							</div>	
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="rueAgence" type="text" id="email" class="form-control" placeholder="Rue de l'agence"  value="<?php
																																$agence->setId($_GET['numagence']);
																																$agence->Rueagence($agence->getId()); ?>">
							</div>	
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="quartierAgence" type="text" id="email" class="form-control" placeholder="Quartier de l'agence" value="<?php
																																$agence->setId($_GET['numagence']);
																																$agence->Quartieragence($agence->getId()); ?>">
							</div>	
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="numeroAgence" type="text" id="email" class="form-control" placeholder="Numero de l'agence"  value="<?php
																																$agence->setId($_GET['numagence']);
																																$agence->Numeroagence($agence->getId()); ?>">
							</div>	
						</div>
																											
						<div class="form-group">
							<input name="ajouter" type="submit" value="Modifier" class="btn btn-primary">
						</div>

					</form>
					<?php
					if(isset($_POST['ajouter'])){
					
						$nomAgence=htmlspecialchars($_POST['nomAgence']);
						$communeAgence=htmlspecialchars($_POST['communeAgence']);
						$rueAgence=htmlspecialchars($_POST['rueAgence']);
						$quartierAgence=htmlspecialchars($_POST['quartierAgence']);
						$numeroAgence=htmlspecialchars($_POST['numeroAgence']);
						
									
					$connexion = mysqli_connect('localhost','root','')or die('Erreur');
					mysqli_select_db($connexion, 'face');
					$requete = mysqli_query($connexion, 'SELECT *
															FROM agences
															WHERE idAgence = "'.$_GET['numagence'].'"');
															
					if(mysqli_num_rows($requete) == 1)
									{
					if(mysqli_query($connexion, 'UPDATE agences SET nomAgence = "'.$nomAgence.'", communeAgence = "'.$communeAgence.'", rueAgence = "'.$rueAgence.'", quartierAgence = "'.$quartierAgence.'", numeroAgence = "'.$numeroAgence.'" WHERE idAgence = "'.$_GET['numagence'].'"'))
								{
			?>
							<script>document.location.replace("listagence.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>");</script>
			<?php
							}
					else
							{
								echo 'Erreur de modification des informations de l\'annonce';
													}
						}
						else
						{
								echo 'Agence inexistant';
						}

						/*$agence->setNom($nomAgence);
						$agence->setCommune($communeAgence);
						$agence->setRue($rueAgence);
						$agence->setQuartier($quartierAgence);
						$agence->setNumero($numeroAgence);
						$agence->setId($_GET['numagence']);
						$agence->Modifier($agence->getId(),$agence->getNom(),$agence->getCommune(),$agence->getRue(),$agence->getQuartier(),$agence->getNumero());
						*/
									
					}
					?>
				</div>
			</div>
			
		</div>
	</div>


	<footer id="fh5co-footer" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>A Propos de face</h3>
					<p>face est une plateforme de gestion des factures électroniques en République Démocratique du congo</p>
					</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2019 UltraTECH. By I3b25TECH.</small> 
						<small class="block">Designed by <a href="#" target="_blank">Renedi Nanikafuako</a> : <a href="#" target="_blank">Moise Manoka</a></small>  <a href="#" target="_blank">Stanislas Makengo</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

