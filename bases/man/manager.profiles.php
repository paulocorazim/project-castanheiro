<?php /** @noinspection DuplicatedCode */

    // ini_set('memory_limit', '256M');
    // ini_set('display_errors', 1);
    // ini_set('display_startup_erros', 1);
    // error_reporting(E_ALL);

    include("head.php");
    include("../class/class.ScreenStartManager.php");
    include("../class/class.ScreenEndManager.php");
    include("../class/class.ScreenProfile.php"); // aqui importamos a tela
    include("../class/class.Functions.php");
    include("../class/class.DbConnection.php");
    include('../class/class.UserLinkModules.php');
    include("../class/class.DbManagerRecords.php");

    /*use UxWeb\SweetAlert\SweetAlert;

    $uxAlert = new SweetAlert;
    SweetAlert::message('Robots are working!');*/

    //Fecha Sessão = botão sair
    if (isset($_GET['exit'])) {
        $appFunctions->delete_session();
        $appFunctions->redirect_page('0', '../index.php');
        exit;
    }

    //Funções
    $appFunctions = new appFunctions();
    $appFunctions->validate_session();

    //Conexão com banco
    $conn = new DBconnect();
    $dbInstance = $conn->connection();

    //Gerenciamento de dados
    $activeRecords = new DbManagerRecords();

    //Testando Ajax com PHP
    if (isset($_POST['btn_alter_user'])) {

        $regists_user = $_POST;
        $resp = $activeRecords->manager_perfil($dbInstance, $regists_user);
        if ($resp == 1) {
            echo $appFunctions->alert_system('1', "Obá! Perfil Alterado com sucesso!");
            exit();
        } else {
            echo $appFunctions->alert_system('0', "Ops! Erro ao alterar Perfil!");
            exit();
        }

    }

    //Carregando dados do usuário logado.
    $perfilUser = $activeRecords->select_user_perfil($dbInstance, $_SESSION['id']);

    //Definie o navbar com os modulos de acesso do usuário logado
    $typeModule = new LinkModule();
    $typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

    //Inicio da pagina com os css e javascripts
    $head = new shHead();
    echo $head->sh_head("Castanheiro App v1");

    //Conteudo do centro da pagina
    $screenFormProfiles = new ScreenProfiles(); // aqui estanciamos a tela

    //Aqui atribuimos o contenNow com o form desejado
    $contentNow = $screenFormProfiles->screenFormProfile($perfilUser);

    $screenManager = new ScreenManager();
    echo $screenManager->pageWrapper($typeModules, "Perfil", $contentNow, null);

    //Fim
    $footer = new shFooter();
    echo $footer->sh_footer();
