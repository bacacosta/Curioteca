<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<h2>Tabela de criadouros</h2>
<?
$criadouro = new Criadouro();
if ($criadouro->lista())
{
?>
<table>
	<tr>
		<th>Nome</th>
		<th>Telefone</th>
		<th>E-Mail</th>
		<th>Contato</th>
		<th></th>
	</tr>
	<?
	foreach ($criadouro->lista() as $c)
	{
	?>
	<tr>
		<td><?=$c->get_nome()?></td>
		<td><?=$c->get_telefone1()?></td>
		<td><?=$c->get_email()?></td>
		<td><?=$c->get_contato()?></td>
		<td><a href="infCriadouro.php?id=<?=$c->get_id()?>">Exibir detalhes >></a></td>
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
<p>Não existem criadouros cadastrados!</p>
<?
}
?>
<? include("inc/footer.inc"); ?>