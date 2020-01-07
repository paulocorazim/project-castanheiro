<?php

class DbManagerRecords
{
    public function insert_user($dbInstance, $regists_user, $regists_module)
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

                    foreach ($regists_module as $id_module) {
                        echo "ID user ->" . $result[ID] . "ID Module -> $id_module";
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
