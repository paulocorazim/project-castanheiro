<?php /** @noinspection ALL */

	class DbManagerRecords
	{
		/*Inclusão/Alteração de usuários*/
		public function manager_user ($dbInstance, $regists_user, $regists_module, $regists_permission, $appFunctions)
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
						'status' => "1",
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
						$n_msg = base64_encode("Obá! Usuário Cadastrado com sucesso! Aguarde ...");
						$appFunctions->redirect_page(3, "../man/manager.users.php?n_alert=$n_alert&n_msg=$n_msg");
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

				//id do usuário
				$conds = ['id' => "$regists_user[id]"];

				$sqlManager = new \Simplon\Db\SqlManager($dbInstance);

				try {

					/*Verifica tipo de usuário */
					if ($regists_user['permission_master'] != 'master') {

						$type = 'basic';
					} else {

						$type = 'master';
					}

					/*Verifica status de usuário */
					if ($regists_user['status'] != 'inativo') {

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
							'status' => "$status"
						];

					} else {

						///dados do usuário
						$data = [
							'cpf' => "$regists_user[cpf]",
							'name' => "$regists_user[name]",
							'email' => "$regists_user[email]",
							'dt_update' => "$regists_user[dt_update]",
							'type' => "$type",
							'status' => "$status"
						];
					}

					//Verifica as senhas informada.
					if ($data['password'] != $data['confirm_passwd']) {
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
					echo $appFunctions->alert_system(0, "Erro ao alterar Usuário ->" . $error);
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
						echo $appFunctions->alert_system(0, "Erro ao alterar módulos ->" . $error);
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
						echo $appFunctions->alert_system(0, "Erro ao alterar permissões ->" . $error);
					}

				}

				echo $appFunctions->alert_system(5, "Usuário alterado com sucesso !Aguarde ...");
				$appFunctions->redirect_page('3', '../man/manager.users.php');
				exit();
			}
		}

		/*Lendo usuário especifico by user_id*/
		public function select_user ($dbInstance, $user_id, $appFunctions)
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

		/*Inclusão/Alteração de Clientes*/
		public function manager_client ($dbInstance, $appFunctions, $regists_client)
		{
			if ($regists_client['id'] == null) { //inclusão ou alteração

				try {

					$data = [
						'name' => "$regists_client[name]",
						'corporate_name' => "$regists_client[corporate_name]",
						'dt_created' => "$regists_client[dt_created]",
						'dt_update' => "$regists_client[dt_update]",
						'zip_code' => "$regists_client[zip_code]",
						'address' => "$regists_client[address]",
						'number' => "$regists_client[number]",
						'county' => "$regists_client[county]",
						'city' => $regists_client[city],
						'neighbordhood' => "$regists_client[neighbordhood]",
						'state' => "$regists_client[state]",
						'phone1' => "$regists_client[phone1]",
						'phone2' => "$regists_client[phone2]",
						'phone3' => "$regists_client[phone3]",
						'cpf' => "$regists_client[cpf]",
						'cnpj' => "$regists_client[cnpj]",
						'rg' => "$regists_client[rg]",
						'type' => "$regists_client[type]",
						'state_registration' => "$regists_client[state_registration]",
						'municipal_registration' => "$regists_client[municipal_registration]",
						'email1' => "$regists_client[email1]",
						'email2' => "$regists_client[email2]",
						'site' => "$regists_client[site]",
						'obs' => "$regists_client[obs]",
						'active' => 1,
						'responsible' => "$regists_client[responsible]"
					];

					$sqlManager = new \Simplon\Db\SqlManager($dbInstance);
					$sqlQuery = (new \Simplon\Db\SqlQueryBuilder())
						->setTableName('tab_clients') // define the table name
						->setData($data); // set data (keys = database column name)
					$sqlManager->insert($sqlQuery);

					echo $appFunctions->alert_system(1,
						"Inclusão do Cliente : $regists_client[name] concluida com sucesso!");


				} catch (Exception $e) {
					$error = $e->getMessage();
					echo $appFunctions->alert_system(0, "Erro ao alterar permissões ->" . $error);
				}


			} else {
				$appFunctions->alert_system(5, "Alteração do Cliente concluida com sucesso!");
			}

		}
	}
