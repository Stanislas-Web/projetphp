	<form action="index.php" method="post">
		<input name="nom" type="text" placeholder="nom"><br><br>
		<input name="postnom" type="text" placeholder="Postnom"><br><br>
		<input name="ajouter" type="submit" value="ajouter"><br><br>
	</form>
	<?php

	//la fonction pour inserer dans une BD
		function ajouter($nom,$postnom){
			$connexion=mysqli_connect('localhost','root','')or die('error');
			mysqli_select_db($connexion,'ecole');
			if(mysqli_query($connexion,'INSERT INTO etudiants VALUES("","'.$nom.'","'.$postnom.'")')){
				echo 'ok';
			}
			else{
				echo 'Erreur';
			}
			
		}
		
	//pour faire les actions avec l'input submit	
		if(isset($_POST['ajouter']))
		{
			ajouter($_POST['nom'],$_POST['postnom']);
			echo'<br><br>';
		}
		
		?>
		<a href="liste.php"><span style="color:#34495">voir la liste</span></a>
		<?php
			function supprimer($id){
			$connexion=mysqli_connect('localhost','root','')or die('error');
			mysqli_select_db($connexion,'ecole');
			if(mysqli_query($connexion,'DELETE FROM etudiants WHERE id="'.$id.'"')){
		?>
			<script>document.location.replace("index.php");</script>
		<?php
			}
				
		}
		?>
		