<?php

class DbManagerRecords
{
    public function insert_user($dbInstance, $regists)
    {
        try {

            //Tratamento do cadastro de usuários

            if ($regists['permission_master'] != 'master') {
                $type = 'basic';
            } else {
                $type = 'master';
            }

            $data = [
                'id' => null,
                'cpf' => "$regists[cpf]",
                'name' => "$regists[name]",
                'email' => "$regists[email]",
                'password' => "$regists[password]",
                'dt_creatd' => "$regists[dt_creatd]",
                'dt_update' => "$regists[dt_update]",
                'type' => "$type",
                'status' => "1",
            ];

            var_dump($data);
            exit;

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                ->setTableName('tab_users') // define the table name
                ->setData($data); // set data (keys = database column name)
            $sqlManager->insert($sqlQuery);
        } catch (Exception $e) {
            echo 'Erro ao Inserir :', $e->getMessage(), "\n";
        }
    }
}
