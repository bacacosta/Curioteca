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
<h2>Cadastro de muda para o pássaro <i><?=$passaro->get_nome()?></i></h2>
<?
}
else
{
?>
<h2>Cadastro de mudas</h2>
<?
}
?>
<form name="frmMuda" method="post" action="ctrlCadastro.php?tipo=muda" onsubmit="return validaMuda(this)">
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
	<label for="dia">Data da muda:</label> <span><input id="dia" name="dia" type="text" size="2" maxlength="2" />/<input id="mes" name="mes" type="text" size="2" maxlength="2" />/<input id="ano" name="ano" type="text" size="4" maxlength="4" /></span><br />
	<label for="tipomuda">Tipo de muda:</label> <span><input id="tipomuda" name="tipomuda" type="radio" value="P" />Parcial <input id="tipomuda" name="tipomuda" type="radio" value="C" />Completa</span><br />
	<label><input type="submit" value="Cadastrar" /></label> <span><input type="reset" value="Limpar" /></span>
</form>
<?
if ($_GET['id'])
{
?>
<p><a href="tblMuda.php?id=<?=$passaro->get_id()?>"><< Voltar</a></p>
<?
}
?>
<? include("inc/footer.inc"); ?>