<?php
	include("config.php");

	$usuario = $_POST['usuario'];
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	$senhaCriptografada = base64_encode($senha);
	
	$query = mysql_query("INSERT INTO usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senhaCriptografada')") or die(mysql_error());
	
	echo '<script type="text/javascript">alert("Usuário Cadastrado com Sucesso");</script>';
	echo '<script type="text/javascript">window.location = "logado.php"</script>';
?>