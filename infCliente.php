<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói e preenche o objeto $cliente
$cliente = new Cliente();
$cliente->set_id($_GET['id']);
$cliente->seleciona();
?>
<h2>Informações detalhadas sobre o cliente <i><?=$cliente->get_nome()?></i></h2>
<ul>
	<li><b>Localização:</b></li>
	<ul>
		<li><b>Endereço:</b> <?=$cliente->get_endereco()?></li>
		<li><b>Cidade:</b> <?=$cliente->get_cidade()?></li>
		<li><b>Estado:</b> <?=$cliente->get_estado()?></li>
	</ul>
	<li><b>Contato:</b></li>
	<ul>
		<li><b>Telefone 1:</b> <?=$cliente->get_telefone1()?></li>
		<li><b>Telefone 2:</b> <?=$cliente->get_telefone2()?></li>
		<li><b>E-Mail:</b> <?=$cliente->get_email()?></li>
	</ul>
</ul>
<p><a href="tblCliente.php"><< Voltar</a> | <a href="frmCliente.php?id=<?=$cliente->get_id()?>">Alterar cadastro >></a></p>
<? include("inc/footer.inc"); ?>