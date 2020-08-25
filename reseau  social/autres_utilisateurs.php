<?php
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=rs','root','');
$query=$bdd->query('SELECT photo,nom,prenom FROM utilisateurs ORDER BY prenom');
  ?>
  <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stani.css">
  <link rel="stylesheet" type="text/css" href="css/autres_utilisateurs.css">
<meta charset="utf-8">
	<title>edition profil/Bomoko</title>
</head>
<body>
<!-- haut de page -->
<header><h1><img src="css\bomok1.jpg" id="bomoko"></h1></header>
	<!-- menu de navigation -->
	<nav>
	<div class="table">
	       <ul>
       			  <li class="menu-ind">
       					<a href="redirection.php">Accueil</a>

       				</li>
       			

       			<li class="menu-los">
       					<a href="liste_ami.php">Liste d'amis</a>
       			</li>

       			<li class="menu-con">
       					<a href="#">Demande d'amis</a>
       			</li>
       			
       			<li class="menu-exp">
       					<a href="deconnexion.php">Se deconnecter </a>
       			</li>
      		</ul>  
    </div>
</nav>
<div id="contenu">
<?php
while ($d = $query->fetch()) {
	?>
	<div id="ami">
	 <img src="utilisateurs/photo profil/<?php echo $d['photo']; ?>" width="80" height="80" id="imgprofil"> 
	  <?=$d['nom'];?>
	  <?= $d['prenom']; ?><br> <form method="POST">
      <input type="submit" name="submit" id="invitation" value="Envoyer invitation">
    </form></div>
	  -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>
<?php
}
?>
</div>
<!-- bas de page -->
<footer>
	 <p>copyright &copy Stanislas Makengo 2018 :Amis/Bomoko - Toute reproduction interdite</p>
</footer>
</body>
</html>