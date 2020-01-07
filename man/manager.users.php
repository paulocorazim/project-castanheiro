<?php
/*ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);*/

include "head.php";
include "header.php";
include "footer.php";
include "../class/class.ScreenUsers.php";
include "../class/class.Functions.php";
include "../class/class.DbConnection.php";
include '../class/class.UserLinkModules.php';
include "../class/class.DbManagerRecords.php";

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

$inserts = new DbManagerRecords();

echo $head->head("Cadastro de Usuários");
echo $header->navBar($typeModules);

echo $screenUsers->screenFormUser($typeModules);

//Verificar se botão foi acionado para cadastro/update do usuário

if (isset($_POST['btn_update'])) {
    $regists_user = [
        'cpf' => "$_POST[user_cpf]",
        'name' => "$_POST[user_name]",
        'email' => "$_POST[user_email]",
        'password' => md5("$_POST[user_password]"),
        'confirm_passwd' => "$_POST[user_confirm_password]",
        'dt_update' => date('Y-m-m h:m:s'),
        'dt_creatd' => date('Y-m-d h:m:s'),
        'permission_master' => "$_POST[permission_master]",
        'permission_I' => "$_POST[permission_I]",
        'permission_S' => "$_POST[permission_S]",
        'permission_U' => "$_POST[permission_U]",
        'permission_D' => "$_POST[permission_D]",
    ];

    echo $regists_module = $_POST['tab_modules_id'];
    exit();

    /*$inserts->insert_user($dbInstance, $regists_user, $regists_module);
    $appFunctions->alert_sucess("Obá! Usuário { $_POST[user_name] } cadastrado com sucesso!");
    $appFunctions->redirect_page("3","#");
    exit();*/
}

echo $footer->footer();
