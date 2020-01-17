<?php /** @noinspection DuplicatedCode */


include("head.php");
include("header.php");
include("footer.php");
include("../class/class.ScreenClients.php");
include("../class/class.Functions.php");
include("../class/class.DbConnection.php");
include('../class/class.UserLinkModules.php');
include("../class/class.DbManagerRecords.php");

$conn = new DBconnect();
$dbInstance = $conn->connection();

$head = new Heads();
$header = new Headers();
$footer = new Footers();
$screnScreenClient = new ScreenClients();

$appFunctions = new appFunctions();
$appFunctions->validate_session();

$typeModule = new LinkModule();
$typeModules = $typeModule->LinkModules($dbInstance, $_SESSION['id'], $_SESSION['user_type']);

$activeRecords = new DbManagerRecords();

echo $head->head("AppManager >> Cadastros de Clientes");
echo $header->navBar($typeModules);
echo $screnScreenClient->screenFormClient();


/*Recebendo dados para inclusão do cliente*/
if (isset($_POST['btn_update_client'])) {

    $regists_client = [
        'name' => "$_POST[client_name]",
        'corporate_name' => "$_POST[client_corporate_name]",
        'dt_created' => "$_POST[client_dt_created]",
        'dt_update' => "$_POST[client_dt_update]",
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
        'cpf' => "$_POST[cpfcnpj]",
        'cnpj' => "$_POST[cpfcnpj]",
        'rg' => "$_POST[client_rg]",
        'type' => "$_POST[client_type]",
        'client_state_registration_free' => "$_POST[client_state_registration_free]",
        'state_registration' => "$_POST[client_state_registration]",
        'municipal_registration' => "$_POST[client_municipal_registration]",
        'email1' => "$_POST[client_email1]",
        'email2' => "$_POST[client_email2]",
        'site' => "$_POST[client_site]",
        'obs' => "$_POST[client_obs]",
        'active' => "$_POST[client_active]",
        'responsible' => "$_POST[client_responsible]",
    ];

    $activeRecords->manager_client($regists_client);

}
/*echo $footer->footer();*/
