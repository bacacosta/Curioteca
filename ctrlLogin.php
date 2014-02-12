<?
require_once("classes/classFachada.php");
session_start();

//monta o objeto
$usuario = new Usuario($_POST['login'], $_POST['senha']);

//autentica o usuário
if ($usuario->autentica())
{
	$_SESSION['nome'] = $usuario->get_nome();
	header("Location: home.php");
}
else
{
	header("Location: index.php");
}
?>