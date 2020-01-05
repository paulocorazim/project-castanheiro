<?php

Class appFunctions
{

    public function create_session($id, $cpf, $name, $email, $user_type, $dt_creatd, $dt_update, $connected)
    {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = $user_type;
        $_SESSION['dt_creatd'] = $dt_creatd;
        $_SESSION['dt_update'] = $dt_update;
        $_SESSION['Connected'] = $connected;
    }


    public function validate_session()
    {
        session_start();
        if (!isset($_SESSION['Connected'])) {
            echo "<b>Usuário não esta logado!</b>";
            header("Location: ../");
            exit();
        }
    }

    public function alert_error()
    {
        $alert_error = <<<EOT
       <div class="alerta error">Oh não! Isso foi em forma de pera.</div>
           
EOT;

        return $alert_error;
    }


    public function alert_sucess()
    {
        $alert_sucess = <<<EOT
       <div class="alerta sucesso">Parabéns! Você fez alguma coisa.</div>
    
EOT;

        return $alert_sucess;
    }


    public function alert_attention()
    {
        $alert_attention = <<<EOT
       <div class="alerta atencao">Segurem-se, você pode querer verificar isso.</div>
    
EOT;

        return $alert_attention;
    }


    public function alert_warning()
    {
        $alert_warning = <<<EOT
       <div class="alerta info">Eu tinha torradas para o café da manhã.</div> 
    
EOT;

        return $alert_warning;
    }
    
}
