<?php /** @noinspection DuplicatedCode */

    class LinkModule
    {

        public function LinkModules($dbInstance, $id_user, $user_type)
        {
            $user_li = ""; //NavBar
            $user_select_box = ""; //Módulos da tela de cadastro de usuários

            if ($user_type != 'master') {

                $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
            $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
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
                                      and a.id_user = :id_user
                                    order by c.name_link asc')
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
            $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                ->setQuery('SELECT * from  tab_modules as c order by name_link');
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

            $sqlManager = new \Simplon\Db\SqlManager($dbInstance); //Listando os usuários
            $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                ->setQuery('SELECT * FROM tab_users');
            $results = $sqlManager->fetchAll($sqlQuery);

            $listModulesPermission = "";
            $name_modules = "";
            $td_permisions = "";

            foreach ($results as $key) {

                $sqlModules = (new \Simplon\Db\SqlQueryBuilder()) //Listando os módulos do usuário
                ->setQuery('SELECT
                                        DISTINCT
                                        c.name_link as name_link,
                                        a.id_module as id_module
                                    from
                                        tab_permissions as a,
                                        tab_users 		as b,
                                        tab_modules 	as c
                                    WHERE
                                        a.id_user = b.id
                                        and c.id  = a.id_module
                                        and b.id  = :id_user')
                    ->setConditions(['id_user' => "$key[id]"]);
                $resultsModules = $sqlManager->fetchAll($sqlModules);

                foreach ($resultsModules as $registModules) {

                    $sqlModules = (new \Simplon\Db\SqlQueryBuilder()) //Listando as permissões do users e módulos
                    ->setQuery('SELECT * 
                                    FROM `shcombr_appmanager`.`tab_permissions`
                                    where   id_module = :id_module 
                                    and     id_user = :id_user')
                        ->setConditions(['id_module' => "$registModules[id_module]", 'id_user' => "$key[id]"]);
                    $resultsPermission = $sqlManager->fetchAll($sqlModules);

                    foreach ($resultsPermission as $permission) {

                        if ($permission['type'] == 'I') {
                            $type = 'Incluir';
                        }
                        if ($permission['type'] == 'S') {
                            $type = 'Selecionar';
                        }
                        if ($permission['type'] == 'U') {
                            $type = 'Alterar';
                        }
                        if ($permission['type'] == 'D') {
                            $type = 'Deletar';
                        }
                        $td_permision = "(x) $type, ";
                        $td_permisions .= $td_permision;
                    }

                    $name_module = "<span  style=\"font-size: small; font-family: courier new, cursive; \">$registModules[name_link] .: $td_permisions</font><br>";
                    $name_modules .= $name_module;
                    $td_permisions = "";
                }

                if ($key['type'] === 'master') {
                    $name_modules = "TODOS";
                }

                $tab_line = " 
                    <tr>
                    <td><a href='?select_id=$key[id]'>$key[name]</a> </td >
                    <td>$key[type]</td >
                    <td>$key[email]</td >
                    <td>$name_modules</td >
                    </tr>";

                $listModulesPermission .= $tab_line;
                $name_modules = "";
                $td_permisions = "";
            }

            return $listModulesPermission;
        }

    }
}
