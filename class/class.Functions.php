<?php

class appFunctions
{

    public function create_session($id, $cpf, $name, $email, $dt_creatd, $dt_update, $connected)
    {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['dt_creatd'] = $dt_creatd;
        $_SESSION['dt_update'] = $dt_update;
        $_SESSION['Connected'] = $connected;
    }


    public function validate_session()
    {
        session_start();
        if (!isset($_SESSION['Connected'])) {
            echo "Usuário não esta logado";
            exit;
        }
    }
}
