<?php
	include("config.php");

	$id = $_GET['id'];
	$sql = mysql_query("DELETE FROM timeline WHERE id = $id");
	
	echo '<script type="text/javascript">alert("Status Apagado com Sucesso");</script>';
	echo '<script type="text/javascript">window.location = "logado.php"</script>';
?>