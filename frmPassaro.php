<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói o objeto $passaro
$passaro = new Passaro();

if ($_GET['id'])
{
	//preenche o objeto $passaro
	$passaro->set_id($_GET['id']);
	$passaro->seleciona();

	//separa a data em dia, mês e ano
	$data = Util::separaData($passaro->get_dtnascimento());
?>
<h2>Alteração de cadastro do pássaro <i><?=$passaro->get_nome()?></i></h2>
<?
}
else
{
?>
<h2>Cadastro de pássaros</h2>
<?
}
?>
<form name="frmPassaro" method="post" action="<?= (!$_GET['id']) ? "ctrlCadastro.php?tipo=passaro" : "ctrlAlteracao.php?tipo=passaro" ?>" onsubmit="return validaPassaro(this)">
	<label for="idcriadouro">Procedência:</label>
	<span><select id="idcriadouro" name="idcriadouro">
		<option>-- Escolha um criadouro --</option>
		<?
		$c = new Criadouro();
		foreach ($c->lista() as $criadouro)
		{
		?>
		<option value="<?=$criadouro->get_id()?>" <?= ($criadouro->get_id() == $passaro->get_idcriadouro()) ? "selected=\"selected\"" : "" ?>><?=$criadouro->get_nome()?></option>
		<?
		}
		?>
	</select></span><br />
	<label for="anilha">Anilha:</label> <span><input id="anilha" name="anilha" type="text" size="20" maxlength="20" value="<?=$passaro->get_anilha()?>" /></span><br />
	<label for="anelpai">Anilha ou nome do pai:</label> <span><input id="anelpai" name="anelpai" type="text" size="20" maxlength="20" value="<?=$passaro->get_anelpai()?>" /></span><br />
	<label for="anelmae">Anilha ou nome da mãe:</label> <span><input id="anelmae" name="anelmae" type="text" size="20" maxlength="20" value="<?=$passaro->get_anelmae()?>" /></span><br />
	<label for="dia">Data de nascimento:</label> <span><input id="dia" name="dia" type="text" size="2" maxlength="2" value="<?=$data[2]?>" />/<input id="mes" name="mes" type="text" size="2" maxlength="2" value="<?=$data[1]?>" />/<input id="ano" name="ano" type="text" size="4" maxlength="4" value="<?=$data[0]?>" /></span><br />
	<label for="nome">Nome:</label> <span><input id="nome" name="nome" type="text" size="20" maxlength="20" value="<?=$passaro->get_nome()?>" /></span><br />
	<label for="idespecie">Espécie:</label>
	<span><select id="idespecie" name="idespecie">
		<option>-- Escolha uma espécie --</option>
		<?
		$e = new Especie();
		foreach ($e->lista() as $especie)
		{
		?>
		<option value="<?=$especie->get_id()?>" <?= ($especie->get_id() == $passaro->get_idespecie()) ? "selected=\"selected\"" : "" ?>><?=$especie->get_nomepop()?></option>
		<?
		}
		?>
	</select></span><br />
	<label for="sexo">Sexo:</label> <span><input id="sexo" name="sexo" type="radio" value="M" <?= ($passaro->get_sexo() == "M") ? "checked=\"checked\"" : "" ?> />Masculino <input id="sexo" name="sexo" type="radio" value="F" <?= ($passaro->get_sexo() == "F") ? "checked=\"checked\"" : "" ?> />Feminino</span><br />
	<input id="status" name="status" type="hidden" value="<?=$passaro->get_status()?>" />
	<input id="id" name="id" type="hidden" value="<?=$passaro->get_id()?>" />
	<label><input type="submit" value="<?= (!$_GET['id']) ? "Cadastrar" : "Alterar" ?>" /></label> <span><input type="reset" value="Limpar" /></span>
</form>
<?
if ($_GET['id'])
{
?>
<p><a href="infPassaro.php?id=<?=$passaro->get_id()?>"><< Voltar</a></p>
<?
}
?>
<? include("inc/footer.inc"); ?>