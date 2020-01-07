<?php

class DbManagerRecords
{
    public function insert_user($dbInstance, $regists_user, $regists_module, $regists_permission, $appFunctions)
    {
        try
        {
            //Tratamento do cadastro de usuários

            if ($regists_user['permission_master'] != 'master') {
                $type = 'basic';
            } else {
                $type = 'master';
            }

            $data = [
                'id' => null,
                'cpf' => "$regists_user[cpf]",
                'name' => "$regists_user[name]",
                'email' => "$regists_user[email]",
                'password' => "$regists_user[password]",
                'dt_created' => "$regists_user[dt_created]",
                'dt_update' => "$regists_user[dt_update]",
                'type' => "$type",
                'status' => "1",
            ];

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $CheckCpf = (new \Simplon\Db\SqlQueryBuilder())
                ->setQuery("SELECT cpf from tab_users WHERE cpf='$data[cpf]'");
            $user_cpf = $sqlManager->fetchAll($CheckCpf);

            if(!$user_cpf){

                $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                    ->setTableName('tab_users') // define the table name
                    ->setData($data); // set data (keys = database column name)
                $sqlManager->insert($sqlQuery);

                $lastID = (new \Simplon\Db\SqlQueryBuilder())
                    ->setQuery('SELECT LAST_INSERT_ID() as ID');
                $results = $sqlManager->fetchAll($lastID);

                foreach ($results as $result) {
                    try {

                        foreach ($regists_module as $id_module) { /*dados recebidos do POST para saber quais módulos tem acesso*/

                            foreach ($regists_permission as $permmission){ // dados recebidos do POST para saber as permissões do módulos

                                $data_modules_permission = [
                                    'id_user' => "$result[ID]",
                                    'id_module' => "$id_module",
                                    'type' => "$permmission",
                                    'dt_created' => date('Y-m-d h:m:s'),
                                ];

                                $sqlInsert = (new \Simplon\Db\SqlQueryBuilder())
                                    ->setTableName('tab_permissions') // define the table name
                                    ->setData($data_modules_permission); // set data (keys = database column name)
                                $sqlManager->insert($sqlInsert);
                            }
                        }

                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        $appFunctions->alert_error("Erro ao Inserir Módulos / Permissões ->" . $error);
                    }
                }

                $appFunctions->alert_sucess("Usuário cadastrado com sucesso!");
                $appFunctions->redirect_page('6', '../man/manager.users.php');
                exit();

            } else {
                $appFunctions->alert_error("Atenção! Este CPF: $user_cpf[cpf] já esta sendo usado, você deve fazer a recuperação de senha!");
            }

            $appFunctions->alert_sucess("Usuário cadastrado com Sucessio!");
            $appFunctions->redirect_page("4", "#");

        } catch (Exception $e) {
            $error = $e->getMessage();
            $appFunctions->alert_error("Erro ao Inserir Usuário ->" . $error);
        }
    }
}
