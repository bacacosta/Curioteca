<?
require_once("classBD.php");

class Passaro
{
	//atributos de Passaro
	var $idcriadouro;
	var $idespecie;
	var $anilha;
	var $anelpai;
	var $anelmae;
	var $dtnascimento;
	var $nome;
	var $sexo;
	var $status;
	var $id;
	var $bd;

	//construtor de Passaro
	function Passaro($idcriadouro = null, $idespecie = null, $anilha = null, $anelpai = null, $anelmae = null, $dtnascimento = null, $nome = null, $sexo = null, $status = null, $id = null)
	{
		$this->set_idcriadouro($idcriadouro);
		$this->set_idespecie($idespecie);
		$this->set_anilha($anilha);
		$this->set_anelpai($anelpai);
		$this->set_anelmae($anelmae);
		$this->set_dtnascimento($dtnascimento);
		$this->set_nome($nome);
		$this->set_sexo($sexo);
		$this->set_status($status);
		$this->set_id($id);
		$this->bd = new BD();
	}

	//métodos de atribuição
	function set_idcriadouro($i)
	{
		$this->idcriadouro = $i;
	}

	function set_idespecie($i)
	{
		$this->idespecie = $i;
	}

	function set_anilha($a)
	{
		$this->anilha = $a;
	}

	function set_anelpai($a)
	{
		$this->anelpai = $a;
	}

	function set_anelmae($a)
	{
		$this->anelmae = $a;
	}

	function set_dtnascimento($d)
	{
		$this->dtnascimento = $d;
	}

	function set_nome($n)
	{
		$this->nome = $n;
	}

	function set_sexo($s)
	{
		$this->sexo = $s;
	}

	function set_status($s)
	{
		$this->status = $s;
	}

	function set_id($i)
	{
		$this->id = $i;
	}

	//métodos de retorno
	function get_idcriadouro()
	{
		return $this->idcriadouro;
	}

	function get_idespecie()
	{
		return $this->idespecie;
	}

	function get_anilha()
	{
		return $this->anilha;
	}

	function get_anelpai()
	{
		return $this->anelpai;
	}

	function get_anelmae()
	{
		return $this->anelmae;
	}

	function get_dtnascimento()
	{
		return $this->dtnascimento;
	}

	function get_nome()
	{
		return $this->nome;
	}

	function get_sexo()
	{
		return $this->sexo;
	}

	function get_status()
	{
		return $this->status;
	}

	function get_id()
	{
		return $this->id;
	}

	//métodos de persistência
	function insere()
	{
		$sql = "insert into passaro values ('', '".$this->get_idcriadouro()."', '".$this->get_idespecie()."', '".$this->get_anilha()."', '".$this->get_anelpai()."', '".$this->get_anelmae()."', '".$this->get_dtnascimento()."', '".$this->get_nome()."', '".$this->get_sexo()."', '".$this->get_status()."')";
		$this->bd->executa($sql);
	}

	function altera()
	{
		$sql = "update passaro set idcriadouro = '".$this->get_idcriadouro()."', idespecie = '".$this->get_idespecie()."', anilha = '".$this->get_anilha()."', anelpai = '".$this->get_anelpai()."', anelmae = '".$this->get_anelmae()."', dtnascimento = '".$this->get_dtnascimento()."', nome = '".$this->get_nome()."', sexo = '".$this->get_sexo()."', status = '".$this->get_status()."' where id = '".$this->get_id()."'";
		$this->bd->executa($sql);
	}

	function lista($sexo = "T", $status = "D")
	{
		$sql = "select * from passaro";

		switch ($sexo)
		{
			case "M":
				$sql .= " where sexo = 'M' and";
			break;

			case "F":
				$sql .= " where sexo = 'F' and";
			break;

			case "T":
				$sql .= " where";
			break;
		}

		switch ($status)
		{
			case "V":
				$sql .= " status = 'V'";
			break;

			case "M":
				$sql .= " status = 'M'";
			break;

			case "D":
				$sql .= " status = 'D'";
			break;
		}

		/* Incompatível com PHP5
		//verifica se o atributo bd é um objeto
		if (!is_object($this->bd))
			$this->bd = new BD(); */

		//executa o comando SQL e monta os objetos em um array
		$this->bd->executa($sql);
		while ($l = $this->bd->lista())
			$objs[] = new Passaro($l['idcriadouro'], $l['idespecie'], $l['anilha'], $l['anelpai'], $l['anelmae'], $l['dtnascimento'], $l['nome'], $l['sexo'], $l['status'], $l['id']);
		return $objs;
	}

	function seleciona()
	{
		$sql = "select * from passaro where id = '".$this->get_id()."'";

		//executa o comando SQL e preenche o objeto
		$this->bd->executa($sql);
		$this->set_idcriadouro($this->bd->resultado(0, "idcriadouro"));
		$this->set_idespecie($this->bd->resultado(0, "idespecie"));
		$this->set_anilha($this->bd->resultado(0, "anilha"));
		$this->set_anelpai($this->bd->resultado(0, "anelpai"));
		$this->set_anelmae($this->bd->resultado(0, "anelmae"));
		$this->set_dtnascimento($this->bd->resultado(0, "dtnascimento"));
		$this->set_nome($this->bd->resultado(0, "nome"));
		$this->set_sexo($this->bd->resultado(0, "sexo"));
		$this->set_status($this->bd->resultado(0, "status"));
		$this->set_id($this->bd->resultado(0, "id"));
	}
}
?>