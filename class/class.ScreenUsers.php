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
                <form action="#" method="#">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <label for="name">Nome</label>
                    </div>
                    <div class="input-group">
                        <input type="email" class="form-control">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control">
                        <label for="password">Crie uma senha</label>
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control">
                        <label for="confpass">Confirme a Senha</label>
                    </div>
                    <div class="input-group">
                        <select name="office" id="office" class="form-control">
                            <option value=""></option>
                            <option value="#">Supervisor</option>
                            <option value="#">Editor</option>
                            <option value="#">Gerente</option>
                            <option value="#">Auxiliar</option>
                        </select>
                        <label for="office">Cargo</label>
                    </div>
                    <div class="input-group">
                        <span>Permissões</span>
                        <input type="checkbox" text="master" value="master"><span>Master</span>
                        <input type="checkbox" text="simples" value="simples"><span>Simples</span>
                        <input type="checkbox" text="diversos" value="diversos"><span>Diversos</span>
                    </div>
                    <div class="input-group">
                        <span>Módulos</span>
                        $typeModules[1]
                    </div>
    
                    <button type="submit">Finalizar</button>
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
