<?php
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=rs','root','');
 header('location:profil.php?id='.$_SESSION['id']);
 ?>