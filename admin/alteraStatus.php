<?php
	include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina(); // Chama a função que protege a página
	
	include("config.php");
	
	$id = $_POST['id'];
	$status = $_POST['status'];
	
	$atu = "UPDATE timeline SET status='$status' WHERE id=$id";
$sucesso = mysql_query($atu);
 
if ($sucesso){
	echo '<script type="text/javascript">alert("Status Editado com Sucesso");</script>';
	echo '<script type="text/javascript">window.location = "logado.php"</script>';
}else{
   die (mysql_error());
}
?>