<?php include_once('header.php');?>
	
	<div id="fh5co-blog" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2> la liste des produits disponible <?php //$agence->setId($_GET['numeroSociete']); $agence->NomSociete($agence->getId()); ?></h2>
					<p><?php //$agence->setId($_GET['numeroAgence']); $agence->Nom($agence->getId()); ?></p>
					<p><?php //$client->setId($_GET['numeroClient']); $client->Nom($client->getId()); ?></p>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				
				<?php $ecole->Afficher(); ?>
			</div>
		</div>
	</div>
<?php include_once('footer.php');?>