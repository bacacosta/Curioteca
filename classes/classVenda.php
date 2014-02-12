<?
require_once("classBD.php");

class Venda
{
	//atributos de Venda
	var $idcliente;
	var $idpassaro;
	var $dtvenda;
	var $valor;
	var $id;
	var $bd;

	//construtor de Venda
	function Venda($idcliente = null, $idpassaro = null, $dtvenda = null, $valor = null, $id = null)
	{
		$this->set_idcliente($idcliente);
		$this->set_idpassaro($idpassaro);
		$this->set_dtvenda($dtvenda);
		$this->set_valor($valor);
		$this->set_id($id);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_idcliente($i)
	{
		$this->idcliente = $i;
	}

	function set_idpassaro($i)
	{
		$this->idpassaro = $i;
	}

	function set_dtvenda($d)
	{
		$this->dtvenda = $d;
	}

	function set_valor($v)
	{
		$this->valor = $v;
	}

	function set_id($i)
	{
		$this->id = $i;
	}

	//métodos de retorno
	function get_idcliente()
	{
		return $this->idcliente;
	}

	function get_idpassaro()
	{
		return $this->idpassaro;
	}

	function get_dtvenda()
	{
		return $this->dtvenda;
	}

	function get_valor()
	{
		return $this->valor;
	}

	function get_id()
	{
		return $this->id;
	}

	//métodos de persistência
	function insere()
	{
		$sql = "insert into venda values ('', '".$this->get_idcliente()."', '".$this->get_idpassaro()."', '".$this->get_dtvenda()."', '".$this->get_valor()."')";
		$this->bd->executa($sql);
	}

	function lista()
	{
		$sql = "select * from venda";

		/* Incompatível com PHP5
		//verifica se o atributo bd é um objeto
		if (!is_object($this->bd))
			$this->bd = new BD(); */

		//executa o comando SQL e monta os objetos em um array
		$this->bd->executa($sql);
		while ($l = $this->bd->lista())
			$objs[] = new Venda($l['idcliente'], $l['idpassaro'], $l['dtvenda'], $l['valor'], $l['id']);
		return $objs;
	}

	function seleciona()
	{
		$sql = "select * from venda where idpassaro = '".$this->get_idpassaro()."'";

		//executa o comando SQL e preenche o objeto
		$this->bd->executa($sql);
		$this->set_idcliente($this->bd->resultado(0, "idcliente"));
		$this->set_dtvenda($this->bd->resultado(0, "dtvenda"));
		$this->set_valor($this->bd->resultado(0, "valor"));
		$this->set_id($this->bd->resultado(0, "id"));
	}
}
?>