<?php /** @noinspection DuplicatedCode */

    class LinkModule
    {
        public function LinkModules($dbInstance, $id_user, $user_type)
        {
            $user_href = ""; //NavBar
            $user_select_box = ""; //Módulos da tela de cadastro de usuários

            if ($user_type != 'master') {

                $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
                $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                    ->setQuery('SELECT DISTINCT b.name,
                                                    b.email,
                                                    c.name_link as name_link,
                                                    c.name_app  as name_app,
                                                    c.id        as id,
                                                    c.icone_fas_fa as fas_fa
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

                    $sqlQuerySubModule = (new \Simplon\Db\SqlQueryBuilder())
                        ->setQuery('SELECT name_sub_app, name_sub_link from tab_modules_sub where id_module = :id_module')
                        ->setConditions(['id_module' => "$key[id]"]);
                    $resultsSubModule = $sqlManager->fetchAll($sqlQuerySubModule);

	                $href_sub_module = null;

                    if (!$resultsSubModule) {
                        $user_href_sub_module = null;
                    } else {
                        foreach ($resultsSubModule as $subModule) {
                            $href_sub_module = "<a class='collapse-item' href='$subModule[name_sub_app]'>$subModule[name_sub_link]</a>";
                            $user_href_sub_module .= $href_sub_module;
                        }
                    }

                    $nav_bar_li = "<li class=\"nav-item\">
                      <a aria-controls=\"$key[name_link]\" aria-expanded=\"true\" class=\"nav-link collapsed\" data-target=\"#$key[name_link]\"
                         data-toggle=\"collapse\"
                         href=\"#\">
                         <i class=\"$key[fas_fa]\"></i>
                        <span>$key[name_link]</span>
                      </a>
                      <div aria-labelledby=\"$key[name_link]\" class=\"collapse\" data-parent=\"#accordionSidebar\" id=\"$key[name_link]\">
                        <div class=\"bg-white py-2 collapse-inner rounded\">
                          <h6 class=\"collapse-header\"></h6>
                            $user_href_sub_module
                          </div>
                      </div>
                    </li>";

                    $href = "<a class='collapse-item' href='$key[name_app]'>$key[name_link]</a>";
                    $user_href .= $nav_bar_li;
                    $user_href_sub_module = null;

                    $select_box = "<option class='custom-checkbox' value='$key[id]'>$key[name_link]</option>";
                    $user_select_box .= $select_box;
                }

                return array("$user_href", "$user_select_box");

            } else {

                $sqlManager = new \Simplon\Db\SqlManager($dbInstance);
                $sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
                    ->setQuery('SELECT m.id, m.name_link, m.name_app,
                                    (SELECT DISTINCT c.id
                                    from 
                                        tab_permissions as a,
                                        tab_users as b,
                                        tab_modules as c
                                    WHERE 
                                        a.id_user = b.id
                                    and c.id = a.id_module
                                    and a.id_user = "$id_user"
                                    and c.id  = m.id ) as active	
                                FROM tab_modules as m');
                $results = $sqlManager->fetchAll($sqlQuery);

                //var_dump($results);

                foreach ($results as $key) {
                    $sqlQuerySubModule = (new \Simplon\Db\SqlQueryBuilder())
                        ->setQuery('SELECT name_sub_app, name_sub_link from tab_modules_sub where id_module = :id_module')
                        ->setConditions(['id_module' => "$key[id]"]);
                    $resultsSubModule = $sqlManager->fetchAll($sqlQuerySubModule);

                    $user_href_sub_module = null;

                    if (!$resultsSubModule) {
                        $user_href_sub_module = null;
                    } else {
                        foreach ($resultsSubModule as $subModule) {
                            $href_sub_module = "<a class='collapse-item' href='$subModule[name_sub_app]'>$subModule[name_sub_link]</a>";
                            $user_href_sub_module .= $href_sub_module;
                        }
                    }

                    $nav_bar_li = "<li class=\"nav-item\">
                      <a aria-controls=\"$key[name_link]\" aria-expanded=\"true\" class=\"nav-link collapsed\" data-target=\"#$key[name_link]\"
                         data-toggle=\"collapse\"
                         href=\"#\">
                         <i class=\"far fa-paper-plane\"></i>
                        <span>$key[name_link]</span>
                      </a>
                      <div aria-labelledby=\"$key[name_link]\" class=\"collapse\" data-parent=\"#accordionSidebar\" id=\"$key[name_link]\">
                        <div class=\"bg-white py-2 collapse-inner rounded\">
                          <h6 class=\"collapse-header\"></h6>
                            $user_href_sub_module
                          </div>
                      </div>
                    </li>";

                    $href = "<a class='collapse-item' href='$key[name_app]'>$key[name_link]</a>";
                    $user_href .= $nav_bar_li;
                    $user_href_sub_module = null;


                    if ($key['active'] != null) {
                        $selected = "selected";
                    } else {
                        $selected = null;
                    }
                    $select_box = "<option value='$key[id]' $selected>$key[name_link]</option>";
                    $user_select_box .= $select_box;
                }

                return array("$user_href", "$user_select_box");
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
                                    FROM    tab_permissions
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
                            $td_permision = "$permission[type], ";
                            $td_permisions .= $td_permision;
                        }

                        $name_module = "<span  style=\"font-size: small; font-family: courier new, cursive; \">$registModules[name_link] .: $td_permisions</font><br>";
                        $name_modules .= $name_module;
                        $td_permisions = "";
                    }

                    if ($key['type'] === 'master') {
                        $name_modules = "TODOS";
                    }
                    if ($key['active'] == 0) {
                        $user_active = "I";
                        $tr = "class=\"table-danger\"";
                    } else {
                        $user_active = "A";
                    }

                    $tab_line = " 
                    <tr $tr>
                    <td>$user_active</td>
                    <td><a href='?select_id=$key[id]'>$key[name]</a> </td >                    
                    <td>$key[email]</td >                    
                    <td>$key[dt_created]</td >
                    <td>$key[dt_update]</td >
                    <td>$key[type]</td >
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
