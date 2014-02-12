<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<h2>Tabela de pássaros <?= ($_GET['status'] == "D") ? "disponíveis" : (($_GET['status'] == "V") ? "vendidos" : "mortos") ?></h2>
<?
$passaro = new Passaro();
if ($passaro->lista("T", $_GET['status']))
{
?>
<table>
	<tr>
		<th>Anilha</th>
		<th>Nome</th>
		<th>Espécie</th>
		<th></th>
	</tr>
	<?
	foreach ($passaro->lista("T", $_GET['status']) as $p)
	{
		//constrói e preenche o objeto $especie
		$especie = new Especie();
		$especie->set_id($p->get_idespecie());
		$especie->seleciona();
	?>
	<tr>
		<td><?=$p->get_anilha()?></td>
		<td><?=$p->get_nome()?></td>
		<td><?=$especie->get_nomepop()?></td>
		<td><a href="infPassaro.php?id=<?=$p->get_id()?>">Exibir detalhes >></a></td>
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
<p>Não existem pássaros <?= ($_GET['status'] == "D") ? "disponíveis" : (($_GET['status'] == "V") ? "vendidos" : "mortos") ?> cadastrados!</p>
<?
}
?>
<p><?= ($_GET['status'] == "D") ? "Ver disponíveis >>" : "<a href=\"tblPassaro.php?status=D\">Ver disponíveis >></a>" ?> | <?= ($_GET['status'] == "V") ? "Ver vendidos >>" : "<a href=\"tblPassaro.php?status=V\">Ver vendidos >></a>" ?> | <?= ($_GET['status'] == "M") ? "Ver mortos >>" : "<a href=\"tblPassaro.php?status=M\">Ver mortos >></a>" ?></p>
<? include("inc/footer.inc"); ?>