<?php
			$connexion=mysqli_connect('localhost','root','')or die('error');
			mysqli_select_db($connexion,'ecole');		
			$requete= mysqli_query($connexion,'SELECT *
												FROM etudiants 
												ORDER BY nom,postnom ASC');
			
			While($informations = mysqli_fetch_array($requete))
			{		
				?>
				 <a href="supprimer.php?id=<?php echo $informations['id'];?>">Supprimer</a>| <!-- pour affiche une lien supprimer avec du code html -->
				
				<?php

				echo $informations['nom'].'  '.$informations['postnom'].'<br>';
			}
			
?>