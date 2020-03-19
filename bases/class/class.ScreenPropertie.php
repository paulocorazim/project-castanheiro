<?php

class ScreenProperties
{
	public function screenProperty($findProperty)
	{
		return <<< EOT
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <div class="container-fluid">
            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="p-4">
        
                    <div class="d-flex align-items-end flex-column bd-highlight">
                        <div class="bd-highlight">
                                <div class="input-group mb-3">
                                    <select type="text" aria-describedby="basic-addon2" aria-label="Search"
                                        class="form-control-sm form-control bg-light border-0 small" name="find_client"
                                        id="find_client" >
                                        <option value="">Localizar Imóvel</option>
										$findProperty
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
        
                
                    <div class="px-4 py-3 row">
                        <div class="col-sm-4">
                            <span class="small">Cliente Atual</span>
                            <input type="text" disabled name="property_client_id" id="property_client_id" class="form-control-sm form-control" value="">
                        </div>
                        <div class="col-sm-4">
                            <span class="small">Tipo de Imóvel</span>
                            <select name="property_type" id="property_type" class="form-control-sm form-control" onchange="active_number_apto()"  >
                                <option value=""></option>
                                <option value="Apartamento">Apartamento</option>
                                <option value="Casa">Casa</option>
                                <option value="Fazenda">Fazenda</option>                                
                                <option value="Terreno">Terreno</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <span class="small">Finalidade</span>
                            <select name="property_destination" id="property_destination" class="form-control-sm form-control">
                                <option value="Locacao">Locação</option>
                                <option value="Arrendamento">Arrendamento</option>
                                <option value="Compra">Compra</option>
                                <option value="Comodato">Comodato</option>
                                <option value="Incorporacao">Incorporação</option>
                                <option value="Locacao">Locação</option>
                                <option value="Permuta">Permuta</option>
                                <option value="Venda">Venda</option>
                            </select>
                        </div>
                    </div>
        
	                <div class="px-4 py-3">
	                        <div class="card">
	                            <div class="card-body">
	                                <h4>Endereço</h4>
	                                <div class="form-group row">
	                                    <div class="col-sm-2">
	                                        <span class="small">Cep</span>
	                                        <input type="text" required name="cep" id="cep" class="form-control form-control-sm">
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <span class="small">Endereço</span>
	                                        <input type="text" required name="client_address" id="client_address" class="form-control form-control-sm">
	                                    </div>
	                                     <div class="col-sm-2">
	                                        <span class="small">Número</span>
	                                        <input type="text" required name="client_number" id="client_number" class="form-control form-control-sm">                  
	                                    </div>
	                                    <div class="col-sm-2">
	                                        <span class="small">Apto</span>
	                                        <input type="text" disabled name="number_apto" id="number_apto" class="form-control form-control-sm">                  
	                                    </div>
	                                </div>
	    
	                                <div class="form-group row">
	                                    <div class="col-sm-6">
	                                        <span class="small">Município</span>
	                                        <input type="text"  name="client_county" id="client_county" class="form-control form-control-sm">                  
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <span class="small">Cidade</span>
	                                        <input type="text" name="client_city" id="client_city" class="form-control form-control-sm">                  
	                                    </div> 
	                                </div>
	    
	                                <div class="form-group row">
	                                    <div class="col-sm-4">
	                                        <span class="small">Estado</span>
	                                        <input type="text" required name="client_state" id="client_state" class="form-control form-control-sm">                  
	                                    </div>
	                                    <div class="col-sm-4">
	                                        <span class="small">Bairro</span>
	                                        <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control form-control-sm">                  
	                                    </div> 
	                                    <div class="col-sm-4">
	                                        <span class="small">Complemento</span>
	                                        <input type="text" name="property_complement" id="property_complement" class="form-control form-control-sm">                  
	                                    </div> 
	                                </div>
	                            </div>
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
                                            <input type="number" name="property_usefull_area" id="property_usefull_area" class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="small">Construida:</span>
                                            <input type="number" name="property_usefull_built" id="property_usefull_built" class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="small">Terreno:</span>
                                            <input type="number" name="property_ground" id="property_ground" class="form-control-sm form-control" value="">
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
                                            <input name="property_value" id="property_value" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Locação</span>
                                            <input name="property_value_location" id="property_value_location" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="">
                                        </div>
        
                                        <div class="col-sm-3">
                                            <span class="small">Iptu</span>
                                            <input name="property_value_iptu" id="property_value_iptu" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="">
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Condomínio</span>
                                            <input name="property_value_condo" id="property_value_condo" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="">
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
                                        <select name="property_amount_dorm" id="property_amount_dorm"  class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Suites:</span>
                                    <div class="form-group">
                                        <select name="property_amount_suite" id="property_amount_suite" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Sala:</span>
                                    <div class="form-group">
                                        <select name="property_amount_room" id="property_amount_room" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Banheiro:</span>
                                    <div class="form-group">
                                        <select name="property_amount_bathroom" id="property_amount_bathroom" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="small">Pavimentos:</span>
                                    <div class="form-group">
                                        <select name="property_amount_floors" id="property_amount_floors" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Vagas Garagem:</span>
                                    <select name="property_amount_vague_garage" id="property_amount_vague_garage" class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Vagas Visitante:</span>
                                    <select name="property_amount_vague_visitor" id="property_amount_vague_vistor" class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Depósito:</span>
                                    <select name="property_amount_deposit" id="property_amount_deposit" class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span class="small">Elevadores:</span>
                                    <select name="property_amount_elevators" id="property_amount_elevators" class="form-control form-control-sm">
                                        <option value=""></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <span class="small">Idade:</span>
                                    <input name="property_age" id="property_age" type="text" name="" id="" class="form-control-sm form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>                                       
        
                    <div class="d-flex align-items-end flex-column bd-highlight mt-3">
                        <div class="mx-4 bd-highlight">
                            <button name="j_btn_salve_property" id="j_btn_salve_property" value="insert_update_property" class="btn btn-success" type="submit">SALVAR <i class="fas fa-save"></i></button></div>
                    </div>
                       
                </div>
            </div>
        </div>
EOT;
	}
}