<?php

class DbManagerRecords
{
    /*Inclusão/Alteração de usuários*/
    public function manager_user($dbInstance, $regists_user, $regists_module, $regists_permission, $appFunctions)
    {
        if ($regists_user['id'] == null) {

            try {

                /*Verifica tipo de usuário */
                if ($regists_user['permission_master'] != 'master') {

                    $type = 'basic';
                } else {

                    $type = 'master';
                }

                /*            //Gera Array com os dados para insert*/
                $data = [
                    'id' => null,
                    'cpf' => "$regists_user[cpf]",
                    'name' => "$regists_user[name]",
                    'email' => "$regists_user[email]",
                    'password' => "$regists_user[password]",
                    'confirm_passwd' => "$regists_user[confirm_passwd]",
                    'dt_created' => "$regists_user[dt_created]",
                    'dt_update' => "$regists_user[dt_update]",
                    'type' => "$type",
                    'status' => "1",
                ];

                //Verifica as senhas informada.
                if ($data['password'] != $data['confirm_passwd']) {
                    $appFunctions->alert_error("Atenção! -> As senhas não combinam, por favor refaça a operação!");
                    exit();
                }

                //Verificação do uso do CPF
                $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
                $CheckCpf = (new \Simplon\Db\SqlQueryBuilder())
                    ->setQuery("SELECT cpf from tab_users WHERE cpf='$data[cpf]'");
                $user_cpf = $sqlManager->fetchAll($CheckCpf);

                if (!$user_cpf) {

                    //Se o cpf não existe ainda, da sequencia no cadastro
                    $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                        ->setTableName('tab_users') // define the table name
                        ->setData($data); // set data (keys = database column name)
                    $sqlManager->insert($sqlQuery);

                    //Verifica ultimo ID cadastrado
                    $lastID = (new \Simplon\Db\SqlQueryBuilder())
                        ->setQuery('SELECT LAST_INSERT_ID() as ID');
                    $results = $sqlManager->fetchAll($lastID);

                    foreach ($results as $result) { // for para pegar os módulos a serem associado no usuário

                        try {

                            foreach ($regists_module as $id_module) { /*dados recebidos do POST para saber quais módulos tem acesso*/

                                foreach ($regists_permission as $permmission) { // dados recebidos do POST para saber as permissões do módulos

                                    //Monta os dados de módulos e permissões
                                    $data_modules_permission = [
                                        'id_user' => "$result[ID]",
                                        'id_module' => "$id_module",
                                        'type' => "$permmission",
                                        'dt_created' => date('Y-m-d h:m:s'),
                                    ];

                                    //Insere as permissões
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

                    //Aviso do sucesso e redireciona a pagina
                    $appFunctions->alert_sucess("Usuário cadastrado com sucesso!");
                    $appFunctions->redirect_page('4', '../man/manager.users.php');
                    exit();


                } else {

                    // Se o CPF já foi usado, nega operação
                    $appFunctions->alert_error("Atenção! Este CPF: $user_cpf[cpf] já esta sendo usado, você deve fazer a recuperação de senha!");
                    exit();
                }

            } catch
            (Exception $e) {
                $error = $e->getMessage();
                $appFunctions->alert_error("Erro ao Inserir Usuário ->" . $error);
            }


        } else { //Edição do usuário

            /*var_dump($regists_user);
            exit();*/

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);

            try {

                /*Verifica tipo de usuário */
                if ($regists_user['permission_master'] != 'master') {

                    $type = 'basic';
                } else {

                    $type = 'master';
                }

                /*Verifica status de usuário */
                if ($regists_user['status'] != 'inativo') {

                    $status = 1;
                } else {

                    $status = 0;
                }


                if ($regists_user['password'] != null) {

                    ///dados do usuário -- alterando a senha
                    $data = [
                        'cpf' => "$regists_user[cpf]",
                        'name' => "$regists_user[name]",
                        'email' => "$regists_user[email]",
                        'password' => "$regists_user[password]",
                        'confirm_passwd' => "$regists_user[confirm_passwd]",
                        'dt_update' => "$regists_user[dt_update]",
                        'type' => "$type",
                        'status' => "$status"
                    ];

                } else {

                    ///dados do usuário
                    $data = [
                        'cpf' => "$regists_user[cpf]",
                        'name' => "$regists_user[name]",
                        'email' => "$regists_user[email]",
                        'dt_update' => "$regists_user[dt_update]",
                        'type' => "$type",
                        'status' => "$status"
                    ];
                }

                //id do usuário
                $conds = ['id' => "$regists_user[id]"];


                //Verifica as senhas informada.
                if ($data['password'] != $data['confirm_passwd']) {
                    $appFunctions->alert_error("Atenção! -> As senhas não combinam, por favor refaça a operação!");
                    exit();
                }

                $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                    ->setTableName('tab_users')    // define the table name
                    ->setConditions($conds)     // set conditions
                    ->setData($data);           // set data (keys = database column name)
                $sqlManager->update($sqlQuery);

                $appFunctions->alert_warning(";) USUÁRIO ALTERADO COM SUCESSO!");
                $appFunctions->redirect_page('4', '../man/manager.users.php');
                exit();

            } catch (Exception $e) {
                $error = $e->getMessage();
                $appFunctions->alert_error("Erro ao alterar Usuário ->" . $error);
            }
        }
    }

    /*Lendo usuário especifico by user_id*/
    public function select_user($dbInstance, $user_id, $appFunctions)
    {
        try {

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $shSelectUser = (new \Simplon\Db\SqlQueryBuilder())
                ->setQuery('SELECT * from tab_users WHERE id = :id')
                ->setConditions(['id' => "$user_id"]);
            $shResultsUser = $sqlManager->fetchAll($shSelectUser);

            try {

                foreach ($shResultsUser as $shResultsUserId) {

                    $shSelectModules = (new \Simplon\Db\SqlQueryBuilder())
                        ->setQuery('SELECT
                                        distinct
                                        a.id_module,
                                        b.name_link
                                    from
                                         tab_permissions  as a,
                                         tab_modules as b
                                    where
                                          a.id_user = :id
                                      and b.id = a.id_module')
                        ->setConditions(['id' => "$shResultsUserId[id]"]);
                    $shResultsModules = $sqlManager->fetchAll($shSelectModules);

                    try {
                        foreach ($shResultsModules as $type_permission) {

                            $shSelectPermission = (new \Simplon\Db\SqlQueryBuilder())
                                ->setQuery('SELECT
                                                    a.type
                                                from
                                                    tab_permissions  as a,
                                                    tab_modules as b
                                                where
                                                      a.id_user = :id
                                                  and b.id = a.id_module
                                                and a.id_module = :id_module')
                                ->setConditions(['id' => "$shResultsUserId[id]", 'id_module' => "$type_permission[id_module]"]);
                            $shResultsPerssion = $sqlManager->fetchAll($shSelectPermission);
                        }

                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        $appFunctions->alert_error("Erro ao selecionar Permissões ->" . $error);
                    }
                }

            } catch (Exception $e) {
                $error = $e->getMessage();
                $appFunctions->alert_error("Erro ao selecionar Módulos ->" . $error);
            }

        } catch (Exception $e) {

            $error = $e->getMessage();
            $appFunctions->alert_error("Erro ao selecionar Usuário ->" . $error);
        }

        return array($shResultsUser, $shResultsModules, $shResultsPerssion);
    }

}
