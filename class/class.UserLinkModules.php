<?php

class LinkModule
{

    public function LinkModules($id_user)
    {
        include('class.DbConnection.php');

        $conn = new DBconnect();
        $dbInstance = $conn->connection();
        $user_li = "";

        $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
        $sqlQuery  = (new \Simplon\Db\SqlQueryBuilder())
            ->setQuery('SELECT DISTINCT 
            c.name_link as name_link
            from 
            tab_permissions as a,
            tab_users 		as b,
            tab_modules 	as c
            WHERE
                a.id_user = b.id 
            and c.id      = a.id_module
            and a.id_user = :id_user')
            ->setConditions(['id_user' => "$id_user"]);
        $results = $sqlManager->fetchAll($sqlQuery);

        foreach ($results as $key) {
            $li = "<li><a href='manager.php'>$key[name_link]</a></li>";
            $user_li .= $li;
        }
        
        return $user_li;
    }
}
