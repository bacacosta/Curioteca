<?
require_once("classBD.php");

class Morte
{
	//atributos de Morte
	var $idpassaro;
	var $dtmorte;
	var $id;
	var $bd;

	//construtor de Morte
	function Morte($idpassaro = null, $dtmorte = null, $id = null)
	{
		$this->set_idpassaro($idpassaro);
		$this->set_dtmorte($dtmorte);
		$this->set_id($id);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_idpassaro($i)
	{
		$this->idpassaro = $i;
	}

	function set_dtmorte($d)
	{
		$this->dtmorte = $d;
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

	function get_dtmorte()
	{
		return $this->dtmorte;
	}

	function get_id()
	{
		return $this->id;
	}

	//métodos de persistência
	function insere()
	{
		$sql = "insert into morte values ('', '".$this->get_idpassaro()."', '".$this->get_dtmorte()."')";
		$this->bd->executa($sql);
	}

	function lista()
	{
		$sql = "select * from morte";

		//verifica se o atributo bd é um objeto
		if (!is_object($this->bd))
			$this->bd = new BD();

		//executa o comando SQL e monta os objetos em um array
		$this->bd->executa($sql);
		while ($l = $this->bd->lista())
			$objs[] = new Morte($l['idpassaro'], $l['dtmorte'], $l['id']);
		return $objs;
	}

	function seleciona()
	{
		$sql = "select * from morte where idpassaro = '".$this->get_idpassaro()."'";

		//executa o comando SQL e preenche o objeto
		$this->bd->executa($sql);
		$this->set_dtmorte($this->bd->resultado(0, "dtmorte"));
		$this->set_id($this->bd->resultado(0, "id"));
	}
}
?>