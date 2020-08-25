
<form method="POST" action="cible.php">
	<label for="prenom">Prenom</label>
	<input type="text" name="prenom"><br>
	<label for="message">Message</label>
	<input type="text" name="message"><br>
	<input type="submit" name="submit" value="Envoyer"><br>
	<style type="text/css">
		form{
			text-align: center;
		}
	</style>
	
</form>
<?php 
try{
	$bdd=new PDO('mysql:host=localhost;dbname=MC','root','');
}
catch(Exception $e)
{
	die('Erreur:'.$e->getMessage());

}

$reponse=$bdd->query('SELECT prenom, message FROM minichat ORDER BY id DESC LIMIT 0,10 ');
while ($donnees=$reponse->fetch()) {
	echo '<p><strong>'.htmlspecialchars($donnees['prenom']).'</strong> :'.htmlspecialchars($donnees['message']).'</p>';

}
$reponse->closeCursor();
 ?>