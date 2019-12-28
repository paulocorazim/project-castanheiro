<?php
/* Tela principal para chamada dos includes principais
:: Desenvolvido por : Paulo 
*/

//ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

include("head.php");
include("header.php");
include("footer.php");
include("../class/class.ScreenClients.php");
include("../class/class.Functions.php");

$appFunctions = new appFunctions();
$appFunctions =$appFunctions->validate_session();

$head   = new Heads();
$header = new Headers();
$footer = new Footers();
$footer = new Footers();

echo $head->head("AppManer Castanheiros");
echo $header->navBar();




//LOGICA

// FIM DA LOGICA

echo $footer->footer();
