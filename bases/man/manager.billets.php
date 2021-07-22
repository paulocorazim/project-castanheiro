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

if ($_GET['report'] === 'true') 
{
    if ($_GET['type'] === 'bc') {
        $type_rport = "Clientes x Borderôs";
    }

    if ($_GET['type'] === 'bv') {
        $type_rport = "Boletos x Borderôs";
    }

    $m = $_GET['m'];
    $y = $_GET['y'];
    $address = $_GET['addres'];

    $dataAdrress = $activeRecords->select_address($dbInstance, $m, $y);
    $dataBordero = $activeRecords->select_bordero($dbInstance, $m, $y, $address);
    $contentNow  = $screenBillets->screenReportBordero($dataBordero, $m, $y, $dataAdrress, $address); // aqui atribuimos o contenNow com o form desejado

    $screenManager = new ScreenManager();
    echo $screenManager->pageWrapper($typeModules, "Preview Para Geração de Boderôs", $contentNow);
    $footer = new shFooter();
    echo $footer->sh_footer();
    exit();
}

if ( isset( $_POST['btn_create_bordero'] ) ) 
{
    $m          = $_POST['b_m'];
    $y          = $_POST['b_y'];
    $address    = $_POST['b_address'];
    $lote       = $_POST['lote'] = date('dmYhis').'-REM';
    $totBordero = null;

    $activeRecords->create_data_for_bordero($dbInstance, $m, $y, $address, $lote);
    $resultBordero = $activeRecords->select_data_for_bordero_lote($dbInstance, $lote);

    foreach ($resultBordero as $bordero) {
        
        //total do bordero:
        $totBordero = $totBordero + $bordero['billet_value']; 
    }
    $totBordero = number_format($totBordero,2,",",".");
    
    echo $appFunctions->alert_system('', "Lote : <b>$lote , com  valor total de : R$ $totBordero</b>. Gerado com sucesso, <b>este</b> número será o arquivo para enviar ao banco!");
    echo "<pre>$lote</pre>";
    exit();
}

//Fecha Sessão
if ( isset( $_GET['exit'] ) ) 
{
    $appFunctions->delete_session();
    $appFunctions->redirect_page('0', '../index.php');
    exit;
}

if ( isset( $_GET['lote'] ) )
{    
    $lote = $_GET['lote'];
}

$selectLotes= $activeRecords->select_Lotes($dbInstance);
$bordeBoleto= $activeRecords->find_boletobordero($dbInstance, $lote);
$contentNow = $screenBillets->screenFormBillet($findClients, $bordeBoleto, $selectLotes); // aqui atribuimos o contenNow com o form desejado
$screenManager = new ScreenManager();

echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Gerenciamento de Boletos e Borderôs", $contentNow);

//Fim
$footer = new shFooter();
echo $footer->sh_footer();
