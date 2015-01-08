<!DOCTYPE HTML>
<html lang="br" class="no-js">
<head>
<meta charset="utf-8">
<title>Sistema de Administração</title>
<link href="style.css" rel="stylesheet" />
</head>
<body>
<div id="conteudo">
<h1>Sistema de Administração</h1>
<div class="borda"></div>
<!-- Formulário para acesso -->
<p>Faça o Login Abaixo:</p>
<form method="post" action="valida.php" id="validaAcesso">
<fieldset>
<legend>Login</legend>
<label for="nomeUsuario">Nome de Usuário:</label>
<input type="text" name="usuario" id="usuario" />
<div class="clear"></div>
<label for="senha">Senha:</label>
<input type="password" name="senha" id="senha" />
<div class="clear"></div>
<input type="submit" value="Acessar o sistema" />
</fieldset>
</form>
</div>
</body>
</html>