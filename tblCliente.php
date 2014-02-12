<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<h2>Tabela de clientes</h2>
<?
$cliente = new Cliente();
if ($cliente->lista())
{
?>
<table>
	<tr>
		<th>Nome</th>
		<th>Telefone</th>
		<th>E-Mail</th>
		<th></th>
	</tr>
	<?
	foreach ($cliente->lista() as $c)
	{
	?>
	<tr>
		<td><?=$c->get_nome()?></td>
		<td><?=$c->get_telefone1()?></td>
		<td><?=$c->get_email()?></td>
		<td><a href="infCliente.php?id=<?=$c->get_id()?>">Exibir detalhes >></a></td>
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
<p>Não existem clientes cadastrados!</p>
<?
}
?>
<? include("inc/footer.inc"); ?>