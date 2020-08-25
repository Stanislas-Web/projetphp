 <?php
 session_start();
 $bdd = new PDO('mysql:host=127.0.0.1;dbname=rs','root','');


 
 ?>

 <!DOCTYPE html>
          <html>
          <head>
            <link rel="stylesheet" type="text/css" href="css/stani.css">
            <link rel="stylesheet" type="text/css" href="css/message.css">
          <meta charset="utf-8">
            <title>liste d'ami/Bomoko</title>
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
                      <a href="#">Demande d'amis</a>
                  </li>

                  <li class="menu-con">
                      <a href="autres_utilisateurs.php">Autres utilisateurs</a>
                  </li>                  
                  <li class="menu-exp">
                      <a href="deconnexion.php">Se deconnecter </a>
                  </li>
          </ul>  
              </div>
          </nav>

          

          <!-- bas de page -->
          <footer>
             <p>copyright &copy Stanislas Makengo 2018 :Publication/Bomoko - Toute reproduction interdite</p>
          </footer>