<?php
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
$carteira                    = "102";   									// carteira
$inscricao_beneficiario      = "61519666000145"; 							// cnpj                          
$agencia                     = "3986";                                     	// agencia
$dv_agencia                  = "0";                                        	// digito verificador da agencia
$conta                       = "13000482";                                     	// conta corrente
$dv_conta                    = "2";                                        	// digito verificador da conta corrente
$dv_ag_conta                 = "2";                                        	// digito agencia/conta, pode usar o mesmo da conta
$empresa_beneficiario        = "CASTANHEIRO PATRIMONIAL EIRELI"; 			// nome da empresa beneficiario                      
$codigo_transmissao          = "12345";                                    	// codigo da transmissao
$conta_cobranca              = "13000482";                                	// CONTA COBRANCA -> geralmente é o mesmo número de conta corrente (consultar na sua agencia )
$dv_conta_cobranca           = "2";                                       	// digito verificador da conta cobranca 
$tipo_documento              = "1";                                        	// 1=tradicional / 2=escritural ( consultar na sua agencia )
$agencia_cobranca            = "0";                                        	// Normalmente é zero, mas é bom ( consultar na sua agencia ) quem eh a agencia encarregada da cobrança
$versao_layout               = '030';										// versao do layout
$versao_layout_arquivo       = '040';										// versao do layout do arquivo
$tipo_cobranca               = '5';											// tipo de cobranca
$forma_cadastramento         = '1';											// forma de cadastramento
######################################################################################################################################################
# PODE ALTERAR - dados do 1º boleto
######################################################################################################################################################

$nosso_num[0]                = "1";                                      
$data_vencimento_boleto[0]   = "05072018";                               
$data_emissao_boleto[0]      = date("dmY");                     
$valor_boleto[0]             = "23600";                               

// juros
$tipo_juros[0]               = "3";
$data_juros[0]               = "00000000";                               
$valor_juros[0]              = "0000";                                   

// multa
$tipo_multa[0]               = "3";
$valor_multa[0]              = "0000";
$data_multa[0]               = "00000000";                                   

// desconto
$tipo_desconto[0]            = "0";
$data_desconto[0]            = "00000000";                               
$valor_desconto[0]           = "0000";                                   

$valor_iof[0]                = "000";                                    
$valor_abatimento[0]         = "000";  

// protesto 
$cod_protesto[0]             = '0';                                        
$dias_protesto[0]            = '0';                                        

// baixa
$cod_baixa[0]                = '1';                                        
$dias_baixa[0]               = '90';                                                                        

$tipo_inscricao_pagador[0]   = "1";                                      
$numero_inscricao_pagador[0] = "40329543765";                            
$nome_pagador[0]             = "JOSE MELO REGO";                         
$endereco_pagador[0]         = "AV ALFA QUADRA 15 CASA 29";              
$bairro_pagador[0]           = "PARQUE ATHENAS";                         
$cep_pagador[0]              = "65073";                                  
$cep_pagador_sufixo[0]       = "300";                                    
$cidade_pagador[0]           = "SAO LUIS";                               
$estado_pagador[0]           = "MA";                                     
######################################################################################################################################################
# PODE ALTERAR - dados do 2º boleto
######################################################################################################################################################
$nosso_num[1]                = "0203799";                                
$data_vencimento_boleto[1]   = "10072018";                               
$data_emissao_boleto[1]      = date("dmY");                               
$valor_boleto[1]             = "23400"; 

// juros
$tipo_juros[1]               = "3";
$data_juros[1]               = "00000000";                               
$valor_juros[1]              = "0000";                                   

// multa
$tipo_multa[1]               = "0";
$valor_multa[1]              = "0000";
$data_multa[1]               = "00000000";                                   

// desconto
$tipo_desconto[1]            = "0";
$data_desconto[1]            = "00000000";                               
$valor_desconto[1]           = "0000";                                   

$valor_iof[1]                = "000";                                   
$valor_abatimento[1]         = "000"; 

// protesto
$cod_protesto[1]             = '0';                                        
$dias_protesto[1]            = '0';                                        

// baixa
$cod_baixa[1]                = '1';                                        
$dias_baixa[1]               = '90';                                                                   

$tipo_inscricao_pagador[1]   = "1";                                      
$numero_inscricao_pagador[1] = "40329543766";                           
$nome_pagador[1]             = "ANTONIO DA PA VIRADA";                   
$endereco_pagador[1]         = "RUA SOUSA LIMA 36";                      
$bairro_pagador[1]           = "PLANALTO DA PIPIRA";                     
$cep_pagador[1]              = "65073";                                 
$cep_pagador_sufixo[1]       = "300";                                   
$cidade_pagador[1]           = "SAO LUIS";                              
$estado_pagador[1]           = "MA";                                    
######################################################################################################################################################
# PODE ALTERAR - dados do 3º boleto
######################################################################################################################################################
$nosso_num[2]                = "020380";                                 
$data_vencimento_boleto[2]   = "15072018";                               
$data_emissao_boleto[2]      = date("dmY");                        
$valor_boleto[2]             = "23700";   

// juros
$tipo_juros[2]               = "3";
$data_juros[2]               = "00000000";                               
$valor_juros[2]              = "0000";                                   

// multa
$tipo_multa[2]               = "0";
$valor_multa[2]              = "0000";
$data_multa[2]               = "00000000";                                   

// desconto
$tipo_desconto[2]            = "0";
$data_desconto[2]            = "00000000";                               
$valor_desconto[2]           = "0000";                                                                  

$valor_iof[2]                = "000";                                   
$valor_abatimento[2]         = "000"; 

// protesto
$cod_protesto[2]             = '0';                                        
$dias_protesto[2]            = '0';                                        

// baixa
$cod_baixa[2]                = '1';                                        
$dias_baixa[2]               = '90';                                                                       

$tipo_inscricao_pagador[2]   = "1";                                      
$numero_inscricao_pagador[2] = "40329543766";                            
$nome_pagador[2]             = "ASTROGILDA NEVES DA COSTA REIS";         
$endereco_pagador[2]         = "RUA DAS MANGABEIRAS, 987";               
$bairro_pagador[2]           = "RECANTO DOS NOBRES";                     
$cep_pagador[2]              = "65073";                                  
$cep_pagador_sufixo[2]       = "300";                                    
$cidade_pagador[2]           = "SAO LUIS";                               
$estado_pagador[2]           = "MA";                                     
######################################################################################################################################################
# NAO PODE ALTERAR
######################################################################################################################################################
$num_banco       = "033";                                      	
$nome_banco      = "BANCO SANTANDER";                          
$arq             = $inscricao_beneficiario."_".date("d").date("m")."AB";     
$extensao        = "REM";                                      
$arquivo         = $arq.".".$extensao;   
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
$xnumero_seq     = 1;  
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

$qtd_boletos = count( $nosso_num );      // quantidade de boletos a serem incluidos no arquivo de remessa 

for( $t = 0; $t < $qtd_boletos; $t++ )
{

	$numero_documento  = $nosso_num[$t];                 
    $Dv                = modulo_11( $nosso_num[$t] );    
	$nosso_numero      = picture_9( $nosso_num[$t], 12 ).$Dv;             

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
	$linha_p .= picture_x($numero_documento,15);          
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
	$linha_s .= picture_x('MENSAGEM 04',40);             
	$linha_s .=	picture_x('MENSAGEM 05',40);             
	$linha_s .= complementoRegistro(22,"brancos");       
	$linha_s .= chr(13).chr(10);                         
	
	$lote_sequencial++;
	
	$num_seg_linha_p_q_r_s++;
	
	$conteudo_meio .= $linha_p.$linha_q.$linha_r.$linha_s;
	
	$linha_p = "";
	$linha_q = "";
	$linha_r = "";
	$linha_s = "";

} 

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
	erro("<br>Não foi possível abrir o arquivo ($filename)");
}
if (fwrite($handle, "$conteudo") === FALSE)
{
	echo "<br>Não foi possível escrever no arquivo ($filename)";
}
fclose($handle);

$xdestino = $pasta_destino.$filename;
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