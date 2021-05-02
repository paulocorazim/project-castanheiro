<?php

use Simplon\Db\SqlManager;
use Simplon\Db\SqlQueryBuilder;

class DbManagerRecords
{
	//Users
	/*Inclusão/Alteração de usuários*/
	public function manager_user($dbInstance, $regists_user, $regists_module, $regists_permission, $appFunctions)
	{
		if ($regists_user['id'] == null) {
			try {

				/*Verifica tipo de usuário */
				if ($regists_user['permission_master'] != 'master') { //verifica tipo de usuário
					$type = 'basic';
				} else {

					$type = 'master';
				}
				/*Gera Array com os dados para insert*/
				$data = [
					'id' => null,
					'cpf' => "$regists_user[cpf]",
					'name' => "$regists_user[name]",
					'email' => "$regists_user[email]",
					'password' => "$regists_user[password]",
					'confirm_passwd' => "$regists_user[confirm_passwd]",
					'dt_created' => "$regists_user[dt_created]",
					'dt_update' => "$regists_user[dt_update]",
					'type' => "$type",
					'active' => "1",
				];
				//Verifica as senhas informada.
				if ($data['password'] != $data['confirm_passwd']) {
					//Aviso do sucesso e redireciona a pagina
					$n_alert = base64_encode(0); //sucess
					$n_msg = base64_encode("Ops! A senhas não combinam, refaça a operação por favor!");
					$appFunctions->redirect_page('0', "../man/manager.users.php?n_alert=$n_alert&n_msg=$n_msg");
					exit();
				}
				//Verificação do uso do CPF
				$sqlManager = new SqlManager($dbInstance);
				$CheckCpf = (new SqlQueryBuilder())
					->setQuery("SELECT cpf from tab_users WHERE cpf='$data[cpf]'");
				$user_cpf = $sqlManager->fetchAll($CheckCpf);
				if (!$user_cpf) {

					//Se o cpf não existe ainda, da sequencia no cadastro
					$sqlQuery = (new SqlQueryBuilder())
						->setTableName('tab_users') // define the table name
						->setData($data); // set data (keys = database column name)
					$sqlManager->insert($sqlQuery);
					//Verifica ultimo ID cadastrado
					$lastID = (new SqlQueryBuilder())
						->setQuery('SELECT LAST_INSERT_ID() as ID');
					$results = $sqlManager->fetchAll($lastID);
					foreach ($results as $result) { // for para pegar os módulos a serem associado no usuário
						try {

							foreach ($regists_module as $id_module) { /*dados recebidos do POST para saber quais módulos tem acesso*/
								foreach ($regists_permission as $permmission) { // dados recebidos do POST para saber as permissões do módulos
									//Monta os dados de módulos e permissões
									$data_modules_permission = [
										'id_user' => "$result[ID]",
										'id_module' => "$id_module",
										'type' => "$permmission",
										'dt_created' => date('Y-m-d h:m:s'),
									];
									//Insere as permissões
									$sqlInsert = (new SqlQueryBuilder())
										->setTableName('tab_permissions') // define the table name
										->setData($data_modules_permission); // set data (keys = database column name)
									$sqlManager->insert($sqlInsert);
								}
							}
						} catch (Exception $e) {
							$error = $e->getMessage();
							//Aviso do sucesso e redireciona a pagina
							$n_alert = base64_encode(0); //sucess
							$n_msg = base64_encode("Ops! Erro ao inserir Módulos / Permissões ->" . $error);
							$appFunctions->redirect_page(
								0,
								"../man/manager.users.php?n_alert=$n_alert&n_msg=$n_msg"
							);
							exit();
						}
					}
					//Aviso do sucesso e redireciona a pagina
					$n_alert = base64_encode(1); //sucess
					$n_msg = base64_encode("Obá! Usuário $data[name] cadastrado com sucesso!");
					$appFunctions->redirect_page(0, "../man/manager.users.php?n_alert=$n_alert&n_msg=$n_msg");
					exit();
				} else {

					// Se o CPF já foi usado, nega operação
					$n_alert = base64_encode(3); //sucess
					$n_msg = base64_encode("Ops! Atenção! Este CPF: $user_cpf[cpf] já esta sendo usado, você deve fazer a recuperação de senha!");
					$appFunctions->redirect_page(0, "../man/manager.users.php?n_alert=$n_alert& n_msg=$n_msg");
					exit();
				}
			} catch (Exception $e) {
				$error = $e->getMessage();
				echo $appFunctions->alert_system(0, "Erro ao Inserir Usuário ->" . $error, 0);
			}
		} else { //Edição do usuário
			/*var_dump($regists_user);
			exit();*/
			//id do usuário
			$conds = ['id' => "$regists_user[id]"];
			$sqlManager = new SqlManager($dbInstance);
			try {

				/*Verifica tipo de usuário */
				if ($regists_user['permission_master'] != 'master') {
					$type = 'basic';
				} else {
					$type = 'master';
				}
				/*Verifica status de usuário */
				if ($regists_user['active'] != 0) {
					$status = 1;
				} else {
					$status = 0;
				}
				if ($regists_user['password'] != null) {

					///dados do usuário -- alterando a senha
					$data = [
						'cpf' => "$regists_user[cpf]",
						'name' => "$regists_user[name]",
						'email' => "$regists_user[email]",
						'password' => "$regists_user[password]",
						'confirm_passwd' => "$regists_user[confirm_passwd]",
						'dt_update' => "$regists_user[dt_update]",
						'type' => "$type",
						'active' => "$status",
					];
				} else {

					///dados do usuário
					$data = [
						'cpf' => "$regists_user[cpf]",
						'name' => "$regists_user[name]",
						'email' => "$regists_user[email]",
						'dt_update' => "$regists_user[dt_update]",
						'type' => "$type",
						'active' => "$status",
					];
				}
				//Verifica as senhas informada.
				if ($data['password'] != $data['confirm_passwd']) {
					echo $appFunctions->alert_system(
						4,
						"Atenção! -> As senhas não combinam, por favor refaça a operação!"
					);
					exit();
				}
				/*Update da Usuário*/
				$sqlQuery = (new SqlQueryBuilder())
					->setTableName('tab_users') // define the table name
					->setConditions($conds) // set conditions
					->setData($data); // set data (keys = database column name)
				$sqlManager->update($sqlQuery);
			} catch (Exception $e) {
				$error = $e->getMessage();
				$n_alert = base64_encode(0); //sucess
				$n_msg = base64_encode("Erro ao alterar Usuário! ->" . $error);
				$appFunctions->redirect_page(0, "../man/manager.users.php?n_alert=$n_alert& n_msg=$n_msg");
				exit();
			}
			if ($regists_module != null) {

				try {

					$conds_modules = ['id_user' => "$regists_user[id]"];
					$sqlDelete = (new SqlQueryBuilder())
						->setTableName('tab_permissions')
						->setConditions($conds_modules);
					$sqlManager->remove($sqlDelete);
				} catch (Exception $e) {
					$error = $e->getMessage();
					$n_alert = base64_encode(0); //sucess
					$n_msg = base64_encode("Erro ao alterar Módulos! ->" . $error);
					$appFunctions->redirect_page(0, "../man/manager.users.php?n_alert=$n_alert& n_msg=$n_msg");
					exit();
				}
				try {

					foreach ($regists_module as $id_module) { /*dados recebidos do POST para saber quais módulos tem acesso*/
						foreach ($regists_permission as $permmission) { // dados recebidos do POST para saber as permissões do módulos
							//Monta os dados de módulos e permissões
							$data_modules_permission = [
								'id_user' => "$regists_user[id]",
								'id_module' => "$id_module",
								'type' => "$permmission",
								'dt_update' => date('Y-m-d h:m:s'),
							];
							//Insere as permissões
							$sqlInsert = (new SqlQueryBuilder())
								->setTableName('tab_permissions') // define the table name
								->setData($data_modules_permission); // set data (keys = database column name)
							$sqlManager->insert($sqlInsert);
						}
					}
				} catch (Exception $e) {
					$error = $e->getMessage();
					$n_alert = base64_encode(0); //sucess
					$n_msg = base64_encode("Erro ao alterar permissões! ->" . $error);
					$appFunctions->redirect_page(0, "../man/manager.users.php?n_alert=$n_alert& n_msg=$n_msg");
					exit();
				}
			}

			$n_alert = base64_encode(1); //sucess
			$n_msg = base64_encode("Usuário Alterado com sucesso!");
			$appFunctions->redirect_page(
				0,
				"../man/manager.users.php?select_id=$regists_user[id]&n_alert=$n_alert& n_msg=$n_msg"
			);

			exit();
		}
	}

	/*Aletrando dados do Perfil*/
	public function manager_perfil($dbInstance, $regists_user)
	{
		try {

			$conds = ['id' => "$regists_user[user_id]"];
			$data = [
				'name' => "$regists_user[user_name]",
				'cpf' => "$regists_user[cpfcnpj]",
				'email' => "$regists_user[user_mail]",
				'confirm_passwd' => md5("$regists_user[user_newpasswd]"),
				'dt_update' => date('Y-m-d H:m:s'),
			];
			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_users')
				->setConditions($conds)
				->setData($data);
			$sqlManager->update($sqlQuery);
			$resp = 1;
		} catch (Exception $e) {
			$error = $e->getMessage();
			$resp = $error;
		}
		return $resp;
	}

	/*Lendo usuário especifico by user_id para pegar os modulos e permissoes*/
	public function select_user($dbInstance, $user_id, $appFunctions): array
	{
		try {

			$sqlManager = new SqlManager($dbInstance);
			$shSelectUser = (new SqlQueryBuilder())
				->setQuery('SELECT * from tab_users WHERE id = :id')
				->setConditions(['id' => "$user_id"]);
			$shResultsUser = $sqlManager->fetchAll($shSelectUser);
			try {

				foreach ($shResultsUser as $shResultsUserId) {

					/*Módulos do usuário*/
					$shSelectModules = (new SqlQueryBuilder())
						->setQuery('SELECT
                                        distinct
                                        a.id_module,
                                        b.name_link
                                    from
                                         tab_permissions  as a,
                                         tab_modules as b
                                    where
                                          a.id_user = :id
                                      and b.id = a.id_module')
						->setConditions(['id' => "$shResultsUserId[id]"]);
					$shResultsModulesUser = $sqlManager->fetchAll($shSelectModules);
					try {
						foreach ($shResultsModulesUser as $type_permission) {

							/*Permissões dos módulos*/
							$shSelectPermission = (new SqlQueryBuilder())
								->setQuery('SELECT
                                                    a.type
                                                from
                                                    tab_permissions  as a,
                                                    tab_modules as b
                                                where
                                                      a.id_user = :id
                                                  and b.id = a.id_module
                                                and a.id_module = :id_module')
								->setConditions([
									'id' => "$shResultsUserId[id]",
									'id_module' => "$type_permission[id_module]",
								]);
							$shResultsPermission = $sqlManager->fetchAll($shSelectPermission);
						}
					} catch (Exception $e) {
						$error = $e->getMessage();
						$appFunctions->alert_system(0, "Erro ao selecionar Permissões ->" . $error);
					}
				}
			} catch (Exception $e) {
				$error = $e->getMessage();
				$appFunctions->alert_system(0, "Erro ao selecionar Módulos ->" . $error);
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			$appFunctions->alert_system(0, "Erro ao selecionar Usuário ->" . $error);
		}
		/*Setando como 'selected' os módulos que o usuário tem acesso no BOX de Módulos na tela de Edição*/
		$sqlManager = new SqlManager($dbInstance);
		$shSelectModulesAll = (new SqlQueryBuilder())
			->setQuery('SELECT * from tab_modules');
		$shResultsModulesAll = $sqlManager->fetchAll($shSelectModulesAll);
		return array($shResultsUser, $shResultsModulesUser, $shResultsPermission, $shResultsModulesAll);
	}

	/*Lendo usuário especifico para pegar dados de perfil*/
	public function select_user_perfil($dbInstance, $user_id): array
	{
		$sqlManager = new SqlManager($dbInstance);
		$shSelectUser = (new SqlQueryBuilder())
			->setQuery('SELECT * from tab_users WHERE id = :id')
			->setConditions(['id' => "$user_id"]);
		$shResultsPerfilUser = $sqlManager->fetchAll($shSelectUser);
		foreach ($shResultsPerfilUser as $perfilUser) {

			$pUser = [
				'user_name' => $perfilUser['name'],
				'user_cpf' => $perfilUser['cpf'],
				'user_email' => $perfilUser['email'],
				'user_id' => $perfilUser['id'],
			];
		}
		return $pUser;
	}


	//Clients
	/*Inclusão/Alteração de Clientes*/
	public function manager_client($dbInstance, $regists_client)
	{
		$data = [
			'id' => "$regists_client[id]",
			'name' => "" . strtoupper($regists_client['name']) . "",
			'corporate_name' => "" . strtoupper($regists_client['corporate_name']) . "",
			'dt_created' => "" . strtoupper($regists_client['dt_created']) . "",
			'dt_update' => "" . strtoupper($regists_client['dt_update']) . "",
			'zip_code' => "" . strtoupper($regists_client['zip_code']) . "",
			'address' => "" . strtoupper($regists_client['address']) . "",
			'number' => "" . strtoupper($regists_client['number']) . "",
			'county' => "" . strtoupper($regists_client['county']) . "",
			'city' => "" . strtoupper($regists_client['city']) . "",
			'neighbordhood' => "" . strtoupper($regists_client['neighbordhood']) . "",
			'state' => "" . strtoupper($regists_client['state']) . "",
			'phone1' => "" . strtoupper($regists_client['phone1']) . "",
			'phone2' => "" . strtoupper($regists_client['phone2']) . "",
			'phone3' => "" . strtoupper($regists_client['phone3']) . "",
			'cpf' => "" . strtoupper($regists_client['cpf']) . "",
			'cnpj' => "" . strtoupper($regists_client['cnpj']) . "",
			'rg' => "" . strtoupper($regists_client['rg']) . "",
			'type_cli' => "" . strtoupper($regists_client['type_cli']) . "",
			'type_for' => "" . strtoupper($regists_client['type_for']) . "",
			'type_col' => "" . strtoupper($regists_client['type_col']) . "",
			'type_loc' => "" . strtoupper($regists_client['type_loc']) . "",
			'state_registration' => "" . strtoupper($regists_client['state_registration']) . "",
			'municipal_registration' => "" . strtoupper($regists_client['municipal_registration']) . "",
			'email1' => "" . strtoupper($regists_client['email1']) . "",
			'email2' => "" . strtoupper($regists_client['email2']) . "",
			'site' => "" . strtoupper($regists_client['site']) . "",
			'obs' => "" . strtoupper($regists_client['obs']) . "",
			'active' => 1,
			'responsible' => "" . strtoupper($regists_client['responsible']) . "",
			'complement' => "" . strtoupper($regists_client['complement']) . "",
		];
		if ($regists_client['id'] == null) { //inclusão
			try {

				$client_dir_create = null;
				$sqlManager = new SqlManager($dbInstance);
				$sqlQuery = (new SqlQueryBuilder())
					->setTableName('tab_clients') // define the table name
					->setData($data); // set data (keys = database column name)
				$sqlManager->insert($sqlQuery);
				//Verifica ultimo ID cadastrado
				$lastID = (new SqlQueryBuilder())
					->setQuery('SELECT LAST_INSERT_ID() as ID');
				$resultslastID = $sqlManager->fetchAll($lastID);
				foreach ($resultslastID as $docID) {
					$client_dir_create = $docID['ID'];
				}
				//Criando diretoria do usuário
				mkdir("..//docs/clients/$client_dir_create", 0777, true);
				mkdir("..//docs/clients/$client_dir_create/savings", 0777, true);
				mkdir("..//docs/clients/$client_dir_create/contracts", 0777, true);
				mkdir("..//docs/clients/$client_dir_create/survey", 0777, true);
				chmod("..//docs/clients/$client_dir_create", 0777);
				chmod("..//docs/clients/$client_dir_create/savings", 0777);
				chmod("..//docs/clients/$client_dir_create/contracts", 0777);
				chmod("..//docs/clients/$client_dir_create/survey", 0777);
				//Aviso do sucesso e redireciona a pagina
				$resp = $docID['ID'];
			} catch (Exception $e) {
				$error = $e->getMessage();
				$resp = $error;
			}
		} else { //realiza alteração
			$conds = ['id' => "$regists_client[id]"];
			try {

				$sqlManager = new SqlManager($dbInstance);
				$sqlQuery = (new SqlQueryBuilder())
					->setTableName('tab_clients')
					->setConditions($conds)
					->setData($data);
				$sqlManager->update($sqlQuery);
				$resp = 2;
			} catch (Exception $e) {
				$error = $e->getMessage();
				$resp = $error;
			}
		}
		return $resp;
	}

	/*Incluido Poupança/Depósito para Cliente*/
	public function manager_client_saving($dbInstance, $regists_client_savings, $filename)
	{
		try {
			/* $conds = ['id' => "$regists_billet_client[find_client]"];*/
			$saving_value = str_replace('.', '', $regists_client_savings['client_savings_value']); // remove o ponto
			$saving_value = str_replace(',', '.', $saving_value); // troca a vírgula por ponto
			$saving_date = date('Y-m-d');
			$data = [
				'saving_id_client' => "$regists_client_savings[client_savings_id]",
				'saving_value' => "$saving_value",
				'saving_date' => $saving_date,
				'saving_number' => "$regists_client_savings[client_savings_number]",
				'saving_bank' => "$regists_client_savings[client_savings_bank]",
				'saving_filename' => "$filename",
				'saving_id_contract' => "$regists_client_savings[client_savings_id_contract]",
			];
			// print_r($data);
			// exit();
			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_clients_savings')
				->setData($data);
			$sqlManager->insert($sqlQuery);
			$resp = 1;
		} catch (Exception $e) {
			$error = $e->getMessage();
			$resp = $error;
		}
		return $resp;
	}

	/*Incluido Vistoria/Cliente*/
	public function manager_client_survey($dbInstance, $regists_client_survey)
	{
		try {
			/* $conds = ['id' => "$regists_billet_client[find_client]"];*/
			$data = [
				'survey_id_client' => "$regists_client_survey[clientAddSurvey]",
				'survey_id_propertie' => "$regists_client_survey[clientAddSurvey]",
				'survey_bedroom' => "$regists_client_survey[survey_bedrooms_textarea]",
				'survey_bedroom_date' => "$regists_client_survey[survey_bedroom_date]",
				'survey_wc' => "$regists_client_survey[survey_wc_textarea]",
				'survey_wc_date' => "$regists_client_survey[survey_wc_date]",
				'survey_livingroom' => "$regists_client_survey[survey_livingroom_textarea]",
				'survey_livingroom_date' => "$regists_client_survey[survey_livingroom_date]",
			];
			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_clients_survey')
				->setData($data);
			$sqlManager->insert($sqlQuery);
			$resp = 1;
		} catch (Exception $e) {
			$error = $e->getMessage();
			$resp = $error;
		}
		return $resp;
	}

	/*Incluido Vistoria/Cliente/UpDateFile*/
	public function manager_client_survey_file($dbInstance, $regists_client_survey, $regists_client_survey_file)
	{
		try {

			$data = array();
			foreach ($regists_client_survey_file as $dataField => $fileName) {

				$data[$dataField] = $fileName['name'];
			}
			$conds = ['survey_id_client' => "$regists_client_survey[clientAddSurvey]"];
			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_clients_survey')
				->setConditions($conds)
				->setData($data);
			$sqlManager->update($sqlQuery);
			$resp = 1;
		} catch (Exception $e) {
			$error = $e->getMessage();
			$resp = $error;
		}
		return $resp;
	}

	/*Incluido/Removendo Imóvel para Cliente*/
	public function manager_client_property($dbInstance, $regists_client_property)
	{
		$conds = [
			'id_client' => "$regists_client_property[clientAddProperty]",
			'id_property' => "$regists_client_property[SelectAddProperty]",
		];
		$sqlManager = new SqlManager($dbInstance);
		$shSelectClientProperty = (new SqlQueryBuilder())
			->setQuery("SELECT  * FROM tab_clients_property WHERE id_client = :id_client AND id_property = :id_property")
			->setConditions($conds);
		$shResultsClientProperty = $sqlManager->fetchAll($shSelectClientProperty);
		if (!$shResultsClientProperty) {

			try {

				$data = [
					'id_client' => "$regists_client_property[clientAddProperty]",
					'id_property' => "$regists_client_property[SelectAddProperty]",
					'date_add' => date('Y-m-d h:m:s'),
				];
				$sqlManager = new SqlManager($dbInstance);
				$sqlQuery = (new SqlQueryBuilder())
					->setTableName('tab_clients_property')
					->setData($data);
				$sqlManager->insert($sqlQuery);
				$resp = 1;
			} catch (Exception $e) {
				$error = $e->getMessage();
				$resp = $error;
			}
		} else {
			$resp = 2;
		}
		return $resp;
	}

	/*Listando os registros de depósito poupanças*/
	public function list_client_saving($dbInstance, $idClient)
	{
		try {

			$tr = null;
			$listClientSavingsRegists = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectClientSavings = (new SqlQueryBuilder())
				->setQuery("SELECT 
       								DATE_FORMAT (saving_date,'%d-%m-%Y') as saving_date, 
       								saving_bank, saving_value, saving_filename, saving_number, 
       								saving_id_contract
										FROM tab_clients_savings WHERE saving_id_client = :saving_id_client")
				->setConditions(['saving_id_client' => "$idClient"]);
			$shResultsClientSavings = $sqlManager->fetchAll($shSelectClientSavings);
			foreach ($shResultsClientSavings as $reportClients) {
				$tr = "<tr>
							 <td>$reportClients[saving_id_contract]</td>
                      <td>R$" . number_format($reportClients['saving_value'], 2, ',', '.') . "</td>
                      <td>$reportClients[saving_date]</td>
                      <td>" . strtoupper($reportClients['saving_bank']) . "</td>
                      <td>$reportClients[saving_number]</td>
                      <td><a href='../docs/clients/" . "$idClient/savings/$reportClients[saving_filename]' target='_blank'>Comprovante</a> </td>
                    </tr>";
				$listClientSavingsRegists .= $tr;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de poupanças" . $error;
		}
		return $listClientSavingsRegists;
	}

	/*Listando os imoveis do locatário*/
	public function list_client_property($dbInstance, $idClient)
	{
		try {

			$tr = null;
			$listClientPropertyRegists = null;
			$opt = null;
			$listClientPropertyOpt = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectClientProperty = (new SqlQueryBuilder())
				->setQuery(
					"SELECT a.id,
							DATE_FORMAT (a.date_add,'%d-%m-%Y') as date_add,
							a.id_client, a.id_property, b.property_type, b.property_address, b.property_number,
							b.property_number_apto, b.property_city, b.property_state, b.property_cep 
							FROM
							tab_clients_property as a,
							tab_properties as b
							WHERE
							b.id = a.id_property and a.id_client = :id_client"
				)
				->setConditions(['id_client' => "$idClient"]);
			$shResultsClientProperty = $sqlManager->fetchAll($shSelectClientProperty);
			foreach ($shResultsClientProperty as $reportClientProperty) {
				$tr = "<tr>
							<td>$reportClientProperty[date_add]</td>
							<td>$reportClientProperty[property_type]</td>
							<td>$reportClientProperty[property_address]</td>
							<td>$reportClientProperty[property_number]</td>
							<td>$reportClientProperty[property_number_apto]</td>
							<td>$reportClientProperty[property_city]</td>
							<td>$reportClientProperty[property_state]</td>
							<td>$reportClientProperty[property_cep]</td>
							" . '<td><button name="btn_remove_propertyClient" id="btn_remove_propertyClient" class="btn btn-sm btn-secondary" onclick="deleteRow(this.parentNode.parentNode.rowIndex)"> Remover</button>' . "
						</tr>";
				$listClientPropertyRegists .= $tr;
				$opt = "<option value='$reportClientProperty[id_property]'>$reportClientProperty[property_address], N.$reportClientProperty[property_number], Apto.$reportClientProperty[property_number_apto], $reportClientProperty[property_city], $reportClientProperty[property_state], $reportClientProperty[property_cep]</option>";
				$listClientPropertyOpt .= $opt;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de imoveis" . $error;
		}
		return array($listClientPropertyRegists, $listClientPropertyOpt);
	}

	/*Listando as Vistorias Relizadas*/
	public function listSurveyCarriedOut($dbInstance, $idClient)
	{
		try {

			$trsListSurveyCarriedOut = null;
			$sqlManager = new SqlManager($dbInstance);
			$listSurveyCarriedOut = (new SqlQueryBuilder())
				->setQuery("SELECT a.*,
										DATE_FORMAT (survey_bedroom_date,'%d-%m-%Y')    as survey_bedroom_date,
										DATE_FORMAT (survey_livingroom_date,'%d-%m-%Y') as survey_livingroom_date,
										DATE_FORMAT (survey_wc_date,'%d-%m-%Y')         as survey_wc_date,
										b.name, b.phone1, b.email1 
					            FROM 
								 tab_clients_survey as a, 
								 tab_clients        as b 
								WHERE 
								    b.id = a.survey_id_client 
								AND a.survey_id_client = :id_client
						      ")
				->setConditions(['id_client' => "$idClient"]);
			$resuListSurveyCarriedOut = $sqlManager->fetchAll($listSurveyCarriedOut);
			foreach ($resuListSurveyCarriedOut as $dataListSurveyCarriedOut) {
				$tr = "<tr>
								<td>$dataListSurveyCarriedOut[survey_bedroom_date]</td>
								<td>$dataListSurveyCarriedOut[survey_bedroom]</td>
								<td><a href='../docs/clients/$idClient/survey/$dataListSurveyCarriedOut[survey_bedroom_file]' target='parent'>Visulizar Arquivo</a></td>
								<td>$dataListSurveyCarriedOut[survey_livingroom_date]</td>
								<td>$dataListSurveyCarriedOut[survey_livingroom]</td>
								<td><a href='../docs/clients/$idClient/survey/$dataListSurveyCarriedOut[survey_livingroom_file]' target='parent'>Visulizar Arquivo</a></td>
								<td>$dataListSurveyCarriedOut[survey_wc_date]</td>
								<td>$dataListSurveyCarriedOut[survey_wc]</td>
								<td><a href='../docs/clients/$idClient/survey/$dataListSurveyCarriedOut[survey_wc_file]' target='parent'>Visulizar Arquivo</a></td>							
							</tr>";
				$trsListSurveyCarriedOut .= $tr;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de Vistorias" . $error;
		}
		return $trsListSurveyCarriedOut;
	}

	/*ListBox com todos os Clientes na tela de Cadastro*/
	public function list_box_client($dbInstance)
	{
		try {

			$optionValue = null;
			$listBoxClient = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectClients = (new SqlQueryBuilder())
				->setQuery("SELECT * FROM tab_clients order by name");
			$shResultsClients = $sqlManager->fetchAll($shSelectClients);
			foreach ($shResultsClients as $dataClient) {
				$optionValue = "<option value='?editID=$dataClient[id]'>$dataClient[name] ( Código: $dataClient[id] )</option>";
				$listBoxClient .= $optionValue;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de Clientes" . $error;
		}
		return $listBoxClient;
	}

	/*Listando os registros de depósito poupanças*/
	public function load_survey($dbInstance, $idClient): string
	{
		try {

			$tr = null;
			$listClientSavingsRegists = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectClientSavings = (new SqlQueryBuilder())
				->setQuery("SELECT DATE_FORMAT (saving_date,'%d-%m-%Y') as saving_date, saving_bank, saving_value, saving_filename, saving_number
                                    FROM tab_clients_savings WHERE saving_id_client = :saving_id_client")
				->setConditions(['saving_id_client' => "$idClient"]);
			$shResultsClientSavings = $sqlManager->fetchAll($shSelectClientSavings);
			foreach ($shResultsClientSavings as $reportClients) {
				$tr = "<tr>
                    <td>R$" . number_format($reportClients['saving_value'], 2, ',', '.') . "</td>
                    <td>$reportClients[saving_date]</td>
                    <td>" . strtoupper($reportClients['saving_bank']) . "</td>
                    <td>$reportClients[saving_number]</td>
                    <td><a href='../docs/clients/" . "$idClient/savings/$reportClients[saving_filename]' target='_blank'>Comprovante</a> </td>
                    </tr>";
				$listClientSavingsRegists .= $tr;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de poupanças" . $error;
		}
		return $listClientSavingsRegists;
	}

	/*Removendo Cliente*/
	public function remove_client($dbInstance, $regist_client_id): array
	{
		try {

			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_clients')
				->setConditions(['id' => "$regist_client_id"]);
			$sqlManager->remove($sqlQuery);
			$resp = '1';
			$msg = "[$regist_client_id] : Cliente Removido com sucesso!";
		} catch (Exception $e) {

			$error = $e->getMessage();
			$resp = '0';
			$msg = "Erro ao remver Imóvel -> $error";
		}
		return array($resp, $msg);
	}

	/*Listando os clientes cadastrados*/
	public function report_client($dbInstance)
	{
		try {

			$tr = null;
			$trResults = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectClients = (new SqlQueryBuilder())
				->setQuery("SELECT * FROM tab_clients");
			$shResultsClients = $sqlManager->fetchAll($shSelectClients);
			foreach ($shResultsClients as $reportClients) {
				$tr = "<tr>
                      <td><a href='manager.clients.php?editID=$reportClients[id]'>$reportClients[name]</a></td>
                      <td>$reportClients[address], $reportClients[number] | $reportClients[neighbordhood] | $reportClients[city]</td>
                      <td>$reportClients[email1]</td>
                      <td>$reportClients[phone1]</td>
                      <td></td>
                    </tr>";
				$trResults .= $tr;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de poupanças" . $error;
		}
		return $trResults;
	}

	/*Encontrar Clientes por Endereços*/
	public function find_client_for_addres($dbInstance, $propertieID)
	{
		$trResults = null;
		try {
			$optionList = null;
			$id = $propertieID['select_find_streets_id'];
			$sqlManager = new SqlManager($dbInstance);
			$shSelectPropertie = (new SqlQueryBuilder())
				->setQuery('SELECT id, property_type, property_address,  property_county, property_city 
                                  from tab_properties where id = :id')
				->setConditions(['id' => "$id"]);
			$shResultsPropertieID = $sqlManager->fetchAll($shSelectPropertie);
			foreach ($shResultsPropertieID as $datas) {
				$property_address = $datas['property_address'];
				$property_county = $datas['property_county'];
				$property_city = $datas['property_city'];
			}
			$shSelectPropertieStreet = (new SqlQueryBuilder())
				->setQuery('SELECT id, property_type, property_address, property_number, property_number_apto, property_county, 
	                                          property_city, property_state, property_cep 
										from tab_properties
										where
										    property_address = :property_address
										and property_county  = :property_county
										and property_city    = :property_city
						     ')
				->setConditions([
					'property_address' => "$property_address",
					'property_county' => "$property_county",
					'property_city' => "$property_city",
				]);
			$shResultsSelectPropertieStreet = $sqlManager->fetchAll($shSelectPropertieStreet);
			foreach ($shResultsSelectPropertieStreet as $propertieAll) {
				$shSelectTenant = (new SqlQueryBuilder())
					->setQuery('select a.id, a.name, a.corporate_name, a.email1, a.phone1
											from
											tab_clients as a,
											tab_clients_property as b
											where b.id_client =  a.id and b.id_property =:id_property
																	     ')
					->setConditions(['id_property' => "$propertieAll[id]"]);
				$shResultsSelectTenant = $sqlManager->fetchAll($shSelectTenant);
				foreach ($shResultsSelectTenant as $tenantDatas) {
					$id = $tenantDatas['id'];
					$name = $tenantDatas['name'];
					$corporate_name = $tenantDatas['corporate_name'];
					$email1 = $tenantDatas['email1'];
					$phone1 = $tenantDatas['phone1'];
				}
				$tr = "<tr>
	                      <td><a href='manager.clients.php?editID=$id'>$name</a></td>
	                      <td><a href='manager.properties.php?editID=$propertieAll[id]'>$propertieAll[property_type]<a/></td>
	                      <td>$propertieAll[property_address]</td>
	                      <td>$propertieAll[property_number]</td>
	                      <td>$propertieAll[property_number_apto]</td>
	                      <td>$propertieAll[property_county]</td>
	                      <td>$propertieAll[property_state]</td>
	                      <td>$propertieAll[property_cep]</td>
	                      <td></td>
	                    </tr>";
				$trResults .= $tr;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}
		return $trResults;
	}

	/*Pegando os dados dos clientes para carregar e tela de Cliente*/
	public function find_client_data($dbInstance, $clientID): array
	{
		$clientData = null;
		try {
			$sqlManager = new SqlManager($dbInstance);
			$shSelectClientAll = (new SqlQueryBuilder())
				->setQuery('SELECT * from tab_clients WHERE id = :id')
				->setConditions(['id' => "$clientID"]);
			$shResultsClientAll = $sqlManager->fetchAll($shSelectClientAll);
			foreach ($shResultsClientAll as $clientValue) {

				$clientData = [
					'id' => "$clientValue[id]",
					'name' => "$clientValue[name]",
					'corporate_name' => "$clientValue[corporate_name]",
					'dt_update' => "$clientValue[dt_update]",
					'dt_created' => "$clientValue[dt_created]",
					'zip_code' => "$clientValue[zip_code]",
					'address' => "$clientValue[address]",
					'number' => "$clientValue[number]",
					'county' => "$clientValue[county]",
					'city' => "$clientValue[city]",
					'neighbordhood' => "$clientValue[neighbordhood]",
					'state' => "$clientValue[state]",
					'phone1' => "$clientValue[phone1]",
					'phone2' => "$clientValue[phone2]",
					'phone3' => "$clientValue[phone3]",
					'cpf' => "$clientValue[cpf]",
					'cnpj' => "$clientValue[cnpj]",
					'rg' => "$clientValue[rg]",
					'type_cli' => "$clientValue[type_cli]",
					'type_for' => "$clientValue[type_for]",
					'type_col' => "$clientValue[type_col]",
					'type_loc' => "$clientValue[type_loc]",
					'client_state_registration_free' => "$clientValue[state_registration_free]",
					'state_registration' => "$clientValue[state_registration]",
					'municipal_registration' => "$clientValue[municipal_registration]",
					'email1' => "$clientValue[email1]",
					'email2' => "$clientValue[email2]",
					'site' => "$clientValue[site]",
					'obs' => "$clientValue[obs]",
					'active' => "$clientValue[active]",
					'responsible' => "$clientValue[responsible]",
					'complement' => "$clientValue[complement]",
				];
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}
		return $clientData;
	}


	//Boletos
	/*Incluido Boleto a Avulso para Cliente*/
	public function manager_billet_detached($dbInstance, $regists_billet_client)
	{
		try {
			/* $conds = ['id' => "$regists_billet_client[find_client]"];*/
			$billet_value = str_replace('.', '', $regists_billet_client['billet_value']); // remove o ponto
			$billet_value = str_replace(',', '.', $billet_value); // troca a vírgula por ponto
			//?editID=128
			$id = substr($regists_billet_client['find_client'], -3);
			$data = [
				'id_client' => "$id",
				'billet_value' => "$billet_value",
				'billet_due_date' => "$regists_billet_client[billet_due_date]",
				'billet_send_mail_client' => "$regists_billet_client[billet_send_mail_client]",
			];
			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_clients_billet')
				->setData($data);
			$sqlManager->insert($sqlQuery);
			$resp = 1;
		} catch (Exception $e) {

			$error = $e->getMessage();
			$resp = $error;
		}
		return $resp;
	}

	public function select_billet($dbInstance, $idBillet)
	{
		try {

			$sqlManager = new SqlManager($dbInstance);
			$shSelectBillet = (new SqlQueryBuilder())
				->setQuery("SELECT 
									a.id,
									a.id_client,
									a.billet_value,
									a.billet_value_old,
									a.billet_due_date,
									DATE_FORMAT (a.billet_due_date,'%d/%m/%Y') as vencimento_original,
									a.billet_due_date_old,
									DATE_FORMAT (a.billet_due_date_old,'%d/%m/%Y') as vencimento_prorrogado,
									a.billet_send_mail_client,
									a.billtet_expiration_days,
									a.billet_rate,											
									b.name, 
									b.cpf,
									b.cnpj,											
									b.corporate_name,
									b.address,
									b.number,
									b.city,
									b.state,
									b.neighbordhood,
									b.state,
									b.zip_code
									FROM 
									tab_clients_billet as a, 
									tab_clients as b
									WHERE
									b.id = a.id_client 
									AND a.id = :id")
				->setConditions(['id' => "$idBillet"]);
			$shResultsBillet = $sqlManager->fetchAll($shSelectBillet);
			return $shResultsBillet;
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber dados do boleto" . $error;
		}
	}


	//Imóveis
	/*Inclusão/Alteração de Imóveis*/
	public function manager_property($dbInstance, $regist_property): array
	{
		$property_value = str_replace('.', '', $regist_property['property_value']); // remove o ponto
		$property_value = str_replace(',', '.', $property_value); // troca a vírgula por ponto
		$property_value_location = str_replace('.', '', $regist_property['property_value_location']); // remove o ponto
		$property_value_location = str_replace(',', '.', $property_value_location); // troca a vírgula por ponto
		$property_value_iptu = str_replace('.', '', $regist_property['property_value_iptu']); // remove o ponto
		$property_value_iptu = str_replace(',', '.', $property_value_iptu); // troca a vírgula por ponto
		$property_value_condo = str_replace('.', '', $regist_property['property_value_condo']); // remove o ponto
		$property_value_condo = str_replace(',', '.', $property_value_condo); // troca a vírgula por ponto
		$data = [
			'id' => "$regist_property[property_id]",
			'property_client_id' => "$regist_property[property_client_id]",
			'property_type' => "$regist_property[property_type]",
			'property_destination' => "$regist_property[property_destination]",
			'property_usefull_area' => "$regist_property[property_usefull_area]",
			'property_usefull_built' => "$regist_property[property_usefull_built]",
			'property_ground' => "$regist_property[property_ground]",
			'property_value' => "$property_value",
			'property_value_location' => "$property_value_location",
			'property_value_iptu' => "$property_value_iptu",
			'property_value_condo' => "$property_value_condo",
			'property_amount_dorm' => "$regist_property[property_amount_dorm]",
			'property_amount_suite' => "$regist_property[property_amount_suite]",
			'property_amount_room' => "$regist_property[property_amount_room]",
			'property_amount_bathroom' => "$regist_property[property_amount_bathroom]",
			'property_amount_floors' => "$regist_property[property_amount_floors]",
			'property_amount_vague_garage' => "$regist_property[property_amount_vague_garage]",
			'property_amount_vague_visitor' => "$regist_property[property_amount_vague_visitor]",
			'property_amount_deposit' => "$regist_property[property_amount_deposit]",
			'property_amount_elevators' => "$regist_property[property_amount_elevators]",
			'property_age' => "$regist_property[property_age]",
			'property_cep' => "$regist_property[cep]",
			'property_address' => "$regist_property[client_address]",
			'property_number' => "$regist_property[client_number]",
			'property_number_apto' => "$regist_property[number_apto]",
			'property_county' => "$regist_property[client_county]",
			'property_city' => "$regist_property[client_city]",
			'property_state' => "$regist_property[client_state]",
			'property_neighbordhood' => "$regist_property[client_neighbordhood]",
			'property_complement' => "$regist_property[property_complement]",
		];
		if ($regist_property['property_id'] == null) // inclusão
		{
			try {

				$sqlManager = new SqlManager($dbInstance);
				$sqlQuery = (new SqlQueryBuilder())
					->setTableName('tab_properties')
					->setData($data);
				$sqlManager->insert($sqlQuery);
				$resp = '1';
				$msg = "Imóvel Incluído com sucesso!";
			} catch (Exception $e) {

				$error = $e->getMessage();
				$resp = '0';
				$msg = "Erro ao incluir Imóvel -> $error";
			}
			return array($resp, $msg);
		} else { // ALteração
			$conds = ['id' => "$regist_property[property_id]"];
			try {

				$sqlManager = new SqlManager($dbInstance);
				$sqlQuery = (new SqlQueryBuilder())
					->setTableName('tab_properties')
					->setConditions($conds)
					->setData($data);
				$sqlManager->update($sqlQuery);
				$resp = '2';
				$msg = "Imóvel Aletrado com sucesso!";
			} catch (Exception $e) {
				$error = $e->getMessage();
				$resp = $error;
			}
			return array($resp, $msg);
		}
	}

	public function remove_property($dbInstance, $regist_property_id): array
	{
		try {

			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_properties')
				->setConditions(['id' => "$regist_property_id"]);
			$sqlManager->remove($sqlQuery);
			$resp = '1';
			$msg = "[$regist_property_id] : Imóvel Removido com sucesso!";
		} catch (Exception $e) {

			$error = $e->getMessage();
			$resp = '0';
			$msg = "Erro ao remver Imóvel -> $error";
		}
		return array($resp, $msg);
	}

	/*Listando os id do Imóvel no Find das telas*/
	public function find_property_id($dbInstance)
	{
		try {

			$optionList = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectPropertyID = (new SqlQueryBuilder())
				->setQuery('SELECT * from tab_properties ORDER BY property_address , property_number, property_number_apto');
			$shResultsPropertyID = $sqlManager->fetchAll($shSelectPropertyID);
			foreach ($shResultsPropertyID as $propertyALL) {
				if ($propertyALL['property_type'] == 'Apartamento') {
					$Apto = "- Apto: $propertyALL[property_number_apto]";
				} else {

					$Apto = null;
				}
				$option = "<option value=\"manager.properties.php?editID=$propertyALL[id]\">$propertyALL[property_address], $propertyALL[property_number] $Apto </option>";
				$optionList .= $option;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}
		return $optionList;
	}

	/*Listando os id do Imóvel no Find no Cadastro de CLientes, para associar o imóvel*/
	public function find_property_to_client($dbInstance)
	{
		try {

			$optionList = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectPropertyID = (new SqlQueryBuilder())
				->setQuery(
					'SELECT * from tab_properties
							WHERE id not in (SELECT contract_id_property from tab_contract where contract_id_property = tab_properties.id) 
							ORDER BY 
							property_address, property_number, property_number_apto'
				);
			$shResultsPropertyID = $sqlManager->fetchAll($shSelectPropertyID);
			foreach ($shResultsPropertyID as $propertyALL) {
				if ($propertyALL['property_type'] == 'Apartamento') {
					$Apto = "- Apto: $propertyALL[property_number_apto]";
				} else {

					$Apto = null;
				}
				$option = "<option value=\"$propertyALL[id]\">$propertyALL[property_address], $propertyALL[property_number] $Apto </option>";
				$optionList .= $option;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}
		return $optionList;
	}

	/*Listando os id do Imóvel no Find das telas*/
	public function find_property_data($dbInstance, $propertyID): array
	{
		$propertyData = null;
		try {

			$sqlManager = new SqlManager($dbInstance);
			$shSelectPropertyAll = (new SqlQueryBuilder())
				->setQuery(
					'SELECT c.*,
                            (SELECT b.name FROM  tab_clients_property as a, tab_clients as b WHERE b.id = a.id_client AND a.id_property = c.id limit 1) as client
                            from
                            tab_properties as c
                            WHERE
                            id = :id'
				)
				->setConditions(['id' => "$propertyID"]);
			$shResultsPropertyAll = $sqlManager->fetchAll($shSelectPropertyAll);
			foreach ($shResultsPropertyAll as $propertyAll) {
				$propertyData = [
					'property_id' => "$propertyAll[id]",
					'property_client' => "$propertyAll[client]",
					'property_type' => "$propertyAll[property_type]",
					'property_destination' => "$propertyAll[property_destination]",
					'property_usefull_area' => "$propertyAll[property_usefull_area]",
					'property_usefull_built' => "$propertyAll[property_usefull_built]",
					'property_ground' => "$propertyAll[property_ground]",
					'property_value' => "$propertyAll[property_value]",
					'property_value_iptu' => "$propertyAll[property_value_iptu]",
					'property_value_location' => "$propertyAll[property_value_location]",
					'property_value_condo' => "$propertyAll[property_value_condo]",
					'property_amount_dorm' => "$propertyAll[property_amount_dorm]",
					'property_amount_suite' => "$propertyAll[property_amount_suite]",
					'property_amount_room' => "$propertyAll[property_amount_room]",
					'property_amount_bathroom' => "$propertyAll[property_amount_bathroom]",
					'property_amount_floors' => "$propertyAll[property_amount_floors]",
					'property_amount_vague_garage' => "$propertyAll[property_amount_vague_garage]",
					'property_amount_vague_visitor' => "$propertyAll[property_amount_vague_visitor]",
					'property_amount_deposit' => "$propertyAll[property_amount_deposit]",
					'property_amount_elevators' => "$propertyAll[property_amount_elevators]",
					'property_age' => "$propertyAll[property_age]",
					'property_cep' => "$propertyAll[property_cep]",
					'property_address' => "$propertyAll[property_address]",
					'property_number' => "$propertyAll[property_number]",
					'property_number_apto' => "$propertyAll[property_number_apto]",
					'property_county' => "$propertyAll[client_county]",
					'property_city' => "$propertyAll[property_city]",
					'property_state' => "$propertyAll[property_state]",
					'property_neighbordhood' => "$propertyAll[property_neighbordhood]",
					'property_complement' => "$propertyAll[property_complement]",
				];
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber dados Imóveis" . $error;
		}
		return $propertyData;
	}

	/*Listando os Imóveis x Clientes*/
	public function list_properties_clients($dbInstance)
	{
		try {

			$optionList = null;
			$sqlManager = new SqlManager($dbInstance);
			$shSelectPropertie = (new SqlQueryBuilder())
				->setQuery('SELECT
								    id, property_type, property_address, property_county, property_city, property_cep
								from
								    tab_properties
								group by
								    property_type, property_address, property_county, property_city, property_cep');
			$shResultsPropertieID = $sqlManager->fetchAll($shSelectPropertie);
			foreach ($shResultsPropertieID as $propertieAll) {
				$option = "<option value=\"$propertieAll[id]\">  $propertieAll[property_type] | $propertieAll[property_address] | $propertieAll[property_county] | $propertieAll[property_city]</option>";
				$optionList .= $option;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}
		return $optionList;
	}


	//Contratos
	/* Adicoanr / Update de contratos */
	public function manager_contratc($dbInstance, $dataContract, $filename)
	{
		try {
			$contract_value_start = str_replace('.', '', $dataContract['value_contract']); // remove o ponto
			$contract_value_start = str_replace(',', '.', $contract_value_start); // troca a vírgula por ponto
			$data = [
				'contract_id_client' => $dataContract['clientIDcontract'],
				'contract_id_property' => $dataContract['clientIDProperty'],
				'contract_date_start' => $dataContract['date_contract'],
				'contract_value_start' => $contract_value_start,
				'contract_value_current' => $contract_value_start,
				'contract_file' => $filename,
			];
			$sqlManager = new SqlManager($dbInstance);
			$sqlQuery = (new SqlQueryBuilder())
				->setTableName('tab_contract')
				->setData($data);
			$sqlManager->insert($sqlQuery);
			$resp = 1;
		} catch (Exception $e) {

			$error = $e->getMessage();
			$resp = $error;
		}
		return $resp;
	}

	/*Listando os contratos do clientes/imóveis*/
	public function load_contracts($dbInstance, $clientID)
	{
		try {

			$trResults = null;
			$sqlManager = new SqlManager($dbInstance);
			$selectContract = (new SqlQueryBuilder())
				->setQuery('SELECT 
								tab_contract.contract_id,
								tab_contract.contract_file,
								tab_contract.contract_date_start,
								tab_contract.contract_value_start,
								tab_contract.contract_date_renew,
								tab_contract.contract_value_renew,
								tab_properties.property_address,
								tab_properties.property_number,
								tab_properties.property_number_apto,
								tab_properties.property_county,
								tab_properties.property_city,
								tab_properties.property_state,
								tab_properties.property_neighbordhood,
								tab_properties.property_complement,
								tab_properties.property_cep
							FROM 
								tab_contract,
								tab_clients,
								tab_properties
							WHERE 
								tab_clients.id    = tab_contract.contract_id_client   AND
								tab_properties.id = tab_contract.contract_id_property AND
								tab_contract.contract_id_client = :contract_id_client')
				->setConditions(['contract_id_client' => $clientID]);

			$resultContract = $sqlManager->fetchAll($selectContract);

			foreach ($resultContract as $dataContract) {
				$removeContractId = base64_encode($dataContract['contract_id']);
				$tr = "
						<tr>
						<td>
						<a href='#' title='
						$dataContract[property_address], $dataContract[property_number], Apto: $dataContract[property_number_apto]
						$dataContract[property_county]
						$dataContract[property_city]
						$dataContract[property_neighbordhood] 
						$dataContract[property_cep]'> 
						<input disabled type='text' class='form-control form-control-sm' name='edit_contract_id' id='edit_contract_id' value='$dataContract[contract_id]' >
						</a>
						</td>
                      	<td> <a  class='form-control form-control-sm' href='../docs/clients/$clientID/contracts/$dataContract[contract_file]' target='parent'  title='$dataContract[contract_file]'> Ver </a> </td>
                      	<td><input disabled type='date' class='form-control form-control-sm' name='edit_contract_date_start' id='edit_contract_date_start' value='$dataContract[contract_date_start]'> </td>
                      	<td><input disabled type='text' class='form-control form-control-sm' data-mask='#.##0,00' placeholder='R$ 0.000,00' name='edit_contract_value_start' id='edit_contract_value_start' value='$dataContract[contract_value_start]'</td>
                      	<td><input disabled type='date' class='form-control form-control-sm' name='edit_contract_date_reajust' id='edit_contract_date_reajust' value='$dataContract[contract_date_renew]'</td>
                      	<td><input disabled type='text' class='form-control form-control-sm' data-mask='#.##0,00' placeholder='R$ 0.000,00' name='edit_contract_value_reajust' id='edit_contract_value_reajust' value='$dataContract[contract_value_renew]'</td>				
                        <td><button name='jbtn_editContratLine' id='jbtn_editContratLine' value='EditContrat' class='btn btn-sm btn-secondary' onclick='editContratLine()' >Editar</button></td>
                        <td><button disabled name='jbtn_salveContratLine' id='jbtn_salveContratLine' value='salvetContrat' class='btn btn-sm btn-info' >Salvar</button></td>
                        <td><a href='?removeContratId=$removeContractId&client_id=$clientID' class='btn btn-sm btn-danger' name='removeContract' id='removeContract'>Remover</a></td>
                       </tr>";
				$trResults .= $tr;
				$opt = "<option value='$dataContract[contract_id]'>Contr: $dataContract[contract_id]  |  R$: $dataContract[contract_value_start] </option>";
				$optResults .= $opt;
			}
		} catch (Exception $e) {

			$error = $e->getMessage();
			echo "Erro ao receber lista de Contratos" . $error;
		}

		return array($trResults, $optResults);
	}

	/*Removendo contrato do cliente associado*/
	public function remove_contratc($dbInstance, $contractID, $clientID)
	{
		try {

			$conds = ['contract_id' => $contractID, 'contract_id_client' => $clientID];
			$sqlManager = new SqlManager($dbInstance);
			$sqlDelete = (new SqlQueryBuilder())
				->setTableName('tab_contract')
				->setConditions($conds);
			$sqlManager->remove($sqlDelete);

			return $resp = 1;
		} catch (Exception $e) {

			$error = $e->getMessage();
			return $resp = $error;
		}
	}

	public function edit_contract_linx($dbInstance, $values)
	{
		try {

			/* 'clientIDcontract' => string '168' (length=3)
			'jbtn_salveContratLine' => string 'salvetContrat' (length=13)
			'edit_contract_date_start' => string '2021-04-05' (length=10)
			'edit_contract_value_start' => string '1500.00' (length=7)
			'edit_contract_date_reajust' => string '2021-04-20' (length=10)
			'edit_contract_value_reajust' => string '2.000,00' (length=8)
			'edit_contract_id' => string '20' (length=2)
 */
			$conds = ['contract_id' => $values['edit_contract_id']];

			$contract_value_start = str_replace('.', '', $values['edit_contract_value_start']); // remove o ponto
			$contract_value_start = str_replace(',', '.', $contract_value_start); // troca a vírgula por ponto
			
			$contract_value_renew = str_replace('.', '', $values['edit_contract_value_reajust']); // remove o ponto
			$contract_value_renew = str_replace(',', '.', $contract_value_renew); // troca a vírgula por ponto


			$data  = [
				'contract_date_start' 	=> $values['edit_contract_date_start'],
				'contract_value_start'	=> $contract_value_start,
				'contract_date_renew'	=> $values['edit_contract_date_reajust'],
				'contract_value_renew'	=> $contract_value_renew,
			];


			$sqlManager = new SqlManager($dbInstance);
			$sqlUpdate  = (new SqlQueryBuilder())
				->setTableName('tab_contract')
				->setConditions($conds)
				->setData($data);
			$sqlManager->update($sqlUpdate);

			return $resp = 1;
			
		} catch (Exception $e) {

			$error = $e->getMessage();
			return $resp = $error;
		}
	}
}
