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
                                    <select type="text" aria-describedby="basic-addon2" aria-label="Search"
                                        class="form-control-sm form-control bg-light border-0 small" name="find_client"
                                        id="find_client" onchange="find_clitn()">
                                        <option value="01">Localizar Imóvel</option>
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
        
                
                    <div class="px-4 py-3 row">
                        <div class="col-sm-4">
                            <span class="small">Código Cliente</span>
                            <input type="text" name="" id="" class="form-control-sm form-control" value="">
                        </div>
                        <div class="col-sm-4">
                            <span class="small">Tipo de Imóvel</span>
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
                        <div class="col-sm-4">
                            <span class="small">Finalidade</span>
                            <select class="form-control-sm form-control">
                                <option value=""></option>
                                <option value="">Venda</option>
                                <option value="">Locação</option>
                                <option value="">Arrendamento</option>
                                <option value="">Permuta</option>
                                <option value="">Compra</option>
                                <option value="">Comodato</option>
                                <option value="">Incorporação</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="row px-4 py-3">
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Áreas (M²)</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <span class="small">Útil:</span>
                                            <input type="text" name="" id="" class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="small">Construida:</span>
                                            <input type="text" name="" id="" class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="small">Terreno:</span>
                                            <input type="text" name="" id="" class="form-control-sm form-control" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-sm-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Valores</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <span class="small">Valor</span>
                                            <input type="text" placeholder="R$ 0,00" data-mask="[-]R$ #.##0,00" name="" id=""
                                                class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Locação</span>
                                            <input type="text" placeholder="R$ 0,00" data-mask="[-]R$ #.##0,00" name="" id=""
                                                class="form-control-sm form-control" value="">
                                        </div>
        
                                        <div class="col-sm-3">
                                            <span class="small">Iptu</span>
                                            <input type="text" placeholder="R$ 0,00" data-mask="[-]R$ #.##0,00" name="" id=""
                                                class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Condomínio</span>
                                            <input type="text" placeholder="R$ 0,00" data-mask="[-]R$ #.##0,00" name="" id=""
                                                class="form-control-sm form-control" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-3">
                    <div class="card col-sm-12">
                        <div class="card-body">
                            <h4>Dependencias</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="small">Dormitório:</span>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="">0</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Suites:</span>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="">0</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Sala:</span>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="">0</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Banheiro:</span>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="">0</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="small">Pavimentos:</span>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="">0</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Vagas Garagem:</span>
                                    <select class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="">0</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Vagas Visitante:</span>
                                    <select class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="">0</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Depósito:</span>
                                    <select class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="">0</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="small">Elevadores:</span>
                                    <select class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="">0</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Idade:</span>
                                    <input type="text" name="" id="" class="form-control-sm form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="px-4 py-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Endereço</h4>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <span class="small">Cep</span>
                                        <input type="text" required name="" id="" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="small">Endereço</span>
                                        <input type="text" required name="" id="" class="form-control form-control-sm">
                                    </div>
                                     <div class="col-sm-2">
                                        <span class="small">Número</span>
                                        <input type="text" required name="" id="client_number" class="form-control form-control-sm">                  
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <span class="small">Município</span>
                                        <input type="text"   name="" id="" class="form-control form-control-sm">                  
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="small">Cidade</span>
                                        <input type="text" name="" id="" class="form-control form-control-sm">                  
                                    </div> 
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <span class="small">Estado</span>
                                        <input type="text" required name="" id="" class="form-control form-control-sm">                  
                                    </div>
                                    <div class="col-sm-4">
                                        <span class="small">Bairro</span>
                                        <input type="text" name="" id="" class="form-control form-control-sm">                  
                                    </div> 
                                    <div class="col-sm-4">
                                        <span class="small">Complemento</span>
                                        <input type="text" name="" id="" class="form-control form-control-sm">                  
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>                   
        
                    <div class="d-flex align-items-end flex-column bd-highlight mt-3">
                        <div class="mx-4 bd-highlight">
                            <button class="btn btn-success" type="submit" name="" id="">SALVAR <i class="fas fa-save"></i></button></div>
                    </div>
        
        
        
                </div>
            </div>
        </div>
EOT;
            return $screenPropertie;
        }
    }