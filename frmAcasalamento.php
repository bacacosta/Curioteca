<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
if ($_GET['id'])
{
	//constrói e preenche o objeto $passaro
	$passaro = new Passaro();
	$passaro->set_id($_GET['id']);
	$passaro->seleciona();
?>
<h2>Cadastro de acasalamento para o pássaro <i><?=$passaro->get_nome()?></i></h2>
<?
}
else
{
?>
<h2>Cadastro de acasalamentos</h2>
<?
}
?>
<form name="frmAcasalamento" method="post" action="ctrlCadastro.php?tipo=acasalamento" onsubmit="return validaAcasalamento(this)">
	<label for="idmacho">Macho:</label>
	<span><select id="idmacho" name="idmacho">
		<option>-- Escolha um macho --</option>
		<?
		$lista = new Passaro();
		foreach ($lista->lista("M") as $macho)
		{
		?>
		<option value="<?=$macho->get_id()?>" <?= ($macho->get_id() == $_GET['id']) ? "selected=\"selected\"" : "" ?>><?= ($macho->get_nome()) ? $macho->get_nome() : $macho->get_anilha() ?></option>
		<?
		}
		?>
	</select></span><br />
	<label for="idfemea">Fêmea:</label>
	<span><select id="idfemea" name="idfemea">
		<option>-- Escolha uma fêmea --</option>
		<?
		foreach ($lista->lista("F") as $femea)
		{
		?>
		<option value="<?=$femea->get_id()?>" <?= ($femea->get_id() == $_GET['id']) ? "selected=\"selected\"" : "" ?>><?= ($femea->get_nome()) ? $femea->get_nome() : $femea->get_anilha() ?></option>
		<?
		}
		?>
	</select></span><br />
	<label for="dia">Data do acasalamento:</label> <span><input id="dia" name="dia" type="text" size="2" maxlength="2" />/<input id="mes" name="mes" type="text" size="2" maxlength="2" />/<input id="ano" name="ano" type="text" size="4" maxlength="4" /></span><br />
	<label for="numovos">Número de ovos:</label> <span><input id="numovos" name="numovos" type="text" size="2" maxlength="2" /></span><br />
	<label for="numeclosoes">Número de eclosões:</label> <span><input id="numeclosoes" name="numeclosoes" type="text" size="2" maxlength="2" /></span><br />
	<label><input type="submit" value="Cadastrar" /></label> <span><input type="reset" value="Limpar" /></span>
</form>
<?
if ($_GET['id'])
{
?>
<p><a href="tblAcasalamento.php?id=<?=$passaro->get_id()?>&sexo=<?=$passaro->get_sexo()?>"><< Voltar</a></p>
<?
}
?>
<? include("inc/footer.inc"); ?>