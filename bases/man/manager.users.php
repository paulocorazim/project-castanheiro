<?php
/*ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);*/

include("head.php");
include("../class/class.ScreenStartManager.php");
include("../class/class.ScreenEndManager.php");
include("../class/class.ScreenUsers.php");
include("../class/class.Functions.php");
include("../class/class.DbConnection.php");
include('../class/class.UserLinkModules.php');
include("../class/class.DbManagerRecords.php");

$appFunctions = new appFunctions();
$appFunctions->validate_session();

$conn = new DBconnect();
$dbInstance = $conn->connection();

$activeRecords = new DbManagerRecords();

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

$head = new shHead();
echo $head->sh_head("AppManer >> Clientes");

$screenManager = new ScreenManager();
$screenUsers = new ScreenUsers();
$contentNow = $screenUsers->screenFormUser($typeModules);

echo $screenManager->pageWrapper($typeModules, "Cadastro de Usuários", $contentNow);


$footer = new shFooter();
echo $footer->sh_footer();
