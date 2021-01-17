<?php
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

$dias_de_prazo_para_pagamento       = 0;
$taxa_boleto                        = 2.95;

$data_emissao                       = date("d/m/Y"); // ou a data de emissao da sua tabela de boletos se houver

$data_venc                          = $dados['billet_due_date']; // coloca aqui o nome do campo de vencimento..
$valor_cobrado                      = $dados['billet_valor'];

$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"]        = $dados['billet_id'];  // Nosso numero - REGRA: Máximo de 7 caracteres!

$dadosboleto["numero_documento"]    = $dadosboleto["nosso_numero"];

$dadosboleto["data_vencimento"]     = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"]      = $data_emissao; // Data de emissão do Boleto
$dadosboleto["data_processamento"]  = $data_emissao; // Data de processamento do boleto (opcional)

$dadosboleto["valor_boleto"]        = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"]              = "Nome do seu Cliente";
$dadosboleto["endereco1"]           = "Endereço do seu Cliente";
$dadosboleto["endereco2"]           = "Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"]      = "Pagamento de Compra na Loja Nonononono";
$dadosboleto["demonstrativo2"]      = "Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"]      = "BoletoPhp - http://www.boletophp.com.br";
$dadosboleto["instrucoes1"]         = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"]         = "- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"]         = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"]         = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"]          = "";
$dadosboleto["valor_unitario"]      = "";
$dadosboleto["aceite"]              = "";		// se nao arrumar eu nao como e nem durmo mais hoje...
$dadosboleto["especie"]             = "R$";
$dadosboleto["especie_doc"]         = "";
// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

// DADOS PERSONALIZADOS - Banespa
$dadosboleto["codigo_cedente"]      = "40013012168"; // Código do cedente (Somente 11 digitos)
$dadosboleto["ponto_venda"]         = "400"; // Ponto de Venda = Agencia 
$dadosboleto["carteira"]            = "COB";  // COB - SEM Registro
$dadosboleto["nome_da_agencia"]     = "ACLIMAÇÃO";  // Nome da agencia (Opcional)
// SEUS DADOS
$dadosboleto["identificacao"]       = "BoletoPhp - Código Aberto de Sistema de Boletos";
$dadosboleto["cpf_cnpj"]            = "";
$dadosboleto["endereco"]            = "Coloque o endereço da sua empresa aqui";
$dadosboleto["cidade_uf"]           = "Cidade / Estado";
$dadosboleto["cedente"]             = "Coloque a Razão Social da sua empresa aqui";

// NÃO ALTERAR!
include("include/funcoes_banespa.php"); 
include("include/layout_banespa.php");
?>