<?php

//ini_set('memory_limit', '256M');
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

include("head.php");
include("header.php");
include("footer.php");
include("../class/class.ScreenUsers.php");
include("../class/class.Functions.php");
include("../class/class.DbConnection.php");
include('../class/class.UserLinkModules.php');
include("../class/class.DbManagerRecords.php");

$conn = new DBconnect();
$dbInstance = $conn->connection();

$head = new Heads();
$header = new Headers();
$footer = new Footers();
$screenUsers = new ScreenUsers();

$appFunctions = new appFunctions();
$appFunctions->validate_session();

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

echo $head->head("AppManer Castanheiro");
echo $header->navBar($typeModules);

if (isset($_GET['exit'])) {

    $appFunctions->delete_session();
    $appFunctions->redirect_page('0', '../index.php');
    exit;
}

/*echo $footer->footer();*/
