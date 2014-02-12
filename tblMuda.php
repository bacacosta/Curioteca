<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói o objeto $muda
$muda = new Muda($_GET['id']);

//constrói e preenche o objeto $passaro
$passaro = new Passaro();
$passaro->set_id($_GET['id']);
$passaro->seleciona();
?>
<h2>Tabela de mudas do pássaro <i><?=$passaro->get_nome()?></i></h2>
<?
//verifica se existem mudas cadastradas para este pássaro
if ($muda->lista())
{
?>
<table>
	<tr>
		<th>Data da Muda</th>
		<th>Tipo de Muda</th>
	</tr>
	<?
	//lista todas as mudas deste pássaro
	foreach ($muda->lista() as $m)
	{
	?>
	<tr>
		<td><?=Util::formataData($m->get_dtmuda())?></td>
		<td><?=Util::tipomuda($m->get_tipomuda())?></td>
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
<p>Não existem mudas cadastradas para este pássaro!</p>
<?
}
?>
<p><a href="infPassaro.php?id=<?=$muda->get_idpassaro()?>"><< Voltar</a> | <a href="frmMuda.php?id=<?=$muda->get_idpassaro()?>">Cadastrar muda >></a></p>
<? include("inc/footer.inc"); ?>