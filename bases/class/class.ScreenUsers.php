<?php

class ScreenUsers
{
    public function screenFormUser($typeModules)
    {
        $screenFormUser = <<< EOT
        <script src="../js/main.js" type="text/javascript" type="text/javascript"></script>

        <div class="container">        
           <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Novo Usuário</h1>
            </div>
               <form class="user">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input class="form-control form-control-user" id="exampleFirstName" placeholder="First Name"
                             type="text">
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control form-control-user" id="exampleLastName" placeholder="Last Name"
                             type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <input class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address"
                           type="email">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"
                             type="password">
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password"
                             type="password">
                    </div>
                  </div>
                  <a class="btn btn-primary btn-user btn-block" href="index.php">
                    Register Account
                  </a>
                  <hr>
                  <a class="btn btn-google btn-user btn-block" href="index_.html">
                    <i class="fab fa-google fa-fw"></i> Register with Google
                  </a>
                  <a class="btn btn-facebook btn-user btn-block" href="index_.html">
                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                  </a>
                </form>
                             
        </div>
        
        
                


EOT;

        return $screenFormUser;
    }

    public function screenFormUserEdit($activeRecordsEdit, $typeModules)
    {
        $selectModules = "";

        foreach ($activeRecordsEdit[0] as $user_regist) { //dados do usuário

            if ($user_regist['status'] == 0) {

                $checked_status = "checked";
            } else {
                $checked_status = "";
            }

            if ($user_regist['type'] == 'master') {

                $checked_master = "checked";
            } else {
                $checked_master = "";
            }

            foreach ($activeRecordsEdit[1] as $modules_regist) {

                $selectModule = "<option value='$modules_regist[id]'>$modules_regist[name_link]</option>";
                $selectModules .= $selectModule;
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
            
            <div class="sys_containerprincipal">
                <div class="sys_margin_esq_padrao">
                    <h2> Cadastro de Usuário</h2>
                    <h3 class="sys_spaninput"> Editando usuário: $user_regist[name]</h3>
                </div>
                <div class="sys_flex_main">
                    <div class="sys_flex_sub">
                        <form action="manager.users.php" method="post">
                            <div class="form-control form-control-user>
                                <input type="hidden" name="user_id" id="user_id" value="$user_regist[id]" >
                                <input type="text" name="user_name" id="user_name" class="sys_form-control" value="$user_regist[name]">
                                <label for="name">Nome</label>
                            </div>
                            <div class="form-control form-control-user>
                                <input type="text" name="user_cpf" id="user_cpf" class="sys_form-control" onblur="return valid()" value="$user_regist[cpf]">
                                <label for="cpf">Cpf</label>
                            </div>
                            <div class="form-control form-control-user>
                                <input type="email" name="user_email" id="user_email" class="sys_form-control" value="$user_regist[email]">
                                <label for="email">E-mail</label>
                            </div>
                            <div class="form-control form-control-user>
                                <input type="password" name="user_password" id="user_password" class="sys_form-control" value="" title=";) Deixe em branco para não mudar!" >
                                <label for="password">Crie uma senha</label>
                            </div>
                            <div class="form-control form-control-user>
                                <input type="password" name="user_confirm_password" id="user_confirm_password" class="sys_form-control" value="">
                                <label for="confpass">Confirme a Senha</label>
                            </div>
                            <div class="form-control form-control-user>
                                <l<h3 class="sys_spaninput">Desativar Usuário</h3>
                                { <input type="checkbox" name="status" id="status" text="status" value="inativo" $checked_status ></span> }
                            </div>
                    </div>
                <div class="sys_flex_sub">     
                <h3 class="sys_spaninput">Permissões do Usuário</h3> 
                <hr>    
                    <div class="form-control form-control-user>
                        <input type="checkbox" name="permission_master" id="permission_master" text="master" value="master" $checked_master><span>Master ( Permissão ADMIN )</span>
                    </div>  
                    <h3 class="sys_spaninput">Módulos atuais.</h3>      
                    <hr>          
                    <div class="form-control form-control-user>                        
                       <select name="user_module_curret[]" id="user_module_curret[]" multiple multiple size="9">
                            $selectModules
                        </select>
                    </div>
                    <h3 class="sys_spaninput">Selecione os novos.</h3>                
                    <div class="form-control form-control-user>                        
                       <select name="user_module[]" id="user_module[]" multiple multiple size="9">
                            $typeModules[1]
                        </select>
                    </div>        
                </div>
                    <div class="sys_flex_sub">
                        <h3 class="sys_spaninput">Permissões atuais.</h3>
                        <hr>
                        <div class="form-control form-control-user>
                        <select name="user_permission_current[]" id="user_permission_current[]" multiple size="5">
                            $insert
                            $select
                            $update
                            $delete
                        </select>
                        </div>
                        <h3 class="sys_spaninput">Permissões novas.</h3>
                        <hr>
                        <div class="form-control form-control-user>
                        <select name="user_permission[]" id="user_permission[]" multiple size="5">
                            <option value="I"><span>Inserir -> ( Permite inclusões de registros )</span></option>
                            <option value="S"><span>Selecionar -> ( Permite seleções de registros )</span></option>
                            <option value="U"><span>Alterar -> ( Permite alterações de registros )</span></option>
                            <option value="D"><span>Deletar -> ( Permite APAGAR registros )</span></option>
                        </select>
                        </div><br><br>
                        <button type="submit" name="btn_update" id="btn_upadte">E D I T A R </button>
                </div>
            </div>
            </form>

EOT;

        }

        return $screenFormUserEdit;
    }

    public function screenListUser($listModulesPermission)
    {

        $screenListUser = <<< EOT
        <div class="sys_tableuser">
        <table class="sys_content-table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>E-mail</th>
            <th>Módulos</th>
          </tr>
        </thead>
        <tbody>
          $listModulesPermission
        </tbody>
      </table>
      </div>

EOT;

        return $screenListUser;
    }
}
