<?php
	//include('classes.php');
	//include('objets.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bullectronic |
		<?php
			//if(isset($_GET['identifiant']))
			//{
			//	echo $_GET['identifiant'];
			//}
			//else
			//{
			//	echo 'Bienvenu(e)';
			//}
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
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

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="fh5co-offcanvas">
		<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span></span></span></a>
		<div class="fh5co-bio">
			<figure>
				<img src="images/person1.jpg" alt="Free HTML5 Bootstrap Template" class="img-responsive">
			</figure>
			<h3 class="heading">
				Bullectronic
			</h3>
			<h2>
				<?php
					//if(isset($_GET['identifiant']))
					//{
					//	echo 'Hey ! Je suis <b>' .$_GET['identifiant']. '</b>';
					//}
				?>
			</h2>
			<p>
				<?php
					//if(isset($_GET['identifiant']))
					//{
					//	echo 'Je suis sur le panel d\'administration d\'<b>Immaculé Boutique</b>';
					//}
				?>
			</p>
			<ul class="fh5co-social">
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-instagram"></i></a></li>
			</ul>
		</div>

		<div class="fh5co-menu">
			<div class="fh5co-box">
				<?php
					if(isset($_GET['identifiant']))
					{
				?>
						<h3 class="heading">Menu</h3>
						<ul>
							<li><a href="interfaces/ajouterarticle.php?identifiant=<?php echo $_GET['identifiant']; ?>">Ajouter un article</a></li>
							<li><a href="index.php?identifiant=<?php echo $_GET['identifiant']; ?>">Liste des articles</a></li>
							<li><a href="interfaces/ravitailler.php?identifiant=<?php echo $_GET['identifiant']; ?>">Ravitailler</a></li>
							<li><a href="interfaces/deconnexion.php?identifiant=<?php echo $_GET['identifiant']; ?>">Déconnexion</a></li>
							<li><a href="interfaces/apropos.php?identifiant=<?php echo $_GET['identifiant']; ?>">A propos</a></li>
						</ul>
				<?php
					}
					else
					{
				?>
						<h3 class="heading">Menu</h3>
						<ul>
							<li><a href="interfaces/verication.php">Inscription</a></li>
							<li><a href="interfaces/connexion.php">Connexion</a></li>
							<li><a href="interfaces/apropos.php">A propos</a></li>
						</ul>
				<?php
					}
				?>
				
			</div>
			<div class="fh5co-box">
				<h3 class="heading">Recherche</h3>
				<form action="#">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Tapez un mot-clé">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header">
		
		<div class="container-fluid">

			<div class="row">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				
				<div class="col-lg-12 col-md-12 text-center">
					<?php
					//	if(isset($_GET['identifiant']))
						//{
					?>
							<h3 id="fh5co-logo"><a href="index.php?identifiant=<?php //echo $_GET['identifiant']; ?>"><img src="images/j.png" width="200px" height="120px"><span style="color:silver"></span><sup></sup></a></h3>
							<h6 id="fh5co-logo"><h6>
					<?php
						//}
						//else
						//{
					?>
					<?php
						//}
					?>
				</div>

			</div>
		
		</div>

	</header>
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry">
			<?php
				//if(isset($_GET['identifiant']))
				//{
				//	$article->AfficherIndexSiConnecte();
				//}
				//else
				//{
				//	$article->AfficherIndexNonConnecte();
				//}
			?>
		</div>
	</div>

	<footer id="fh5co-footer">
		<p><small>&copy; 2019. Stanislas. Tous droits réservés.</small></p>
	</footer>


	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

