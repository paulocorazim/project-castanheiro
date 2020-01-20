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

    public function delete_session()
    {
        session_destroy();
    }

    public function alert_system($type, $msg)
    {

        if ($type == 0) {

            $alert = 'alert-danger';
        }
        if ($type == 1) {

            $alert = 'alert-success';
        }
        if ($type == 2) {

            $alert = 'alert-primary';
        }
        if ($type == 3) {

            $alert = 'alert-secondary';
        }
        if ($type == 4) {

            $alert = 'alert-warning';
        }
        if ($type == 5) {

            $alert = 'alert-info';
        }
        if ($type == 6) {

            $alert = 'alert-light';
        }
        if ($type == 7) {

            $alert = 'alert-dark';
        }

        $alert_type = <<<EOT
        <div class="alert $alert" role="alert">
          $msg
        </div>

EOT;

        return $alert_type;
    }

    public function redirect_page($time, $url)
    {

        echo $redirect_page = <<<EOT
        <meta http-equiv='refresh' content='$time;url=$url' />

EOT;
        return $redirect_page;
    }


}
