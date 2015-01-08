<?php
	include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina(); // Chama a função que protege a página
	
	include("config.php");
	
	$query = sprintf("SELECT id, usuario, data, servico, status FROM timeline");
	$dados = mysql_query($query, $con) or die(mysql_error()); 
	$linha = mysql_fetch_assoc($dados); 
	$total = mysql_num_rows($dados);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Sistema de Administração</title>
<link href="style.css" rel="stylesheet" />
</head>

<body>
<div id="conteudo">
<h1>Administrar Página de Status</h1>
<p><?php echo "Olá, " . $_SESSION['usuarioNome']; ?>. <a href="logout.php">Sair</a></p>
<div class="borda"></div>
<form method="post" action="cadastraStatus.php" id="cadastraStatus">
<fieldset>
    <legend>Cadastrar Status</legend>
    <label for="servico">Serviço:</label>
    <select name="servico">
      <option value="Website" selected="selected">Website</option>
      <option value="Banco de Dados">Banco de Dados</option>
    </select>
    <div class="clear"></div>
    <label for="status">Status:</label>
    <textarea name="status" cols="40" rows="6" id="status"></textarea>
    <input name="usuario" type="hidden" value="<?php echo $_SESSION['usuarioNome']; ?>" />
    <div class="clear"></div>
    <input type="submit" value="Cadastrar Status" />
</fieldset>
</form>
<br />
<form method="post" action="cadastraUsuario.php" id="cadastraUsuario">
<fieldset>
    <legend>Cadastrar Usuário</legend>
    <label for="nome">Nome:</label>
    <input name="nome" type="text" />
    <div class="clear"></div>
    <label for="status">Usuário:</label>
    <input name="usuario" type="text" />
    <div class="clear"></div>
    <label for="status">Senha:</label>
    <input name="senha" type="password"/>
    <div class="clear"></div>
    <input type="submit" value="Cadastrar Usuário" />
</fieldset>
</form>
<br>
<fieldset>
	<legend>Excluir Status</legend>
   <p>Foram Cadastrados <?php echo $total; ?> Status no Sistema</p>
    <?php 
	
	$data = $linha['data'];
	
	if($total > 0) { 
		do{ ?> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td colspan="3" bgcolor="#ccc"><strong>Serviço: </strong><?=$linha['servico']?></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#e2e2e2"><?=$linha['status']?></td>
  </tr>
    <tr>
    <td bgcolor="#ccc" width="33%"><strong>Usuário:</strong> <?=$linha['usuario']?></td>
    <td bgcolor="#ccc" width="33%"><strong>Data:</strong> <?php echo date('d/m/Y H:m:s', strtotime($data)); ?></td>
    <td bgcolor="#ccc" width="33%"><a href="deletar.php?id=<?=$linha['id']?>">Apagar Status</a> | <a href="editar.php?id=<?=$linha['id']?>">Editar Status</a></td>
  </tr>
</table>	
</p> 	
	<?php }while($linha = mysql_fetch_assoc($dados));} 
?>
</fieldset>
</div>
</body>
</html>
<?php mysql_free_result($dados); ?>