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
<h2>Registrar morte do pássaro <i><?=$passaro->get_nome()?></i></h2>
<?
}
else
{
?>
<h2>Registrar morte</h2>
<?
}
?>
<form name="frmMorte" method="post" action="ctrlCadastro.php?tipo=morte" onsubmit="return validaMorte(this)">
	<label for="idpassaro">Pássaro:</label>
	<span><select id="idpassaro" name="idpassaro">
		<option>-- Escolha um pássaro --</option>
		<?
		$lista = new Passaro();
		foreach ($lista->lista() as $p)
		{
		?>
		<option value="<?=$p->get_id()?>" <?= ($p->get_id() == $_GET['id']) ? "selected=\"selected\"" : "" ?>><?= ($p->get_nome()) ? $p->get_nome() : $p->get_anilha() ?></option>
		<?
		}
		?>
	</select></span><br />
	<label for="dia">Data da morte:</label> <span><input id="dia" name="dia" type="text" size="2" maxlength="2" />/<input id="mes" name="mes" type="text" size="2" maxlength="2" />/<input id="ano" name="ano" type="text" size="4" maxlength="4" /></span><br />
	<label><input type="submit" value="Cadastrar" /></label> <span><input type="reset" value="Limpar" /></span>
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