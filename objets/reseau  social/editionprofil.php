<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stani.css">
  <link rel="stylesheet" type="text/css" href="css/editionprofil.css">
<meta charset="utf-8">
	<title>edition profil/Bomoko</title>
</head>
<body>
<!-- haut de page --><!-- 
<header><h1><img src="css\bomok1.jpg" id="bomoko"></h1></header>
	 --><!-- menu de navigation -->
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
            <li class="menu-los">
                <a href="publication.php">Publication</a>
            </li>

       			<li class="menu-exp">
       					<a href="deconnexion.php">Se deconnecter </a>
       			</li>
      		</ul>  
    </div>
</nav>
<?php
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=rs','root','');
if (isset($_SESSION['id'])) {
	$requser=$bdd->prepare("SELECT * FROM utilisateurs WHERE id=?");
  $requser->execute(array($_SESSION['id']));
  $userinfo=$requser->fetch();
        if (isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom']!=$userinfo['prenom']) {
          $newprenom=htmlspecialchars($_POST['newprenom']);
          $insertprenom=$bdd->prepare("UPDATE utilisateurs SET prenom=? WHERE id=? ");
          $insertprenom->execute(array($newprenom,$_SESSION['id']));
          header('location:profil.php?id='.$_SESSION['id']);
        }

        if (isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom']!=$userinfo['nom']) {
          $newnom=htmlspecialchars($_POST['newnom']);
          $insertprenom=$bdd->prepare("UPDATE utilisateurs SET nom=? WHERE id=? ");
          $insertprenom->execute(array($newnom,$_SESSION['id']));
          header('location:profil.php?id='.$_SESSION['id']);
        }
                  if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail']!=$userinfo['email']) {
                  $newmail=htmlspecialchars($_POST['newmail']);
                  $insertmail=$bdd->prepare("UPDATE utilisateurs SET email=? WHERE id=? ");
                  $insertmail->execute(array($newmail,$_SESSION['id']));
                  header('location:profil.php?id='.$_SESSION['id']);
        }

          if (isset($_POST['newmotdepasse']) AND !empty($_POST['newmotdepasse'])) {
                  $newmotdepasse=sha1(htmlspecialchars($_POST['newmotdepasse']));
                  $insertmotdepasse=$bdd->prepare("UPDATE utilisateurs SET motdepasse=? WHERE id=? ");
                  $insertmotdepasse->execute(array($newmotdepasse,$_SESSION['id']));
                  header('location:profil.php?id='.$_SESSION['id']);
        }
          if (isset($_POST['newsexe']) AND !empty($_POST['newsexe']) AND $_POST['newsexe']!=$userinfo['sexe']) {
                  $newsexe=htmlspecialchars($_POST['newsexe']);
                  $insertsexe=$bdd->prepare("UPDATE utilisateurs SET sexe=? WHERE id=? ");
                  $insertsexe->execute(array($newsexe,$_SESSION['id']));
                  header('location:profil.php?id='.$_SESSION['id']);
        }

        if (isset($_FILES['photo']) AND !empty($_FILES['photo']['name']) ) {
          
          $tailleMax = 2097152;
          $extensionsValides = array('jpg','jpeg','png','gif');
              if ($_FILES['photo']['size']<=$tailleMax) {

                $extensionsUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.' ), 1 ));
                        if (in_array($extensionsUpload, $extensionsValides)) {
                          $chemin="utilisateurs/photo profil/".$_SESSION['id'].".".$extensionsUpload;
                          $resultat=move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                              if ($resultat) {
                                $updtephoto=$bdd->prepare('UPDATE utilisateurs SET photo = :photo WHERE id = :id');
                                $updtephoto->execute(array(
                                  'photo'=>$_SESSION['id'].".".$extensionsUpload,
                                  'id' =>$_SESSION['id']
                                ));
                                header('location:profil.php?id='.$_SESSION['id']);
                              }else{
                                $erreurs="Erreur durant l'importation de votre photo de profil";
                              }

                        }else{
                          $erreurs="Votre photo de profil doit etre au format jpg, jpeg, png ou gif";
                        }
              
              }else{
                $erreurs="Votre photo de profil ne peut pas dépasser 2M0";
              }

        }




     if (isset($_POST['newprenom']) AND $_POST['newprenom'] == $userinfo['prenom']) {
                  header('location:profil.php?id='.$_SESSION['id']);
        }

?>
<div id="editimage">
        <h2>Editer le profil</h2><br><br>
        <form method="POST" enctype="multipart/form-data">
                <div align="center"><img  src="utilisateurs/photo profil/<?php echo $userinfo['photo']; ?>" width="150" height="150" id="imgprofil">
                <label for="photo" id="labelphoto"><h3>Changer une photo profile</h3></label>
                <input type="file" name="photo" ><br></div>
                <label for="newprenom" id="labelprenom">Prenom </label>
                <input type="text" name="newprenom" id="newprenom" value="<?php echo $userinfo['prenom']; ?>" ><br><br>
                <label for="newnom" id="labelnom">Nom de famille </label>
                <input type="text" name="newnom" id="newnom" value="<?php echo $userinfo['nom']; ?>"><br>
                <label for="newmail " id="labelmail"> Mail </label>
                <input type="text" name="newmail" id="newmail" value="<?php echo $userinfo['email']; ?>"><br>
                <label for="newmotdepasse" id="labelmotdepasse">Mot de passe </label>
                <input type="password" name="newmotdepasse" id="newmotdepasse" placeholder="Nouveau mot de passe" ><br>
                <label for="newsexe" id="labelsexe">Sexe </label>
                 <select name="newsexe" id="section" value="<?php echo $userinfo['sexe']; ?>">
                <?php echo isset($userinfo['sexe'])?'<option value='.$userinfo['sexe'].'>'.$userinfo['sexe'].'</option>' :''?>
                <?php echo $userinfo['sexe'] !='Homme'?'<option value="Homme" id="Homme">Homme</option>':'' ?> 
                <?php echo $userinfo['sexe'] !='Femme'?'<option value="Femme" id="Femme">Femme</option>':'' ?> 
                </select><br><br>
        <input type="submit" name="newsubmit" id="val" value="Mettre à jour mon profil!">
        <br><br>

        </form>
        
      <br>
      <br>
    </div>
<!-- bas de page -->
<footer>
	 <p>copyright &copy Stanislas Makengo 2018 :Profil/Bomoko - Toute reproduction interdite</p>
</footer>
</body>
</html>
<?php
}
else{
  header("location:connexion.php");
}

if (isset($erreurs)) {
  echo "<div class='error'>".$erreurs."</div>";
}
?>

  