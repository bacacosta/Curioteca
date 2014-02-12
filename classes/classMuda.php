<?
require_once("classBD.php");

class Muda
{
	//atributos de Muda
	var $idpassaro;
	var $dtmuda;
	var $tipomuda;
	var $id;
	var $bd;

	//construtor de Muda
	function Muda($idpassaro = null, $dtmuda = null, $tipomuda = null, $id = null)
	{
		$this->set_idpassaro($idpassaro);
		$this->set_dtmuda($dtmuda);
		$this->set_tipomuda($tipomuda);
		$this->set_id($id);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_idpassaro($i)
	{
		$this->idpassaro = $i;
	}

	function set_dtmuda($d)
	{
		$this->dtmuda = $d;
	}

	function set_tipomuda($t)
	{
		$this->tipomuda = $t;
	}

	function set_id($i)
	{
		$this->id = $i;
	}

	//métodos de retorno
	function get_idpassaro()
	{
		return $this->idpassaro;
	}

	function get_dtmuda()
	{
		return $this->dtmuda;
	}

	function get_tipomuda()
	{
		return $this->tipomuda;
	}

	function get_id()
	{
		return $this->id;
	}

	//métodos de persistência
	function insere()
	{
		$sql = "insert into muda values ('', '".$this->get_idpassaro()."', '".$this->get_dtmuda()."', '".$this->get_tipomuda()."')";
		$this->bd->executa($sql);
	}

	function lista()
	{
		$sql = "select * from muda where idpassaro = '".$this->get_idpassaro()."'";

		//executa o comando SQL e monta os objetos em um array
		$this->bd->executa($sql);
		while ($l = $this->bd->lista())
			$objs[] = new Muda($l['idpassaro'], $l['dtmuda'], $l['tipomuda'], $l['id']);
		return $objs;
	}
}
?>