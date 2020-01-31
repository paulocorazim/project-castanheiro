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
                Valor atual do Aluguel.<br>
                <input type="text" name="" id="" value="R$ 1.000,00"><br>
                Indíce de Reajuste de Aluguel<br>
                <select name="" id="">
                <option value="">IGP 1.74%</option>
                <option value="">IGPM 2.09%</option>
                <option value="">INPC 1.22%</option>
                <option value="">IPC 0.94%</option>
                <option value="">IPC 1.15%</option>
                </select><br>
                Mês de inicio do contrato
                <select name="" id="">
                <option value="">Jan/2020</option>
                <option value="">Fev/2020</option>
                <option value="">Mar/2020</option>
                <option value="">Abr/2020</option>
                <option value="">Mai/2020</option>
                </select><br>
                Mês de vencimento do alguel
                <select name="" id="">
                <option value="">Jan/2020</option>
                <option value="">Fev/2020</option>
                <option value="">Mar/2020</option>
                <option value="">Abr/2020</option>
                <option value="">Mai/2020</option>
                </select><br>
                Número de meses : 12 <br>
                Índice acumulado do periodo: 3,85%<br>
                O Novo valor do aluguel é : R$ 1.038,48
                <div class="d-flex align-items-end flex-column bd-highlight">
                <div class="bd-highlight">
                <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                 <button class="btn-success"> REAJUSTAR </button>
                </form>
                </div>
            </div>	                      
	                    
EOT;
        }
    }