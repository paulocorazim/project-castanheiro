<?php
/* Tela principale para chamada dos includes pricipais
:: Desenvolvido por : Paulo 
*/

ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);

error_reporting(E_ALL);

include("../man/head.php");
include("../man/header.php");
include("../man/footer.php");
include("../class/class.telaUsuarios.php");

$head = new Heads();
$header = new Headers();
$footer = new Footers();
$teleCadUsuario = new TelaUsuarios();
$footer = new Footers();

echo $head->head("Cadastro de Usuários");
echo $header->navBar();
echo $teleCadUsuario->telaCadUsuario();




//LOGICA

// FIM DA LOGICA

echo $footer->footer();
