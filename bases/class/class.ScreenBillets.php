<?php

    class ScreenBillets
    {
        public function screenFormBillet($findClients)
        {
            return <<< EOT
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	        <div class="container-fluid">         
	                <div class="card o-hidden border-0 shadow-lg my-4">
	                    <div class="p-4">
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
	                        <div class="col-sm-5">
	                            <span>Código Cliente</span>
	                            <input type="text" name="client_name" id="client_name" class="form-control-sm form-control" value="" disabled>
	                        </div>
	                        <div class="col-sm-3">
	                          <span>Data Vencimento</span>
	                          <input type="date" name="billet_due_date" id="billet_due_date" class="form-control-sm form-control ">
	                      </div>
	                      <div class="col-sm-2">
	                        <span>Valor</span>
	                        <input type="text" name="billet_value" id="billet_value" class="form-control-sm form-control" data-mask='#.##0,00' placeholder="R$ 0.000,00">
	                      </div>
                        <div class="col-sm-2">
                          <br>
                          <button name="btn_insert_billet" id="btn_insert_billet" class="btn btn-sm btn-success btn-block" value="!0ksjn#@"  ><i class="fas fa-plus"></i></button>
                        </div>                
	                    </div>
                      
                      <div class="col-auto">
                        <div class="custom-control custom-checkbox mr-sm-2">
                        <hr>
                          <input  name="billet_send_mail_client" id="billet_send_mail_client" type="checkbox" value="1" class="btn-info  custom-checkbox">
                          <label>Enviar link para o Cliente ?</label>	                            
                        <hr>	                           
                        </div>
                     </div>
	                     <hr>
	                     
                            <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Boletos Gerados |  <i class="fas fa-search fa-sm"></i> 
                                     ( <input type="checkbox" name="billet_vencidos" id="billet_vencidos" class="btn-info"> vencidos ) 
                                     ( <input type="checkbox" name="billet_a_vencer" id="billet_a_vencer" class="btn-info"> a vencer )
                                     ( <input type="checkbox" name="billet_all" id="billet_all" class="btn-info" OnClick="disable_billet_dues()"> todos )
                                   </h6>
                              </div>
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table cellspacing="0" class="table table-hover table-bordered" id="">
                                    <thead>
                                    <tr>
                                      <th>Cód : Cliente</th>
                                      <th>Vencimento Original</th>
                                      <th>Vencimento Prorrogado</th>
                                      <th>R$</th>
                                      <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                      <th>Cód : Cliente</th>
                                      <th>Vencimento Original</th>
                                      <th>Vencimento Prorrogado</th>
                                      <th>R$</th>
                                      <th>Ações</th>
                                      </tr>
                                    </tfoot>
                                    <tbody>                 
                                    <tr>
                                      <td>1010: SystemHope</td>
                                      <td>11/11/1111</td>
                                      <td>11/11/1111</td>
                                      <td>R$ 2.900,00</td>
                                      <td><button class="btn btn-sm btn-info  btn-block">Editar</button></td>
                                    </tr>
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


        public function screenReportBillet()
        {
            return <<< EOT
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                   <i class="fas fa-search fa-sm"></i> 
                     ( <input type="checkbox" name="billet_vencidos" id="billet_vencidos" class="btn-info"> vencidos ) 
                     ( <input type="checkbox" name="billet_a_vencer" id="billet_a_vencer" class="btn-info"> a vencer )
                     ( <input type="checkbox" name="billet_all" id="billet_all" class="btn-info" OnClick="disable_billet_dues()"> todos )
                   </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table cellspacing="0" class="table table-hover table-bordered" id="">
                    <thead>
                    <tr>
                      <th>Cód : Cliente</th>
                      <th>Boleto</th>
                      <th>Vencimento Original</th>
                      <th>Vencimento Prorrogado</th>
                      <th>R$ Orginial</th>
                      <th>% Juros</th>
                      <th>R$ Prorrogado</th>
                      <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>Cód : Cliente</th>
                      <th>Boleto</th>
                      <th>Vencimento Original</th>
                      <th>Vencimento Prorrogado</th>
                      <th>R$ Orginial</th>
                      <th>% Juros</th>
                      <th>R$ Prorrogado</th>
                      <th>Ações</th>
                      </tr>
                    </tfoot>
                    <tbody>                 
                    <tr>
                      <td>1010: SystemHope</td>
                      <td>n.12134 <br> n.12135</td>
                      <td>11/11/1111 <br> 12/12/1111</td>
                      <td>11/11/1111 <br> 12/12/1111</td>
                      <td>R$ 2.900,00 <br> R$ 2.900,00</td>
                      <td>2.5% <br> 0%</td>
                      <td>R$ 3.100,00 <br> R$ 0,00</td>
                      <td><button class="btn-sm btn-info btn-user btn-block">Editar</button></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

EOT;
        }
    }