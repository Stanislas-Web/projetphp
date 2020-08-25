<?php
session_start();
include_once('classes.php');
include_once('objets.php');
$ecole->setId($_GET['numero']);
$ecole->Supprimer($ecole->getId());
?>
