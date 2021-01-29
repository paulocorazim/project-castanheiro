<?php
function moce($var1){

	switch ($var1){
		case "EX": 
			$xf = "Excelente";
			break;
	
		case "IN":
			$xf = "Insatisfatorio";
			break;
			
		case "MB":
			$xf = "Muito Bom";
			break;
	
		case "BO":
			$xf = "Bom";
			break;
	
		case "RE":
			$xf = "Regular";
			break;
	}
		return $xf;
}
?>


<?php
require "conecta_banco.php";

function verifica_debitos($var1){

//$f1 = "SELECT numero as numero, dtvenc as dtvenc, datediff(curdate(), disponivel) as dias FROM boletos WHERE codusuario = '".$var1."' AND datediff(curdate(), dtvenc) <'0' ";
$xdiahoje = date("Y/m/d");

$f1 = "SELECT numero, dtvenc FROM boletos WHERE codusuario = '".$var1."' AND boletos.dtvenc < curdate() AND boletos.pg != 'S' AND boletos.ativo = 'S' ";
$f2 = mysql_query($f1);
$f3 = mysql_num_rows($f2);

echo ($f3 > 0 ? "<a href='ecliente2.php?idcontrata=$var1' target='_blank'><img src='figuras/red.png' align='absmiddle'></a>" : "<a href='ecliente2.php?idcontrata=$var1' target='_blank'><img src='figuras/green.png' align='absmiddle'></a>" );
}
?>

