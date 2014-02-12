<?
require_once("classBD.php");

class Cliente
{
	//atributos de Cliente
	var $nome;
	var $endereco;
	var $cidade;
	var $estado;
	var $telefone1;
	var $telefone2;
	var $email;
	var $id;
	var $bd;

	//construtor de Cliente
	function Cliente($nome = null, $endereco = null, $cidade = null, $estado = null, $telefone1 = null, $telefone2 = null, $email = null, $id = null)
	{
		$this->set_nome($nome);
		$this->set_endereco($endereco);
		$this->set_cidade($cidade);
		$this->set_estado($estado);
		$this->set_telefone1($telefone1);
		$this->set_telefone2($telefone2);
		$this->set_email($email);
		$this->set_id($id);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_nome($n)
	{
		$this->nome = $n;
	}

	function set_endereco($e)
	{
		$this->endereco = $e;
	}

	function set_cidade($c)
	{
		$this->cidade = $c;
	}

	function set_estado($e)
	{
		$this->estado = $e;
	}

	function set_telefone1($t)
	{
		$this->telefone1 = $t;
	}

	function set_telefone2($t)
	{
		$this->telefone2 = $t;
	}

	function set_email($e)
	{
		$this->email = $e;
	}

	function set_id($i)
	{
		$this->id = $i;
	}

	//métodos de retorno
	function get_nome()
	{
		return $this->nome;
	}

	function get_endereco()
	{
		return $this->endereco;
	}

	function get_cidade()
	{
		return $this->cidade;
	}

	function get_estado()
	{
		return $this->estado;
	}

	function get_telefone1()
	{
		return $this->telefone1;
	}

	function get_telefone2()
	{
		return $this->telefone2;
	}

	function get_email()
	{
		return $this->email;
	}

	function get_id()
	{
		return $this->id;
	}

	//métodos de persistência
	function insere()
	{
		$sql = "insert into cliente values ('', '".$this->get_nome()."', '".$this->get_endereco()."', '".$this->get_cidade()."', '".$this->get_estado()."', '".$this->get_telefone1()."', '".$this->get_telefone2()."', '".$this->get_email()."')";
		$this->bd->executa($sql);
	}

	function altera()
	{
		$sql = "update cliente set nome = '".$this->get_nome()."', endereco = '".$this->get_endereco()."', cidade = '".$this->get_cidade()."', estado = '".$this->get_estado()."', telefone1 = '".$this->get_telefone1()."', telefone2 = '".$this->get_telefone2()."', email = '".$this->get_email()."' where id = '".$this->get_id()."'";
		$this->bd->executa($sql);
	}

	function lista()
	{
		$sql = "select * from cliente";

		/* Incompatível com PHP5
		//verifica se o atributo bd é um objeto
		if (!is_object($this->bd))
			$this->bd = new BD(); */

		//executa o comando SQL e monta os objetos em um array
		$this->bd->executa($sql);
		while ($l = $this->bd->lista())
			$objs[] = new Cliente($l['nome'], $l['endereco'], $l['cidade'], $l['estado'], $l['telefone1'], $l['telefone2'], $l['email'], $l['id']);
		return $objs;
	}

	function seleciona()
	{
		$sql = "select * from cliente where id = '".$this->get_id()."'";

		//executa o comando SQL e preenche o objeto
		$this->bd->executa($sql);
		$this->set_nome($this->bd->resultado(0, "nome"));
		$this->set_endereco($this->bd->resultado(0, "endereco"));
		$this->set_cidade($this->bd->resultado(0, "cidade"));
		$this->set_estado($this->bd->resultado(0, "estado"));
		$this->set_telefone1($this->bd->resultado(0, "telefone1"));
		$this->set_telefone2($this->bd->resultado(0, "telefone2"));
		$this->set_email($this->bd->resultado(0, "email"));
		$this->set_id($this->bd->resultado(0, "id"));
	}
}
?>