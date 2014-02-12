<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói e preenche o objeto $passaro
$passaro = new Passaro();
$passaro->set_id($_GET['id']);
$passaro->seleciona();
?>
<h2>Tabela de acasalamentos do pássaro <i><?=$passaro->get_nome()?></i></h2>
<?
//verifica se existem acasalamentos cadastrados para este pássaro
$a = new Acasalamento();
if ($a->lista($_GET['sexo'], $_GET['id']))
{
?>
<table>
	<tr>
		<th><?= ($_GET['sexo'] == "M") ? "Fêmea" : "Macho" ?></th>
		<th>Data do Acasal.</th>
		<th>Num. de ovos</th>
		<th>Num. de eclosões</th>
	</tr>
	<?
	//lista todos os acasalamentos deste pássaro
	foreach ($a->lista($_GET['sexo'], $_GET['id']) as $acasalamento)
	{
		$passaro = new Passaro();
		$passaro->set_id(($_GET['sexo'] == "M") ? $acasalamento->get_idfemea() : $acasalamento->get_idmacho());
		$passaro->seleciona();
	?>
	<tr>
		<td><?= ($passaro->get_nome()) ? $passaro->get_nome() : $passaro->get_anilha() ?></td>
		<td><?=Util::formataData($acasalamento->get_dtacasalamento())?></td>
		<td><?=$acasalamento->get_numovos()?></td>
		<td><?=$acasalamento->get_numeclosoes()?></td>
	</tr>
	<?
	}
	?>
</table>
<?
}
else
{
?>
<p>Não existem acasalamentos cadastrados para este pássaro!</p>
<?
}
?>
<p><a href="infPassaro.php?id=<?=$_GET['id']?>"><< Voltar</a> | <a href="frmAcasalamento.php?id=<?=$_GET['id']?>">Cadastrar acasalamento >></a></p>
<? include("inc/footer.inc"); ?>