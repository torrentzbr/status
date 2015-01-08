<?php

header('Content-Type: text/html; charset=utf-8');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$_SG['conectaServidor'] = true;    
$_SG['abreSessao'] = true;         

$_SG['caseSensitive'] = false;     

$_SG['validaSempre'] = true;       

$_SG['servidor'] = 'localhost';    
$_SG['usuario'] = 'root';          
$_SG['senha'] = '';                
$_SG['banco'] = 'status';            

$_SG['paginaLogin'] = 'index.php'; 

$_SG['tabela'] = 'usuarios';       

if ($_SG['conectaServidor'] == true) {
$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
}

if ($_SG['abreSessao'] == true) {
session_start();
}

function validaUsuario($usuario, $senha) {
global $_SG;

$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

$nusuario = addslashes($usuario);
$nsenha = addslashes($senha);

$sql = "SELECT `id`, `nome` FROM `".$_SG['tabela']."` WHERE ".$cS." `usuario` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
$query = mysql_query($sql);
$resultado = mysql_fetch_assoc($query);

if (empty($resultado)) {
return false;

} else {

$_SESSION['usuarioID'] = $resultado['id']; 
$_SESSION['usuarioNome'] = $resultado['nome'];

if ($_SG['validaSempre'] == true) {
$_SESSION['usuarioLogin'] = $usuario;
$_SESSION['usuarioSenha'] = $senha;
}

return true;
}
}

function protegePagina() {
global $_SG;

if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
expulsaVisitante();
} else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
if ($_SG['validaSempre'] == true) {
if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
expulsaVisitante();
}
}
}
}

function expulsaVisitante() {
global $_SG;

unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

header("Location: ".$_SG['paginaLogin']);
}
?>