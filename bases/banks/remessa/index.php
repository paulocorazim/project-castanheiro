<?php

// ini_set('memory_limit', '256M');
// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL);

######################################################################################################################################################
# AUTOR..........: ALEXANDRE GUIMARÃES SARMENTO
# CIDADE/UF......: SAO LUIS / MA
# E-MAIL / FONE..: alexandre890@yahoo.com.br / +55 (98) 99212-5970 (vivo/whatsapp)
# VERSAO.........: 02/04/2020
######################################################################################################################################################
require "funcoes-remessa-santander-240.php";
######################################################################################################################################################
# PODE ALTERAR
######################################################################################################################################################
$pasta_destino               = "remessa/";                                 	// diretorio onde ficarao os arquivos de remessa .REM
$carteira                    = "101";   									// carteira
$inscricao_beneficiario      = "61519666000145"; 							// cnpj                          
$agencia                     = "3986";                                     	// agencia
$dv_agencia                  = "0";                                        	// digito verificador da agencia
$conta                       = "013000482";                                  // conta corrente
$dv_conta                    = "2";                                        	// digito verificador da conta corrente
$dv_ag_conta                 = "0";                                        	// digito agencia/conta, pode usar o mesmo da conta
$empresa_beneficiario        = "CASTANHEIRO PATRIMONIAL EIRELI"; 			// nome da empresa beneficiario                      
$codigo_transmissao          = "398600004079213";                           // codigo da transmissao
$conta_cobranca              = "013000482";                                	// CONTA COBRANCA -> geralmente é o mesmo número de conta corrente (consultar na sua agencia )
$dv_conta_cobranca           = "0";                                       	// digito verificador da conta cobranca 
$tipo_documento              = "1";                                        	// 1=tradicional / 2=escritural ( consultar na sua agencia )
$agencia_cobranca            = "0";                                        	// Normalmente é zero, mas é bom ( consultar na sua agencia ) quem eh a agencia encarregada da cobrança
$versao_layout               = '030';										// versao do layout
$versao_layout_arquivo       = '040';										// versao do layout do arquivo
$tipo_cobranca               = '5';											// tipo de cobranca
$forma_cadastramento         = '1';											// forma de cadastramento
######################################################################################################################################################
# PODE ALTERAR - dados do 1º boleto
######################################################################################################################################################

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
  $printBilletValue['billet_value'];
  $printBilletValue['billet_value_old'];
  $printBilletValue['vencimento_original'];
  $printBilletValue['vencimento_prorrogado'];
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
}


######################################################################################################################################################
# NAO PODE ALTERAR
######################################################################################################################################################
$num_banco       = "033";                                      	
$nome_banco      = "BANCO SANTANDER";                          
$arq             = $inscricao_beneficiario."_".date("d").date("m")."AB";     
$extensao        = "REM";                                      
$arquivo         = $arq . "-" . date("U") . "." . $extensao;   
$filename        = $arquivo;             
$conteudo        = '';
$lote_sequencial = 1;
$lote_servico    = 1;      
$header          = '';
$header_lote     = '';
$linha_p         = '';
$linha_q         = '';
$linha_r         = '';
$linha_s         = '';
$linha_5         = '';     
$linha_9         = '';
$conteudo_meio   = '';
$qtd_titulos     = 0; 
$total_valor     = 0; 
$num_seg_linha_p_q_r_s = 1;
$xnumero_seq     = 1;  //Incrementar a cada nova remessa (DB)
$numero_sequencial_arquivo = $xnumero_seq;
$header .= picture_9($num_banco,3);                     
$header .= complementoRegistro(4,"zeros");              
$header .= complementoRegistro(1,"zeros");              
$header .= complementoRegistro(8,"brancos");            
$header .= '2';                                         
$header .= picture_9($inscricao_beneficiario,15);                     
$header .= picture_9($codigo_transmissao,15);           
$header .= complementoRegistro(25,"brancos");           
$header .= picture_x($empresa_beneficiario,30);         
$header .= picture_x($nome_banco,30);                   
$header .= complementoRegistro(10,"brancos");           
$header .= '1';                                         
$header .= date("dmY"); 
$header .= complementoRegistro(6,"brancos");            
$header .= picture_9($numero_sequencial_arquivo,6);     
$header .= picture_9($versao_layout_arquivo,3);         
$header .= complementoRegistro(74,"brancos");           
$header .= chr(13).chr(10);                             

$header_lote .= picture_9($num_banco,3);                     
$header_lote .= picture_9($lote_servico,4);                  
$header_lote .= '1';                                          
$header_lote .= 'R';                                          
$header_lote .= '01';                                         
$header_lote .= complementoRegistro(2,"brancos");            
$header_lote .= picture_9($versao_layout,3);                                                       
$header_lote .= complementoRegistro(1,"brancos");            
$header_lote .= '2';                                        
$header_lote .= picture_9($inscricao_beneficiario,15);       
$header_lote .= complementoRegistro(20,"brancos");          
$header_lote .= picture_9($codigo_transmissao,15);           
$header_lote .= complementoRegistro(5,"brancos");            
$header_lote .= picture_x($empresa_beneficiario,30);         
$header_lote .= complementoRegistro(40,"brancos");           
$header_lote .= complementoRegistro(40,"brancos");           
$header_lote .= picture_9($numero_sequencial_arquivo,8);     
$header_lote .= date("dmY"); 
$header_lote .= complementoRegistro(41,"brancos");           
$header_lote .= chr(13).chr(10); 


//select * from boleto where mes vencimento = 1 anddd ano vencimento = 2021 e remetido != "S"....

$qtd_boletos = 1;  //count( $nosso_num );      // quantidade de boletos a serem incluidos no arquivo de remessa 

for( $t = 0; $t < $qtd_boletos; $t++ )
{
	$nosso_num[$t]                = '5381';//$printBilletValue['id'];                                      
	$data_vencimento_boleto[$t]   = '10102019'; //$printBilletValue['vencimento_original'];                               
	$data_emissao_boleto[$t]      = date("dmY");
	
	$valor_cobrado               = '29000'; //$printBilletValue['billet_value'];
	//$valor_cobrado 				 = str_replace(",", ".",$valor_cobrado);
	//$valor_boleto[$t]             = number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
	//$valor_boleto[$t]             = "23600";                               
	
	// juros
	$tipo_juros[$t]               = "3";
	$data_juros[$t]               = "00000000";                               
	$valor_juros[$t]              = "0000";                                   
	
	// multa
	$tipo_multa[$t]               = "0";
	$valor_multa[$t]              = "0000";
	$data_multa[$t]               = "00000000";                                   
	
	// desconto
	$tipo_desconto[$t]            = "0";
	$data_desconto[$t]            = "00000000";                               
	$valor_desconto[$t]           = "0000";                                   
	
	$valor_iof[$t]                = "000";                                    
	$valor_abatimento[$t]         = "000";  
	
	// protesto 
	$cod_protesto[$t]             = '0';                                        
	$dias_protesto[$t]            = '0';                                        
	
	// baixa
	$cod_baixa[$t]                = '1';                                        
	$dias_baixa[$t]               = '90';                                                                        
	
	$tipo_inscricao_pagador[$t]   = "1";                                      
	$numero_inscricao_pagador[$t] = "16682545819";                            
	$nome_pagador[$t]             = substr(remover_acentos("ANDRE CORAZIM"),0,40);                         
	$endereco_pagador[$t]         = substr(remover_acentos("RUA ONZE DE JUNHO 15"),0,40);              
	$bairro_pagador[$t]           = substr(remover_acentos("JARDIM CANHEMA"),0,15);                         
	$cep_pagador[$t]              = "09941";                                  
	$cep_pagador_sufixo[$t]       = "630";                                    
	$cidade_pagador[$t]           = remover_acentos("DIADEMA");                               
	$estado_pagador[$t]           = "SP";                                     



	$numero_documento[$t]  		= $nosso_num[$t];                 
	  
	$Dv                = modulo_11( $nosso_num[$t] );    
	$nosso_numero      = picture_9( $nosso_num[$t], 12 ) . $Dv;             

	$linha_p .= picture_9($num_banco,3);                  
	$linha_p .= picture_9($lote_servico,4);               
	$linha_p .= '3';                                      
	$linha_p .= picture_9($num_seg_linha_p_q_r_s,5);      
	$linha_p .= 'P';                                      
	$linha_p .= complementoRegistro(1,"brancos");         
	$linha_p .= picture_9('01',2);                        
	$linha_p .= picture_9($agencia,4);                    
	$linha_p .= picture_9($dv_agencia,1);                 
	$linha_p .= picture_9($conta,9);                      
	$linha_p .= picture_9($dv_conta,1);                   
	$linha_p .= picture_9($conta_cobranca,9);             
	$linha_p .= picture_9($dv_conta_cobranca,1);          
	$linha_p .= complementoRegistro(2,"brancos");        
	$linha_p .= picture_9($nosso_numero,13);             
	$linha_p .= picture_9($tipo_cobranca,1);              
	$linha_p .= picture_9($forma_cadastramento,1); 
	$linha_p .= picture_9($tipo_documento,1);             
	$linha_p .= complementoRegistro(1,"brancos");        
	$linha_p .= complementoRegistro(1,"brancos");         
	$linha_p .= picture_x($numero_documento[$t],15);          
	$linha_p .= picture_9($data_vencimento_boleto[$t],8); 
	$linha_p .= picture_9($valor_boleto[$t],15);          
	$linha_p .= picture_9($agencia_cobranca,4);           
	$linha_p .= picture_9($dv_agencia,1);                 
	$linha_p .= complementoRegistro(1,"brancos");         
	$linha_p .= '02';                                     
	$linha_p .= 'N';                                      
	$linha_p .= picture_9($data_emissao_boleto[$t],8);   
	$linha_p .= picture_9($tipo_juros[$t],1);   
	$linha_p .= picture_9($data_juros[$t],8);             
	$linha_p .= picture_9($valor_juros[$t],15);          
	$linha_p .= picture_9($tipo_desconto[$t],1);      
	$linha_p .= picture_9($data_desconto[$t],8);      
	$linha_p .= picture_9($valor_desconto[$t],15);    
	$linha_p .= picture_9($valor_iof[$t],15);             
	$linha_p .= picture_9($valor_abatimento[$t],15);      
	$linha_p .= picture_x($numero_documento[$t],25);      
	$linha_p .= picture_9($cod_protesto[$t],1);              
	$linha_p .= picture_9($dias_protesto[$t],2);             
	$linha_p .= picture_9($cod_baixa[$t],1);                  
	$linha_p .= '0';                                      
	$linha_p .= picture_9($dias_baixa[$t],2);                
	$linha_p .= '00';                                    
	$linha_p .= complementoRegistro(11,"brancos");        
	$linha_p .= chr(13).chr(10);   



	$num_seg_linha_p_q_r_s++;
	$qtd_titulos++;
	$total_valor+=$valor_boleto[$t];
	
	$linha_q .= picture_9($num_banco,3);                     
	$linha_q .= picture_9($lote_servico,4);                 
	$linha_q .= '3';                                         
	$linha_q .= picture_9($num_seg_linha_p_q_r_s,5);         
	$linha_q .= 'Q';                                         
	$linha_q .= complementoRegistro(1,"brancos");            
	$linha_q .= picture_9('01',2);                           
	$linha_q .= $tipo_inscricao_pagador[$t];                 
	$linha_q .= picture_9($numero_inscricao_pagador[$t],15); 
	$linha_q .= picture_x(remover_acentos($nome_pagador[$t]),40);             
	$linha_q .= picture_x(remover_acentos($endereco_pagador[$t]),40);         
	$linha_q .= picture_x(remover_acentos($bairro_pagador[$t]),15);           
	$linha_q .= picture_9($cep_pagador[$t],5);               
	$linha_q .= picture_9($cep_pagador_sufixo[$t],3);        
	$linha_q .= picture_x(remover_acentos($cidade_pagador[$t]),15);           
	$linha_q .= picture_x($estado_pagador[$t],2);            
	$linha_q .= '0';                                         
	$linha_q .= complementoRegistro(15,"zeros");             
	$linha_q .= complementoRegistro(40,"brancos");           
	$linha_q .= '000';                                       
	$linha_q .= '000';                                       
	$linha_q .= '000';                                       
	$linha_q .= '000';                                       
	$linha_q .= complementoRegistro(19,"brancos");           
	
	$tam_linha_q  = strlen($linha_q);
	$zeros_rest_2 = 240 - $tam_linha_q;
	$linha_q      = $linha_q.complementoRegistro($zeros_rest_2,"zeros");
	$linha_q .= chr(13).chr(10);                        
	
	$num_seg_linha_p_q_r_s++;
	
	$linha_r .= picture_9($num_banco,3);                 
	$linha_r .= picture_9($lote_servico,4);              
	$linha_r .= '3';                                     
	$linha_r .= picture_9($num_seg_linha_p_q_r_s,5);     
	$linha_r .= 'R';                                     
	$linha_r .= complementoRegistro(1,"brancos");        
	$linha_r .= picture_9('01',2);                       
	$linha_r .= '0';                                     
	$linha_r .= picture_9('0',8);                        
	$linha_r .=	picture_9('0',15);                       
	$linha_r .= complementoRegistro(24,"brancos");       
	$linha_r .= picture_9($tipo_multa[$t],1);               
	$linha_r .= picture_9($data_multa[$t],8);           
	$linha_r .=	picture_9($valor_multa[$t],15);         
	$linha_r .= complementoRegistro(10,"brancos");      
	$linha_r .= complementoRegistro(40,"brancos");      
	$linha_r .= complementoRegistro(40,"brancos");      
	$linha_r .= complementoRegistro(61,"brancos");      
	$linha_r .= chr(13).chr(10);                         
	
	$lote_sequencial++;
	$num_seg_linha_p_q_r_s++;
	
	$linha_s .= picture_9($num_banco,3);                 
	$linha_s .= picture_9($lote_servico,4);             
	$linha_s .= '3';                                     
	$linha_s .= picture_9($num_seg_linha_p_q_r_s,5);     
	$linha_s .= 'S';                                     
	$linha_s .= complementoRegistro(1,"brancos");        
	$linha_s .= picture_9('01',2);                       
	$linha_s .= '2';                                     
	$linha_s .= picture_x('MENSAGEM 01',40);             
	$linha_s .=	picture_x('MENSAGEM 02',40);             
	$linha_s .= picture_x('MENSAGEM 03',40);             
	$linha_s .= complementoRegistro(40,"brancos");             
	$linha_s .=	complementoRegistro(40,"brancos");
	$linha_s .= complementoRegistro(22,"brancos");       
	$linha_s .= chr(13).chr(10);                         
	
	$lote_sequencial++;
	
	$num_seg_linha_p_q_r_s++;
	
	$conteudo_meio .= $linha_p.$linha_q.$linha_r.$linha_s;
	
	$linha_p = "";
	$linha_q = "";
	$linha_r = "";
	$linha_s = "";

}  // final do for

$linha_5 .= picture_9($num_banco,3);                 
$linha_5 .= picture_9($lote_servico,4);              
$linha_5 .= '5';                                     
$linha_5 .= complementoRegistro(9,"brancos");       
$qtd_registros = ( $qtd_titulos *4 ) +2;
$linha_5 .= picture_9( $qtd_registros, 6 );          
$linha_5 .= complementoRegistro(217,"brancos");     
$linha_5 .= chr(13).chr(10);                         

$linha_9 .= picture_9( $num_banco, 3 );                 
$linha_9 .= '9999';                                     
$linha_9 .= '9';                                       
$linha_9 .= complementoRegistro( 9, "brancos" );        
$qtd_lotes_arquivo = $lote_servico;
$linha_9 .= picture_9( $qtd_lotes_arquivo, 6 );         
$qtd_reg_arq = ( $qtd_titulos * 4 ) + 4;                
$linha_9 .= picture_9( $qtd_reg_arq, 6 );               
$linha_9 .= complementoRegistro( 211, "brancos" );      
$linha_9 .= chr(13).chr(10);                         

$conteudo = $header.$header_lote.$conteudo_meio.$linha_5.$linha_9;  

if (!$handle = fopen($filename, 'w+'))
{
	echo "<br>Não foi possível abrir o arquivo ($filename)";
}
if (fwrite($handle, "$conteudo") === FALSE)
{
	echo "<br>Não foi possível escrever no arquivo ($filename)";
}
fclose($handle);

$xdestino = $pasta_destino . $filename;
$xorigem = $filename;

if( copy( $xorigem, $xdestino) )
{
	$arquivo = $filename;
?>
	<div align="center">
		<p><img src="figuras/logo-big.png"></p>
		<p><img src="figuras/ok2.png" width="16" height="16" border="0" align="absmiddle" />&nbsp;Arquivo de remessa gerado com sucesso!</p>
		<p>Download do Arquivo de Remessa: <a href="remessa/<?php echo $arquivo;?>" target="_blank" download ><?php echo "remessa/".$arquivo;?></a></p>
	</div>
<?php
}
else
{
?>
	<div align="center">
		<p><img src="figuras/logo-big.png"></p>
		<p><img src="figuras/erro1.png" width="16" height="16" border="0" align="absmiddle" />&nbsp;Erro! Houve uma falha na criação do arquivo de remessa.</p>
	</div>
<?php
}
?>