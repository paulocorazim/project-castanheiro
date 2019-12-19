<?php
/* Tela principale para chamada dos includes pricipais
:: Desenvolvido por : Paulo 
*/

// ini_set('memory_limit', '256M');
// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);

error_reporting(E_ALL);

include("../man/head.php");
include("../man/header.php");
include("../man/footer.php");
include("../class/class.telaClientes.php");

$head = new Heads();
$header = new Headers();
$footer = new Footers();
$teleCadCliente = new TelaClientes();
$footer = new Footers();

echo $head->head("Cadastro de Clientes");
echo $header->navBar();
echo $teleCadCliente->telaCadCliente();





//LOGICA

// FIM DA LOGICA

echo $footer->footer();
