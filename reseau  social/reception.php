  <?php
  session_start();
  $bdd=new PDO('mysql:host=127.0.0.1;dbname=rs','root','');
  if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
  $msg=$bdd->prepare('SELECT * FROM message WHERE id_destinataire=? ORDER BY id_destinataire DESC');
  $msg->execute(array($_SESSION['id']));
  $msg_nbr = $msg->rowCount();

  ?>
<!DOCTYPE html>
          <html>
          <head>
          	<link rel="stylesheet" type="text/css" href="css/stani.css">
            <link rel="stylesheet" type="text/css" href="css/reception.css">
          <meta charset="utf-8">
          	<title>profil/Bomoko</title>
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
                 					<a href="#">Boite de reception</a>
                 			</li>
                 			<li class="menu-con">
                 					<a href="message.php">Boite d'envoi</a>
                 			</li>

                 			<li class="menu-exp">
                 					<a href="deconnexion.php">Se deconnecter </a>
                 			</li>
                		</ul>  
              </div>
          </nav>
          
          <div  id="corps_du_message">
            <h2 align="center">Boite de reception</h2>
            <?php
            if ($msg_nbr==0){ echo "Vous n'avez aucun message...";}
            while ($m=$msg->fetch()) {
              $p_exp=$bdd->prepare('SELECT prenom FROM utilisateurs WHERE id=? ORDER BY id DESC LIMIT 0,5');
              $p_exp->execute(array($m['id_expeditaire']));
              $p_exp=$p_exp->fetch();
              $p_exp=$p_exp['prenom'];

/*pour afficher la photo de l'expediteur*/
              $photo=$bdd->prepare('SELECT photo FROM utilisateurs WHERE id=? ORDER BY id DESC LIMIT 0,5');
              $photo->execute(array($m['id_expeditaire']));
              $photo=$photo->fetch();
              $photo=$photo['photo'];


             ?>
             <div id="imagemessage">
            <img src="utilisateurs/photo profil/<?php echo $photo; ?>" width="40" height="40" id="imgprofil">
             <b><?= $p_exp  ?> </b> vous a envoyé :<br>
             <?= $m['message']  ?> <a href="message.php">Repondre</a> </div>
            
              <hr>
             <?php }  ?>
         </div>
              
          <!-- bas de page -->
          <footer>
          	 <p>copyright &copy Stanislas Makengo 2018 :Profil/Bomoko - Toute reproduction interdite</p>
          </footer>
          </body>
          </html>
          <?php
        }
            ?>
