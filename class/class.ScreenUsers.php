<?php

class ScreenUsers
{
    public function screenFormUser($typeModules)
    {
        $screenFormUser = <<< EOT
        <div class="containerprincipal">
            <div class="margin_esq_padrao">
                <h2>Cadastro de Usuário</h2>
            </div>
            <div class="flex_main">
                <div class="flex_sub">
                    <form action="manager.users.php" method="post">
                    <h3 class="spaninput">Informações:</h3>
                    <hr>
                        <div class="input-group">
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="text" name="user_name" id="user_name" class="form-control">
                            <label for="name">Nome</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="user_cpf" id="user_cpf" class="form-control" onblur="return valid()">
                            <label for="cpf">Cpf</label>
                        </div>
                        <div class="input-group">
                            <input type="email" name="user_email" id="user_email" class="form-control">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="input-group">
                            <input type="password" name="user_password" id="user_password" class="form-control">
                            <label for="password">Crie uma senha</label>
                        </div>
                        <div class="input-group">
                            <input type="password" name="user_confirm_password" id="user_confirm_password"
                                class="form-control">
                            <label for="confpass">Confirme a Senha</label>
                        </div>
                </div>
            <div class="flex_sub">     
            <h3 class="spaninput">Permissões do Usuário</h3>  
            <hr>    
                <div class="input-group">
                    <input type="checkbox" name="permission_master" id="permission_master" text="master" value="master"><span>Master ( Permissão ADMIN )</span>
                </div>  
                <h3 class="spaninput">Módulos que o usuário pode acessar:</h3>  
                <hr>              
                <div class="input-group">                        
                   <select name="user_module[]" id="user_module[]" multiple>
               $typeModules[1]
                    </select>
                </div>        
            </div>
            <div class="flex_sub">
                    <h3 class="spaninput">Permissões para os módulos.</h3>
                    <hr>
                    <select name="user_permission[]" id="user_permission[]" multiple>
                        <option value="I"><span>Inserir -> ( Permite inclusão de registros )</span></option>
                        <option value="S"><span>Seleção -> ( Permite seleções de registros )</span></option>
                        <option value="U"><span>Alterar -> ( Permite Alterações de registros )</span></option>
                        <option value="D"><span>APAGAR ->  ( Permite APAGAR registros )</span></option>
                    </select><br>
                    <button type="submit" name="btn_update" id="btn_upadte">[ ATUALIZAR ]</button>
                </form>
            </div>
        </div>
        <div class="margin_esq_padrao">
            <h2> Usuários já Cadastrados</h2>
        </div>

EOT;

        return $screenFormUser;
    }

    public function screenFormUserEdit($activeRecordsEdit, $typeModules)
    {
        foreach ($activeRecordsEdit[0] as $user_regist) {

            foreach ($activeRecordsEdit[1] as $modules_regist) {

                $selectModules = "<option value='$modules_regist[id]'>$modules_regist[name_link]</option>";
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
                    $delete = "<option value = \"D\" ><span > APAGAR -> (Permite Apagar registros )</span ></option >";
                }
            }

            $screenFormUserEdit = <<< EOT
            
        <div class="containerprincipal">
            <div class="margin_esq_padrao">
                <h2> Cadastro de Usuário</h2>
                <h3 class="spaninput"> Editando usuário: $user_regist[name]</h3>
            </div>
            <div class="flex_main">
                <div class="flex_sub">
                    <form action="manager.users.php" method="post">
                        <div class="input-group">
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="text" name="user_name" id="user_name" class="form-control" value="$user_regist[name]">
                            <label for="name">Nome</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="user_cpf" id="user_cpf" class="form-control" onblur="return valid()" value="$user_regist[cpf]">
                            <label for="cpf">Cpf</label>
                        </div>
                        <div class="input-group">
                            <input type="email" name="user_email" id="user_email" class="form-control" value="$user_regist[email]">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="input-group">
                            <input type="password" name="user_password" id="user_password" class="form-control" value="$user_regist[password]">
                            <label for="password">Crie uma senha</label>
                        </div>
                        <div class="input-group">
                            <input type="password" name="user_confirm_password" id="user_confirm_password" class="form-control" value="$user_regist[password]">
                            <label for="confpass">Confirme a Senha</label>
                        </div>
                </div>
            <div class="flex_sub">     
            <h3 class="spaninput">Permissões do Usuário</h3> 
            <hr>    
                <div class="input-group">
                    <input type="checkbox" name="permission_master" id="permission_master" text="master" value="master"><span>Master ( Permissão ADMIN )</span>
                </div>  
                <h3 class="spaninput">Módulos atuais.</h3>      
                <hr>          
                <div class="input-group">                        
                   <select name="user_module[]" id="user_module[]" multiple>
                        $selectModules
                    </select>
                </div>
                <h3 class="spaninput">Selecione os novos.</h3>                
                <div class="input-group">                        
                   <select name="user_module[]" id="user_module[]" multiple>
                        $typeModules[1]
                    </select>
                </div>        
            </div>
                <div class="flex_sub">
                    <h3 class="spaninput">Permissões atuais.</h3>
                    <hr>
                    <div class="input-group">
                    <select name="user_permission[]" id="user_permission[]" multiple>
                        $insert
                        $select
                        $update
                        $delete
                    </select>
                    </div>
                    <h3 class="spaninput">Permissões novas.</h3>
                    <hr>
                    <div class="input-group">
                    <select name="user_permission[]" id="user_permission[]" multiple>
                        <option value="I"><span>Inserir -> ( Permite inclusões de registros )</span></option>
                        <option value="S"><span>Seleção -> ( Permite seleções de registros )</span></option>
                        <option value="U"><span>Alterar -> ( Permite alterações de registros )</span></option>
                        <option value="D"><span>APAGAR ->  ( Permite APAGAR registros )</span></option>
                    </select>
                    </div>
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
        <table class="content-table">
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
