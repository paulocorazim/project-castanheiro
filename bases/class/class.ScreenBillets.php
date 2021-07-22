<?php

    class ScreenBillets
    {
        public function screenFormBillet($findClients, $trValues, $selectLotes)
        {
            return <<< EOT
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	          <div class="container-fluid">         
	                <div class="card o-hidden border-0 shadow-lg my-4">
	                    <div class="p-3">
                        <div class="d-flex align-items-end flex-column bd-highlight">
                          <div class="bd-highlight">
                                  <div class="input-group mb-3">
                                      <select type="text" name="find_client" id="find_client" aria-describedby="basic-addon2"
                                          aria-label="Search" class="form-control-sm form-control bg-light border-0 small"
                                          onchange="find_clitn()">
                                          <option value="">Localizar Cliente ... </option>
                                          <option value="">... </option>
                                          $findClients
                                      </select>
                                      <div class="input-group-append">
                                          <button class="btn btn-sm btn-primary" type="button">
                                              <i class="fas fa-search fa-sm"></i>
                                          </button>
                                      </div>
                                  </div>
                          </div>
                      </div>    

	                    <div class="row">
	                        
                          <div class="col-sm-3">
	                          <span>Cliente</span>
	                            <input type="text" name="client_name" id="client_name" class="form-control-sm form-control" value="" disabled>
	                        </div>
                           
	                        <div class="col-sm-2">
	                          <span>Data Vencimento</span>
	                          <input type="date" name="billet_due_date" id="billet_due_date" class="form-control-sm form-control ">
	                        </div>

                          <div class="col-sm-2">
                            <span>Valor</span>
                            <input type="text" name="billet_value" id="billet_value" class="form-control-sm form-control" data-mask='#.##0,00' placeholder="R$ 0.000,00">
                          </div>

                          <div class="col-sm-2">
                           <span>Desconto</span>
                           <input type="text" name="billet_discount" id="billet_discount" class="form-control-sm form-control" data-mask='#.##0,00' placeholder="R$ 0.000,00">
                          </div>

                          <div class="col-sm-2">
	                          <span>Data Prorrogação</span>
	                          <input type="date" name="billet_due_date_old" id="billet_due_date_old" class="form-control-sm form-control ">
	                        </div>

                          <div class="col-sm-2">
                            <span>Valor Prorrogação</span>
                            <input type="text" name="billet_value_old" id="billet_value_old" class="form-control-sm form-control" data-mask='#.##0,00' placeholder="R$ 0.000,00">
                          </div>

                        <div class="col-sm-1">
                          <br>
                          <i class="fas fa-envelope"></i>
                          <input  name="billet_send_mail_client" id="billet_send_mail_client" type="checkbox" value="1" class="btn-info  custom-checkbox">
                          <button name="btn_insert_billet" id="btn_insert_billet" class="btn btn-sm btn-success btn-block" value="!0ksjn#@"  ><i class="fas fa-plus"></i></button>
                        </div>

	                    </div>
                      
                      <div class="col-auto">
                        <div class="custom-control custom-checkbox mr-sm-2">
      	                            
                        </div>
                     </div>
	                     <hr>
	                     
                            <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Boletos Gerados |  <i class="fas fa-search fa-sm"></i> 
                                     <input type="checkbox" name="billet_vencidos" id="billet_vencidos" class="btn-info"> vencidos 
                                     <input type="checkbox" name="billet_a_vencer" id="billet_a_vencer" class="btn-info"> a vencer
                                     <input type="checkbox" name="billet_all" id="billet_all" class="btn-info" OnClick="disable_billet_dues()"> todos
                                     <input type="date" name="find_billet_duedate" id="find_billet_duedate" placeholder="Vencimento" class="btn">
                                     
                                     <select class="btn  custom-checkbox" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                                      name="select_lote" id="select_lote" type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small">
                                      <option value="--">Lote ?</option>
                                       $selectLotes
                                     </select>
                                      <hr>
                                     <button id="btn_find_billets" name="btn_find_billets" class="btn btn-sm btn-info  btn-block">Pesquisar</button>

                                   </h6>
                              </div>
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table cellspacing="0" class="table table-hover table-bordered" id="">
                                    <thead>
                                    <tr>
                                      <th>Lote</th>
                                      <th>Cliente</th>
                                      <th>Vencimento</th>
                                      <th>R$</th>
                                      <th>Prorrogado</th>
                                      <th>R$</th>
                                      <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th>Total</th>
                                      <th></th>
                                      <th>Prorrogado</th>
                                      <th></th>
                                      </tr>
                                      $trValues[1]
                                    </tfoot>
                                    <tbody>                 
                                     $trValues[0]
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                                 
                      </div>
                  </div>
                </div>
EOT;
        }


        public function screenReportBordero( $data, $m, $y, $selectAddres, $address )
        {
            
          //$mes = date('m/Y', strtotime('+1 months'));
          $sel = "<option value='?report=true&type=bc&m=08&y=21'>Agosto 2021</option>
                  <option value='?report=true&type=bc&m=09&y=21'>Setembro 2021</option>
                  <option value='?report=true&type=bc&m=10&y=21'>Outubro 2021</option>
                  <option value='?report=true&type=bc&m=11&y=21'>Novembro 2021</option>
                  <option value='?report=true&type=bc&m=12&y=21'>Dezembro 2021</option>
                  <option value='?report=true&type=bc&m=01&y=22'>Janeiro 2022</option>
                  <option value='?report=true&type=bc&m=02&y=22'>Fevereiro 2022</option>
                  <option value='?report=true&type=bc&m=03&y=22'>Março 2022</option>";

          return <<< EOT
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                   <i class="fas fa-search fa-sm"></i> 
                     PREVIEW DE BORDERÔS PARA ENVIAR AO BANCO<hr>
                     <a class="btn btn-sm btn-light btn-icon-split" href="#">
                      <span class="text">
                        <select class="btn-primary  custom-checkbox" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                          name="select_mes" id="select_mes" type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small">
                          <option value="--">Qual mês de vencimento?</option>
                          $sel
                        </select>
                        <input type="hidden" id="b_m" name="b_m" value="$m" >
                        <input type="hidden" id="b_y" name="b_y" value="$y" >
                        <input type="hidden" id="b_address" name="b_address" value="$address" >
                        <select class="btn-primary  custom-checkbox" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                        name="select_addres" id="select_addres" type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small">
                        <option value="--">Qual endereço deseja?</option>
                         $selectAddres
                      </select>

                      </span>
                    </a> 
                <button name="btn_create_bordero" id="btn_create_bordero" value="find" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> 
                <b>GERAR BORDERÔ COM VENCIMENTOS EM $m.20$y </b>
                </button>

                   </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table cellspacing="0" class="table table-hover table-bordered" id="">
                    <thead>
                    <tr>
                      <th>Locatário</th>  
                      <th>Endereço</th>
                      <th>Vencimento</th>
                      <th>Aluguel</th>
                      <th>Condominio</th>
                      <th>Iptu</th>
                      <th>Comgas</th>
                      <th>Seguro</th>
                      <th>Rateio</th>
                      <th>Sabpesp</th>
                      <th>TOTAL</th>
                    </tr>
                    </thead>
                    <tfoot>
                     
                      <tr>
                      <th>Locatário</th>  
                      <th>Endereço</th>
                      <th>Vencimento</th>
                      <th>R$</th>
                      <th>Condominio</th>
                      <th>Iptu</th>
                      <th>Comgas</th>
                      <th>Seguro</th>
                      <th>Rateio</th>
                      <th>Sabpesp</th>
                      <th>TOTAL</th>
                      </tr>
                      $data[1]
                    </tfoot>
                    <tbody>                 
                        $data[0]
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

EOT;
        }
    }