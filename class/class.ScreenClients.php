<?php

Class ScreenClients{

public function screenFormClient()
{

    return <<< EOT
    <div class="containerprincipal">
            <div class="margin_esq_padrao">
                <h2>Cadastro de Clientes</h2>
            </div>
            <div class="flex_main">
                <div class="flex_sub">
                    <form action="" method="post">
                    <h3 class="spaninput">Informações:</h3>
                    <hr>
                        <div class="input-group">
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
                   <select name="user_module[]" id="user_module[]" multiple size="10">
                        $typeModules[1]
                    </select>
                </div>        
            </div>
            <div class="flex_sub">
                    <h3 class="spaninput">Permissões para os módulos.</h3>
                    <hr>
                    <select name="user_permission[]" id="user_permission[]" multiple size="6">
                        <option value="I"><span>Inserir -> ( Permite inclusão de registros )</span></option>
                        <option value="S"><span>Seleção -> ( Permite seleções de registros )</span></option>
                        <option value="U"><span>Alterar -> ( Permite Alterações de registros )</span></option>
                        <option value="D"><span>Deletar -> ( Permite APAGAR registros )</span></option>
                    </select><br><br>
                    <button type="submit" name="btn_update" id="btn_upadte">C A D A S T R A R</button>
                </form>
            </div>
        </div>
        <div class="margin_esq_padrao">
            <h2> Usuários já Cadastrados</h2>
        </div>

EOT;


}


    public function screenListClient()
    {

    }


}
