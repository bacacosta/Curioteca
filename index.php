<? include("inc/header.inc"); ?>
<form name="frmLogin" method="post" action="ctrlLogin.php" style="text-align: center">
	<label for="login">Login:</label> <span><input id="login" name="login" type="text" size="10" maxlength="10" /></span><br />
	<label for="senha">Senha:</label> <span><input id="senha" name="senha" type="password" size="10" maxlength="10" /></span><br />
	<input type="submit" value="Entrar" />
</form>
<? include("inc/footer.inc"); ?>