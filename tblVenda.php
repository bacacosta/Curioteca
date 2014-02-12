<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<h2>Tabela de vendas</h2>
<?
$venda = new Venda();
if ($venda->lista())
{
?>
<table>
	<tr>
		<th>Cliente</th>
		<th>Pássaro</th>
		<th>Data da venda</th>
		<th>Valor</th>
	</tr>
	<?
	//lista todas as vendas
	foreach ($venda->lista() as $v)
	{
		//constrói e preenche o objeto $cliente
		$cliente = new Cliente();
		$cliente->set_id($v->get_idcliente());
		$cliente->seleciona();

		//constrói e preenche o objeto $passaro
		$passaro = new Passaro();
		$passaro->set_id($v->get_idpassaro());
		$passaro->seleciona();
	?>
	<tr>
		<td><?=$cliente->get_nome()?></td>
		<td><?=$passaro->get_nome()?></td>
		<td><?=Util::formataData($v->get_dtvenda())?></td>
		<td>R$ <?=Util::formataReal($v->get_valor())?></td>
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
<p>Não existem vendas cadastradas!</p>
<?
}
?>
<? include("inc/footer.inc"); ?>