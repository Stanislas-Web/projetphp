<?php include_once('header.php');?>
	<div id="fh5co-contact">
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 animate-box">
					<h3>Ajouter un Article</h3>
					<form action="ajouterecole.php?identifiant=<?php echo $_GET['identifiant']; ?>" method="post" enctype="multipart/form-data">

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="nomArticle" type="text" id="email" class="form-control" placeholder="Nom de l'article" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="quantiteArticle" type="text" id="email" class="form-control" placeholder="Quantité de l'article" required>
							</div>
						</div>

						
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="typeArticle" type="text" id="email" class="form-control" placeholder="prix Unitaire" required>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="seuilArticle" type="text" id="email" class="form-control" placeholder="Seuil de l'article" required>
							</div>
						</div>
						
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input name="logoArticle" type="file" id="subject" class="form-control" placeholder="" required>
							</div>
						</div>
						

						<div class="form-group">
							<input name="ajouter" type="submit" value="Ajouter" class="btn btn-primary" style="background-color:#324972;border:none;">
						</div>

					</form>
					<?php
						if(isset($_POST['ajouter']))
						{
							$nomArticle=htmlspecialchars($_POST['nomArticle']);
							$quantiteArticle=htmlspecialchars($_POST['quantiteArticle']);
							$typeArticle=htmlspecialchars($_POST['typeArticle']);
							$seuilArticle=htmlspecialchars($_POST['seuilArticle']);
							$logoArticle=htmlspecialchars($_POST['logoArticle']);
							$logoArticle=$_FILES['logoArticle']['name'];
							$logoArticle_tmp=$_FILES['logoArticle']['tmp_name'];
							if(!empty($logoArticle))
							{
								$image = explode('.',$logoArticle);
								$image_ext=end($image);
								if(in_array(strtolower($image_ext),array('png','jpeg','gif','jpg'))==true)
								{
									$connexion = mysqli_connect('localhost','root','')or die('Erreur');
									mysqli_select_db($connexion, 'lobiko');
									move_uploaded_file($logoArticle_tmp,'logos/'.$logoArticle);
									$requete = mysqli_query($connexion, 'SELECT *
																			FROM articles
																			WHERE nomArticle = "'.$nomArticle.'"');
									if(mysqli_num_rows($requete) == 0)
									{
										if(mysqli_query($connexion, 'INSERT INTO articles VALUES ("", "'.$nomArticle.'", "'.$quantiteArticle.'", "'.$typeArticle.'", "'.$seuilArticle.'","'.$logoArticle.'", NOW(), NOW(), "'.$_GET['identifiant'].'")'))
										{
?>
											<script>document.location.replace('accueil1.php?identifiant=<?php echo $_GET['identifiant']; ?>');</script>
<?php
										}
										else
										{
											echo 'Erreur dans l\'insertion de l\'ajout de l\'ecole';
										}
									}
									else
									{
										echo 'ecole déjà enregistrée';
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
<?php include_once('footer.php');?>