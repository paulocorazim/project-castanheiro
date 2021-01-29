<?php

// ini_set('memory_limit', '256M');
// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL);

// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Banespa : Fabio Gabbay                  		  |
// +----------------------------------------------------------------------+
// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//
// DADOS DO BOLETO PARA O SEU CLIENTE
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


$dias_de_prazo_para_pagamento       = 0;
$taxa_boleto                        = 0;

$data_emissao                       = date("d/m/Y"); // ou a data de emissao da sua tabela de boletos se houver

$data_venc                          = $printBilletValue['vencimento_original']; // coloca aqui o nome do campo de vencimento..
$valor_cobrado                      = $printBilletValue['billet_value'];

$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"]        = $printBilletValue['id'];  // Nosso numero - REGRA: Máximo de 7 caracteres!

$dadosboleto["numero_documento"]    = $dadosboleto["nosso_numero"]; //$printBilletValue['id'].date('dmY');

$dadosboleto["data_vencimento"]     = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"]      = $data_emissao; // Data de emissão do Boleto
$dadosboleto["data_processamento"]  = $data_emissao; // Data de processamento do boleto (opcional)

$dadosboleto["valor_boleto"]        = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"]              = $printBilletValue['name'];
$dadosboleto["endereco1"]           = "$printBilletValue[address], $printBilletValue[number]";
$dadosboleto["endereco2"]           = "$printBilletValue[city] - $printBilletValue[state] - CEP: $printBilletValue[zip_code]"; //  "Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"]      = "Pagamento Referente a Locação de Imóvel.";
$dadosboleto["demonstrativo2"]      = "Imóvel: Rua Onze deJunho, 15 <br> Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"]      = "App GrupoCastanheiro http://app.grupocastanheiro.com.br/segundavia/";
$dadosboleto["instrucoes1"]         = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"]         = "- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"]         = "- Em caso de dúvidas entre em contato conosco: locacapo@grupocastanheiro.com.br";
$dadosboleto["instrucoes4"]         = "";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"]          = "";
$dadosboleto["valor_unitario"]      = "";
$dadosboleto["aceite"]              = "";		
$dadosboleto["especie"]             = "R$";
$dadosboleto["especie_doc"]         = "";
// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

// DADOS PERSONALIZADOS - Banespa
$dadosboleto["codigo_cedente"]      = "61519666000"; // Código do cedente (Somente 11 digitos)
$dadosboleto["ponto_venda"]         = "3313";//"3986"; // Ponto de Venda = Agencia 
$dadosboleto["carteira"]            = "101"; //"102";  // COB - SEM Registro
$dadosboleto["nome_da_agencia"]     = "";  // Nome da agencia (Opcional)
// SEUS DADOS
$dadosboleto["identificacao"]       = "GRUPO CASTANHEIRO";
$dadosboleto["cpf_cnpj"]            = "61.519.666/0001-45";
$dadosboleto["endereco"]            = "Rua Bandeira Paulista, 716";
$dadosboleto["cidade_uf"]           = "São Paulo / SP";
$dadosboleto["cedente"]             = "CASTANHEIRO PATRIMONIAL EIRELI";

// NÃO ALTERAR!
include("include/funcoes_banespa.php"); 
include("include/layout_banespa.php");
?>