<?php /** @noinspection DuplicatedCode */

    /*ini_set('memory_limit', '256M');
    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);*/

    include("head.php");
    include("../class/class.ScreenStartManager.php");
    include("../class/class.ScreenEndManager.php");
    include("../class/class.ScreenClients.php");
    include("../class/class.Functions.php");
    include("../class/class.DbConnection.php");
    include('../class/class.UserLinkModules.php');
    include("../class/class.DbManagerRecords.php");

    $appFunctions = new appFunctions();
    $appFunctions->validate_session();

    $conn = new DBconnect();
    $dbInstance = $conn->connection();
    $icone_fas_fa = $appFunctions->icone_fas_fan(2);


    $activeRecords = new DbManagerRecords();
    $findClients = $activeRecords->find_client_id($dbInstance);

    $typeModule = new LinkModule();
    $typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

    $head = new shHead();
    echo $head->sh_head("Castanheiro App v1 >> Clientes");

    $screenManager = new ScreenManager();
    $screenClient = new ScreenClients();
    $contentNow = $screenClient->screenFormClient($findClients, null);;


    if ($_GET['n_alert'] != null) {
        $n_alert = base64_decode($_GET['n_alert']);
        $n_msg = base64_decode($_GET['n_msg']);
        $alert_type = $appFunctions->alert_system($n_alert, "$n_msg");
    }

    if (isset($_GET['editID'])) {
        $clientID = $_GET['editID'];
        $clientData = $activeRecords->find_client_data($dbInstance, $clientID);
        $contentNow = $screenClient->screenFormClient($findClients, $clientData);;
        echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Cadastro de Clientes", $contentNow, $alert_type);
        $footer = new shFooter();
        echo $footer->sh_footer();
        exit();
    }

    /*Recebendo dados para inclusão do cliente*/
    if (isset($_POST['btn_insert_update_client'])) {

        // Não importa se é CPF ou CNPJ e se já vem formatado
        $checkCPFCNPJ = new \Bissolli\ValidadorCpfCnpj\Documento("$_POST[cpfcnpj]");

        // Retorna se é CPF ou CNP
        // Retorna se for um número inválido retorna false
        $type_cpfcnpj = $checkCPFCNPJ->getType();

        if ($type_cpfcnpj == 'CPF') {

            $falsetrue = $checkCPFCNPJ->isValid();

            if ($falsetrue == 1) {
                $typeCPF = $checkCPFCNPJ->format();
            }
        }

        if ($type_cpfcnpj == 'CNPJ') {

            $falsetrue = $checkCPFCNPJ->isValid();

            if ($falsetrue == 1) {
                $typeCNPJ = $checkCPFCNPJ->format();
            }
        }

        if ($type_cpfcnpj == false) {
            echo $appFunctions->alert_system('0',
                "Ops! Tipo de documento CPF ou CNPJ é inválido, por favor verifique! -> [ $_POST[cpfcnpj] ]");
            exit();
        }

        if ($_POST['client_state_registration_free'] == 'fr') {
            $client_state_registration = "ISENTO";
        } else {
            $client_state_registration = $_POST['client_state_registration'];
        }


        // Verifica se é um número válido de CNPJ ou CPF
        // Retorna true/false

        // Retorna o número de formatado de acordo com tipo de documento informado
        // ou false caso não seja um número válido
        //$checkCPFCNPJ->format();

        // Retorna o número de sem formatação alguma
        // ou false caso não seja um número válido
        //$checkCPFCNPJ->getValue();

        $regists_client = [
            'id' => "$_POST[client_id]",
            'name' => "$_POST[client_name]",
            'corporate_name' => "$_POST[client_corporate_name]",
            'dt_update' => date('Y-m-d h:m:s'),
            'dt_created' => date('Y-m-d h:m:s'),
            'zip_code' => "$_POST[cep]",
            'address' => "$_POST[client_address]",
            'number' => "$_POST[client_number]",
            'county' => "$_POST[client_county]",
            'city' => "$_POST[client_city]",
            'neighbordhood' => "$_POST[client_neighbordhood]",
            'state' => "$_POST[client_state]",
            'phone1' => "$_POST[client_phone1]",
            'phone2' => "$_POST[client_phone2]",
            'phone3' => "$_POST[client_phone3]",
            'cpf' => "$typeCPF",
            'cnpj' => "$typeCNPJ",
            'rg' => "$_POST[client_rg]",
            'type' => "$_POST[client_type]",
            'client_state_registration_free' => "$_POST[client_state_registration_free]",
            'state_registration' => "$client_state_registration",
            'municipal_registration' => "$_POST[client_municipal_registration]",
            'email1' => "$_POST[client_email1]",
            'email2' => "$_POST[client_email2]",
            'site' => "$_POST[client_site]",
            'obs' => "$_POST[client_obs]",
            'active' => "$_POST[client_active]",
            'responsible' => "$_POST[client_responsible]",
            'complement' => "$_POST[client_complement]"
        ];;

        $resp = $activeRecords->manager_client($dbInstance, $regists_client);

        if ($resp == 1) {
            echo $appFunctions->alert_system('1',
                "Obá! Cliente $_POST[client_name] foi cadastrado com sucesso! <strong> Deseja cadastrar novo Cliente? </strong> <a href='?insert=true' class=\"alert-link\" > [SIM] </a>");
            exit();

        } elseif ($resp == 2) {
            echo $appFunctions->alert_system('2', "Cliente $_POST[client_name] Alterando com sucesso!");
            exit();

        } else {
            echo $appFunctions->alert_system('0', "Ops! Erro ao cadastrar Cliente! -> [ $resp ]");
            exit();
        }
    }


    echo $screenManager->pageWrapper($typeModules, "$icone_fas_fa Cadastro de Clientes", $contentNow, $alert_type);

    $footer = new shFooter();
    echo $footer->sh_footer();
