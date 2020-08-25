<!DOCTYPE html>
<html>
<head>
	<title>Inscription/Bomoko</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Présentation de Stanislas Makengo">
	<link rel="stylesheet" type="text/css" href="css\stanipoo.css">
	<link rel="stylesheet" type="text/css" href="css\stylepoo.css">
</head>
<body>
<!-- haut de page -->
	<header>
	    <h1><img src="css\bomok1.jpg" id="bomoko"></h1>
	</header>
	<!-- menu de navigation -->
<nav>
	<div class="table">
	       <ul>
       			<!--  <li class="menu-ind">
       					<a href="connexion.php">Accueil</a>
       			</li>-->

       			<li class="menu-exp">
       					<a href="connexionpoo.php">connexion</a>
       			</li>

       			<li class="menu-los">
       					<a href="inscriptionpoo.php">Inscription</a>
       			</li>

       			<!--  <li class="menu-con">
       					<a href="inscription.php">se Deconnecter</a>
       			</li>-->
      		</ul>  
    </div>

</nav>
<div id="inscription">

					<h1 id="Inscription">Inscription <span id="gratuit">(c'est gratuit)</span>
</h1> 
	<form method="POST" action="" id="content">
	<input type="text" name="prenom" placeholder="Prénom" id="prenom" value="<?php echo isset($_POST['prenom'])?$_POST['prenom']:''?>">
	<input type="text" name="nom" placeholder="Nom de famille" id="nom" value="<?php echo isset($_POST['nom'])?$_POST['nom']:''?>"><br>
	<input type="text" name="email" placeholder="Votre e-mail " id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''?>"><br>
	<input type="password" name="motdepasse" placeholder="Votre mot de passe" id="motdepasse" value="<?php echo isset($_POST['motdepasse'])?$_POST['motdepasse']:''?>"><br>
	<label for="sexe" id="sexe">Sexe</label>
	<select name="sexe" id="section">
		<?php echo isset($_POST['sexe'])?'<option value='.$_POST['sexe'].'>'.$_POST['sexe'].'</option>' :''?>
		 <?php echo $_POST['sexe'] !='Homme'?'<option value="Homme" id="Homme">Homme</option>':'' ?> 
		 <?php echo $_POST['sexe'] !='Femme'?'<option value="Femme" id="Femme">Femme</option>':'' ?> 
<br>
	</select><br><br>
	<!--  <p class="e">En appuyant sur inscription, Vous acceptez nos Conditions génerales</p>-->
	<br>
	<input type="submit" name="submit" id="val" value="Inscription">

</form>
		
 <?php
 require 'class/Autoloader.php';
 $stani=new Autoloader();
 $stani->register();
 session_start();
 $bdd = new PDO('mysql:host=127.0.0.1;dbname=site','root',''); 
 if (isset($_POST['submit'])) {
 		$prenom=htmlspecialchars($_POST['prenom']);
 		$nom=htmlspecialchars($_POST['nom']);
 		$email=htmlspecialchars($_POST['email']);
 		$motdepasse=sha1(htmlspecialchars($_POST['motdepasse']));
 		$sexe=htmlspecialchars($_POST['sexe']);
 	
 	if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['email']) and !empty($_POST['motdepasse']) and !empty($_POST['sexe'])) {
 			$prenomstrlen=strlen($_POST['prenom']);
	 		if ($prenomstrlen<= 100) {
	 			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 				$reqmail=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=?");
	 				$reqmail->execute(array($email));
	 				$mailexist=$reqmail->rowcount();
	 				if ($mailexist==0) {
/*l'inscription cas d'un homme*/
	 					if ($sexe=="Homme") {
	 						

	 						header("location:profilpoo.php?id=".$_SESSION['id']);

	 							}

/*l'inscription cas d'une femme*/
	 				if ($sexe=="Femme") {

	 						
	 						header("location:profilpoo.php?id=".$_SESSION['id']);


			 				
	 				}
	 						
	 		 			
			 			}else{
			 				$erreurs="adresse mail déjà utilisée!";
			 			}
	 			}else{
	 				$erreurs="votre adresse email n'est pas valide! ";
	 			}
	 			
	 		}else{
	 			$erreurs="votre Prénom ne doit pas depasser 100 caractères";
	 		}

 	}else{
 		$erreurs=" tout les champs doivent etre complétés";
 	}
 }

?>
<?php
if (isset($erreurs)) {
	echo "<div class='error'>".$erreurs."</div>";
}
	
?>
</div>


	<!-- bas de page -->

<footer>
	 <p>copyright &copy Stanislas Makengo 2018 :Inscription/Bomoko - Toute reproduction interdite</p>
	 
</footer>



</body>
</html>















 