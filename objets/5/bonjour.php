
<?php
if(isset($_GET['nom']))
{
	if($_GET['nom']=='Polisi')
	{
		echo 'Bonjour '.$_GET['nom'];
	}
	else
	{
		echo 'Vous n\'etes pas polisi';
	}
}
?>