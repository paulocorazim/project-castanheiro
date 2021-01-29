<?php
///////////////////////////////////////////////////////////////////////////
// nome: php_fnumber()
// funзгo: retornar o argumento de entrada no formato de nъmero pt-br
// autor: alexandre g. sarmento
// em: 15/05/2011
///////////////////////////////////////////////////////////////////////////
function php_fmoeda($var1){

	$number = $var1;
	
	$number = str_replace(".", "", $number);
	$number = str_replace(",", ".", $number);

	return $number;
}
?>