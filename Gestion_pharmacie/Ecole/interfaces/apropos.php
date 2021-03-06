<?php
	include('../classes.php');
	include('../objets.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nick Polisi |
		<?php
			if(isset($_GET['identifiant']))
			{
				echo $_GET['identifiant'];
			}
			else
			{
				echo 'Bienvenu(e)';
			}
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
				<img src="../photosMoi/<?php $moi->Photo(); ?>" alt="Free HTML5 Bootstrap Template" class="img-responsive">
			</figure>
			<h3 class="heading">
				Nick Polisi
			</h3>
			<h2>
				<?php
					if(isset($_GET['identifiant']))
					{
						echo 'Hey ! Je suis <b>' .$_GET['identifiant']. '</b>';
					}
					else
					{
						echo '...';
					}
				?>
			</h2>
			<p>
				<?php
					if(isset($_GET['identifiant']))
					{
						echo 'Je suis sur le panel d\'administration de <b>Nick Polisi</b>';
					}
					else
					{
						echo '...';
					}
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
							<li><a href="../index.php?identifiant=<?php echo $_GET['identifiant']; ?>">Accueil</a></li>
							<li><a href="ajouternouvelle.php?identifiant=<?php echo $_GET['identifiant']; ?>">Ajouter une nouvelle</a></li>
							<li><a href="../index.php?identifiant=<?php echo $_GET['identifiant']; ?>">Liste des nouvelles</a></li>
							<li><a href="contacts.php?identifiant=<?php echo $_GET['identifiant']; ?>">Contacts</a></li>
							<li><a href="deconnexion.php?identifiant=<?php echo $_GET['identifiant']; ?>">Déconnexion</a></li>
							<li><a href="apropos.php?identifiant=<?php echo $_GET['identifiant']; ?>">A propos</a></li>
						</ul>
				<?php
					}
					else
					{
				?>
						<h3 class="heading">Menu</h3>
						<ul>
						<li><a href="../index.php">Accueil</a></li>
							<li><a href="connexion.php">Connexion</a></li>
							<li><a href="apropos.php">A propos</a></li>
						</ul>
				<?php
					}
				?>
				
			</div>
			<?php
				if(isset($_GET['identifiant']))
				{
			?>
					<div class="fh5co-box">
						<h3 class="heading">A propos de Nick Polisi</h3>
						<form action="apropos.php?identifiant=<?php echo $_GET['identifiant']; ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input name="domaineMoi" type="text" class="form-control" placeholder="Domaine"><br>
								<input name="sousDomaineMoi" type="text" class="form-control" placeholder="Sous-domaine"><br>
								<textarea name="descriptionMoi" type="text" class="form-control" placeholder="Description"></textarea><br>
								<input name="photoMoi" type="file" class="form-control" placeholder="Photo"><br>
								<input name="ajouter" type="submit" class="form-control" value="Ajouter">
							</div>
						</form>
						<?php
							if(isset($_POST['ajouter']))
							{
								$photoMoi = $_FILES['photoMoi']['name'];
								$photoMoi_tmp = $_FILES['photoMoi']['tmp_name'];
								$moi->setDomaine($_POST['domaineMoi']);
								$moi->setSousDomaine($_POST['sousDomaineMoi']);
								$moi->setDescription($_POST['descriptionMoi']);
								$moi->setPhoto($photoMoi);
								$moi->Ajouter($moi->getDomaine(), $moi->getSousDomaine(), $moi->getDescription(), $moi->getPhoto(), $photoMoi_tmp, $_GET['identifiant']);
							}
						?>
					</div>
			<?php
				}
			?>
		</div>
	</div>
	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header">
		
		<div class="container-fluid">

			<div class="row">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				
				<div class="col-lg-12 col-md-12 text-center">
					<?php
						if(isset($_GET['identifiant']))
						{
					?>
							<h3 id="fh5co-logo"><a href="../index.php?identifiant=<?php echo $_GET['identifiant']; ?>"><img src="images/a4.png" width="50px" height="50px"><span style="color:silver">Nick Polisi</span><sup></sup></a></h3>
					<?php
						}
						else
						{
					?>
							<h3 id="fh5co-logo"><a href="../index.php"><span style="color:silver"><img src="images/a4.png" width="50px" height="50px">Nick Polisi<sup></sup></a></h3>
					<?php
						}
					?>
				</div>

			</div>
		
		</div>

	</header>
	
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<figure class="animate-box">
					<center><img style="border-radius:50%" src="../photosMoi/<?php $moi->Photo(); ?>" alt="Image" class="img-responsive"></center>
				</figure>
				<span class="fh5co-meta animate-box"><b><a href="#"><?php $moi->Admin(); ?></a></b></span>
				<h2 class="fh5co-article-title animate-box"><b><a href="#">Nick Polisi</a></b></h2>
				<span class="fh5co-meta fh5co-date animate-box"><b><?php $moi->Timing(); ?></b></span>
				
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-8 cp-r animate-box">
							<p><b><?php $moi->Description(); ?></b></p>
						</div>
						<div class="col-lg-4 animate-box">
							<div class="fh5co-highlight right">
								<p><h4>Contacts</h4></p>
								<hr>
								<h4>
									polisisme@gmail.com<br>
									+243 824 717 700
								</h4>
							</div>
						</div>
					</div>
					
				</div>
			</article>
		</div>
	</div>

	<footer id="fh5co-footer">
		<p><small>&copy; 2019. I325TECH. Tous droits réservés.</small></p>
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

