<?php

/*
$typeModules 0 = navbar. 1 = Modules 
*/
ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);

error_reporting(E_ALL);

include("head.php");
include("header.php");
include("footer.php");
include("../class/class.ScreenUsers.php");
include('../class/class.UserLinkModules.php');
include("../class/class.Functions.php");

$appFunctions = new appFunctions();
$appFunctions = $appFunctions->validate_session();

$head   = new Heads();
$header = new Headers();
$footer = new Footers();
$screenUsers = new ScreenUsers();

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($_SESSION['id'], $_SESSION['user_type']);

echo $head->head("Cadastro de Usuários");
echo $header->navBar($typeModules);

echo $screenUsers->screenFormUser($typeModules);

echo $footer->footer();
