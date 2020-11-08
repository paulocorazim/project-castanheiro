<?php /** @noinspection ALL */

Class appFunctions
{
	public function create_session($id, $cpf, $name, $email, $user_type, $dt_creatd, $dt_update, $connected)
	{
		session_start();
		$_SESSION[ 'id' ] = $id;
		$_SESSION[ 'cpf' ] = $cpf;
		$_SESSION[ 'name' ] = $name;
		$_SESSION[ 'email' ] = $email;
		$_SESSION[ 'user_type' ] = $user_type;
		$_SESSION[ 'dt_creatd' ] = $dt_creatd;
		$_SESSION[ 'dt_update' ] = $dt_update;
		$_SESSION[ 'Connected' ] = $connected;
	}

	public function validate_session()
	{
		session_start();
		if (!isset($_SESSION[ 'Connected' ])) {
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
			//Imóveis
			$icone_fas_fan = "<i class=\"far fa-building\"></i>";
		}
		if ($param == 7) {
			//Vistorias
			$icone_fas_fan = "<i class=\"fas fa-building\"></i>";
		}

		return $icone_fas_fan;
	}

	public function upload_files($clientID, $clientDOC, $typeDoc)
	{
		$type = null;
		$resp = null;

		$_FILES = $clientDOC;


		// Pasta onde o arquivo vai ser salvo
		if ($typeDoc == 'Documents') {
			$_UP[ 'pasta' ] = "../docs/clients/$clientID/";
			$_UP[ 'renomeia' ] = false;
		
		} elseif ($typeDoc == 'Contract') {
			$_UP[ 'pasta' ] = "../docs/clients/$clientID/contracts/";
			$_UP[ 'renomeia' ] = false;

		} elseif ($typeDoc == 'Survey') {
			$_UP[ 'pasta' ] = "../docs/clients/$clientID/survey/";
			$_UP[ 'renomeia' ] = false;

		} else {
			$_UP[ 'pasta' ] = "../docs/clients/$clientID/savings/";
			$_UP[ 'renomeia' ] = true;
		}

		// Tamanho máximo do arquivo (em Bytes)
		$_UP[ 'tamanho' ] = 1024 * 1024 * 4; // 2Mb

		// Array com as extensões permitidas
		$_UP[ 'extensoes' ] = array('jpg', 'png', 'gif', 'pdf', 'doc', 'docx');

		// Array com os tipos de erros de upload do PHP
		$_UP[ 'erros' ][ 0 ] = 'Não houve erro';
		$_UP[ 'erros' ][ 1 ] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP[ 'erros' ][ 2 ] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP[ 'erros' ][ 3 ] = 'O upload do arquivo foi feito parcialmente';
		$_UP[ 'erros' ][ 4 ] = 'Não foi feito o upload do arquivo';

		// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
		if ($_FILES[ 'error' ] != 0) {
			$type = '0';
			$resp = "Não foi possível fazer o upload, erro:" . $_UP[ 'erros' ][ $_FILES[ 'error' ] ];
			exit(); // Para a execução do script
		}

		// Faz a verificação da extensão do arquivo
		$extensao = strtolower(end(explode('.', $_FILES[ 'name' ])));

		if (array_search($extensao, $_UP[ 'extensoes' ]) === false) {
			$type = '3';
			$resp = "Por favor, envie arquivos com as seguintes extensões: jpg, png, gif, pdf, doc ou docx";

		} else {
			
			if ($_UP[ 'renomeia' ] == true) {
				$nome_final = date('Y-m-d') . ".$extensao";
			} else {
				$nome_final = $_FILES[ 'name' ];
			}

			if (move_uploaded_file($_FILES[ 'tmp_name' ], $_UP[ 'pasta' ] . $nome_final)) {
				$type = '1';
				$resp = "Upload do arquivo -> $nome_final  efetuado com sucesso!";

			} else {
				$type = '0';
				$resp = "Não foi possível enviar o arquivo, tente novamente";

			}
			
			// if ($_UP[ 'tamanho' ] < $_FILES[ 'size' ]) {
			// 	$type = '3';
			// 	$resp = "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";

			// } else {

				
			// }
		}

		return array($type, $resp, $nome_final);
	}

	public function load_files($clientID)
	{
		$clientPathFile = "../docs/clients/$clientID/";
		$dirPath = dir($clientPathFile);
		$files_name = null;

		while ($file = $dirPath->read()) {

			if ($file != 'Thumbs.db' AND $file != '.' AND $file != '..' AND $file != 'savings' AND $file != 'contracts' AND $file != 'survey') {

				$file_name = "<a href='$clientPathFile$file' target='_blank'>$file</a><hr>";
				$files_name .= $file_name;
			}
		}

		if (empty($files_name)) {
			return $files_name = null;
		} else {
			return $files_name;
		}
	}

	public function load_contracts($clientID)
	{
		$clientPathFile = "../docs/clients/$clientID/contracts/";
		$dirPath = dir($clientPathFile);
		$files_name = null;

		while ($file = $dirPath->read()) {

			if ($file != 'Thumbs.db' AND $file != '.' AND $file != '..' AND $file != 'savings' AND $file != 'contracts') {

				$file_name = "<a href='$clientPathFile$file' target='_blank'>$file</a><hr>";
				$files_name .= $file_name;
			}
		}

		if (empty($files_name)) {
			return $files_name = null;
		} else {
			return $files_name;
		}
	}
}