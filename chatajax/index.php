<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Chat ajax</title>

</head>
<body>
    <div id="messages"></div>
    <form method='post' action='index.php'>
         <input type="text" id="auteur" name="auteur" autocomplete="off" autofocus placeholder="nom...">     
        <input type="text" id="message" name="message" autocomplete="off" autofocus placeholder="Taper message...">
        <input type="submit" name="valider">
    </form>
    <?php
    if(isset($_POST['valider'])){
        $connexion = mysqli_connect('localhost','root','')or die('Erreur');
        mysqli_select_db($connexion, 'tchat');
        $requete = mysqli_query($connexion, 'SELECT *
                                                FROM messages
                                                WHERE content = "'.$_POST['message'].'"');
        if(mysqli_num_rows($requete) == 0)
        {
            if(mysqli_query($connexion, 'INSERT INTO messages VALUES ("", "'.$_POST['auteur'].'", "'.$_POST['message'].'")'))
            {
?>
                <script>document.location.replace('index.php');</script>
<?php
            }
            else
            {
                echo 'Erreur dans l\'insertion de l\'ajout de l\'ecole';
            }
        }
        else
        {
            echo 'ecole déjà enregistrée';
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="app.js"></script>
</body>
</html>