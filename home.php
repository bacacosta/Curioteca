<? include("inc/session.php"); ?>
<? include("inc/header.inc"); ?>
<? include("inc/menu.inc"); ?>
<h2>Bem vindo, <?=$_SESSION["nome"]?>!</h2>
<p>Esta é a interface do Curioteca v.0.1, um sistema para gerenciamento de criadouros de curiós e outras aves desenvolvido por Rodrigo M. Costa.</p>
<p>Utilize o menu acima para cadastrar aves, criadouros ou clientes, ou para fazer consultas à base de dados.</p>
<? include("inc/footer.inc"); ?>