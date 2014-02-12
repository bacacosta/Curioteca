<?
//inicia a sessão
session_start();

//verifica se a variável de sessão existe
if (!$_SESSION["nome"])
	header("Location: index.php");
?>