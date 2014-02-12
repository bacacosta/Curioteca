<?
require_once("classBD.php");

class Especie
{
	//atributos de Especie
	var $nomepop;
	var $nomecient;
	var $id;
	var $bd;

	//construtor de Especie
	function Especie($nomepop = null, $nomecient = null, $id = null)
	{
		$this->set_nomepop($nomepop);
		$this->set_nomecient($nomecient);
		$this->set_id($id);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_nomepop($n)
	{
		$this->nomepop = $n;
	}

	function set_nomecient($n)
	{
		$this->nomecient = $n;
	}

	function set_id($i)
	{
		$this->id = $i;
	}

	//métodos de retorno
	function get_nomepop()
	{
		return $this->nomepop;
	}

	function get_nomecient()
	{
		return $this->nomecient;
	}

	function get_id()
	{
		return $this->id;
	}

	//métodos de persistência
	function lista()
	{
		$sql = "select * from especie";

		//verifica se o atributo bd é um objeto
		if (!is_object($this->bd))
			$this->bd = new BD();

		//executa o comando SQL e monta os objetos em um array
		$this->bd->executa($sql);
		while ($l = $this->bd->lista())
			$objs[] = new Especie($l['nomepop'], $l['nomecient'], $l['id']);
		return $objs;
	}

	function seleciona()
	{
		$sql = "select * from especie where id = '".$this->get_id()."'";

		//executa o comando SQL e preenche o objeto
		$this->bd->executa($sql);
		$this->set_nomepop($this->bd->resultado(0, "nomepop"));
		$this->set_nomecient($this->bd->resultado(0, "nomecient"));
		$this->set_id($this->bd->resultado(0, "id"));
	}
}
?>