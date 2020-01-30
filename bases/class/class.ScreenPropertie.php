<?php

    class ScreenProperties
    {
        public function screenPropertie()
        {
            $screenPropertie = <<< EOT
	  
            <div class="container-fluid">         
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="p-4">

                        <div class="d-flex align-items-end flex-column bd-highlight">
                            <div class="bd-highlight">
                                <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group mb-3">
                                        <select type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small" name="find_client" id="find_client" onchange="find_clitn()">	                         
                                            <option value="01">Localizar Cliente ... </option>
                                            <option value="02">... </option>
                                            <option value="03">SystemHope</option>
                                            <option value="04">Sepher</option>
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
	                        <div class="col-sm-4 mb-10 mb-sm-0">
	                            <span>Código Cliente</span>
	                            <input type="text" name="" id="" class="form-control-sm form-control" value="">
                            </div>
                            <div class="col-sm-4 mb-10 mb-sm-0">
                                <span>Tipo de Imóvel</span>
	                            <select class="form-control-sm form-control">
                                    <option value=""></option>
                                    <option value="">Casa</option>
                                    <option value="">Apartamento</option>
                                    <option value="">Cobertura</option>
                                    <option value="">Loja</option>
                                    <option value="">Sala Comercial</option>
                                    <option value="">Terreno</option>
                                    <option value="">Fazenda</option>
                                    <option value="">Chacara</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-10 mb-sm-0">
	                            <span>Código Cliente</span>
	                            <input type="text" name="" id="" class="form-control-sm form-control" value="">
                            </div>
                        </div>









                    </div>
                </div>
            </div>
EOT;
            return $screenPropertie;
        }
    }