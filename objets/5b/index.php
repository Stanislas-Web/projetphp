
<form  action="index.php" method="POST">
<input name="nom" type="text" >
</form>
<?php
if(isset($_POST['nom']))
{
?>
	<script>document.location.replace("bonjour.php?nom=<?php echo $_POST['nom'];?>");	</script>
<?php	
}
?>