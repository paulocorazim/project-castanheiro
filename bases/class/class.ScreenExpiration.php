<?php

    class ScreenExpirations
    {
        public function screenExpiration()
        {
            $screenExpiration = <<< EOT
            <div class="container-fluid">         
	                <div class="card o-hidden border-0 shadow-lg my-4">
	                    <div class="p-4">
	        
                        <div class="d-flex align-items-end flex-column bd-highlight">
                          <div class="bd-highlight">
                      <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                          <div class="input-group mb-3">
                              <select type="text" name="find_client" id="find_client" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small"  onchange="find_clitn()">	                         
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
                        </form>
                        </div>
                      </div>	                      
	                    <div class="form-group row">
	                        <div class="col-sm-5 mb-10 mb-sm-0">
	                            <span>Cód: Cliente</span>
	                            <input type="text" name="client_name" id="client_name" class="form-control-sm form-control" value="" disabled>
	                        </div>
	                        <div class="col-sm-3 mb-3 mb-sm-0">
	                          <span>Data Vencimento Original</span>
	                          <input type="date" name="" id="" class="form-control-sm form-control ">
	                      </div>
                          <div class="col-sm-3 mb-3 mb-sm-0">
                            <span>Data Vencimento Real</span>
                            <input type="date" name="" id="" class="form-control-sm form-control ">
                        </div>
                        <div class="col-sm-1 mb-3 mb-sm-0">
                          <br>
                          <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                        </div>
	                                           
	                    </div>
                      
                      <div class="col-auto my-1">
                        <div class="custom-control custom-checkbox mr-sm-2">
                        <hr>
                          <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                          <label class="custom-control-label" for="customControlAutosizing">Enviar link para o Cliente ?</label>	                            
                        <hr>	                           
                        </div>
                  </div>
	                   
	                     
	                        <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Boletos Gerados |  <i class="fas fa-search fa-sm"></i> 
                                     ( <input type="checkbox" name="" id="" class="btn-info"> vencidos ) 
                                     ( <input type="checkbox" name="" id="" class="btn-info"> a vencer )
                                     ( <input type="checkbox" name="" id="" class="btn-info"> todos )
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
                                      <td><button class="btn-sm btn-info btn-user btn-block">Editar</button></td>
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
            return $screenExpiration;
        }
    }