<?
class BD
{
	//atributos de BD
	var $conexao;
	var $consulta;

	//construtor de BD
	function BD()
	{
		//localhost
		$this->set_conexao(mysql_connect("localhost", "root", "root"));
		mysql_select_db("curioteca", $this->get_conexao());
	}

	//métodos de atribuição
	function set_conexao($c)
	{
		$this->conexao = $c;
	}

	function set_consulta($c)
	{
		$this->consulta = $c;
	}

	//métodos de retorno
	function get_conexao()
	{
		return $this->conexao;
	}

	function get_consulta()
	{
		return $this->consulta;
	}

	//executa comando SQL
	function executa($sql)
	{
		$this->set_consulta(mysql_query($sql, $this->get_conexao()));
	}

	//retorna o número de linhas de um resultado
	function numLinhas()
	{
		return mysql_num_rows($this->get_consulta());
	}

	//retorna um campo específico de um resultado
	function resultado($linha, $campo)
	{
		return mysql_result($this->get_consulta(), $linha, $campo);
	}

	//retorna um array com todas as linhas de um resultado
	function lista()
	{
		return mysql_fetch_array($this->get_consulta());
	}

	//retorna o id da última linha inserida
	function ultimo()
	{
		return mysql_insert_id();
	}
}
?>