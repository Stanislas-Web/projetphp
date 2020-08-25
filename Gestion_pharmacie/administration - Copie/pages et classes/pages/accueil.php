<?php include_once('header.php'); ?>
	<div id="fh5co-blog" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Liste des Ecoles</h2>
					<p>Cliquez sur la photo pour plus de détails</p>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<?php
				include_once('Ecoles.class.php');
				$ecole = new Ecoles();
				$ecole->Afficher();
				?>
			</div>
		</div>
	</div>
<?php include_once('footer.php'); ?>