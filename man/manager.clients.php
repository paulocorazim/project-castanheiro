<?php /** @noinspection DuplicatedCode */


    include("head.php");
    include("header.php");
    include("footer.php");
    include("../class/class.ScreenClients.php");
    include("../class/class.Functions.php");
    include("../class/class.DbConnection.php");
    include('../class/class.UserLinkModules.php');
    include("../class/class.DbManagerRecords.php");

    $conn = new DBconnect();
    $dbInstance = $conn->connection();

    $head = new Heads();
    $header = new Headers();
    $footer = new Footers();
    $screnScreenClient = new ScreenClients();

    $appFunctions = new appFunctions();
    $appFunctions->validate_session();

    $typeModule = new LinkModule();
    $typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

    echo $head->head("AppManager >> Cadastros de Clientes");
    echo $header->navBar($typeModules);
    echo $screnScreenClient->screenFormClient();

    /*    echo $footer->footer();*/
