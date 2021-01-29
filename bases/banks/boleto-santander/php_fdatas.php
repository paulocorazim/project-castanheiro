<?php
function data_br($var1){
	// converte data do formato usa to bra
	//return date("d",strtotime($var1))."/".date("m",strtotime($var1))."/".date("Y",strtotime($var1));
	$j_dia = substr($var1,8,2);
	$j_mes = substr($var1,5,2);
	$j_ano = substr($var1,0,4);
	$xj_datafinal_bra = $j_dia."/".$j_mes."/".$j_ano;
	return $xj_datafinal_bra;
}

function data_usa($var1){
	// converte data do formato bra to usa
	//return date("Y",strtotime($var1))."/".date("m",strtotime($var1))."/".date("d",strtotime($var1));
	$j_dia = substr($var1,0,2);
	$j_mes = substr($var1,3,2);
	$j_ano = substr($var1,6,4);
	$xj_datafinal_usa = $j_ano."/".$j_mes."/".$j_dia;
	return $xj_datafinal_usa;
}

function remove_data($var1){
	$var1 = preg_replace("/[^0-9\s]/", "", $var1);
	$var1 = date("Y",strtotime($var1))."/".date("m",strtotime($var1))."/".date("d",strtotime($var1));
	return $var1;
}





function dias_ate_hoje($vencimento){
	// $data1 = Data inicial ou a data base para se contar os dias ate hoje
	// $data1 devera estar no formato (yyyy-mm-dd) ou seja, no formato americano

	$data1 = strtotime($vencimento);
	$data1 = mktime(0, 0, 0, date("m", $data1), date("d", $data1)+1, date("Y", $data1));
	
	$hoje = strtotime(date("Y-m-d"));
	$hoje = mktime(0, 0, 0, date("m", $hoje), date("d", $hoje)+1, date("Y", $hoje));
	
	$dias = $hoje - $data1;
	//echo "<p>datad: ".$dif;
	$dias = ($dias / 86400);

	return $dias;
}


function qtd_meses($data1, $data2){

// tem que estar no formato dia/mes/ano
//$data1 = "10/01/2000"; 
$arr = explode('/',$data1); 

//$data2 = "15/09/2006"; 
$arr2 = explode('/',$data2); 

$dia1 = $arr[0]; 
$mes1 = $arr[1]; 
$ano1 = $arr[2]; 

$dia2 = $arr2[0]; 
$mes2 = $arr2[1]; 
$ano2 = $arr2[2]; 

$a1 = ($ano2 - $ano1)*12;
$m1 = ($mes2 - $mes1)+1;
$m3 = ($m1 + $a1);
//echo "<br>total de meses=". $m3;
return $m3;

}



?>