<? include("inc/session.php"); ?>
<? require_once("classes/classFachada.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<?
//constrói e preenche o objeto $passaro
$passaro = new Passaro();
$passaro->set_id($_GET['id']);
$passaro->seleciona();

//constrói e preenche o objeto $especie
$especie = new Especie();
$especie->set_id($passaro->get_idespecie());
$especie->seleciona();

//constrói e preenche o objeto $criadouro
$criadouro = new Criadouro();
$criadouro->set_id($passaro->get_idcriadouro());
$criadouro->seleciona();

if ($passaro->get_status() == "V")
{
	//constrói e preenche o objeto $venda
	$venda = new Venda();
	$venda->set_idpassaro($passaro->get_id());
	$venda->seleciona();

	//constrói e preenche o objeto $cliente
	$cliente = new Cliente();
	$cliente->set_id($venda->get_idcliente());
	$cliente->seleciona();
}
elseif ($passaro->get_status() == "M")
{
	//constrói e preenche o objeto $morte
	$morte = new Morte();
	$morte->set_idpassaro($passaro->get_id());
	$morte->seleciona();
}
?>
<h2>Informações detalhadas sobre o pássaro <i><?= ($passaro->get_nome()) ? $passaro->get_nome() : $passaro->get_anilha() ?></i></h2>
<ul>
	<li><b>Anilha:</b> <?=$passaro->get_anilha()?></li>
	<li><b>Origem:</b></li>
	<ul>
		<li><b>Criadouro:</b> <?=$criadouro->get_nome()?></li>
		<li><b>Pai:</b> <?=$passaro->get_anelpai()?></li>
		<li><b>Mãe:</b> <?=$passaro->get_anelmae()?></li>
		<li><b>Data de nascimento:</b> <?=Util::formataData($passaro->get_dtnascimento())?></li>
	</ul>
	<li><b>Características:</b></li>
	<ul>
		<li><b>Espécie:</b> <?=$especie->get_nomepop()?> [ <i><?=$especie->get_nomecient()?></i> ]</li>
		<li><b>Sexo:</b> <?=Util::sexo($passaro->get_sexo())?></li>
		<li><b>Status:</b> <?=Util::status($passaro->get_status())?></li>
	</ul>
	<?
	if ($passaro->get_status() == "V")
	{
	?>
	<li><b>Informações da venda:</b></li>
	<ul>
		<li><b>Cliente:</b> <?=$cliente->get_nome()?></li>
		<li><b>Data:</b> <?=Util::formataData($venda->get_dtvenda())?></li>
		<li><b>Valor:</b> R$ <?=Util::formataReal($venda->get_valor())?></li>
	</ul>
	<?
	}
	elseif ($passaro->get_status() == "M")
	{
	?>
	<li><b>Data da morte:</b> <?=Util::formataData($morte->get_dtmorte())?></li>
	<?
	}
	?>
</ul>
<p><a href="tblPassaro.php?status=<?=$passaro->get_status()?>"><< Voltar</a> | <a href="frmPassaro.php?id=<?=$passaro->get_id()?>">Alterar cadastro >></a> | <a href="tblMuda.php?id=<?=$passaro->get_id()?>">Ver mudas >></a> | <a href="tblAcasalamento.php?id=<?=$passaro->get_id()?>&sexo=<?=$passaro->get_sexo()?>">Ver acasalamentos >></a> <?= ($passaro->get_status() == "D") ? "| <a href=\"frmVenda.php?id=".$passaro->get_id()."\">Vender este pássaro >></a> | <a href=\"frmMorte.php?id=".$passaro->get_id()."\">Registrar morte >></a>" : "" ?></p>
<? include("inc/footer.inc"); ?>