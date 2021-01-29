<title>BOLETOS</title>
<?php
require "php_fdatas.php";
require "php_fnumber.php";

include("../../man/head.php");
include("../../class/class.ScreenStartManager.php");
include("../../class/class.ScreenEndManager.php");
include("../../class/class.ScreenBillets.php"); // aqui importamos a tela
include("../../class/class.Functions.php");
include("../../class/class.DbConnection.php");
include('../../class/class.UserLinkModules.php');
include("../../class/class.DbManagerRecords.php");

$appFunctions = new appFunctions();
$appFunctions->validate_session();
$icone_fas_fa = $appFunctions->icone_fas_fan(1);

$conn = new DBconnect();
$dbInstance = $conn->connection();

$activeRecords = new DbManagerRecords();
$findClients = $activeRecords->list_properties_clients($dbInstance);

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

$idBillet = $_GET['idBillet'];

$printBillet = $activeRecords->select_billet($dbInstance, $idBillet);

foreach ($printBillet as $printBilletValue) 
{  
  $printBilletValue['id'];
  $printBilletValue['id_client'];
  $printBilletValue['cpf'];
  $printBilletValue['cnpj'];
  $printBilletValue['billet_value'];
  $printBilletValue['billet_value_old'];
  $printBilletValue['billet_due_date'];
  $printBilletValue['billet_due_date_old'];
  $printBilletValue['billet_send_mail_client'];
  $printBilletValue['billtet_expiration_days'];
  $printBilletValue['billet_rate'];
  $printBilletValue['name']; 
  $printBilletValue['corporate_name'];
  $printBilletValue['address'];
  $printBilletValue['number'];
  $printBilletValue['city'];
  $printBilletValue['state'];
  $printBilletValue['zip_code'];
  $printBilletValue['state'];
  $printBilletValue['neighbordhood'];
  ;
}

// #############################################################################################################################
// RECEBE O NUMERO DO BOLETO
// #############################################################################################################################

$nbol        				= $printBilletValue['id'];
$xvencimento 				= $printBilletValue['billet_due_date'];//data_usa( $_REQUEST['vencimento'] );


// #############################################################################################################################
// DADOS DO BOLETO
// #############################################################################################################################

$xnosso_numero           	= $nbol;
$xdatamov                	= date('Y/m/d');
$xdescricao              	= "Pagamento Referente a Locacao de Imovel.";
$xid_cliente             	= '1';
$xvalor_boleto           	= $printBilletValue['billet_value'];

// #############################################################################################################################
// protesto
// #############################################################################################################################

$xdiaspp                 = '0';

// #############################################################################################################################
// DESCONTO
// #############################################################################################################################


// 0 sem desconto
// 1 em reais
// 2 percentual

$xtipo_desconto        = '1';  // trazer do DB...
$xvalor_desconto 	   = '10.00';
$xvalor_desconto_final = 0;

if( $xtipo_desconto == '0' )
{    
	$xvalor_desconto_final     = '0';
}
elseif( $xtipo_desconto == '1' )
{
	$xvalor_desconto_final     = '500';  // R$ 5,00 
}
elseif( $xtipo_desconto == '2' )
{
	$xvalor_desconto_final     = '600';  // 600 => 6,00%
}

// #############################################################################################################################
// MULTA
// #############################################################################################################################

$xtipo_multa           = '2';
$xvalor_multa    		= '2.00';   // 2,00% trazer do DB.... 
$xvalor_multa_final = 0;

if( $xtipo_multa == '0' )
{
	$xvalor_multa_final        = '0';  // sem multa
}
elseif( $xtipo_multa == '1' )
{
	$xvalor_multa_final       = $xvalor_multa; // '2000'; // 2000 => R$ 20,00 (multa em reais)

}elseif( $xtipo_multa == '2' )
{

	//$xvalor_multa_final       = round( ( ( $xvalor_boleto * $xvalor_multa ) / 100 ),2);
	$xvalor_multa_final = '300';
}

	$xvalor_multa       = $xvalor_multa_final;

// #############################################################################################################################
// JUROS
// #############################################################################################################################

//1 juros em reais
//2 juros em percentual
//3 sem juros

$xtipo_juros           = '2';
$xvalor_juros 		   = '1.00';  // juros ao mes
$xvalor_juros_final = 0;

if( $xtipo_juros == '3' || $xtipo_juros == '0' )
{
	$xvalor_juros_final = '0';
}
elseif( $xtipo_juros == '1' )
{
	$xvalor_juros_final   = $xvalor_juros;
}
elseif( $xtipo_juros == '2' )
{
	$xvalor_juros_final = '033';  // round( ( ( $xvalor_boleto * ( $xvalor_juros / 30 ) ) / 100 ) ,2);
}

$xvalor_juros = $xvalor_juros_final;  // juros ao dia

// #############################################################################################################################
// CONFIGURACAO
// #############################################################################################################################

$xidentificacao   		= 'CASTANHEIRO PATRIMONIAL EIRELI';
$xendereco        		= 'Rua Bandeira Paulista, 716';
$xcidade          		= 'SAO PAULO';
$xuf              		= 'SP';
$xcidade_uf       		= 'SAO PAULO/SP';
$xcpf_cnpj        		= '61519666000145';
$xsite            		= "www.grupocastanheiro.com.br";
$xemail           		= "locacao@grupocastanheiro.com.br";

$xfone            		= "";
$xfantasia        		= "CASTANHEIRO PATRIMONIAL";

$xagencia         	= '3986';           //$_REQUEST['agencia'];
$xconta           	= '013000482';      //$_REQUEST['conta'];
$xconta_dv        	= '2';
$xconta_cedente   	= '4079213';        //$_REQUEST['cedente'];
$xcarteira       	 	= '101';            //$_REQUEST['carteira'];


// #############################################################################################################################
// DADOS DO BOLETO PARA O SEU CLIENTE
// #############################################################################################################################

$dias_de_prazo_para_pagamento = 0;
$taxa_boleto = 0; 

$data_venc = $xvencimento;
$data_venc = substr($xvencimento,8,2)."/".substr($xvencimento,5,2)."/".substr($xvencimento,0,4);

$data_documento = $xdatamov;
$data_documento = substr($xdatamov,8,2)."/".substr($xdatamov,5,2)."/".substr($xdatamov,0,4);

$data_processamento = $data_documento;

$xquem = $xid_cliente;

$xdescricao = $xdescricao;

// #############################################################################################################################
// PAGADOR
// #############################################################################################################################

#$obj_cliente  = new Clientes( $xid_cliente );


if(!$printBilletValue['cpf']){
	
	$xcodigo_do_contratante = $printBilletValue['cnpj'];
}else{
	$xcodigo_do_contratante = $printBilletValue['cpf'];
}


$xsacado                	= $printBilletValue['name'];
$xenderecocan           	= "$printBilletValue[address], $printBilletValue[number]";
$xbairrocan             	= $printBilletValue['neighbordhood'];
$xcidadecan             	= $printBilletValue['city'];
$xufcan                 	= $printBilletValue['state'];
$xcepcan                	= $printBilletValue['zip_code'];

// #############################################################################################################################
// pesquisa para localizar quem � a empresa que est� oferecendo as vagas
// #############################################################################################################################

$xnemp = 'VELAS SANTO ANTONIO S/A';

// #############################################################################################################################
// DADOS DO BOLETO PARA O SEU CLIENTE
// #############################################################################################################################

$valor_cobrado = $xvalor_boleto;
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto  = number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

// #############################################################################################################################
// Composi��o Nosso Numero - CEF SIGCB
// #############################################################################################################################

$dadosboleto["nosso_numero"]                    = $xnosso_numero;        // Nosso numero sem o DV - REGRA: M�ximo de 7 caracteres!
$dadosboleto["numero_documento"]                = $xnosso_numero;        // Num do pedido ou nosso numero
$dadosboleto["data_vencimento"]                 = data_br( $xvencimento ); // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"]                  = $data_documento;       // Data de emiss�o do Boleto
$dadosboleto["data_processamento"]              = $data_processamento;   // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"]                    = $valor_boleto;         // Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

$xnossonumero = $xnosso_numero;
$dadosboleto["nosso_numero"]                    = str_pad($xnossonumero,7,"0",STR_PAD_LEFT); //"000000019"; // tamanho 9

// #############################################################################################################################
// DADOS DO SEU CLIENTE
// #############################################################################################################################

$dadosboleto["sacado"]                           = $xsacado." - ".$xcodigo_do_contratante;
$dadosboleto["endereco1"]                        = $xenderecocan." - ".$xbairrocan;
$dadosboleto["endereco2"]                        = $xcidadecan." - ".$xufcan.", CEP: ".$xcepcan;

// #############################################################################################################################
// $dadosboleto["demonstrativo1"] = "Taxa de Matricula Online";
// #############################################################################################################################

$dadosboleto["demonstrativo1"]       = $xdescricao;   //"Taxa de Matricula Online";
$dadosboleto["demonstrativo2"]       = $xfantasia;
$dadosboleto["demonstrativo3"]       = $xsite;

$xlinha1 = "Atenção!!<hr>";
$xlinha2 = "Não pagar após 30 (trinta) dias do vencimento<br>Após o vencimento entrar em contato locacao@grupocastanheiro.com.br";
$xlinha3 = "";
#$xlinha4 = "Após o vencimento, cobrar juros diários de R$ ".php_fnumber($xvalor_juros);
$xlinha3 = '';
$xlinha4 = '';

$dadosboleto["instrucoes1"] = $xlinha1;
$dadosboleto["instrucoes2"] = $xlinha2;
$dadosboleto["instrucoes3"] = $xlinha3;
$dadosboleto["instrucoes4"] = $xlinha4;

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
/*
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";
*/

$dadosboleto["quantidade"]      = "001";
$dadosboleto["valor_unitario"] 	= $valor_boleto;
$dadosboleto["aceite"]          = "";		
$dadosboleto["especie"]        	= "Real";
$dadosboleto["especie_doc"]    	= "DM";


// #############################################################################################################################
// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
// #############################################################################################################################

$dadosboleto["codigo_cliente"]         	= $xconta_cedente;                // "0707077"; // Código do Cliente (PSK) (Somente 7 digitos)
$dadosboleto["ponto_venda"]            	= $xagencia;                      // "1333";   // Ponto de Venda = Agencia
$dadosboleto["carteira"]               	= $xcarteira;                    // "102";    // Cobrança Simples - SEM Registro
$dadosboleto["carteira_descricao"]     = "ELETR C/REG";                  // "COBRANÇA SIMPLES - CSR";  // Descriçãoo da Carteira

// #############################################################################################################################
// DADOS DA SUA CONTA - CEF
// #############################################################################################################################

/*
$dadosboleto["agencia"] = "1234";   // Num da agencia, sem digito
$dadosboleto["conta"] = "123";   	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "0"; 	// Digito do Num da conta
*/

$dadosboleto["identificacao"]          = $xidentificacao;
$dadosboleto["cpf_cnpj"]               = $xcpf_cnpj;
$dadosboleto["endereco"]               = $xendereco;
$dadosboleto["cidade_uf"]              = $xcidade."/".$xuf;
$dadosboleto["cedente"]                = $xidentificacao;

/*

$dadosboleto["agencia"]       = $xagencia;    // Num da agencia, sem digito
$dadosboleto["conta"]         = $xconta; 	    // Num da conta, sem digito
$dadosboleto["conta_dv"]      = $xconta_dv; 	// Digito do Num da conta
$dadosboleto["conta_cedente"] = $xconta_cedente; // ContaCedente do Cliente, sem digito (Somente N�meros)
$dadosboleto["carteira"]      = $xcarteira;  // C�digo da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

$dadosboleto["identificacao"] = $xidentificacao;
$dadosboleto["cpf_cnpj"]      = $xcpf_cnpj;
$dadosboleto["endereco"]      = $xendereco;
$dadosboleto["cidade_uf"]     = $xcidade_uf;
$dadosboleto["cedente"]       = $xidentificacao;
$dadosboleto["fantasia"]      = $xfantasia;

*/

// #############################################################################################################################
// NÃO ALTERAR!
// #############################################################################################################################

include("include/funcoes_santander_banespa.php"); 
include("include/layout_santander_banespa.php");
?>