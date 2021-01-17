<?php /** @noinspection DuplicatedCode */

/*ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);*/

include("head.php");
include("../class/class.ScreenStartManager.php");
include("../class/class.ScreenEndManager.php");
include("../class/class.ScreenBillets.php"); // aqui importamos a tela
include("../class/class.Functions.php");
include("../class/class.DbConnection.php");
include('../class/class.UserLinkModules.php');
include("../class/class.DbManagerRecords.php");

$appFunctions = new appFunctions();
$appFunctions->validate_session();
$icone_fas_fa = $appFunctions->icone_fas_fan(1);

$conn = new DBconnect();
$dbInstance = $conn->connection();

$activeRecords = new DbManagerRecords();
$findClients = $activeRecords->list_box_client($dbInstance);

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

//Inserindo boletos avulsos
if (isset($_POST['btn_insert_billet'])) {

    $regists_billet_client = $_POST;

    $resp = $activeRecords->manager_billet_detached($dbInstance, $regists_billet_client);
    
    if ($resp == 1)
    {
        echo $appFunctions->alert_system('1', "Ok! Boleto Inserido!");
        exit();

    } else {

    	echo $appFunctions->alert_system('0', "Ops! Erro ao Incluir Boleto! [$resp]");
        exit();
    }

}

//Inicio
$head = new shHead();
echo $head->sh_head("Castanheiro App v1");

//Conteudo
$screenBillets = new ScreenBillets(); // aqui estanciamos a tela

if ($_GET['report'] === 'true') {

    if ($_GET['type'] === 'bc') {
        $type_rport = "Clientes x Boletos";
    }

    if ($_GET['type'] === 'bv') {
        $type_rport = "Boletos x Vencimentos";
    }

    $contentNow = $screenBillets->screenReportBillet(); // aqui atribuimos o contenNow com o form desejado
    $screenManager = new ScreenManager();
    echo $screenManager->pageWrapper($typeModules, "Relatório >> $type_rport", $contentNow);
    $footer = new shFooter();
    echo $footer->sh_footer();
    exit();
}

//Fecha Sessão
if (isset($_GET['exit'])) {
    $appFunctions->delete_session();
    $appFunctions->redirect_page('0', '../index.php');
    exit;
}

$contentNow = $screenBillets->screenFormBillet($findClients); // aqui atribuimos o contenNow com o form desejado
$screenManager = new ScreenManager();

echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Boleto Avulso", $contentNow);

//Fim
$footer = new shFooter();
echo $footer->sh_footer();
