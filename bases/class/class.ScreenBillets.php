<?php

class ScreenBillets
{
    public function screenFormBillet()
    {

        $screenFormBillet = <<< EOT
        
        <div class="container-fluid">         
            <div class="container-fluid"> 
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="p-5">
        
                      <div class="btn-group mb-3">
                        <input type="text" name="" id="" class="form-control" placeholder="Localizar Cliente ...">                       
                      </div>
                    
                      <div class="form-group row">
                        <div class="col-sm-3 mb-10 mb-sm-0">
                            <span>Codigo: Cliente</span>
                            <input type="text" name="" id="" class="form-control" value="1010 : SystemHope Softwares" disabled>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <span>Data Vencimento</span>
                          <input type="date" name="" id="" class="form-control col-sm-7">
                      </div>
                      <div class="col-sm-2 mb-2 mb-sm-0">
                        <span>Valor</span>
                        <input type="text" name="" id="" class="form-control" data-mask='[-]R$ #.##0,00' placeholder="R$ 0,00">
                    </div>
                    
                    <div class="col-auto my-1">
                          <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Enviar link para o Cliente ?</label>
                          </div>
                    </div>
                        
                    <div class="col-sm-3 mb-3 mb-sm-0">
                      <br>
                      <button class="col-sm-2 btn btn-primary  btn-success btn-user btn-block"><span  style="font-size: larger; font-family: courier new, cursive; ">+</span></button>
                    </div>
                    </div>
        
        
                    <div class="text-left">
                      <h1 class="h3 text-gray-900 mt-5 mb-5">Incluir Boleto Avulso</h1>
                    </div>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Relatório de Boletos Gerados </h6>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                                <thead>
                                <tr>
                                  <th>Codigo Cliente</th>
                                  <th>Data Vencimento Original</th>
                                  <th>Data Vencimento Prorrogado</th>
                                  <th>Custo</th>
                                  <th>Ações</th>
                                </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                  <th>Codigo Cliente</th>
                                  <th>Data Vencimento Original</th>
                                  <th>Data Vencimento Prorrogado</th>
                                  <th>Custo</th>
                                  <th>Ações</th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                  <td>1010: SystemHope</td>
                                  <td>11/11/1111</td>
                                  <td>11/11/1111</td>
                                  <td>R$ 1.900,00</td>
                                  <td><button class="btn btn-primary btn-user btn-block"> Teste</button></td>
                                </tr>
                                <tr>
                                  <td>1010: SystemHope</td>
                                  <td>11/11/1111</td>
                                  <td>11/11/1111</td>
                                  <td>R$ 2.900,00</td>
                                  <td><button class="btn btn-primary btn-user btn-block"> Teste</button><button class="btn btn-primary btn-user btn-block"> Teste</button></td>
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
}