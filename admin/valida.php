<?php
include("seguranca.php");

$senhaAntes = $_POST['senha'];
$senhaCrip = base64_encode($senhaAntes);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$senha = (isset($senhaCrip)) ? $senhaCrip : '';

if (validaUsuario($usuario, $senha) == true) {
header("Location: logado.php");
} else {
expulsaVisitante();
}
}
?>