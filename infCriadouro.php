<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói e preenche o objeto $criadouro
$criadouro = new Criadouro();
$criadouro->set_id($_GET['id']);
$criadouro->seleciona();
?>
<h2>Informações detalhadas sobre o criadouro <i><?=$criadouro->get_nome()?></i></h2>
<ul>
	<li><b>Localização:</b></li>
	<ul>
		<li><b>Endereço:</b> <?=$criadouro->get_endereco()?></li>
		<li><b>Cidade:</b> <?=$criadouro->get_cidade()?></li>
		<li><b>Estado:</b> <?=$criadouro->get_estado()?></li>
	</ul>
	<li><b>Contato:</b></li>
	<ul>
		<li><b>Telefone 1:</b> <?=$criadouro->get_telefone1()?></li>
		<li><b>Telefone 2:</b> <?=$criadouro->get_telefone2()?></li>
		<li><b>E-Mail:</b> <?=$criadouro->get_email()?></li>
		<li><b>Contato:</b> <?=$criadouro->get_contato()?></li>
	</ul>
</ul>
<p><a href="tblCriadouro.php"><< Voltar</a> | <a href="frmCriadouro.php?id=<?=$criadouro->get_id()?>">Alterar cadastro >></a></p>
<? include("inc/footer.inc"); ?>