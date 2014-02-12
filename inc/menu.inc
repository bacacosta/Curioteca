<!-- começo de menu -->
		<div id="menu">
			<div class="item">
				<a href="home.php">Início</a>
			</div>
			<div class="item" onmouseover="over(1)" onmouseout="out(1)">
				<a href="#">Cadastros</a>
				<div class="submenu" id="sm1">
					<a href="frmPassaro.php">Pássaros</a>
					<a href="frmMuda.php">Mudas</a>
					<a href="frmAcasalamento.php">Acasalamentos</a>
					<a href="frmCriadouro.php">Criadouros</a>
					<a href="frmCliente.php">Clientes</a>
					<a href="frmVenda.php">Vendas</a>
					<a href="frmMorte.php">Mortes</a>
				</div>
			</div>
			<div class="item" onmouseover="over(2)" onmouseout="out(2)">
				<a href="#">Consultas</a>
				<div class="submenu" id="sm2">
					<a href="tblPassaro.php?status=D">Pássaros</a>
					<a href="tblCriadouro.php">Criadouros</a>
					<a href="tblCliente.php">Clientes</a>
					<a href="tblVenda.php">Vendas</a>
				</div>
			</div>
			<div class="item">
				<a href="ctrlLogout.php">Sair</a>
			</div>
		</div>
		<br clear="all" />
<!-- fim de menu -->