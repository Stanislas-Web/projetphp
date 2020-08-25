<?php
require 'maclass_class.php'; 
$stani=new personnage('stanislas');
$stani->mort();
var_dump($stani->mort());
$stani->regenerer(10);
var_dump($stani);
?>
