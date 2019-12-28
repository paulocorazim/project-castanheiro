<?php

class UserPermission
{
    public function validation_user($email, $password)
    {
        include('class.DbConnection.php');
        include('class.Functions.php');

        $conn = new DBconnect();
        $dbInstance = $conn->connection();

        $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
        $sqlQuery  = (new \Simplon\Db\SqlQueryBuilder())
            ->setQuery('SELECT * FROM tab_users WHERE email = :email AND password = :pass')
            ->setConditions(['email' => "$email", 'pass' => "$password"]);
        $results = $sqlManager->fetchAll($sqlQuery);

        if (!$results) {

            echo "Usuário não cadastrado";
            exit;
        } else {

            foreach ($results as $key) {

                if ($key['status'] === '0') {
                    echo "Usuário com status desabilitado, não será possivel continuar";
                    exit;
                } else {

                    $appFunctions = new appFunctions();
                    $create_session = $appFunctions->create_session(
                        $key['id'],
                        $key['cpf'],
                        $key['name'],
                        $key['email'],
                        $key['dt_creatd'],
                        $key['dt_update'],
                        'Conected'
                    );

                    //echo "<pre>";
                    //print_r($results);
                    //echo phpinfo();
                }
            }
        }
    }
}
