<?php

//ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

include("head.php");
include("header.php");
include("footer.php");
include("../class/class.Functions.php");
include('../class/class.UserLinkModules.php');

$appFunctions = new appFunctions();
$appFunctions = $appFunctions->validate_session();

$head   = new Heads();
$header = new Headers();
$footer = new Footers();

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($_SESSION['id'], $_SESSION['user_type']);

echo $head->head("AppManer Castanheiros");
echo $header->navBar($typeModules);

echo $footer->footer();
