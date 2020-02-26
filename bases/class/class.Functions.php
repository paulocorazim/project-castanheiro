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
                $btn_type = "btn btn-danger";
                $i = "fas fa-trash";
            }
            if ($type === '1') {
                $btn_type = "btn btn-success";
                $i = "fas fa-check";
            }
            if ($type === '2') {
                $btn_type = "btn btn-info";
                $i = "fas fa-info-circle";
            }
            if ($type === '3') {
                $btn_type = "btn btn-warning";
                $i = "fas fa-exclamation-triangle";
            }
            if ($type === '4') {
                $btn_type = "btn btn-primary";
                $i = "fas fa-flag";
            }
            if ($type === '5') {
                $btn_type = "btn btn-secondary";
                $i = "fas fa-arrow-right";
            }
            if ($type === '5') {
                $btn_type = "btn btn-light";
                $i = "fas fa-arrow-right";
            }
            return <<<EOT
            <div class="alert alert-light alert-dismissible fade show" role="alert">
                <span class="icon text-white-50">
                <button class="$btn_type btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="$i"></i>
                    </span>
                  <span class="text">$msg</span>
                </button>                 

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            
EOT;
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

        public function upload_files($clientID, $clientDOC)
        {
            $resp = null;

            var_dump($_FILES);

            // Pasta onde o arquivo vai ser salvo
            $_UP['pasta'] = "../docs/clients/$clientID/";

            // Tamanho máximo do arquivo (em Bytes)
            $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

            // Array com as extensões permitidas
            $_UP['extensoes'] = array('jpg', 'png', 'gif', 'pdf');

            // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
            $_UP['renomeia'] = false;

            // Array com os tipos de erros de upload do PHP
            $_UP['erros'][0] = 'Não houve erro';
            $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
            $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
            $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
            $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

            // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
            if ($_FILES["$clientDOC"]['error'] != 0) {
                $resp = "Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES["$clientDOC"]['error']];
                exit(); // Para a execução do script
            }

            // Faz a verificação da extensão do arquivo
            echo $extensao = strtolower(end(explode('.', $_FILES["$clientDOC"]['name'])));

            if (array_search($extensao, $_UP['extensoes']) === false) {
                $resp = "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";

            } else {

                if ($_UP['tamanho'] < $_FILES["$clientDOC"]['size']) {
                    $resp = "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";

                } else {

                    if ($_UP['renomeia'] == true) {
                        $nome_final = time() . '.jpg';

                    } else {
                        $nome_final = $_FILES["$clientDOC"]['name'];
                    }

                    if (move_uploaded_file($_FILES["$clientDOC"]['tmp_name'], $_UP['pasta'] . $nome_final)) {
                        $resp = "Upload efetuado com sucesso!";

                    } else {
                        $resp = "Não foi possível enviar o arquivo, tente novamente";

                    }
                }
            }

            return $resp;
        }

    }
