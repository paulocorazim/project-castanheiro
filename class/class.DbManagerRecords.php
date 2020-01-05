<?php

Class DbManagerRecords
{
    public function insert_user($dbInstance, $cpf, $name, $email, $password, $dt_creatd, $dt_update, $type, $status)
    {
        try {
            // query: inserts one new row
            $data = [
                'id' => NULL,
                'cpf' => "$cpf",
                'name' => "$name",
                'email' => "$email",
                'password' => "$password",
                'dt_creatd' => "$dt_creatd",
                'dt_update' => "$dt_update",
                'type' => "$type",
                'status' => "$status"
            ];

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $sqlQuery   = (new \Simplon\Db\SqlQueryBuilder())
                ->setTableName('tab_users')   // define the table name
                ->setData($data);           // set data (keys = database column name)
            $sqlManager->insert($sqlQuery);
        } catch (Exception $e) {
            echo 'Erro ao Inserir :', $e->getMessage(), "\n";
        }
    }
}
