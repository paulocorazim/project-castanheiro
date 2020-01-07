<?php

class DbManagerRecords
{
    public function insert_user($dbInstance, $regists_user, $regists_module, $regists_permission)
    {
        try {
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
                'dt_creatd' => "v[dt_creatd]",
                'dt_update' => "$regists_user[dt_update]",
                'type' => "$type",
                'status' => "1",
            ];

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
            ->setTableName('tab_users') // define the table name
            ->setData($data); // set data (keys = database column name)
            $sqlManager->insert($sqlQuery);

            $data_module =[

            ];

            $lastID = (new \Simplon\Db\SqlQueryBuilder())
            ->setQuery('SELECT LAST_INSERT_ID() as ID');
            $results = $sqlManager->fetchAll($lastID);

            foreach ($results as $result) {
                try {
                    /*"INSERT INTO shcombr_appmanager.tab_permissions (id, id_user, id_module, type, dt_created, dt_update) VALUES (1, 1, 1, 'I', '2019-12-31 00:00:00', '2019-12-31 00:00:00');
";*/
                    foreach ($regists_module as $id_module) { /*dados recebidos do POST para saber quais módulos tem acesso*/

                        foreach ($regists_permission as $permmission){ // dados recebidos do POST para saber as permissões do módulos

                            echo "ID user ->" . $result[ID] . "<br> ID Module -> $id_module : Permission -> $permmission <br>";
                        }

                    }

                }catch (Exception $e) {
                    echo 'Erro ao Inserir Módulos :', $e->getMessage(), "\n";
                }
            }

        } catch (Exception $e) {
            echo 'Erro ao Inserir :', $e->getMessage(), "\n";
        }
    }
}
