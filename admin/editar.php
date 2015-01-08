<?php
	include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina(); // Chama a função que protege a página
	
	include("config.php");
	
	$id = $_GET['id'];
	
	$query = sprintf("SELECT usuario, data, servico, status FROM timeline WHERE id=$id");
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
<p><?php echo "Olá, " . $_SESSION['usuarioNome']; ?>. <a href="logout.php">Sair</a> | <a href="logado.php"><< Voltar ao Início</a></p>
<div class="borda"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#ccc">
    <td height="40px" align="center" valign="middle" >Serviço: <?=$linha['servico']?></td>
    <td height="40px" align="center" valign="middle" >Usuário: <?=$linha['usuario']?></td>
    <td height="40px" align="center" valign="middle" >Data: <?=$linha['data']?></td>
  </tr>
  <tr>
    <td colspan="3"><form id="form1" name="form1" method="post" action="alteraStatus.php">
    <input name="id" type="hidden" value="<?php echo $id; ?>" />
      <textarea name="status" id="status" style="width:100%; height:200px;"><?=$linha['status']?></textarea><input type="submit" value="Alterar Status"/></form>
      </td>
  </tr>
</table>
</div>
</body>
</html>