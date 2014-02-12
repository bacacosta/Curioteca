<?
class Util
{
	function listaEstados()
	{
		return array("AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO");
	}

	function uneData($dia, $mes, $ano)
	{
		return $ano."-".$mes."-".$dia;
	}

	function separaData($data)
	{
		return explode("-", $data);
	}

	function formataData($data)
	{
		return join("/", array_reverse(explode("-", $data)));
	}

	function separaFone($telefone)
	{
		$t[] = substr($telefone, 1, 2);
		$t[] = substr($telefone, 5, 9);
		return $t;
	}

	function formataFone($ddd, $fone)
	{
		if ($ddd && $fone)
			return "(".$ddd.") ".$fone;
	}

	function formataReal($real)
	{
		return number_format($real, 2, ",", ".");
	}

	function sexo($sexo)
	{
		switch ($sexo)
		{
			case "M":
				return "Macho";
			break;

			case "F":
				return "Fêmea";
			break;
		}
	}

	function status($status)
	{
		switch ($status)
		{
			case "D":
				return "Disponível";
			break;

			case "V":
				return "Vendido";
			break;

			case "M":
				return "Morto";
			break;
		}
	}

	function tipomuda($tipomuda)
	{
		switch ($tipomuda)
		{
			case "P":
				return "Parcial";
			break;

			case "C":
				return "Completa";
			break;
		}
	}
}
?>