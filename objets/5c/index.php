<form method="POST" action="index.php">
<input type="text" name="nomUtilisateur">
</form>
<?php
session_start();
if(isset($_POST['nomUtilisateur']))
{
?>
	<script>document.location.replace("bonjour.php?nomUtilisateur=<?php echo $_POST['nomUtilisateur'];?>");	</script>
<?php	
}
?>

<?php 
session_start();
if(isset($_POST['nomUtilisateur']))
{
	
}
