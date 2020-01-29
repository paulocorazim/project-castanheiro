<?php

    class ScreenBillets
    {
        public function screenFormBillet()
        {
            $screenFormBillet = <<< EOT
	        <div class="container-fluid">         
	                <div class="card o-hidden border-0 shadow-lg my-4">
	                    <div class="p-4">
	        
	                      <div class="btn-group mb-2">	                     
                            <select  class="form-control-sm form-control" name="" id="">	                         
	                            <option value="--">Localizar Cliente ... </option>
	                            <option value="--">... </option>
	                            <option value="--">SystemHope</option>
	                            <option value="--">Sepher</option>
                            </select>                                                                    
	                      </div>
	                      <i class="fas fa-search fa-sm"></i>
	                      
	                      <hr>
	                      
	                      <div class="form-group row">
	                        <div class="col-sm-5 mb-10 mb-sm-0">
	                            <span>Cód: Cliente</span>
	                            <input type="text" name="" id="" class="form-control-sm form-control" value="1010 : SystemHope Softwares" disabled>
	                        </div>
	                        <div class="col-sm-2 mb-3 mb-sm-0">
	                          <span>Data Vencimento</span>
	                          <input type="date" name="" id="" class="form-control-sm form-control ">
	                      </div>
	                      <div class="col-sm-2 mb-2 mb-sm-0">
	                        <span>Valor</span>
	                        <input type="text" name="" id="" class="form-control-sm form-control" data-mask='[-]R$ #.##0,00' placeholder="R$ 0,00">
	                      </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                          <br>
                          <button class="btn-sm btn-success"><span  style="font-size: larger; font-family: courier new, cursive; ">+</span></button>
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
	                     <hr>
	                     
	                        <!-- DataTales Example -->
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
            return $screenFormBillet;
        }


        public function screenReportBillet()
        {
            $screenReportBillet = <<< EOT
7 DataTales Example -->
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
                                      <td><button class="btn-sm btn-info btn-user btn-block">Editar</button></td>
                                    </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
EOT;
            return $screenReportBillet;
        }
    }