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
	<title>face | Ajouter une Facture</title>
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
						<div id="fh5co-logo"><a href="accueil.php?numeroAgence=<?php echo $_GET['numeroAgence']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>"><img src="images/face.png"><span></span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="ajouterclient.php?numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>">Ajouter un client</a></li>
							<li><a href="listeclient.php?numeroClient=<?php echo $_GET['numeroClient']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>">Liste des clients</a></li>
							<li class="has-dropdown">
								<a href="#"><?php $agence->setId($_GET['numeroAgence']); $agence->Nom($agence->getId()); ?></a>
								<ul class="dropdown">
									<li><a href="#">Profil</a></li>
									<li><a href="deconnexion.php?numeroAgence=<?php echo $_GET['numeroAgence']; ?>">Déconnexion</a></li>
								</ul>
							</li><!-- <li class="btn-cta"><a href="#"><span>Login</span></a></li> -->
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(../../administration/logos/<?php echo $societe->setId($_GET['numeroSociete']);$societe->Photo($societe->getId()); ?>);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<br><br>
						<p style="color:#fff"><?php $societe->setId($_GET['numeroSociete']);$societe->Nom($societe->getId());?></p>
						<p style="color:#fff"><?php $societe->setId($_GET['numeroSociete']);$societe->Description($societe->getId());?></p>
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
					<h3>Ajouter une facture pour le compte du Client nommé <b><?php $client->setId($_GET['numeroClient']); $client->Nom($client->getId()); ?></b> de l'agence <b><?php $agence->setId($_GET['numeroAgence']); $agence->Nom($agence->getId()); ?></b> de la Société nommée <b><?php $societe->setId($_GET['numeroSociete']); $societe->Nom($societe->getId()); ?></b></b></h3>
					<form action="ajouterfacture.php?numeroClient=<?php echo $_GET['numeroClient']; ?>&numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>" method="post" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="nomFacture" type="text" id="email" class="form-control" value="<?php $client->setId($_GET['numeroClient']);$client->Nom($client->getId());?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="moisFacture" type="text" id="email" class="form-control" placeholder="Mois et année de la Facture" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input name="pdfFacture" type="file" id="subject" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<input name="ajouter" type="submit" value="Ajouter" class="btn btn-primary">
						</div>

					</form>
					<?php
					if(isset($_POST['ajouter']))
						{
							$nomFacture=htmlspecialchars($_POST['nomFacture']);
							$moisFacture=htmlspecialchars($_POST['moisFacture']);
							$pdfFacture=$_FILES['pdfFacture']['name'];
							$pdfFacture_tmp=$_FILES['pdfFacture']['tmp_name'];
							if(!empty($pdfFacture))
							{
								$image = explode('.',$pdfFacture);
								$image_ext=end($image);
								if(in_array(strtolower($image_ext),array('pdf','docx','xls'))==true)
								{
									$connexion = mysqli_connect('localhost','root','')or die('Erreur');
									mysqli_select_db($connexion, 'face');
									move_uploaded_file($pdfFacture_tmp,'../pdfs/'.$pdfFacture);
								
										if(mysqli_query($connexion, 'INSERT INTO factures VALUES ("","'.$nomFacture.'", "'.$moisFacture.'", "'.$pdfFacture.'", NOW(), NOW(), "'.$_GET['numeroClient'].'", "'.$_GET['numeroSociete'].'", "'.$_GET['numeroAgence'].'")'))
										{
?>
											<script>document.location.replace('accueil.php?numeroSociete=<?php echo $_GET['numeroSociete']; ?>&numeroAgence=<?php echo $_GET['numeroAgence']; ?>');</script>
<?php
										}
										else
										{
											echo 'Erreur dans l\'insertion de l\'ajout de la Societe';
										}
									
								}
								else
								{
									echo 'Erreur d\'extension du logo';
								}
							}
							else
							{
								echo 'Veuillez insérer un logo';
							}
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
						<small class="block">Designed by <a href="#" target="_blank">UltraTech</a></small>
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

