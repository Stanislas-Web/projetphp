<?php
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=rs','root','');
if (isset($_SESSION['id'])){
  


?>
 <!DOCTYPE html>
          <html>
          <head>
          	<link rel="stylesheet" type="text/css" href="css/stani.css">
            <link rel="stylesheet" type="text/css" href="css/message.css">
          <meta charset="utf-8">
          	<title>publication/Bomoko</title>
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
                      <a href="#">vos amis</a>
                  </li>

                  <li class="menu-con">
                      <a href="#">invitation</a>
                  </li>
                  <li class="menu-ind">
                      <a href="message.php">Message</a>
                  </li>
                  
                  <li class="menu-exp">
                      <a href="deconnexion.php">Se deconnecter </a>
                  </li>
          </ul>  
              </div>
          </nav>
          <div align="center">
            <form method="POST" enctype="multipart/form-data">
              <label><h3>Publier une photo</h3></label></br>
              <input type="file" name="photo" value="" ><br>
              <label><h3>Publier du texte</h3></label>
              <textarea placeholder="votre Publication"></textarea>
              
            </form>
          </div>
         
          <!-- bas de page -->
          <footer>
             <p>copyright &copy Stanislas Makengo 2018 :Publication/Bomoko - Toute reproduction interdite</p>
          </footer>
          </body>
          </html>
      <?php
    }else{
      header("location:connection.php");
    }
    ?>