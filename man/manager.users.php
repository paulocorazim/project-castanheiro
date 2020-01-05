<?php
ini_set('memory_limit', '256M');
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);

error_reporting(E_ALL);

include ("head.php");
include ("header.php");
include ("footer.php");
include ("../class/class.ScreenUsers.php");
include ("../class/class.Functions.php");
include ("../class/class.DbConnection.php");
include ('../class/class.UserLinkModules.php');
include ("../class/class.DbManagerRecords.php");

$conn = new DBconnect();
$dbInstance = $conn->connection();

$head   = new Heads();
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

if(isset($_POST['btn_update']))
{
    $cpf    = $_POST['user_cpf'];
    $name   = $_POST['user_name'];
    $email  = $_POST['user_email'];
    $password = md5($_POST['user_password']);
    $dt_update = date('Y-M-D h:m:s');
    $dt_creatd = date('Y-M-D h:m:s');
    $type ='basic';
    $status ='1';

    $_POST['user_confirm_password'];
    
    if(isset($_POST['permission_master']))
    {
        $permission_master  = 'master';
    }else{
        $permission_master = 'basic';
    }
    

//    $permission_I       = $_POST['permission_I'];
//    $permission_S       = $_POST['permission_S'];
//    $permission_U       = $_POST['permission_U'];
//    $permission_D       = $_POST['permission_D'];

    $inserts->insert_user($dbInstance, $cpf, $name, $email, $password, $dt_creatd, $dt_update, $type, $status);
    echo $appFunctions->alert_sucess('Obá! Usuário cadastrado com sucesso!');
    exit();
}

echo $footer->footer();
