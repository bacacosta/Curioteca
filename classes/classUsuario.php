<?
require_once("classBD.php");

class Usuario
{
	//atributos de Usuario
	var $nome;
	var $login;
	var $senha;
	var $bd;

	//construtor de Usuario
	function Usuario($login = null, $senha = null)
	{
		$this->set_login($login);
		$this->set_senha($senha);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_nome($n)
	{
		$this->nome = $n;
	}

	function set_login($l)
	{
		$this->login = $l;
	}

	function set_senha($s)
	{
		$this->senha = $s;
	}

	//métodos de retorno
	function get_nome()
	{
		return $this->nome;
	}

	function get_login()
	{
		return $this->login;
	}

	function get_senha()
	{
		return $this->senha;
	}

	//método de autenticação
	function autentica()
	{
		$sql = "select nome from usuario where login = '".$this->get_login()."' and senha = '".$this->get_senha()."'";
		$this->bd->executa($sql);
		if ($this->bd->numLinhas() != 0)
		{
			$this->set_nome($this->bd->resultado(0, "nome"));
			return true;
		}
	}
}
?>