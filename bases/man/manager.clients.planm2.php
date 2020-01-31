<?php /** @noinspection DuplicatedCode */

    /*ini_set('memory_limit', '256M');
    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);*/

    include("head.php");
    include("../class/class.ScreenStartManager.php");
    include("../class/class.ScreenEndManager.php");
    include("../class/class.ScreenPlanM2.php");
    include("../class/class.Functions.php");
    include("../class/class.DbConnection.php");
    include('../class/class.UserLinkModules.php');
    include("../class/class.DbManagerRecords.php");

    $appFunctions = new appFunctions();
    $appFunctions->validate_session();
    $icone_fas_fa = $appFunctions->icone_fas_fan(6);

    $conn = new DBconnect();
    $dbInstance = $conn->connection();

    $activeRecords = new DbManagerRecords();
    $findClients = $activeRecords->find_clients($dbInstance);

    $typeModule = new LinkModule();
    $typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

    $head = new shHead();
    echo $head->sh_head("Castanheiro App v1 >> Planilha M2");

    $screenManager = new ScreenManager();
    $screenReportPlanM2 = new ScreenPlanM2s();
    $contentNow = $screenReportPlanM2->screenReportPlanM2();

    if ($_GET['n_alert'] != null) {
        $n_alert = base64_decode($_GET['n_alert']);
        $n_msg = base64_decode($_GET['n_msg']);
        $alert_type = $appFunctions->alert_system($n_alert, "$n_msg");
    }

    echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Planilha M2 de Imóveis : Clientes", $contentNow,
        $alert_type);


    $footer = new shFooter();
    echo $footer->sh_footer();
