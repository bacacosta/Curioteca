<?
include("inc/session.php");
require_once("classes/classFachada.php");

switch ($_GET['tipo'])
{
	case "passaro":
		//constrói o objeto e grava no banco de dados
		$passaro = new Passaro($_POST['idcriadouro'], $_POST['idespecie'], $_POST['anilha'], $_POST['anelpai'], $_POST['anelmae'], Util::uneData($_POST['dia'], $_POST['mes'], $_POST['ano']), $_POST['nome'], $_POST['sexo'], $_POST['status'], $_POST['id']);
		$passaro->altera();

		header("Location: infPassaro.php?id=".$passaro->get_id());
	break;

	case "criadouro":
		//constrói o objeto e grava no banco de dados
		$criadouro = new Criadouro($_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], Util::formataFone($_POST['ddd1'], $_POST['fone1']), Util::formataFone($_POST['ddd2'], $_POST['fone2']), $_POST['email'], $_POST['contato'], $_POST['id']);
		$criadouro->altera();

		header("Location: infCriadouro.php?id=".$criadouro->get_id());
	break;

	case "cliente":
		//constrói o objeto e grava no banco de dados
		$cliente = new Cliente($_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], Util::formataFone($_POST['ddd1'], $_POST['fone1']), Util::formataFone($_POST['ddd2'], $_POST['fone2']), $_POST['email'], $_POST['id']);
		$cliente->altera();

		header("Location: infCliente.php?id=".$cliente->get_id());
	break;

	default:
		echo "Opção inválida!";
	break;
}
?>