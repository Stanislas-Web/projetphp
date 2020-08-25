<?php include_once('header.php');?>	
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 animate-box">
					<h3>Modifier l'Article <b><?php $ecole->setId($_GET['numero']);$ecole->Nom($ecole->getId());  ?></h3>
					<form action="modifierecole.php?identifiant=<?php echo $_GET['identifiant']; ?>&numero=<?php echo $_GET['numero']; ?>" method="post" enctype="multipart/form-data">

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input name="nomEcole" type="text" id="email" class="form-control" placeholder="Nom de l'école" value="<?php $ecole->setId($_GET['numero']);$ecole->Nom($ecole->getId());?>" >
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<input name="categorieEcole" type="text" id="email" class="form-control" value="<?php $ecole->setId($_GET['numero']);$ecole->Categorie($ecole->getId());?>">
								
							</div>
						</div>
						
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="communeEcole" type="text" id="email" class="form-control" placeholder="Commune de l'école" value="<?php $ecole->setId($_GET['numero']);$ecole->Commune($ecole->getId());?>">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="quartierEcole" type="text" id="email" class="form-control" placeholder="Quartier de l'école" value="<?php $ecole->setId($_GET['numero']);$ecole->Quartier($ecole->getId());?>">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="avenueEcole" type="text" id="email" class="form-control" placeholder="Avenue de l'école" value="<?php $ecole->setId($_GET['numero']);$ecole->Avenue($ecole->getId());?>">
									
							</div>
						</div>


						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
									<input name="numeroEcole" type="text" id="email" class="form-control" placeholder="Numero de l'école" value="<?php $ecole->setId($_GET['numero']);$ecole->Numero($ecole->getId());?>">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input name="logoEcole" type="file" id="subject" class="form-control" placeholder="Image du ecole" required>
							</div>
						</div>
						

						<div class="form-group">
							<input name="modifier" type="submit" value="Modifier " class="btn btn-primary" style="background-color:#324972;border:none;">
						</div>

					</form>
					<?php
						if(isset($_POST['modifier']))
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
																			WHERE idEcole = "'.$_GET['numero'].'"');
									if(mysqli_num_rows($requete) == 1)
									{
										if(mysqli_query($connexion, 'UPDATE ecoles SET nomEcole = "'.$nomEcole.'", categorieEcole = "'.$categorieEcole.'", communeEcole ="'.$communeEcole.'", quartierEcole = "'.$quartierEcole.'", avenueEcole = "'.$avenueEcole.'", numeroEcole = "'.$numeroEcole.'", logoEcole = "'.$logoEcole.'" WHERE idEcole = "'.$_GET['numero'].'"'))
										{
?>
											<script>document.location.replace('accueil1.php?identifiant=<?php echo $_GET['identifiant']; ?>');</script>
<?php
										}
										else
										{
											echo 'Erreur de modification des informations de la societe';
										}
									}
									else
									{
										echo 'produit inexistant';
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