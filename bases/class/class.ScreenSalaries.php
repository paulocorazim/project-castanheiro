<?php

    class ScreenFormSalaries
    {
        public function creenFormSalarie($findClients)
        {
            return <<< EOT
            <div class="container-fluid">         
                <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="p-4">
                A Definir regra de negócio para Vencimentos.
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
	                    
EOT;
        }
    }