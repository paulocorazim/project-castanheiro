<?php

class ScreenUsers
{
    public function screenFormUser($typeModules)
    {

        $screenFormUser = <<< EOT
        <body>
        <div class="container">
            <div class="containerpadrao">
                <h2> Cadastro de Usuário</h2>
                <form action="manager.users.php" method="post">
                    <div class="input-group">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="text" name="user_name" id="user_name" class="form-control">
                        <label for="name">Nome</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="user_cpf" id="user_cpf" class="form-control">
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
                        <input type="password" name="user_confirm_password" id="user_confirm_password" class="form-control">
                        <label for="confpass">Confirme a Senha</label>
                    </div>
                    
                    <div class="input-group">
                        <span>Permissões do Usuário.</span> <br><br>
                        <input type="checkbox" name="permission_master" id="permission_master" text="master" value="master"><span>Master</span>
                        <input type="checkbox" name="permission_I" id="permission_I" text="Inserir" value="I"><span>Inserir</span>
                        <input type="checkbox" name="permission_S" id="permission_S" text="Selecionar" value="S"><span>Selecionar</span>
                        <input type="checkbox" name="permission_U" id="permission_U" text="Alterar" value="U"><span>Alterar</span>
                        <input type="checkbox" name="permission_D" id="permission_D" text="Apagar" value="D"><span>Apagar</span>
                    </div>
                    <div class="input-group">
                        <span>Módulos que o usuário pode acessar.</span><br><br>
                        $typeModules[1]
                    </div>
    
                    <button type="submit" name="btn_update" id="btn_upadte">[ ATUALIZAR ]</button>
                </form>
            </div>
        </div>
EOT;

        return $screenFormUser;
    }


    public function screenListUser()
    {

        $screenListUser = <<< EOT
        

EOT;

        return $screenListUser;
    }
}
