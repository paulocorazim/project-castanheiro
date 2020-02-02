<?php

    class ScreenFormReadjustments
    {
        public function screenFormReadjustment($findClients)
        {
            return <<< EOT
            <div class="container-fluid">         
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="p-4">
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
                
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <span>Valor Atual do Aluguel</span>
                        <input class="form-control" type="text" name="" id="" value="R$ 1.000,00">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <span>Indíce de Reajuste de Aluguel</span>
                        <select class="form-control" name="" id="">
                            <option value="">IGP 1.74%</option>
                            <option value="">IGPM 2.09%</option>
                            <option value="">INPC 1.22%</option>
                            <option value="">IPC 0.94%</option>
                            <option value="">IPC 1.15%</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <span>Mês de inicio do contrato</span>
                        <select class="form-control" name="" id="">
                            <option value="">Jan/2020</option>
                            <option value="">Fev/2020</option>
                            <option value="">Mar/2020</option>
                            <option value="">Abr/2020</option>
                            <option value="">Mai/2020</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <span>Indíce de Reajuste de Aluguel</span>
                        <select class="form-control" name="" id="">
                            <option value="">IGP 1.74%</option>
                            <option value="">IGPM 2.09%</option>
                            <option value="">INPC 1.22%</option>
                            <option value="">IPC 0.94%</option>
                            <option value="">IPC 1.15%</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <span>Mês de inicio do contrato</span>
                        <select class="form-control" name="" id="">
                            <option value="">Jan/2020</option>
                            <option value="">Fev/2020</option>
                            <option value="">Mar/2020</option>
                            <option value="">Abr/2020</option>
                            <option value="">Mai/2020</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <span> Mês de vencimento do alguel</span>
                        <select class="form-control" name="" id="">
                            <option value="">Jan/2020</option>
                            <option value="">Fev/2020</option>
                            <option value="">Mar/2020</option>
                            <option value="">Abr/2020</option>
                            <option value="">Mai/2020</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        Número de meses : 12
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        Número de meses : 12
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        Índice acumulado do periodo: 3,85%
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        O Novo valor do aluguel é : R$ 1.038,48
                    </div>
                </div>
              
              
                
                <div class="d-flex align-items-end flex-column bd-highlight">
                <div class="bd-highlight">
                <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                 <button class="btn btn-success"> REAJUSTAR </button>
                </form>
                </div>
            </div>	    
            
                    </div>
                </div>
            </div>
	                    
EOT;
        }
    }