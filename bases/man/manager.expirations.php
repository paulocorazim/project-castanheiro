<?php /** @noinspection DuplicatedCode */

    ini_set('memory_limit', '256M');
    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);

    include("head.php");
    include("../class/class.ScreenStartManager.php");
    include("../class/class.ScreenEndManager.php");
    include("../class/class.ScreenExpiration.php"); // aqui importamos a tela
    include("../class/class.Functions.php");
    include("../class/class.DbConnection.php");
    include('../class/class.UserLinkModules.php');
    include("../class/class.DbManagerRecords.php");

    $appFunctions = new appFunctions();
    $appFunctions->validate_session();

    $conn = new DBconnect();
    $dbInstance = $conn->connection();

    $typeModule = new LinkModule();
    $typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

    //Inicio
    $head = new shHead();
    echo $head->sh_head("Castanheiro App v1");

    //Conteudo
    $screenBillets = new ScreenExpirations(); // aqui estanciamos a tela

    if ($_GET['report'] === 'true') {

        if ($_GET['type'] === 'bc') {
            $type_rport = "Clientes x Boletos";
        }

        if ($_GET['type'] === 'bv') {
            $type_rport = "Boletos x Vencimentos";
        }

        $contentNow = $screenBillets->screenExpirations(); // aqui atribuimos o contenNow com o form desejado
        $screenManager = new ScreenManager();
        echo $screenManager->pageWrapper($typeModules, "Venvcimentos >> $type_rport", $contentNow, null);
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

    $contentNow = $screenBillets->screenExpiration(); // aqui atribuimos o contenNow com o form desejado
    $screenManager = new ScreenManager();
    echo $screenManager->pageWrapper($typeModules, "Venvcimentos", $contentNow, null);

    //Fim
    $footer = new shFooter();
    echo $footer->sh_footer();
