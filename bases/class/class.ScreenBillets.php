<?php

class ScreenBillets
{
    public function screenFormBillet(){

        $screenFormBillet = <<< EOT
        
        <div class="container-fluid">
            
    <div class="container-fluid"> 
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="p-5">
              

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span>Razão Social</span>
                    <input type="text" name="client_corporate_name" id="client_corporate_name" class="form-control">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span>CPF</span>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="form-control" placeholder="CPF / CNPJ">
                </div>
            </div>


                <h2 class="h3 mb-2 text-gray-800">Incluir Boleto Avulso</h2>
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
                          <th>Cod / Cliente</th>
                          <th>Data Vencimento Original</th>
                          <th>Data Vencimento Prorrogado</th>
                          <th>Custo</th>
                          <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Cod / Cliente</th>
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