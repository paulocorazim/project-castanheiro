<?php /** @noinspection DuplicatedCode */

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
    echo $head->sh_head("Castanheiro App v1 >> Usuários");

    $screenManager = new ScreenManager();
    $screenUsers = new ScreenUsers();
    $contentNow = $screenUsers->screenFormUser($typeModules);

    if ($_GET['n_alert'] != null) {
        $n_alert = base64_decode($_GET['n_alert']);
        $n_msg = base64_decode($_GET['n_msg']);
        $alert_type = $appFunctions->alert_system($n_alert, "$n_msg");
    }

    /*Verificar se botão foi acionado para cadastro/update do usuário*/
    if (isset($_POST['btn_update'])) {

        $regists_user = [
            'id' => "$_POST[user_id]",
            'cpf' => "$_POST[cpfcnpj]",
            'name' => "$_POST[user_name]",
            'email' => "$_POST[user_email]",
            'password' => md5("$_POST[user_password]"),
            'confirm_passwd' => md5("$_POST[user_confirm_password]"),
            'dt_update' => date('Y-m-d h:m:s'),
            'dt_created' => date('Y-m-d h:m:s'),
            'permission_master' => "$_POST[permission_master]",
            'permission_I' => "$_POST[permission_I]",
            'permission_S' => "$_POST[permission_S]",
            'permission_U' => "$_POST[permission_U]",
            'permission_D' => "$_POST[permission_D]",
            'active' => "$_POST[user_active]"
        ];

        $regists_module = $_POST['user_module'];
        $regists_permission = $_POST['user_permission'];

        $activeRecords->manager_user($dbInstance, $regists_user, $regists_module, $regists_permission, $appFunctions);
        exit();
    }

    /*Lista de Usuários*/
    if ($_GET['user_report'] != null) {
        $contentNow = $screenUsers->screenListUser($typeModule->listModulesPermission($dbInstance, $_SESSION['user_type']));
        echo $screenManager->pageWrapper($typeModules, "Report de Usuários", $contentNow);
        $footer = new shFooter();
        echo $footer->sh_footer();
        exit();
    }

    /*Editando o usuário*/
    if ($_GET['select_id'] != null) {

        $activeRecordsEdit = $activeRecords->select_user($dbInstance, $_GET['select_id'], $appFunctions);

        $contentNow = null;
        $contentNow = $screenUsers->screenFormUserEdit($activeRecordsEdit, $typeModules);
        echo $screenManager->pageWrapper($typeModules, "Cadastro de Usuários - Editar", $contentNow);
        $footer = new shFooter();
        echo $footer->sh_footer();
        exit();
    }

    /*Rederização da pagina*/
    echo $screenManager->pageWrapper($typeModules, "Cadastro de Usuários", $contentNow);
    $footer = new shFooter();
    echo $footer->sh_footer();
    exit();
