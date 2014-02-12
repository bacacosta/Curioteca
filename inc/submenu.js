<!--
//instancia um array para armazenamento dos timeouts
to = new Array();

//função para evento onmouseover
function over(n)
{
	if (typeof(to[n]) != "undefined")
		clearTimeout(to[n]);
	document.getElementById("sm" + n).style.visibility = "visible";
}

//função para evento onmouseout
function out(n)
{
	to[n] = setTimeout('document.getElementById("sm' + n + '").style.visibility = "hidden"', 500);
}
-->