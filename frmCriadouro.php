<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói o objeto $criadouro
$criadouro = new Criadouro();

if ($_GET['id'])
{
	$criadouro->set_id($_GET['id']);
	$criadouro->seleciona();

	//separa os telefones em ddd e fone
	$telefone1 = Util::separaFone($criadouro->get_telefone1());
	$telefone2 = Util::separaFone($criadouro->get_telefone2());
?>
<h2>Alteração de cadastro do criadouro <i><?=$criadouro->get_nome()?></i></h2>
<?
}
else
{
?>
<h2>Cadastro de criadouros</h2>
<?
}
?>
<form name="frmCriadouro" method="post" action="<?= (!$_GET['id']) ? "ctrlCadastro.php?tipo=criadouro" : "ctrlAlteracao.php?tipo=criadouro" ?>" onsubmit="return validaCriadouro(this)">
	<label for="nome">Nome:</label> <span><input id="nome" name="nome" type="text" size="40" maxlength="60" value="<?=$criadouro->get_nome()?>" /></span><br />
	<label for="endereco">Endereço:</label> <span><input id="endereco" name="endereco" type="text" size="50" maxlength="100" value="<?=$criadouro->get_endereco()?>" /></span><br />
	<label for="cidade">Cidade:</label> <span><input id="cidade" name="cidade" type="text" size="20" maxlength="20" value="<?=$criadouro->get_cidade()?>" /></span><br />
	<label for="estado">Estado:</label>
	<span><select id="estado" name="estado">
		<option>--</option>
		<?
		foreach (Util::listaEstados() as $estado)
		{
		?>
		<option value="<?=$estado?>" <?= ($estado == $criadouro->get_estado()) ? "selected=\"selected\"" : "" ?>><?=$estado?></option>
		<?
		}
		?>
	</select></span><br />
	<label for="ddd1">Telefone 1:</label> <span>(<input id="ddd1" name="ddd1" type="text" size="2" maxlength="2" value="<?=$telefone1[0]?>" />) <input id="fone1" name="fone1" type="text" size="9" maxlength="9" value="<?=$telefone1[1]?>" /></span><br />
	<label for="ddd2">Telefone 2:</label> <span>(<input id="ddd2" name="ddd2" type="text" size="2" maxlength="2" value="<?=$telefone2[0]?>" />) <input id="fone2" name="fone2" type="text" size="9" maxlength="9" value="<?=$telefone2[1]?>" /></span><br />
	<label for="email">E-Mail:</label> <span><input id="email" name="email" type="text" size="40" maxlength="40" value="<?=$criadouro->get_email()?>" /></span><br />
	<label for="contato">Contato:</label> <span><input id="contato" name="contato" type="text" size="20" maxlength="20" value="<?=$criadouro->get_contato()?>" /></span><br />
	<input id="id" name="id" type="hidden" value="<?=$criadouro->get_id()?>" />
	<label><input type="submit" value="<?= (!$_GET['id']) ? "Cadastrar" : "Alterar" ?>" /></label> <span><input type="reset" value="Limpar" /></span>
</form>
<?
if ($_GET['id'])
{
?>
<p><a href="infCriadouro.php?id=<?=$criadouro->get_id()?>"><< Voltar</a></p>
<?
}
?>
<? include("inc/footer.inc"); ?>