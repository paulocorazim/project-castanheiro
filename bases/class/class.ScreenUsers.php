<?php

    class ScreenUsers
    {
        public function screenFormUser($typeModules)
        {
            return <<< EOT
            <div class="container-fluid">
              <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="p-5">
                      <div class="text-left">
                          <h1 class="h4 text-gray-900 mb-4">Novo Usuário</h1>
                      </div>
                      <form class="user" action="../man/manager.users.php" method="post">
                          <div class="form-group row">
                              <div class="col-sm-6">
                                  <span>Nome</span>
                                  <input type="text" required class="form-control" id="user_name" name="user_name">
                              </div>
                              <div class="col-sm-6">
                                  <span>CPF</span>
                                  <input required class="form-control" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' type="text">
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-4">
                              <span>E-mail</span>
                              <input required class="form-control" id="user_email" name="user_email" type="email">
                            </div>
                            <div class="col-sm-4">
                              <span>Senha</span>
                              <input required class="form-control" id="user_password" name="user_password" type="password">
                            </div>
                            <div class="col-sm-4">
                              <span>Repita a Senha</span>
                                  <input class="form-control" id="user_confirm_password" name="user_confirm_password" type="password">
                              </div>
                          </div>
                          <hr>
                          Usuário Master : [ Se sim, o usuário tera acesso irrestrito ao sitema ] :
                          ( <input type="checkbox" class="btn btn-outline-success" id="permission_master" name="permission_master"
                              value="master" OnClick="disable_user_modules_permissions()"></a> )
                          <hr>
          
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="card shadow mb-4">
                                      <div class="card-header py-3">
                                          <h6 class="m-0 font-weight-bold text-primary">Módulos</h6>
                                      </div>
          
                                      <div class="card-body">
                                          <select id="user_module[]" name="user_module[]" multiple size="8"
                                              style="max-width:100%;">
                                              $typeModules[1]
                                              <select>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="card shadow mb-4">
                                      <div class="card-header py-3">
                                          <h6 class="m-0 font-weight-bold text-primary">Permissões do Módulos</h6>
                                      </div>
                                      <div class="card-body">
                                          <select id="user_permission[]" name="user_permission[]" multiple multiple size="8">
                                              <option value="I"><span> Inserir -> (Permite inclusões de registros )</span>
                                              </option>
                                              <option value="S"><span> Selecionar -> (Permite seleções de registros )</span>
                                              </option>
                                              <option value="U"><span> Alterar -> (Permite alterações de registros )</span>
                                              </option>
                                              <option value="D"><span> Deletar -> (Permite APAGAR registros )</span></option>
          
                                              <select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <hr>
                          <div class="text-right">
                          <button type="submit" id="btn_update" name="btn_update" class="btn btn-primary btn-user">CADASTRAR</button>
                        </div>  </form>
                  </div>
EOT;
        }

        public function screenFormUserEdit($activeRecordsEdit, $typeModules)
        {
            /**
             * var_dump($activeRecordsEdit[0]); //Dados do usuário
             * var_dump($activeRecordsEdit[1]); //Modulos do usuário
             * var_dump($activeRecordsEdit[2]); //Permissões  no módulo
             * var_dump($activeRecordsEdit[3]); //Todos Modulos
             **/

            $selectModules = "";

            foreach ($activeRecordsEdit[0] as $user_regist) { //dados do usuário

                if ($user_regist['active'] == 1) {
                    $checked_status_active = "selected";
                    $border = "border-bottom-success";
                } else {
                    $checked_status_bloq = "selected";
                    $border = "border-bottom-danger";
                }

                if ($user_regist['type'] == 'master') {
                    $checked_master = "checked";
                } else {
                    $checked_master = "";
                }

                foreach ($activeRecordsEdit[3] as $moduleAll) {

                    foreach ($activeRecordsEdit[1] as $moduleForUser) {

                        if ($moduleForUser['id_module'] === $moduleAll['id']) {
                            $module_selected = "selected";
                        }
                    }

                    $selectModule = "<option value='$moduleAll[id]' $module_selected>$moduleAll[name_link]</option>";
                    $selectModules .= $selectModule;
                    $module_selected = null;
                }

                foreach ($activeRecordsEdit[2] as $type_pemission) {
                    if ($type_pemission['type'] == 'I') {
                        $insert = "<option value = \"I\" ><span > Inserir -> (Permite inclusões de registros )</span ></option >";
                    }
                    if ($type_pemission['type'] == 'S') {
                        $select = "<option value = \"S\" ><span > Selecionar -> (Permite seleções de registros )</span ></option >";
                    }
                    if ($type_pemission['type'] == 'U') {
                        $update = "<option value = \"U\" ><span > Alterar -> (Permite alterações de registros )</span ></option >";
                    }
                    if ($type_pemission['type'] == 'D') {
                        $delete = "<option value = \"D\" ><span > Deletar -> (Permite APAGAR registros )</span ></option >";
                    }
                }

                $screenFormUserEdit = <<< EOT
            
            <div class="container">        
           <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="p-5">

               <form class="user" action="../man/manager.users.php" method="post">
               <div class="form-group row">
               <div class="col-sm-6 mb-3 mb-sm-0">
                <select class="custom-select col-sm-4 $border"  name="user_active" id="user_active">
                    <option value="1" $checked_status_active>Ativo</option>
                    <option value="0" $checked_status_bloq>Bloqueado</option>
                </select> 
               </div> 
               </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="user_id" type="hidden" name="user_id" value="$user_regist[id]">
                      <input class="form-control form-control-user" id="user_name" name="user_name" placeholder="Nome"
                             type="text" value="$user_regist[name]">
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control form-control-user" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' placeholder="CPF" 
                             type="text" value="$user_regist[cpf]">
                    </div>
                  </div>
                  <div class="form-group">
                    <input class="form-control form-control-user" id="user_email" name="user_email" placeholder="E-mail"
                           type="email" value="$user_regist[email]">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input class="form-control form-control-user" id="user_password" name="user_password" placeholder="Senha"
                             type="password" value="$user_regist[password]">
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control form-control-user" id="user_confirm_password" name="user_confirm_password"  placeholder="Repita a Senha"
                             type="password" value="$user_regist[confirm_passwd]" >
                    </div>
                  </div>
                  <hr>
                     Usuário Master : [ Se sim, o usuário tera acesso irrestrito ao sitema ] :
                    ( <input type="checkbox" class="btn btn-outline-success" id="permission_master" name="permission_master" value="master"  OnClick="disable_user_modules_permissions()" $checked_master ></a> )
                  <hr>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Módulos</h6>
                                </div>                                

                                <div class="card-body">
                                    <select id="user_module[]" name="user_module[]" multiple size="8"  style="max-width:100%;">
                                        $selectModules
                                      <select> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Permissões do Módulos</h6>
                                </div>
                                <div class="card-body">
                                    <select id="user_permission[]" name="user_permission[]" multiple multiple size="8">
                                        <option value = "I" ><span > Inserir -> (Permite inclusões de registros )</span ></option >
                                        <option value = "S" ><span > Selecionar -> (Permite seleções de registros )</span ></option >
                                        <option value = "U" ><span > Alterar -> (Permite alterações de registros )</span ></option >
                                        <option value = "D" ><span > Deletar -> (Permite APAGAR registros )</span ></option >
                                        
                                      <select> 
                                </div>
                            </div>
                        </div>
                    </div>                
                    
                  <hr>
                  <button type="submit" id="btn_update" name="btn_update" class="btn btn-primary btn-user btn-block">A L T E R A R</button>
                  
                </form>
                  
        </div>
EOT;

            }

            return $screenFormUserEdit;
        }

        public function screenListUser($listModulesPermission)
        {
            return <<< EOT
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">[ Somente usuário master tem acesso a esse relatório ]</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table cellspacing="1" class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                    <tr>
                      <th>Status</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Criado</th>
                      <th>Ultima Alteração</th>
                      <th>T.User</th>
                      <th>Módulos</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                      <th>Status</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Criado</th>
                      <th>Ultima Alteração</th>
                      <th>Tipo User</th>
                      <th>Módulos</th>
                    </tr>
                    </tfoot>
                    <tbody>
                      $listModulesPermission
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

EOT;
        }
    }
