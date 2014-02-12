<?
require_once("classBD.php");

class Acasalamento
{
	//atributos de Acasalamento
	var $idmacho;
	var $idfemea;
	var $dtacasalamento;
	var $numovos;
	var $numeclosoes;
	var $id;
	var $bd;

	//construtor de Acasalamento
	function Acasalamento($idmacho = null, $idfemea = null, $dtacasalamento = null, $numovos = null, $numeclosoes = null, $id = null)
	{
		$this->set_idmacho($idmacho);
		$this->set_idfemea($idfemea);
		$this->set_dtacasalamento($dtacasalamento);
		$this->set_numovos($numovos);
		$this->set_numeclosoes($numeclosoes);
		$this->set_id($id);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_idmacho($i)
	{
		$this->idmacho = $i;
	}

	function set_idfemea($i)
	{
		$this->idfemea = $i;
	}

	function set_dtacasalamento($d)
	{
		$this->dtacasalamento = $d;
	}

	function set_numovos($n)
	{
		$this->numovos = $n;
	}

	function set_numeclosoes($n)
	{
		$this->numeclosoes = $n;
	}

	function set_id($i)
	{
		$this->id = $i;
	}

	//métodos de retorno
	function get_idmacho()
	{
		return $this->idmacho;
	}

	function get_idfemea()
	{
		return $this->idfemea;
	}

	function get_dtacasalamento()
	{
		return $this->dtacasalamento;
	}

	function get_numovos()
	{
		return $this->numovos;
	}

	function get_numeclosoes()
	{
		return $this->numeclosoes;
	}

	function get_id()
	{
		return $this->id;
	}

	//métodos de persistência
	function insere()
	{
		$sql = "insert into acasalamento values ('', '".$this->get_idmacho()."', '".$this->get_idfemea()."', '".$this->get_dtacasalamento()."', '".$this->get_numovos()."', '".$this->get_numeclosoes()."')";
		$this->bd->executa($sql);
	}

	function lista($sexo, $id)
	{
		$sql = "select * from acasalamento";

		switch ($sexo)
		{
			case "M":
				$sql .= " where idmacho = '".$id."'";
			break;

			case "F":
				$sql .= " where idfemea = '".$id."'";
			break;
		}

		/* Incompatível com PHP5
		//verifica se o atributo bd é um objeto
		if (!is_object($this->bd))
			$this->bd = new BD(); */

		//executa o comando SQL e monta os objetos em um array
		$this->bd->executa($sql);
		while ($l = $this->bd->lista())
			$objs[] = new Acasalamento($l['idmacho'], $l['idfemea'], $l['dtacasalamento'], $l['numovos'], $l['numeclosoes'], $l['id']);
		return $objs;
	}
}
?>