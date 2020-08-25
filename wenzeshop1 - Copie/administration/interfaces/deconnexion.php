<?php
	session_start();
	include('../classes.php');
	include('../objets.php');
	unset($_GET['identifiant'])
?>
<script>document.location.replace("../index.php");</script>