<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói o objeto $cliente
$cliente = new Cliente();

if ($_GET['id'])
{
	$cliente->set_id($_GET['id']);
	$cliente->seleciona();

	//separa os telefones em ddd e fone
	$telefone1 = Util::separaFone($cliente->get_telefone1());
	$telefone2 = Util::separaFone($cliente->get_telefone2());
?>
<h2>Alteração de cadastro do cliente <i><?=$cliente->get_nome()?></i></h2>
<?
}
else
{
?>
<h2>Cadastro de clientes</h2>
<?
}
?>
<form name="frmCliente" method="post" action="<?= (!$_GET['id']) ? "ctrlCadastro.php?tipo=cliente" : "ctrlAlteracao.php?tipo=cliente" ?>" onsubmit="return validaCliente(this)">
	<label for="nome">Nome:</label> <span><input id="nome" name="nome" type="text" size="40" maxlength="60" value="<?=$cliente->get_nome()?>" /></span><br />
	<label for="endereco">Endereço:</label> <span><input id="endereco" name="endereco" type="text" size="50" maxlength="100" value="<?=$cliente->get_endereco()?>" /></span><br />
	<label for="cidade">Cidade:</label> <span><input id="cidade" name="cidade" type="text" size="20" maxlength="20" value="<?=$cliente->get_cidade()?>" /></span><br />
	<label for="estado">Estado:</label>
	<span><select id="estado" name="estado">
		<option>--</option>
		<?
		foreach (Util::listaEstados() as $estado)
		{
		?>
		<option value="<?=$estado?>" <?= ($estado == $cliente->get_estado()) ? "selected=\"selected\"" : "" ?>><?=$estado?></option>
		<?
		}
		?>
	</select></span><br />
	<label for="ddd1">Telefone 1:</label> <span>(<input id="ddd1" name="ddd1" type="text" size="2" maxlength="2" value="<?=$telefone1[0]?>" />) <input id="fone1" name="fone1" type="text" size="9" maxlength="9" value="<?=$telefone1[1]?>" /></span><br />
	<label for="ddd2">Telefone 2:</label> <span>(<input id="ddd2" name="ddd2" type="text" size="2" maxlength="2" value="<?=$telefone2[0]?>" />) <input id="fone2" name="fone2" type="text" size="9" maxlength="9" value="<?=$telefone2[1]?>" /></span><br />
	<label for="email">E-Mail:</label> <span><input id="email" name="email" type="text" size="40" maxlength="40" value="<?=$cliente->get_email()?>" /></span><br />
	<input id="id" name="id" type="hidden" value="<?=$cliente->get_id()?>" />
	<label><input type="submit" value="<?= (!$_GET['id']) ? "Cadastrar" : "Alterar" ?>" /></label> <span><input type="reset" value="Limpar" /></span>
</form>
<?
if ($_GET['id'])
{
?>
<p><a href="infCliente.php?id=<?=$cliente->get_id()?>"><< Voltar</a></p>
<?
}
?>
<? include("inc/footer.inc"); ?>