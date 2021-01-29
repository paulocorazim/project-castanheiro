<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL);

include "head.php";
include "../class/class.ScreenStartManager.php";
include "../class/class.ScreenEndManager.php";
include "../class/class.ScreenPropertie.php";
include "../class/class.Functions.php";
include "../class/class.DbConnection.php";
include '../class/class.UserLinkModules.php';
include "../class/class.DbManagerRecords.php";

/* Carregando a classe de funcções*/
$appFunctions = new appFunctions();

/* Validando acesso ligado*/
$appFunctions->validate_session();

/* Carregando a classe de banco*/
$conn = new DBconnect();
$dbInstance = $conn->connection();

/*Definindo o icone de tela correspondente*/
$icone_fas_fa = $appFunctions->icone_fas_fan(7);

/* Carregando a classe Dados*/
$activeRecords = new DbManagerRecords();
$findProperty = $activeRecords->find_property_id($dbInstance); // Lista dos imóveis

/* Carregando_Atruibuindo os módulos do usuátio e suas permissões*/
$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

/* Carregando a classe de tela inicial de HTML*/
$head = new shHead();

/* Atruibuindo a classe e setando o nome do title*/
echo $head->sh_head("Castanheiro App v1 >> Imóveis");

/* Carregando a classe de tela princial*/
$screenManager = new ScreenManager();

/* Conteudo*/
$screenProperty = new ScreenProperties(); // aqui estanciamos a tela
$typeProperty = $screenProperty->screenTypeProperty(null, null);
$contentNow = $screenProperty->screenProperty($findProperty, null, $typeProperty); // aqui atribuimos o contenNow com o form desejado
//$contentNow = $appFunctions->alert_system('4', "Ops! Módulo Imóveis em Manutenção <hr>");

/* Trazendo dados do Imóvel para Edição*/
if (isset($_GET['editID'])) {

    $propertyID = $_GET['editID'];
    $propertyData = $activeRecords->find_property_data($dbInstance, $propertyID);
	$typeProperty = $screenProperty->screenTypeProperty($propertyData, null);

    $contentNow = $screenProperty->screenProperty($findProperty, $propertyData, $typeProperty); // aqui atribuimos o contenNow com o form desejado

    echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Cadastro de Imóveis", $contentNow);

    $footer = new shFooter();
    echo $footer->sh_footer();
    exit();
}

if (isset($_POST['j_btn_salve_property'])) {
    $regist_property = $_POST;
    $resp = $activeRecords->manager_property($dbInstance, $regist_property);
    echo $appFunctions->alert_system($resp[0], $resp[1]);
    exit();
}

if (isset($_POST['j_btn_remove_property'])) {

	//var_dump($_POST);

	if($_POST['property_client'] != '')
	{
		echo $appFunctions->alert_system('3', "Este imóvel não pode ser removido, existe Locátário associado para ele!");
		exit();
	}
	else{
		$resp = $activeRecords->remove_property($dbInstance, $_POST['property_id']);
		echo $appFunctions->alert_system('1', "Imóvel removido com sucesso!");
		exit();
	}
}

/*Tela Principal*/
echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Cadastro de Imóveis", $contentNow);

//Fim
$footer = new shFooter();
echo $footer->sh_footer();
