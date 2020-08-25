<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stanipoo.css">
	<link rel="stylesheet" type="text/css" href="css/styleconnectpoo.css">
<meta charset="utf-8">
	<title>Connexion/Bomoko</title>
</head>
<body><!-- haut de page -->
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
       					<a href="deconnexion.php">se deconnecter</a>
       			</li>-->
      		</ul>  
    </div>
</nav>
<div class="cont" align="center">
		<div id="kota">
	<!--  <h align="center">Connexion</h2>-->
		<img src="css/homme.png" id="imgkota">
<form method="POST" action="">
	<div class="form-input">
	<input type="text" name="emailconnect" placeholder="Votre e-mail " id="prenom" value="<?php echo isset($_POST['emailconnect'])?$_POST['emailconnect']:''?>" ><br><br>
	<input type="password" name="motdepasseconnect"  placeholder="Votre mot de passe" id="motdepasse" value="<?php echo isset($_POST['motdepasseconnect'])?$_POST['motdepasseconnect']:''?>" ><br><br>
	<input type="submit" name="connexion" value="connexion" id="btn"><br><br>
	<a href="" id="oublie">Mot de passe oublié?</a>
	</div>
</div>
</form>
<br>
<br>

<?php
session_start();

$bdd=new PDO('mysql:host=127.0.0.1;dbname=site','root','');
if (isset($_POST['connexion'])) {
	$emailconnect=htmlspecialchars($_POST['emailconnect']);
	$motdepasseconnect= sha1(htmlspecialchars($_POST['motdepasseconnect']));
	if (!empty($emailconnect) and !empty($motdepasseconnect)) {
			if (filter_var($emailconnect, FILTER_VALIDATE_EMAIL)) {	
				$reqverif=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=? AND motdepasse=?");
				$reqverif->execute(array($emailconnect,$motdepasseconnect));
				$verifexist=$reqverif->rowCount();
				if ($verifexist==1) {
					$userinfo=$reqverif->fetch();
					$_SESSION['id']=$userinfo['id'];
					$_SESSION['prenom']=$userinfo['prenom'];
					$_SESSION['nom']=$userinfo['nom'];
					$_SESSION['email']=$userinfo['email'];
					$_SESSION['motdepasse']=$userinfo['motdepasse'];
					$_SESSION['sexe']=$userinfo['sexe'];
					header("location:profil.php?id=".$_SESSION['id']);
		}else{
			$erreurs="Adresse e-mail ou mot de passe incorrect";
		}
	}else{
		$erreurs="votre adresse email n'est pas valide!";
	}

	}else{
		 $erreurs=" tout les champs doivent etre complétés";
	}
}
					
  if (isset($erreurs)) {
  	echo "<div class='error' >".$erreurs."</div>";
  }
  ?>
  </div>
  <!-- bas de page -->
  <footer>
	 <p>copyright &copy Stanislas Makengo 2018 :Connexion/Bomoko - Toute reproduction interdite</p>
</footer>
</body>
</html>




