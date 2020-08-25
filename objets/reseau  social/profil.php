   <?php
    session_start();
    $bdd=new PDO('mysql:host=127.0.0.1;dbname=rs','root','');
    if (isset($_GET['id']) AND $_GET['id']>0) {
      $getid=intval($_GET['id']);
      $requser=$bdd->prepare("SELECT * FROM utilisateurs WHERE id=?");
      $requser->execute(array($getid));
      $userinfo=$requser->fetch();
      
    }


    if (isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id']) {

    }
      ?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stani.css">
  <link rel="stylesheet" type="text/css" href="css/profil.css">
<meta charset="utf-8">
	<title>profil/Bomoko</title>
</head>
<body>
<!-- haut de page -->
<!--  <header><h1><img src="css\bomok1.jpg" id="bomoko"></h1></header>-->
	<!-- menu de navigation -->
	<nav>
	<div class="table">
	       <ul>
                   <?php 
      if (!empty($userinfo['photo'])) {
       ?>
       <img src="utilisateurs/photo profil/<?php echo $userinfo['photo']; ?>" width="50" height="50" id="imgprofil">
       <?php 
       }
       ?>
       			  <li class="menu-ind">        
       					<a href="#">Accueil</a>
       				</li>
       			<li class="menu-exp">
       					<a href="editionprofil.php">Editer le profil </a>
       			</li>

       			<li class="menu-los">
       					<a href="ami.php">vos amis</a>
       			</li>

       			<li class="menu-ind">
       					<a href="message.php">Message</a>
       			</li>
            <li class="menu-los">
                <a href="publication.php">Publication</a>
            </li>
       			<li class="menu-exp">
       					<a href="deconnexion.php">Se deconnecter </a>
       			</li>
            
      		</ul>  
    </div>
</nav>
<div id="profil1">




    </div>
    <div id="profil2">
      <img src="css/girl-with-cotton-candy-1080x720.jpg" height="400 px" width="400px" id="photopubliee"><br>
      <hr>
      <a href=""><img src="css/like.jpg" height="100px" width="150px" id="like"></a>
      <a href=""><img src="css/dislike.jpg" height="100px" width="150px" id="dislike"></a>
      <a href=""><img src="css/coeur2.jpg" height="100px" width="150px" id="coeur"> </a>
      <hr>

       <img src="css/african-american-students.jpg" height="400 px" width="400px" id="photopubliee"><br>
      <hr>
      <a href=""><img src="css/like.jpg" height="100px" width="150px" id="like"></a>
      <a href=""><img src="css/dislike.jpg" height="100px" width="150px" id="dislike"></a>
      <img src="css/coeur2.jpg" height="100px" width="150px" id="coeur">
      <hr>

       <img src="css/IMG-20180301-WA0004.jpg" height="400 px" width="400px" id="photopubliee"><br>
      <hr>
      <a href=""><img src="css/like.jpg" height="100px" width="150px" id="like"></a>
      <a href=""><img src="css/dislike.jpg" height="100px" width="150px" id="dislike"></a>
      <img src="css/coeur2.jpg" height="100px" width="150px" id="coeur">
      <hr>

       <img src="css/rialto-bridge-venice-1080x720.jpg" height="400 px" width="400px" id="photopubliee"><br>
      <hr>
      <a href=""><img src="css/like.jpg" height="100px" width="150px" id="like"></a>
      <a href=""><img src="css/dislike.jpg" height="100px" width="150px" id="dislike"></a>
      <img src="css/coeur2.jpg" height="100px" width="150px" id="coeur">
      <hr>

       <img src="css/570157045-compiti-a-casa-campus-studiare-biblioteca.jpg" height="400 px" width="400px" id="photopubliee"><br>
      <hr>
      <a href=""><img src="css/like.jpg" height="100px" width="150px" id="like"></a>
      <a href=""><img src="css/dislike.jpg" height="100px" width="150px" id="dislike"></a>
      <img src="css/coeur2.jpg" height="100px" width="150px" id="coeur">
      <hr>
    </div>
    <div id="profil3">
    </div>

<!-- bas de page -->
<footer>
	 <p>copyright &copy Stanislas Makengo 2018 :Profil/Bomoko - Toute reproduction interdite</p>
</footer>
</body>
</html>




