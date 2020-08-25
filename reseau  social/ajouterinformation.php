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
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stani.css">
  <link rel="stylesheet" type="text/css" href="css/editionprofil.css">
  <link rel="stylesheet" type="text/css" href="css/ajouterinfo.css">
<meta charset="utf-8">
	<title>ajouter information/Bomoko</title>
</head>
<body>
<!-- haut de page -->
<header><h1><img src="css\bomok1.jpg" id="bomoko"></h1></header>
	 <!-- menu de navigation -->
	<div class="table">  
    </div>

<div id="editimage">
        <h2>Ajouter les informations</h2><br>
        <form method="POST" enctype="multipart/form-data">
                <div align="center"><img  src="utilisateurs/photo profil/<?php echo $userinfo['photo']; ?>" width="150" height="150" id="imgprofil">
                <label for="photo" id="labelphoto"><h3>ajouter une photo profile</h3></label>
                <input type="file" name="photo" ><br></div>
                <label for="newprenom" id="labelprenom">Votre pays de résidence</label>
                <input type="text" name="newprenom" id="newprenom"  ><br><br>
                <label for="newnom" id="labelnom">Votre ville de résidence</label>
                <input type="text" name="newnom" id="newnom" ><br>
                <label for="newmail " id="labelmail"> Votre proffession </label>
                <input type="text" name="newmail" id="newmail" ><br>
                <label for="newmotdepasse" id="labelmotdepasse">Votre date d'anniversaire</label>
                <input type="date" name="newmotdepasse" id="newmotdepasse" ><br>
                <label for="newmotdepasse" id="labelmotdepasse">Votre numéro de télephone</label>
                <input type="date" name="newmotdepasse" id="newmotdepasse" ><br>
                
        <input type="submit" name="newsubmit" id="val" value="Ajouter les informations!">
        <input type="submit" name="suivant" value="suivant">
        <?php
          if ( isset($_POST['suivant'])) {
            header("location:profil.php?id=".$_SESSION['id']);
          }
          ?>
        <br><br>

        </form>
        
      <br>
      <br>
      </div>
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

  