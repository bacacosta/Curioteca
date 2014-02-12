<?
include("inc/session.php");
require_once("classes/classFachada.php");

switch ($_GET['tipo'])
{
	case "passaro":
		//constrói o objeto e grava no banco de dados
		$passaro = new Passaro($_POST['idcriadouro'], $_POST['idespecie'], $_POST['anilha'], $_POST['anelpai'], $_POST['anelmae'], Util::uneData($_POST['dia'], $_POST['mes'], $_POST['ano']), $_POST['nome'], $_POST['sexo'], "D");
		$passaro->insere();

		header("Location: infPassaro.php?id=".$passaro->bd->ultimo());
	break;

	case "muda":
		//constrói o objeto e grava no banco de dados
		$muda = new Muda($_POST['idpassaro'], Util::uneData($_POST['dia'], $_POST['mes'], $_POST['ano']), $_POST['tipomuda']);
		$muda->insere();

		header("Location: tblMuda.php?id=".$muda->get_idpassaro());
	break;

	case "acasalamento":
		//constrói o objeto e grava no banco de dados
		$acasalamento = new Acasalamento($_POST['idmacho'], $_POST['idfemea'], Util::uneData($_POST['dia'], $_POST['mes'], $_POST['ano']), $_POST['numovos'], $_POST['numeclosoes']);
		$acasalamento->insere();

		header("Location: tblAcasalamento.php?id=".$acasalamento->get_idmacho()."&sexo=M");
	break;

	case "criadouro":
		//constrói o objeto e grava no banco de dados
		$criadouro = new Criadouro($_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], Util::formataFone($_POST['ddd1'], $_POST['fone1']), Util::formataFone($_POST['ddd2'], $_POST['fone2']), $_POST['email'], $_POST['contato']);
		$criadouro->insere();

		header("Location: infCriadouro.php?id=".$criadouro->bd->ultimo());
	break;

	case "cliente":
		//constrói o objeto e grava no banco de dados
		$cliente = new Cliente($_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], Util::formataFone($_POST['ddd1'], $_POST['fone1']), Util::formataFone($_POST['ddd2'], $_POST['fone2']), $_POST['email']);
		$cliente->insere();

		header("Location: infCliente.php?id=".$cliente->bd->ultimo());
	break;

	case "venda":
		//constrói o objeto e grava no banco de dados
		$venda = new Venda($_POST['idcliente'], $_POST['idpassaro'], Util::uneData($_POST['dia'], $_POST['mes'], $_POST['ano']), $_POST['valor']);
		$venda->insere();

		//constrói e preenche o objeto $passaro
		$passaro = new Passaro();
		$passaro->set_id($_POST['idpassaro']);
		$passaro->seleciona();

		//altera o status para vendido
		$passaro->set_status("V");
		$passaro->altera();

		header("Location: infPassaro.php?id=".$passaro->get_id());
	break;

	case "morte":
		//constrói o objeto e grava no banco de dados
		$morte = new Morte($_POST['idpassaro'], Util::uneData($_POST['dia'], $_POST['mes'], $_POST['ano']));
		$morte->insere();

		//constrói e preenche o objeto $passaro
		$passaro = new Passaro();
		$passaro->set_id($_POST['idpassaro']);
		$passaro->seleciona();

		//altera o status para morto
		$passaro->set_status("M");
		$passaro->altera();

		header("Location: infPassaro.php?id=".$passaro->get_id());
	break;

	default:
		echo "Opção inválida!";
	break;
}
?>