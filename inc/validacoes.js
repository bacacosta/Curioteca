<!--
//validação de data
function validaData(dia, mes, ano)
{
	if (isNaN(dia.value) || isNaN(mes.value) || isNaN(ano.value))
		return(false);
	if (dia.value.length != 2 || mes.value.length != 2 || ano.value.length != 4)
		return(false);
	if (ano.value < 1500 || ano.value > 2500)
		return(false);
	if (mes.value < 1 || mes.value > 12)
		return(false);
	if (dia.value < 1)
		return(false);
	if (mes.value == 1 || mes.value == 3 || mes.value == 5 || mes.value == 7 || mes.value == 8 || mes.value == 10 || mes.value == 12)
		if (dia.value > 31)
			return(false);
	if (mes.value == 4 || mes.value == 6 || mes.value == 9 || mes.value == 11)
		if (dia.value > 30)
			return(false);
	if (mes.value == 2)
		//verifica se o ano é bissexto
		if (ano.value % 4 == 0 && (ano.value % 100 != 0 || ano.value % 400 == 0))
			if (dia.value > 29)
				return(false);
			else
				return(true);
		else
			if (dia.value > 28)
				return(false);
	return(true);
}

//validação de frmPassaro
function validaPassaro(form)
{
	if (form.idcriadouro.value == "-- Escolha um criadouro --" || form.idcriadouro.value == "")
	{
		alert("Você precisa escolher um criadouro!");
		form.idcriadouro.focus();
		return(false);
	}
	if (form.anilha.value == "")
	{
		alert("Você precisa informar a anilha do pássaro!");
		form.anilha.focus();
		return(false);
	}
	if (form.dia.value == "" || form.mes.value == "" || form.ano.value == "")
	{
		alert("Você precisa informar a data de nascimento!");
		form.dia.focus();
		return(false);
	}
	if (!validaData(form.dia, form.mes, form.ano))
	{
		alert("A data de nascimento informada não é válida!");
		form.dia.focus();
		return(false);
	}
	if (form.idespecie.value == "-- Escolha uma espécie --" || form.idespecie.value == "")
	{
		alert("Você precisa escolher uma espécie!");
		form.idespecie.focus();
		return(false);
	}
	if (!form.sexo[0].checked && !form.sexo[1].checked)
	{
		alert("Você precisa escolher um sexo!");
		return(false);
	}
}

//validação de frmMuda
function validaMuda(form)
{
	if (form.idpassaro.value == "-- Escolha um pássaro --" || form.idpassaro.value == "")
	{
		alert("Você precisa escolher um pássaro!");
		form.idpassaro.focus();
		return(false);
	}
	if (form.dia.value == "" || form.mes.value == "" || form.ano.value == "")
	{
		alert("Você precisa informar a data da muda!");
		form.dia.focus();
		return(false);
	}
	if (!validaData(form.dia, form.mes, form.ano))
	{
		alert("A data da muda informada não é válida!");
		form.dia.focus();
		return(false);
	}
	if (!form.tipomuda[0].checked && !form.tipomuda[1].checked)
	{
		alert("Você precisa escolher um tipo de muda!");
		return(false);
	}
}

//validação de frmAcasalamento
function validaAcasalamento(form)
{
	if (form.idmacho.value == "-- Escolha um macho --" || form.idmacho.value == "")
	{
		alert("Você precisa escolher um macho!");
		form.idmacho.focus();
		return(false);
	}
	if (form.idfemea.value == "-- Escolha uma fêmea --" || form.idfemea.value == "")
	{
		alert("Você precisa escolher uma fêmea!");
		form.idfemea.focus();
		return(false);
	}
	if (form.dia.value == "" || form.mes.value == "" || form.ano.value == "")
	{
		alert("Você precisa informar a data do acasalamento!");
		form.dia.focus();
		return(false);
	}
	if (!validaData(form.dia, form.mes, form.ano))
	{
		alert("A data do acasalamento informada não é válida!");
		form.dia.focus();
		return(false);
	}
	if (form.numovos.value == "")
	{
		alert("Você precisa informar o número de ovos!");
		form.numovos.focus();
		return(false);
	}
	if (isNaN(form.numovos.value))
	{
		alert("O número de ovos informado não é válido!");
		form.numovos.focus();
		return(false);
	}
	if (form.numeclosoes.value == "")
	{
		alert("Você precisa informar o número de eclosões!");
		form.numeclosoes.focus();
		return(false);
	}
	if (isNaN(form.numeclosoes.value))
	{
		alert("O número de eclosões informado não é válido!");
		form.numeclosoes.focus();
		return(false);
	}
	if (form.numeclosoes.value > form.numovos.value)
	{
		alert("O número de eclosões não pode ser maior que o número de ovos!");
		form.numeclosoes.focus();
		return(false);
	}
}

//validação de frmCriadouro
function validaCriadouro(form)
{
	if (form.nome.value == "")
	{
		alert("Você precisa informar o nome!");
		form.nome.focus();
		return(false);
	}
	if (form.cidade.value == "")
	{
		alert("Você precisa informar a cidade!");
		form.cidade.focus();
		return(false);
	}
	if (form.estado.value == "--" || form.estado.value == "")
	{
		alert("Você precisa escolher um estado!");
		form.estado.focus();
		return(false);
	}
}

//validação de frmCliente
function validaCliente(form)
{
	if (form.nome.value == "")
	{
		alert("Você precisa informar o nome!");
		form.nome.focus();
		return(false);
	}
	if (form.cidade.value == "")
	{
		alert("Você precisa informar a cidade!");
		form.cidade.focus();
		return(false);
	}
	if (form.estado.value == "--" || form.estado.value == "")
	{
		alert("Você precisa escolher um estado!");
		form.estado.focus();
		return(false);
	}
}

//validação de frmVenda
function validaVenda(form)
{
	if (form.idcliente.value == "-- Escolha um cliente --" || form.idcliente.value == "")
	{
		alert("Você precisa escolher um cliente!");
		form.idcliente.focus();
		return(false);
	}
	if (form.idpassaro.value == "-- Escolha um pássaro --" || form.idpassaro.value == "")
	{
		alert("Você precisa escolher um pássaro!");
		form.idpassaro.focus();
		return(false);
	}
	if (form.dia.value == "" || form.mes.value == "" || form.ano.value == "")
	{
		alert("Você precisa informar a data da venda!");
		form.dia.focus();
		return(false);
	}
	if (!validaData(form.dia, form.mes, form.ano))
	{
		alert("A data da venda informada não é válida!");
		form.dia.focus();
		return(false);
	}
	if (form.valor.value == "")
	{
		alert("Você precisa informar o valor da venda!");
		form.valor.focus();
		return(false);
	}
}

//validação de frmMorte
function validaMorte(form)
{
	if (form.idpassaro.value == "-- Escolha um pássaro --" || form.idpassaro.value == "")
	{
		alert("Você precisa escolher um pássaro!");
		form.idpassaro.focus();
		return(false);
	}
	if (form.dia.value == "" || form.mes.value == "" || form.ano.value == "")
	{
		alert("Você precisa informar a data da morte!");
		form.dia.focus();
		return(false);
	}
	if (!validaData(form.dia, form.mes, form.ano))
	{
		alert("A data da morte informada não é válida!");
		form.dia.focus();
		return(false);
	}
}
-->