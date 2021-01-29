<?php /** @noinspection DuplicatedCode */

ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

include("head.php");
include("../class/class.ScreenStartManager.php");
include("../class/class.ScreenEndManager.php");
include("../class/class.ScreenDashBoard.php");
include("../class/class.Functions.php");
include("../class/class.DbConnection.php");
include('../class/class.UserLinkModules.php');
include("../class/class.DbManagerRecords.php");

$appFunctions = new appFunctions();
$appFunctions->validate_session();
$icone_fas_fa = $appFunctions->icone_fas_fan(0);

$conn = new DBconnect();
$dbInstance = $conn->connection();

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION[ 'id' ], $_SESSION[ 'user_type' ]);

$dashBoard = new ScreenDashBoard();
$screenDash =$dashBoard->screenDasBoard();

$head = new shHead();
echo $head->sh_head("Castanheiro App v1");

$screenManager = new ScreenManager();
echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa DashBoard", $screenDash);


if (isset($_GET[ 'exit' ])) {
	$appFunctions->delete_session();
	$appFunctions->redirect_page('0', '../index.php');
	exit;
}

$footer = new shFooter();
echo $footer->sh_footer();
