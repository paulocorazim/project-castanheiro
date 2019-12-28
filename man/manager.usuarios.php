<?php
/* Tela principale para chamada dos includes pricipais
:: Desenvolvido por : Paulo 
*/

ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);

error_reporting(E_ALL);

include("head.php");
include("header.php");
include("footer.php");
include("../class/class.ScreenUsers.php");

$head = new Heads();
$header = new Headers();
$footer = new Footers();
$footer = new Footers();
$screenUsers = new ScreenUsers();

echo $head->head("Cadastro de Usuários");
echo $header->navBar();
echo $screenUsers->screenFormUser();




//LOGICA

// FIM DA LOGICA

echo $footer->footer();
