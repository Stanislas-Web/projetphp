	<!-- header -->
		<header>
			<div class="row">
			<div class="col-md-3 top-info text-left mt-lg-4">
					<h6>Bessoin d'aide appelez</h6>
					<ul>
						<li>
							<i class="fas fa-phone" style="color:#0e5c30;"></i></li>
						<li class="number-phone mt-3" >+243 810 772 699</li>
					</ul>
				</div>
				
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="index2.php?numero=<?php echo $_SESSION['id'];?>">
						<img src="images/p.png"/> </a>
					</h1>
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
				<ul class="cart-inner-info">
						<li class="button-log">
							<a class="btn-open" href="#">
								<span class="fa fa-user" aria-hidden="true"></span>
							</a>
						</li>
						<li class="galssescart galssescart2 cart cart box_1">
							<form action="panier2.php?numero=<?php echo $_SESSION['id'];?>" method="post" class="last">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="display" value="1">
								<a href="panier2.php?numero=<?php echo $_SESSION['id'];?>"><button class="top_googles_cart" type="submit" name="submit" value="">
									<?php echo MontantGlobal()." FC";?>
									<i class="fas fa-cart-arrow-down"></i>
								</button></a>
							</form>
						</li>
					</ul>

					<!---->
					<div class="overlay-login text-left">
						<button type="button" class="overlay-close1">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>
						<div class="wrap">
							<h5 class="text-center mb-4">Connexion</h5>
							<div class="login p-5 bg-dark mx-auto mw-100">
								<form action="#" method="post">
									<div class="form-group">
										<label class="mb-2">Nom du client</label>
										<input name="nomClient" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom du Client" required="">
										<small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais vos informations avec quelqu'un d'autre</small>
									</div>
									<div class="form-group">
										<label class="mb-2">Mot de passe</label>
										<input name="motdepasse" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required="">
									</div>
									
									<button name="connexion" type="submit" class="btn btn-primary submit mb-4" style="background-color:#0e5c30; border-radius:10px;">Connexion</button><a href="inscription.php" style="color:#fff;"><?php echo "           " ?>Inscription</a>

								</form>
							</div>
							<?php
								if(isset($_POST['connexion'])){
										$connexion = mysqli_connect('localhost', 'root', '') or die ('error');
										mysqli_select_db($connexion, 'wenzeshop');
										$requete = mysqli_query($connexion, 'SELECT *
																				FROM clients
																				WHERE nomClient = "'.$_POST['nomClient'].'"
																				AND motdepasseClient = "'.$_POST['motdepasse'].'"');

								if(mysqli_num_rows($requete) == 1)
								{
									if($info = mysqli_fetch_array($requete))
									{
										$_SESSION['id']=$info['idClient']
										?>
										<script>document.location.replace("index2.php?numero=<?php echo $_SESSION['id']; ?>");</script>
										<?php
									}
									else
									{
										echo 'Erreur de chargement des informations du compte';
									}
								}
								else
								{
										echo 'Vous n\'avez pas de compte';
								}										
						}
							?>
							<!---->
						</div>
					</div>
					
					<!---->
				</div>
			</div>
			<div class="search">
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button">
						<i class="fas fa-search"></i>
					</button>
				</div>
				

				
				<!-- open/close -->
				<div class="overlay overlay-door">
					<button type="button" class="overlay-close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<form action="index2.php?numero=<?php echo $_SESSION['id'];?>" method="GET" class="d-flex">
						<input class="form-control" type="search" name="recherche" placeholder="Recherche..." required="">
						<button type="submit" name="rechercher" class="btn btn-primary submit" style="background:#0e5c30;">
							<i class="fas fa-search" ></i>
						</button>
					</form><?php

					?>

				</div>

				
				<!-- open/close -->
				<div class="overlay overlay-door">
					<button type="button" class="overlay-close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<form action="index.php" method="GET" class="d-flex">
						<input class="form-control" type="search" name="recherche" placeholder="Recherche..." required="">
						<button type="submit" name="rechercher" class="btn btn-primary submit" style="background:#0e5c30;">
							<i class="fas fa-search" ></i>
						</button>
					</form><?php

					?>

				</div>
				<!-- open/close -->
			</div>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="index2.php?numero=<?php echo $_SESSION['id'];?>" style="color:#0e5c30;">Accueil
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" >A propos</a>
						</li>
			
				
					</ul>

				</div>
			</nav>
		</header>
		<!-- //header -->
