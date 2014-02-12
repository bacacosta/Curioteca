<?
session_start();

//destrói a sessão
session_destroy();

//redireciona para a página de login
header("Location: index.php");
?>