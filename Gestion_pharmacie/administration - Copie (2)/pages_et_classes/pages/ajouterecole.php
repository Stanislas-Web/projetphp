<?php include_once('header.php');?>
	<div id="fh5co-contact">
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 animate-box">
					<h3>Ajouter une Ecole</h3>
					<form action="ajouterecole.php?identifiant=<?php echo $_GET['identifiant']; ?>" method="post" enctype="multipart/form-data">

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="nomEcole" type="text" id="email" class="form-control" placeholder="Nom de l'école" required>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<select name="categorieEcole" type="text" id="email" class="form-control">
									<option>Conventionnée Kimbanguiste</option>
									<option>Conventionnée Catholique</option>
									<option>Conventionnée Protestante </option>
									<option>Privée Agrée</option>
									<option>Public</option>
									
								</select>
								
							</div>
						</div>
						
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="communeEcole" type="text" id="email" class="form-control" placeholder="Commune de l'école" required>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="quartierEcole" type="text" id="email" class="form-control" placeholder="Quartier de l'école" required>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="avenueEcole" type="text" id="email" class="form-control" placeholder="Avenue de l'école" required>
									
							</div>
						</div>


						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="numeroEcole" type="text" id="email" class="form-control" placeholder="Numero de l'école" required>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input name="logoEcole" type="file" id="subject" class="form-control" placeholder="Image du ecole" required>
							</div>
						</div>
						

						<div class="form-group">
							<input name="ajouter" type="submit" value="Ajouter" class="btn btn-primary" style="background-color:#324972;border:none;">
						</div>

					</form>
					<?php
						if(isset($_POST['ajouter']))
						{
							$nomEcole=htmlspecialchars($_POST['nomEcole']);
							$categorieEcole=htmlspecialchars($_POST['categorieEcole']);
							$communeEcole=htmlspecialchars($_POST['communeEcole']);
							$quartierEcole=htmlspecialchars($_POST['quartierEcole']);
							$avenueEcole=htmlspecialchars($_POST['avenueEcole']);
							$numeroEcole=htmlspecialchars($_POST['numeroEcole']);
							$logoEcole=$_FILES['logoEcole']['name'];
							$logoEcole_tmp=$_FILES['logoEcole']['tmp_name'];
							if(!empty($logoEcole))
							{
								$image = explode('.',$logoEcole);
								$image_ext=end($image);
								if(in_array(strtolower($image_ext),array('png','jpeg','gif','jpg'))==true)
								{
									$connexion = mysqli_connect('localhost','root','')or die('Erreur');
									mysqli_select_db($connexion, 'tfc');
									move_uploaded_file($logoEcole_tmp,'logos/'.$logoEcole);
									$requete = mysqli_query($connexion, 'SELECT *
																			FROM ecoles
																			WHERE nomEcole = "'.$nomEcole.'"');
									if(mysqli_num_rows($requete) == 0)
									{
										if(mysqli_query($connexion, 'INSERT INTO ecoles VALUES ("", "'.$nomEcole.'", "'.$categorieEcole.'", "'.$communeEcole.'", "'.$quartierEcole.'","'.$avenueEcole.'","'.$numeroEcole.'","'.$logoEcole.'", NOW(), NOW(), "'.$_GET['identifiant'].'")'))
										{
?>
											<script>document.location.replace('accueil.php?identifiant=<?php echo $_GET['identifiant']; ?>');</script>
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