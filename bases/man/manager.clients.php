<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL);

use Bissolli\ValidadorCpfCnpj\Documento;

include "head.php";
include "../class/class.ScreenStartManager.php";
include "../class/class.ScreenEndManager.php";
include "../class/class.ScreenClients.php";
include "../class/class.Functions.php";
include "../class/class.DbConnection.php";
include '../class/class.UserLinkModules.php';
include "../class/class.DbManagerRecords.php";
include "../class/class.ScreenPropertie.php";

/* Carregando a classe de funcções*/
$appFunctions = new appFunctions();

/* Validando acesso ligado*/
$appFunctions->validate_session();

/* Carregando a classe de banco*/
$conn = new DBconnect();
$dbInstance = $conn->connection();

/*Definindo o icone de tela correspondente*/
$icone_fas_fa = $appFunctions->icone_fas_fan(2);

/*Carregando a classe de tela princial*/
$activeRecords = new DbManagerRecords();

/*ListBox com os Endereços de imóveis e se existe cliente alocado*/
$ListBoxPropertsClients = $activeRecords->list_properties_clients($dbInstance);

/* ListBox Com os Clientes cadastrados*/
$findClients = $activeRecords->list_box_client($dbInstance);

/* Carregando_Atruibuindo os módulos do usuátio e suas permissões*/
$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION[ 'id' ], $_SESSION[ 'user_type']);

/* Carregando a classe de tela inicial de HTML*/
$head = new shHead();

/* Atruibuindo a classe e setando o nome do title*/
echo $head->sh_head("Castanheiro App v1 >> Clientes");

/* Carregando a classe de tela princial*/
$screenManager  = new ScreenManager();
$screenProperty = new ScreenProperties();

/* Carregando a tela de cliente*/
$screenClient = new ScreenClients();

/* Atribuindo a content o valor da tela pra apresentar a pagina*/
$contentNow = $screenClient->screenFormClient($findClients, null, null, null, null, null, null, null);

/*Lista de Clientes*/
if($_GET['report'] == true) 
{
    $reportClients = $activeRecords->report_client($dbInstance);
    $contentNow = $screenClient->screenListClients($reportClients);
    print $screenManager->pageWrapper($typeModules, "$icone_fas_fa Relatório de Clientes", $contentNow);
    $footer = new shFooter();
    print $footer->sh_footer();
    exit();
}

/*Tela de filtro de Pesquisas*/
if ( isset( $_GET['filters'] ) )
{
	$typeProperty = $screenProperty->screenTypeProperty(null, 'find');
	$contentNow   = $screenClient->screenFilterClientAndProperty($ListBoxPropertsClients, $typeProperty);

	echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Filtro de Pesquisas", $contentNow);

	$footer = new shFooter();
	echo $footer->sh_footer();
	exit();
}

/*Resultados da tela de pesquisa */
if ( isset( $_POST['btn_find_StreetOrType'] ) )
{
	$data = $_POST;
	$reportResultFindPropertyesClient = $activeRecords->find_client_for_addres($dbInstance, $data);
	print $screenClient->screenListClientProperty($reportResultFindPropertyesClient);

	$footer = new shFooter();
	print $footer->sh_footer();
	exit();
}

/*Resultados da tela de pesquisa */
if ( isset( $_POST['btn_find_NameOrStreet'] ) )
{
	var_dump($_POST);
	exit();
}

/*Trazendo dados do cliente para edição*/
if ( isset($_GET['editID'] ) ) 
{
    $clientID = $_GET['editID'];

    /*Lendo dados do cliente*/
    $clientData = $activeRecords->find_client_data($dbInstance, $clientID);

    /*Lista dos imóveis disponiveis para alugar*/
    $findPropertyToCliente = $activeRecords->find_property_to_client($dbInstance); 

    /*Lendo documentos anexados do cliente*/
    $clientDocs = $appFunctions->load_files($clientID);

    /*Lendo contratos anexados do cliente*/
    //$clientContracts = $appFunctions->load_contracts_file($clientID);
     $clientListContracts  = $activeRecords->load_contracts($dbInstance, $clientID);
     $clientResp1Contracts = $screenClient->screenListClientContracts($clientListContracts[0]);
	 $clientResp2Contracts = $clientListContracts[1]; //Table
	 $clientReturContracts = [ $clientResp1Contracts, $clientResp2Contracts ]; //Opt
	 $clientContracts      = $clientReturContracts;

    /*Lendo survey do cliente*/
    $clientSurvey = $appFunctions->load_survey($clientID);

    /*Lendo poupanças do cliente*/
    $clientListSavings  = $activeRecords->list_client_saving($dbInstance, $clientID);
    $clientTableSavings = $screenClient->screenListClientSavings($clientListSavings);

    /*Lendo Contratos Associados para adcionar poupanças*/
	 //$clientListContractSaving = $activeRecords->list_client_contractSavings($dbInstance, $clientID);
    /*Lendo imóveis do cliente (criando a tabela e o listbox para associar ao locatário*/
    $clientListPropertys    = $activeRecords->list_client_property($dbInstance, $clientID);
    $clientTablePropertys   = $screenClient->screenListClientProperty($clientListPropertys[0]); //tabela
    $clientListBoxPropertys = $clientListPropertys[1]; //listbox
    $clientOptionsPropertys = [ $clientTablePropertys, $clientListBoxPropertys ];

    /*Vistorias realizadas*/
    $clientSurveyCarriedOut = $activeRecords->listSurveyCarriedOut($dbInstance, $clientID);
    $tablesSurveyCarriedOut = $screenClient->screenListSurveyCarriedOut($clientSurveyCarriedOut);

    /*Telas Carregadas*/
	 $contentNow = $screenClient->screenFormClient($findClients, $clientData, $clientDocs, $clientContracts, $clientTableSavings, $findPropertyToCliente, $clientOptionsPropertys, $tablesSurveyCarriedOut);

    echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Cadastro de Clientes", $contentNow);
   
    $footer = new shFooter();
    echo $footer->sh_footer();
    exit();
}

/*Listando Clientes x Locações*/
if ( isset( $_GET['listClientPropertieID'] ) )
{
	$contentNow = $screenClient->screenListClientStreets();
	echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Lista de Endereços x Clientes", $contentNow);
	$footer = new shFooter();
	echo $footer->sh_footer();
	exit();
}

/*Recebendo dados para inclusão do cliente*/
if ( isset( $_POST['btn_insert_update_client'] ) )
{
    // Não importa se é CPF ou CNPJ e se já vem formatado
    $checkCPFCNPJ = new Documento("$_POST[cpfcnpj]");

    // Retorna se é CPF ou CNP
    // Retorna se for um número inválido retorna false
    $type_cpfcnpj = $checkCPFCNPJ->getType();

    if ($type_cpfcnpj == 'CPF')
    {
        $falsetrue = $checkCPFCNPJ->isValid();

        if ($falsetrue == 1)
        {
            $typeCPF = $checkCPFCNPJ->format();
        }
    }

    if ($type_cpfcnpj == 'CNPJ')
    {
        $falsetrue = $checkCPFCNPJ->isValid();

        if ($falsetrue == 1)
        {
            $typeCNPJ = $checkCPFCNPJ->format();
        }
    }

    if ($_POST['client_state_registration_free'] == 'fr') {
        $client_state_registration = "ISENTO";
    } else {
        $client_state_registration = $_POST['client_state_registration'];
    }

    if ($_POST['client_type'] == 'cli') {
        $client_type_cli = $_POST['client_type'];

    } elseif ($_POST['client_type'] == 'for') {
        $client_type_for = $_POST['client_type'];

    } elseif ($_POST['client_type'] == 'loc') {
        $client_type_loc = $_POST['client_type'];

    } else {
        $client_type_col = $_POST['client_type'];
    }

    // Verifica se é um número válido de CNPJ ou CPF
    // Retorna true/false

    // Retorna o número de formatado de acordo com tipo de documento informado
    // ou false caso não seja um número válido
    //$checkCPFCNPJ->format();

    // Retorna o número de sem formatação alguma
    // ou false caso não seja um número válido
    //$checkCPFCNPJ->getValue();

    $regists_client = [
        'id' => "$_POST[client_id]",
        'name' => "$_POST[client_name]",
        'corporate_name' => "$_POST[client_corporate_name]",
        'dt_update' => date('Y-m-d h:m:s'),
        'dt_created' => date('Y-m-d h:m:s'),
        'zip_code' => "$_POST[cep]",
        'address' => "$_POST[client_address]",
        'number' => "$_POST[client_number]",
        'county' => "$_POST[client_county]",
        'city' => "$_POST[client_city]",
        'type_cli' => "$client_type_cli",
        'type_for' => "$client_type_for",
        'type_col' => "$client_type_col",
        'type_loc' => "$client_type_loc",
        'neighbordhood' => "$_POST[client_neighbordhood]",
        'state' => "$_POST[client_state]",
        'phone1' => "$_POST[client_phone1]",
        'phone2' => "$_POST[client_phone2]",
        'phone3' => "$_POST[client_phone3]",
        'cpf' => "$typeCPF",
        'cnpj' => "$typeCNPJ",
        'rg' => "$_POST[client_rg]",
        'client_state_registration_free' => "$_POST[client_state_registration_free]",
        'state_registration' => "$client_state_registration",
        'municipal_registration' => "$_POST[client_municipal_registration]",
        'email1' => "$_POST[client_email1]",
        'email2' => "$_POST[client_email2]",
        'site' => "$_POST[client_site]",
        'obs' => "$_POST[client_obs]",
        'active' => "$_POST[client_active]",
        'responsible' => "$_POST[client_responsible]",
        'complement' => "$_POST[client_complement]",
    ];

    $resp = $activeRecords->manager_client($dbInstance, $regists_client);

    if ($resp >= 1 and $resp != 2) {
        echo $appFunctions->alert_system('1',
            "Cliente $_POST[client_name] foi CADASTRADO com sucesso! <strong> Deseja continuar para documentos? </strong> <a href='?editID=$resp' class=\"alert-link\" > [SIM] </a> | <a href='?insert=true' class=\"alert-link\" > [NÃO] </a>");
        exit();

    } elseif ($resp === 2) {
	    echo $appFunctions->alert_system('2',
		    "Cliente $_POST[client_name] foi ALTERADDO com sucesso! <strong> Deseja continuar alterações? </strong> <a href='?editID=$_POST[client_id]' class=\"alert-link\" > [SIM] </a> | <a href='?insert=true' class=\"alert-link\" > [NÃO] </a>");
	    exit();

    } else {
	    echo $appFunctions->alert_system('0', "Ops! Erro ao cadastrar Cliente! -> [ $resp ]");
	    exit();
    }
}

/*Removendo o cliente*/
if ( isset( $_POST['btn_action_delete_client_id'] ) )
{
	if ( $_POST['delete_id_client' ] == null ) 
    {
		echo $appFunctions->alert_system('3', "Não foi informado o Cliente!");
		exit();

	} else {
		
		$resp = $activeRecords->remove_client($dbInstance, $_POST['delete_id_client']);
		echo $appFunctions->alert_system('1', "Cliente removido com sucesso!");
		sleep(3);
		$appFunctions->redirect_page('0','manager.clients.php');
		exit();
	}
}

/*Inserindo Docs ao Cliente*/
if ( isset( $_POST['j_btn_doc'] ) )
{
	$typeDoc = 'Documents';
	$resp_process = $appFunctions->upload_files($_POST['clientIDdoc' ], $_FILES[ 'file' ], $typeDoc);
	$resp_process = $appFunctions->alert_system("$resp_process[0]", "$resp_process[1]");
	echo $resp_process;
	exit();
}

/*Inserindo Contrato ao Cliente*/
if ( isset( $_POST['j_btn_contract'] ) ) 
{   
    $dataContract   = $_POST;
    $filename       = $_FILES['file']['name'];

    // var_dump($dataContract);
    // exit();

    $typeDoc        = 'Contract';
    $resp_process   = $appFunctions->upload_files($_POST['clientIDcontract'], $_FILES['file'], $typeDoc);

    // print_r($resp_process);
    // exit;

    if ( $resp_process[0] == 1 )
    {
        $resContract = $activeRecords->manager_contratc($dbInstance, $dataContract, $filename);
        
        if ( $resContract == 1)
        {
            print $appFunctions->alert_system('1', ':) Sucesso ao salvar o contrato!');
            // exit;
            print $appFunctions->alert_system('2',
		     "Cliente $_POST[client_name] foi ALTERADDO com sucesso! <strong> Deseja continuar alterações? </strong> 
            <a href='?editID=$_POST[clientIDcontract]' class=\"alert-link\" > [SIM] </a> | 
            <a href='?insert=true' class=\"alert-link\" > [NÃO] </a>");
	        exit(); 
        }
        else{

            print $appFunctions->alert_system('2', 'Ops! Algum problema ao salvar o contrato, verifique novamente!');
            exit;
        }
    }
    else{

        echo $resp_process;
        exit();
    }    
}


/*Editando o Contrato direto na Tabela*/
if ( isset( $_POST['jbtn_salveContratLine'] ) )
{
    $resp = $activeRecords->edit_contract_linx($dbInstance, $_POST);
    echo $appFunctions->alert_system('1', "Informações do contrato editado com sucesso!");
    exit();
}

/*Removendo contrato*/
if ( isset( $_GET['removeContratId'] ) )
{
	$idContract = base64_decode($_GET['removeContratId']);
	$resp = $activeRecords->remove_contratc($dbInstance, $idContract, $_GET['client_id']);
	print $appFunctions->alert_system('1',':) Contrato Removido do Locátario com sucesso!');
	print $appFunctions->alert_system('2',"Cliente $_POST[client_name] foi ALTERADDO com sucesso! <strong> Deseja continuar alterações? </strong> <a href='?editID=$_GET[client_id]' class=\"alert-link\" > [SIM] </a> | <a href='?insert=true' class=\"alert-link\" > [NÃO] </a>");
	exit();
}

/*Inserindo Poupanças/Depósitos*/
if ( isset( $_POST['j_btn_salve_savings'] ) ) 
{
   $typeDoc      = null;
   $resp_process = $appFunctions->upload_files( $_POST['client_savings_id'], $_FILES['fileSavings'], $typeDoc );

    if ($resp_process['0'] == '0') //erro ao fazer upload
    {
        $resp_process = $appFunctions->alert_system("$resp_process[0]", "$resp_process[1]");
        echo $resp_process;
        exit();
    }

    if ($resp_process['0'] == '1') //sucesso para salvar o arquivo
    {
        $filename = $resp_process[2];

        $resp_process = $appFunctions->alert_system("$resp_process[0]", "$resp_process[1]");
        echo $resp_process;

        $regists_client_savings = $_POST;
        $resp = $activeRecords->manager_client_saving($dbInstance, $regists_client_savings, $filename);

        if ($resp != '1')
        {
            echo $appFunctions->alert_system('0', "Erro ao processar depósito - $resp");
            exit();
        }

        if ($resp == '1')
        {
            echo $appFunctions->alert_system('1', "Depósito Incliudo com sucesso");
            exit();
        }
    }

    if ($resp_process['0'] == '3') //erro ao fazer upload
    {
        echo $resp_process = $appFunctions->alert_system("$resp_process[0]", "$resp_process[1]");
        exit();
    }
}

/*Inserindo Vistorias do Imóvel / Cliente*/
if ( isset( $_POST['j_btn_salve_survey'] ) )
{
	$regists_client_survey = $_POST;
	$resp = $activeRecords->manager_client_survey($dbInstance, $regists_client_survey);

	if ($resp != '1') 
    {
		echo $appFunctions->alert_system('0', "Erro ao processar Vistoria - $resp");
		exit();
	}

	if ($resp == '1') 
    {
		$activeRecords->manager_client_survey_file($dbInstance, $regists_client_survey, $_FILES);
		echo $appFunctions->alert_system('1', "Vistorias Incluidas com sucesso!");

        foreach ($_FILES as $fileSurvey => $fileData) 
        {
			$clientPathFile = "../docs/clients/$_POST[clientAddSurvey]/survey";

         if (file_exists($clientPathFile))
         {
				//echo "Arquivo ou diretórioexiste";
			} else {
				mkdir("..//docs/clients/$_POST[clientAddSurvey]/survey", 0777, true);
				chmod("..//docs/clients/$_POST[clientAddSurvey]/survey", 0777);
			}

			$typeDoc = 'Survey';
			$resp_process = $appFunctions->upload_files($_POST['clientAddSurvey'], $fileData, $typeDoc);

            if ($resp_process['0'] == '0') //erro ao fazer upload
            {
				$resp_process = $appFunctions->alert_system("$resp_process[0]", "$resp_process[1]");
				echo $resp_process;
				exit();
			}

            if ($resp_process['0'] == '1')  //sucesso para salvar o arquivo
            {
				$resp_process = $appFunctions->alert_system("$resp_process[0]", "$resp_process[1]");
				echo $resp_process;
			}
        }
        
		exit();
	}
}

/*Assossciando Cliente/Imóvel */
if ( isset( $_POST['j_btn_salve_client_Property'] ) )
{
    $regists_client_property = [
        'clientAddProperty' => $_POST['clientAddProperty'],
        'SelectAddProperty' => $_POST['SelectAddProperty'],
    ];

    $resp = $activeRecords->manager_client_property($dbInstance, $regists_client_property);

    if ($resp == 1) 
    {
        echo $appFunctions->alert_system('1', "Imóvel associado ao locatário com sucesso!");
        exit();
    }

    if ($resp == 2) 
    {
        echo $appFunctions->alert_system('3', "ops!  Não é possivel associar imóvel, já está associado a esse locatário!");
        exit();
    }
}

/*Tela Principal*/
echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Cadastro de Clientes", $contentNow);

/*Fim da pagina e carregamento dos JS */
$footer = new shFooter();
echo $footer->sh_footer();
