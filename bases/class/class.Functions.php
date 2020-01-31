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
            $btn_type = null;
            $i = null;

            if ($type === '0') {
                $btn_type = "btn btn-danger btn-icon-split";
                $i = "fas fa-trash";
            }
            if ($type === '1') {
                $btn_type = "btn btn-success btn-icon-split";
                $i = "fas fa-check";
            }
            if ($type === '2') {
                $btn_type = "btn btn-info btn-icon-split";
                $i = "fas fa-info-circle";
            }
            if ($type === '3') {
                $btn_type = "btn btn-warning btn-icon-split";
                $i = "fas fa-exclamation-triangle";
            }

            $div_type = <<<EOT
        <div class="my - 2"></div>
        <a class="$btn_type" href="#">
            <span class="icon text-white-50">
              <i class="$i" ></i >
            </span >
          <span class="text"> $msg</span>
        </a >
EOT;

            return $div_type;
        }

        public function redirect_page($time, $url)
        {

            echo $redirect_page = <<<EOT
        <meta http-equiv='refresh' content='$time;url=$url' />

EOT;
            return $redirect_page;
        }

        public function icone_fas_fan($param)
        {
            $icone_fas_fan = null;

            if ($param == 0) {
                //Dash
                $icone_fas_fan = "<i class=\"fas fa-fw fa-tachometer-alt\"></i>";
            }
            if ($param == 1) {
                //Boletos
                $icone_fas_fan = "<i class=\"fas fa-barcode\"></i>";
            }
            if ($param == 2) {
                //Clientes
                $icone_fas_fan = "<i class=\"fas fa-users\"></i>";
            }
            if ($param == 3) {
                //Usuários
                $icone_fas_fan = "<i class=\"fas fa-user-friends\" ></i >";
            }
            if ($param == 4) {
                //Vencimentos
                $icone_fas_fan = "<i class=\"fas fa-calendar\"></i>";
            }
            if ($param == 5) {
                //Borderô
                $icone_fas_fan = "<i class=\"fas fa-file-invoice\"></i>";
            }
            if ($param == 6) {
                //Vistorias
                $icone_fas_fan = "<i class=\"fas fa-paper-plane\"></i>";
            }

            return $icone_fas_fan;
        }

    }
