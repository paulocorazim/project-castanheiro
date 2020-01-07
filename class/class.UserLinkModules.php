<?php

class LinkModule
{

    public function LinkModules($dbInstance, $id_user, $user_type)
    {
        $user_li = ""; //NavBar
        $user_select_box = ""; //Módulos da tela de cadastro de usuários

        if ($user_type != 'master') {

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $sqlQuery  = (new \Simplon\Db\SqlQueryBuilder())
                ->setQuery('SELECT DISTINCT b.name,
                                                    b.email,
                                                    c.name_link as name_link,
                                                    c.name_app  as name_app,
                                                    c.id        as id
                                    from tab_permissions as a,
                                         tab_users as b,
                                         tab_modules as c
                                    WHERE a.id_user = b.id
                                      and c.id = a.id_module
                                      and a.id_user = :id_user')
                ->setConditions(['id_user' => "$id_user"]);
            $results = $sqlManager->fetchAll($sqlQuery);

            foreach ($results as $key) {
                $li = "<li><a href='$key[name_app]'>$key[name_link]</a></li>";
                $user_li .= $li;

                $select_box = "<option value='$key[id]'>$key[name_link]</option>";
                $user_select_box .= $select_box;
            }

            return array("$user_li", "$user_select_box");

        } else {

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $sqlQuery  = (new \Simplon\Db\SqlQueryBuilder())
                ->setQuery('SELECT * from  tab_modules as c');
            $results = $sqlManager->fetchAll($sqlQuery);

            foreach ($results as $key) {
                $li = "<li><a href='$key[name_app]'>$key[name_link]</a></li>";
                $user_li .= $li;

                $select_box = "<option value='$key[id]'>$key[name_link]</option>";
                $user_select_box .= $select_box;
            }

            return array("$user_li", "$user_select_box");
        }
    }

    public function listModulesPermission($dbInstance, $user_type)
    {
        if ($user_type == 'master') {

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                ->setQuery('SELECT * FROM tab_users');
            $results = $sqlManager->fetchAll($sqlQuery);

            $listModulesPermission = "";

            foreach ($results as $key) {

                $sqlModules = (new \Simplon\Db\SqlQueryBuilder())
                    ->setQuery('SELECT
                                        DISTINCT
                                        c.name_link as name_link
                                    from
                                        tab_permissions as a,
                                        tab_users 		as b,
                                        tab_modules 	as c
                                    WHERE
                                            a.id_user = b.id
                                        and c.id  = a.id_module
                                        and b.id = :id_user')
                    ->setConditions(['id_user' => "$key[id]"]);
                $resultsModules = $sqlManager->fetchAll($sqlModules);

                foreach ($resultsModules as $registModules) {

                    $name_module = "$registModules[name_link] <br>";
                    $name_modules .= $name_module;
                }

                $tab_line = " 
                    <tr>
                    <td>$key[name]</td >
                    <td>$key[type]</td >
                    <td>$key[email]</td >
                    <td>$name_modules</td >
                    <td></td >
                    </tr>";

                $listModulesPermission .= $tab_line;
                $name_modules = "";
            }

            return $listModulesPermission;
        }

    }


//
}
