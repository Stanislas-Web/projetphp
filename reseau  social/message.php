  <?php
  session_start();
  $bdd=new PDO('mysql:host=127.0.0.1;dbname=rs','root','');
  if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
          if (isset($_POST['envoi_message'])){
                if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])){
                  $destinataire=htmlspecialchars($_POST['destinataire']);
                  $message=htmlspecialchars($_POST['message']);

                  $id_destinataire=$bdd->prepare("SELECT id FROM utilisateurs WHERE prenom=?");
                  $id_destinataire->execute(array($destinataire));
                  $id_destinataire=$id_destinataire->fetch();
                  $id_destinataire=$id_destinataire['id'];

                  $insertion=$bdd->prepare('INSERT INTO message(id_expeditaire,id_destinataire,message) VALUES(?,?,?)');
                  $insertion->execute(array($_SESSION['id'],$id_destinataire,$message));

                  $errors="votre message a bien été envoyer!";
                }
           else{
            $errors="veuillez compléter tous les champs";
           }
          }

          $destinataires=$bdd->query('SELECT prenom FROM utilisateurs ORDER BY prenom');

           ?>

          <!DOCTYPE html>
          <html>
          <head>
          	<link rel="stylesheet" type="text/css" href="css/stani.css">
            <link rel="stylesheet" type="text/css" href="css/message.css">
          <meta charset="utf-8">
          	<title>Message/Bomoko</title>
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
                 					<a href="reception.php">Boite de reception</a>
                 			</li>

                 			<li class="menu-con">
                 					<a href="#">Boite d'envoi</a>
                 			</li>

                 			<li class="menu-exp">
                 					<a href="deconnexion.php">Se deconnecter </a>
                 			</li>
                		</ul>  
              </div>
          </nav>
          <div align="center" id="boite_d_envoi">
          <form method="POST">
            <br>
            <label>Destinataire</label>
            <select name="destinataire" id="destinataire">
              <?php while ($d = $destinataires->fetch()) {?>
               <option><?= $d['prenom'];  ?></option>
               <?php  
              } 
               ?>
              
            </select><br><br>
            <textarea placeholder="Saisir un message" name="message" id="message"></textarea><br><br>
            <input type="submit" name="envoi_message" value="Envoyer" id="envoi_message">
            <br><br>
            <?php
            if (isset($errors)) {
              echo  '<span style="color:red">'.$errors.'</span>';
            }
              ?>
          </form><br></div>
              
          <!-- bas de page -->
          <footer>
          	 <p>copyright &copy Stanislas Makengo 2018 :Message/Bomoko - Toute reproduction interdite</p>
          </footer>
          </body>
          </html>
  <?php
  }  ?>






