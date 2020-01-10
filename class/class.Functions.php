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

    public function session_delete()
    {
        // Por último, destrói a sessão
        session_destroy();
    }

    public function alert_error($msg)
    {
        echo $alert_error = <<<EOT
       <div class="alerta error">$msg</div>
           
EOT;

        return $alert_error;
    }


    public function alert_sucess($msg)
    {
        echo $alert_sucess = <<<EOT
       <div class="alerta sucesso">$msg</div>
    
EOT;

        return $alert_sucess;
    }


    public function alert_attention($msg)
    {
        echo $alert_attention = <<<EOT
       <div class="alerta atencao">$msg</div>
    
EOT;

        return $alert_attention;
    }


    public function alert_warning($msg)
    {
        echo $alert_warning = <<<EOT
       <div class="alerta info">$msg</div> 
    
EOT;

        return $alert_warning;
    }

    public function redirect_page($time, $url)
    {

        echo $redirect_page = <<<EOT
        <meta http-equiv='refresh' content='$time;url=$url' />

EOT;
        return $redirect_page;
    }

}
