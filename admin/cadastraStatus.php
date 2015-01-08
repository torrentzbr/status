<?php
	include("config.php");

	date_default_timezone_set("America/Sao_Paulo");

	$usuario = $_POST['usuario'];
	$servico = $_POST['servico'];
	$status = $_POST['status'];
	$data = date("Y/m/d H:i:s");
	
	$query = mysql_query("INSERT INTO timeline (usuario, servico, status, data) VALUES ('$usuario', '$servico', '$status', '$data')") or die(mysql_error());
	
	echo '<script type="text/javascript">alert("Status Incluído com Sucesso");</script>';
	echo '<script type="text/javascript">window.location = "logado.php"</script>';
?>