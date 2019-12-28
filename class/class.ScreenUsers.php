<?php

class ScreenUsers
{

    public function screenFormUser()
    {

        $screenFormUser = <<< EOT
        <div class="cadeusersmaster">
        <form class="cadu" method="GET">
            <span class="spantitle">Cadastro de Usuário</span>
            <br>
            <span>Nome do Usuário</span>
            <br>
            <input type="text" text="nome" placeholder="">
            <br>
            <span>E-mail para login</span>
            <br>
            <input type="e-mail" text="e-mail" placeholder="">
            <br>
            <span>Cargo</span>
            <br>
            <select>
                <option value="valor1">x</option>
                <option value="valor2">y</option>
                <option value="valor3">z</option>
            </select>
            <br>
            <span>Permissões</span>
            <br>
            <input type="checkbox" text="master">
            <label for="master">Master</label>
            <input type="checkbox" text="simples">
            <label for="simples">Simples</label>
            <input type="checkbox" text="diversos">
            <label for="diversos">Diversos</label>
            <br>
            <span>Módulos</span>
            <br>
            <input type="checkbox" text="clientes">
            <label for="clientes">Clientes</label>
            <input type="checkbox" text="contrato">
            <label for="contrato">Contrato de Locação</label>
            <br>
            <input type="checkbox" text="vencimento">
            <label for="vencimento">Vencimento</label>
            <input type="checkbox" text="clientes">
            <label for="clientes">Boletos</label>
            <br>
            <input type="checkbox" text="contrato">
            <label for="contrato">Borderos</label>
            <br>
            <button> Concluido</button>
        </form>
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
