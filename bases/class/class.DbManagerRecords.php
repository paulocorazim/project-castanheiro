<?php

class DbManagerRecords
{

	/*Inclusão/Alteração de usuários*/
	public function manager_user($dbInstance, $regists_user, $regists_module, $regists_permission, $appFunctions)
	{
		if ($regists_user[ 'id' ] == null) {
			try {

				/*Verifica tipo de usuário */
				if ($regists_user[ 'permission_master' ] != 'master') { //verifica tipo de usuário

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
				if ($data[ 'password' ] != $data[ 'confirm_passwd' ]) {
					//Aviso do sucesso e redireciona a pagina
					$n_alert = base64_encode(0); //sucess
					$n_msg = base64_encode("Ops! A senhas não combinam, refaça a operação por favor!");
					$appFunctions->redirect_page('0', "../man/manager.users.php?n_alert=$n_alert&n_msg=$n_msg");
					exit();
				}

				//Verificação do uso do CPF
				$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
				$CheckCpf = (new \Simplon\Db\SqlQueryBuilder())
					->setQuery("SELECT cpf from tab_users WHERE cpf='$data[cpf]'");
				$user_cpf = $sqlManager->fetchAll($CheckCpf);

				if (!$user_cpf) {

					//Se o cpf não existe ainda, da sequencia no cadastro
					$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
						->setTableName('tab_users') // define the table name
						->setData($data); // set data (keys = database column name)
					$sqlManager->insert($sqlQuery);

					//Verifica ultimo ID cadastrado
					$lastID = (new \Simplon\Db\SqlQueryBuilder())
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
									$sqlInsert = (new \Simplon\Db\SqlQueryBuilder())
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
							$appFunctions->redirect_page(0,
								"../man/manager.users.php?n_alert=$n_alert&n_msg=$n_msg");
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

			} catch
			(Exception $e) {
				$error = $e->getMessage();
				echo $appFunctions->alert_system(0, "Erro ao Inserir Usuário ->" . $error, 0);
			}

		} else { //Edição do usuário

			/*var_dump($regists_user);
			exit();*/

			//id do usuário
			$conds = ['id' => "$regists_user[id]"];

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);

			try {

				/*Verifica tipo de usuário */
				if ($regists_user[ 'permission_master' ] != 'master') {
					$type = 'basic';
				} else {
					$type = 'master';
				}

				/*Verifica status de usuário */
				if ($regists_user[ 'active' ] != 0) {
					$status = 1;
				} else {
					$status = 0;
				}


				if ($regists_user[ 'password' ] != null) {

					///dados do usuário -- alterando a senha
					$data = [
						'cpf' => "$regists_user[cpf]",
						'name' => "$regists_user[name]",
						'email' => "$regists_user[email]",
						'password' => "$regists_user[password]",
						'confirm_passwd' => "$regists_user[confirm_passwd]",
						'dt_update' => "$regists_user[dt_update]",
						'type' => "$type",
						'active' => "$status"
					];

				} else {

					///dados do usuário
					$data = [
						'cpf' => "$regists_user[cpf]",
						'name' => "$regists_user[name]",
						'email' => "$regists_user[email]",
						'dt_update' => "$regists_user[dt_update]",
						'type' => "$type",
						'active' => "$status"
					];
				}

				//Verifica as senhas informada.
				if ($data[ 'password' ] != $data[ 'confirm_passwd' ]) {
					echo $appFunctions->alert_system(4,
						"Atenção! -> As senhas não combinam, por favor refaça a operação!");
					exit();
				}

				/*Update da Usuário*/
				$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
					->setTableName('tab_users')    // define the table name
					->setConditions($conds)     // set conditions
					->setData($data);           // set data (keys = database column name)
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
					$sqlDelete = (new \Simplon\Db\SqlQueryBuilder())
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
							$sqlInsert = (new \Simplon\Db\SqlQueryBuilder())
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
			$appFunctions->redirect_page(0,
				"../man/manager.users.php?select_id=$regists_user[id]&n_alert=$n_alert& n_msg=$n_msg");
			exit();
		}
	}

	/*Lendo usuário especifico by user_id para pegar os modulos e permissoes*/
	public function select_user($dbInstance, $user_id, $appFunctions)
	{
		try {

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$shSelectUser = (new \Simplon\Db\SqlQueryBuilder())
				->setQuery('SELECT * from tab_users WHERE id = :id')
				->setConditions(['id' => "$user_id"]);
			$shResultsUser = $sqlManager->fetchAll($shSelectUser);

			try {

				foreach ($shResultsUser as $shResultsUserId) {

					/*Módulos do usuário*/
					$shSelectModules = (new \Simplon\Db\SqlQueryBuilder())
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
							$shSelectPermission = (new \Simplon\Db\SqlQueryBuilder())
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
									'id_module' => "$type_permission[id_module]"
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
		$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
		$shSelectModulesAll = (new \Simplon\Db\SqlQueryBuilder())
			->setQuery('SELECT * from tab_modules');
		$shResultsModulesAll = $sqlManager->fetchAll($shSelectModulesAll);


		return array($shResultsUser, $shResultsModulesUser, $shResultsPermission, $shResultsModulesAll);
	}

	/*Lendo usuário especifico para pegar dados de perfil*/
	public function select_user_perfil($dbInstance, $user_id)
	{
		$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
		$shSelectUser = (new \Simplon\Db\SqlQueryBuilder())
			->setQuery('SELECT * from tab_users WHERE id = :id')
			->setConditions(['id' => "$user_id"]);
		$shResultsPerfilUser = $sqlManager->fetchAll($shSelectUser);

		foreach ($shResultsPerfilUser as $perfilUser) {

			$pUser = [
				'user_name' => $perfilUser[ 'name' ],
				'user_cpf' => $perfilUser[ 'cpf' ],
				'user_email' => $perfilUser[ 'email' ],
				'user_id' => $perfilUser[ 'id' ]
			];
		}

		return $pUser;
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
				'dt_update' => date('Y-m-d H:m:s')
			];

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
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

	/*Inclusão/Alteração de Clientes*/
	public function manager_client($dbInstance, $regists_client)
	{
		$data = [
			'id' => "$regists_client[id]",
			'name' => "$regists_client[name]",
			'corporate_name' => "$regists_client[corporate_name]",
			'dt_created' => "$regists_client[dt_created]",
			'dt_update' => "$regists_client[dt_update]",
			'zip_code' => "$regists_client[zip_code]",
			'address' => "$regists_client[address]",
			'number' => "$regists_client[number]",
			'county' => "$regists_client[county]",
			'city' => "$regists_client[city]",
			'neighbordhood' => "$regists_client[neighbordhood]",
			'state' => "$regists_client[state]",
			'phone1' => "$regists_client[phone1]",
			'phone2' => "$regists_client[phone2]",
			'phone3' => "$regists_client[phone3]",
			'cpf' => "$regists_client[cpf]",
			'cnpj' => "$regists_client[cnpj]",
			'rg' => "$regists_client[rg]",
			'type_cli' => "$regists_client[type_cli]",
			'type_for' => "$regists_client[type_for]",
			'type_col' => "$regists_client[type_col]",
			'type_loc' => "$regists_client[type_loc]",
			'state_registration' => "$regists_client[state_registration]",
			'municipal_registration' => "$regists_client[municipal_registration]",
			'email1' => "$regists_client[email1]",
			'email2' => "$regists_client[email2]",
			'site' => "$regists_client[site]",
			'obs' => "$regists_client[obs]",
			'active' => 1,
			'responsible' => "$regists_client[responsible]",
			'complement' => "$regists_client[complement]"
		];

		print_r($data);
		exit;

		if ($regists_client[ 'id' ] == null) { //inclusão

			try {

				$client_dir_create = null;

				$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
				$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
					->setTableName('tab_clients') // define the table name
					->setData($data); // set data (keys = database column name)
				$sqlManager->insert($sqlQuery);

				//Verifica ultimo ID cadastrado
				$lastID = (new \Simplon\Db\SqlQueryBuilder())
					->setQuery('SELECT LAST_INSERT_ID() as ID');
				$resultslastID = $sqlManager->fetchAll($lastID);

				foreach ($resultslastID as $docID) {
					$client_dir_create = $docID[ 'ID' ];
				}

				//Criando diretoria do usuário
				mkdir("..//docs/clients/$client_dir_create", 0777, true);
				mkdir("..//docs/clients/$client_dir_create/savings", 0777, true);
				mkdir("..//docs/clients/$client_dir_create/contracts", 0777, true);
				chmod("..//docs/clients/$client_dir_create", 0777);
				chmod("..//docs/clients/$client_dir_create/savings", 0777);
				chmod("..//docs/clients/$client_dir_create/contracts", 0777);


				//Aviso do sucesso e redireciona a pagina
				$resp = 1;

			} catch (Exception $e) {
				$error = $e->getMessage();
				$resp = $error;
			}

		} else { //realiza alteração

			$conds = ['id' => "$regists_client[id]"];

			try {

				$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
				$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
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
			$saving_value = str_replace('.', '', $regists_client_savings[ 'client_savings_value' ]); // remove o ponto
			$saving_value = str_replace(',', '.', $saving_value); // troca a vírgula por ponto

			$data = [
				'saving_id_client' => "$regists_client_savings[client_savings_id]",
				'saving_value' => "$saving_value",
				'saving_date' => "$regists_client_savings[client_savings_date]",
				'saving_number' => "$regists_client_savings[client_savings_number]",
				'saving_bank' => "$regists_client_savings[client_savings_bank]",
				'saving_filename' => "$filename"
			];

			// print_r($data);
			// exit();

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
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

	/*Listando os registros de depósito poupanças*/
	public function list_client_saving($dbInstance, $idClient)
	{
		try {

			$tr = null;
			$listClientSavingsRegists = null;

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$shSelectClientSavings = (new \Simplon\Db\SqlQueryBuilder())
				->setQuery("SELECT DATE_FORMAT (saving_date,'%d-%m-%Y') as saving_date, saving_bank, saving_value, saving_filename, saving_number
									FROM tab_clients_savings WHERE saving_id_client = :saving_id_client")
				->setConditions(['saving_id_client' => "$idClient"]);
			$shResultsClientSavings = $sqlManager->fetchAll($shSelectClientSavings);

			foreach ($shResultsClientSavings as $reportClients) {
				$tr = "<tr>
                      <td>R$" . number_format($reportClients[ 'saving_value' ], 2, ',', '.') . "</td>
                      <td>$reportClients[saving_date]</td>
                      <td>" . strtoupper($reportClients[ 'saving_bank' ]) . "</td>
                      <td>$reportClients[saving_number]</td>
                      <td><a href='../docs/clients/" . "$idClient/savings/$reportClients[saving_filename]' target='_blank'>Comprovante</a> </td>                      
                    </tr>";
				$listClientSavingsRegists .= $tr;
			}

		} catch
		(Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de poupanças" . $error;
		}

		return $listClientSavingsRegists;
	}

	public function report_client($dbInstance)
	{
		try {

			$tr = null;
			$trResults = null;

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$shSelectClients = (new \Simplon\Db\SqlQueryBuilder())
				->setQuery("SELECT * FROM tab_clients");
			$shResultsClients = $sqlManager->fetchAll($shSelectClients);

			foreach ($shResultsClients as $reportClients) {
				$tr = "<tr>
                      <td>$reportClients[name]</td>
                      <td>$reportClients[address], $reportClients[number] - $reportClients[neighbordhood] | $reportClients[city]</td>
                      <td>$reportClients[email1]</td>
                      <td>$reportClients[phone1]</td>
                      <td></td>                      
                    </tr>";
				$trResults .= $tr;
			}

		} catch
			(Exception $e) 
		{
			$error = $e->getMessage();
			echo "Erro ao receber lista de poupanças" . $error;
		}

		return $trResults;
	}



	/*Listando os id do CLiente no Find das telas*/
	public function find_client_id($dbInstance)
	{
		try {

			$optionList = null;

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$shSelectClientID = (new \Simplon\Db\SqlQueryBuilder())
				->setQuery('SELECT id, corporate_name from tab_clients order by corporate_name');
			$shResultsClientID = $sqlManager->fetchAll($shSelectClientID);

			foreach ($shResultsClientID as $clientsAll) {
				$option = "<option value=\"manager.clients.php?editID=$clientsAll[id]\">Cód: $clientsAll[id] | $clientsAll[corporate_name]</option>";
				$optionList .= $option;
			}

		} catch
		(Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}

		return $optionList;
	}

	/*Pegando os dados dos clientes para carregar e tela de Cliente*/
	public function find_client_data($dbInstance, $clientID)
	{
		$clientData = null;

		try {
			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$shSelectClientAll = (new \Simplon\Db\SqlQueryBuilder())
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
					'complement' => "$clientValue[complement]"
				];
			}

		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}

		return $clientData;
	}

	/*Incluido Boleto a Avulso para Cliente*/
	public function manager_billet_detached($dbInstance, $regists_billet_client)
	{
		try {

			/* $conds = ['id' => "$regists_billet_client[find_client]"];*/
			$billet_value = str_replace('.', '', $regists_billet_client[ 'billet_value' ]); // remove o ponto
			$billet_value = str_replace(',', '.', $billet_value); // troca a vírgula por ponto

			$data = [
				'id_client' => "$regists_billet_client[find_client]",
				'billet_value' => "$billet_value",
				'billet_due_date' => "$regists_billet_client[billet_due_date]",
				'billet_send_mail_client' => "$regists_billet_client[billet_send_mail_client]"
			];

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
				->setTableName('tab_clients_billet_detached')
				->setData($data);
			$sqlManager->insert($sqlQuery);
			$resp = 1;

		} catch (Exception $e) {
			$error = $e->getMessage();
			$resp = $error;
		}

		return $resp;
	}

	/*Inclusão/Alteração de Imóveis*/
	public function manager_property($dbInstance, $regist_property)
	{
		$property_value = str_replace('.', '', $regist_property[ 'property_value' ]); // remove o ponto
		$property_value = str_replace(',', '.', $property_value); // troca a vírgula por ponto

		$property_value_location = str_replace('.', '', $regist_property[ 'property_value_location' ]); // remove o ponto
		$property_value_location = str_replace(',', '.', $property_value_location); // troca a vírgula por ponto

		$property_value_iptu = str_replace('.', '', $regist_property[ 'property_value_iptu' ]); // remove o ponto
		$property_value_iptu = str_replace(',', '.', $property_value_iptu); // troca a vírgula por ponto

		$property_value_condo = str_replace('.', '', $regist_property[ 'property_value_condo' ]); // remove o ponto
		$property_value_condo = str_replace(',', '.', $property_value_condo); // troca a vírgula por ponto


		$data = [
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
			'property_complement' => "$regist_property[property_complement]"
		];


		try {

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
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
	}

	/*Listando os id do Imóvel no Find das telas*/
	public function find_property_id($dbInstance)
	{
		try {

			$optionList = null;

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$shSelectPropertyID = (new \Simplon\Db\SqlQueryBuilder())
				->setQuery('SELECT * from tab_properties ORDER BY property_address , property_number, property_number_apto');
			$shResultsPropertyID = $sqlManager->fetchAll($shSelectPropertyID);

			foreach ($shResultsPropertyID as $propertyALL) {

				if ($propertyALL[ 'property_type' ] == 'Apartamento') {
					$Apto = "- Apto: $propertyALL[property_number_apto]";
				} else {
					$Apto = null;

				}

				$option = "<option value=\"manager.properties.php?editID=$propertyALL[id]\">$propertyALL[property_address], $propertyALL[property_number] $Apto </option>";
				$optionList .= $option;
			}

		} catch
		(Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber lista de clientes" . $error;
		}

		return $optionList;
	}

	/*Listando os id do Imóvel no Find das telas*/
	public function find_property_data($dbInstance, $propertyID)
	{
		$propertyData = null;

		try {

			$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
			$shSelectPropertyAll = (new \Simplon\Db\SqlQueryBuilder())
				->setQuery('SELECT * from tab_properties WHERE id = :id')
				->setConditions(['id' => "$propertyID"]);
			$shResultsPropertyAll = $sqlManager->fetchAll($shSelectPropertyAll);

			foreach ($shResultsPropertyAll as $propertyAll) 
			{
				$propertyData = [
					'property_client_id' => "$propertyAll[property_client_id]",
					'property_type' => "$propertyAll[property_type]",
					'property_destination' => "$propertyAll[property_destination]",
					'property_usefull_area' => "$propertyAll[property_usefull_area]",
					'property_usefull_built' => "$propertyAll[property_usefull_built]",
					'property_ground' => "$propertyAll[property_ground]",
					'property_value' => "$propertyAll[property_value]",
					'property_value_location' => "$propertyAll[property_value_location]",
					'property_value_location' => "$propertyAll[property_value_location]",
					'property_value_condo' => "$propertyAll[property_value_condo]",
					'property_amount_dorm' => "$propertyAll[property_amount_dorm]",
					'property_amount_suite' => "$propertyAll[property_amount_suite]",
					'property_amount_room' => "$propertyAll[property_amount_room]",
					'property_amount_bathroom' => "$propertyAll[property_amount_bathroom]",
					'property_amount_floors' => "$propertyAll[property_amount_floors]",
					'property_amount_vague_garage' => "$propertyAll[property_amount_vague_garage]",
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
					'property_complement' => "$propertyAll[property_complement]"
				];
			}

		} catch (Exception $e) {
			$error = $e->getMessage();
			echo "Erro ao receber dados Imóveis" . $error;
		}

		return $propertyData;
	}

}
