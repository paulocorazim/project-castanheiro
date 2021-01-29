<?php
///////////////////////////////////////////////////////////////////////////
// nome: php_fnumber()
// funзгo: retornar o argumento de entrada no formato de nъmero pt-br
// autor: alexandre g. sarmento
// em: 15/05/2011
///////////////////////////////////////////////////////////////////////////
function php_fnumber($var1){
	//return number_format($var1,2,",",'.Т.');
	return number_format($var1,2, ',', '.');
}

function php_fnumber_dois($var1){
	//return number_format($var1,2,",",'.Т.');
	return number_format($var1,0, ',', '.');
}

function str_zero2($palavra,$limite){
	$var=str_pad($palavra, $limite, "0", STR_PAD_LEFT);
	return $var;
}

function remove_moeda($var1){
	$var1 = str_replace(",",".",str_replace(".","",$var1));
	return $var1;
}

function remove_cpf($var1){
	//$var1 = str_replace(".","",str_replace("-","",$var1));
	$var1 = preg_replace("/[^0-9\s]/", "", $var1);
	return $var1;
}

function remove_cep($var1){
	//$var1 = str_replace(".","",str_replace("-","",$var1));
	$var1 = preg_replace("/[^0-9\s]/", "", $var1);
	return $var1;
}

function remove_zero_esquerda( $var1 ){
	$tam = strlen( $var1 );
	for( $i=0; $i<$tam; $i++ ){
		if( substr( $var1, $i, 1 )	== "0" ){
			$y = substr( $var1, ($i+1), ($tam) );
		}else{
			return $y;
		}
	}
	return $y;
}
?>