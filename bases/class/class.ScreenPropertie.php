<?php

class ScreenProperties
{
    public function screenProperty($findProperty, $propertyData, $typeProperty)
    {

        $property_value = number_format($propertyData['property_value'], 2, ",", ".");
        $property_value_location = number_format($propertyData['property_value_location'], 2, ",", ".");
        $property_value_iptu = number_format($propertyData['property_value_iptu'], 2, ",", ".");
        $property_value_condo = number_format($propertyData['property_value_condo'], 2, ",", ".");
        $property_value_comgas = number_format($propertyData['property_value_comgas'],2, ",", ".");
		$property_value_rateio = number_format($propertyData['property_value_rateio'],2, ",", ".");
		$property_value_sabesp = number_format($propertyData['property_value_sabesp'],2, ",", ".");
		$property_value_seguro = number_format($propertyData['property_value_seguro'],2, ",", ".");

        if ($propertyData[property_destination] == 'Locacao') {
            $locacao = 'selected';
        }

        if ($propertyData[property_destination] == 'Arrendamento') {
            $arrendamento = 'selected';
        }

        if ($propertyData[property_destination] == 'Compra') {
            $compra = 'selected';
        }

        if ($propertyData[property_destination] == 'Comodato') {
            $comodato = 'selected';
        }

        if ($propertyData[property_destination] == 'Locacao') {
            $locacao = 'selected';
        }

        if ($propertyData[property_destination] == 'Permuta') {
            $permuta = 'selected';
        }

        if ($propertyData[property_destination] == 'Venda') {
            $venda = 'selected';
        }

        if ($propertyData[property_destination] == 'Incorporacao') {
            $incorporacao = 'selected';
        }

        if ($propertyData[property_destination] == 'Loja') {
            $incorporacao = 'selected';
        }

        if ($propertyData[property_destination] == 'Sala') {
            $incorporacao = 'selected';
        }

        return <<< EOT
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <div class="container-fluid">
            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="p-4">

                    <div class="d-flex align-items-end flex-column bd-highlight">
                        <div class="bd-highlight">
                                <div class="input-group mb-3">
                                    <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" type="text" aria-describedby="basic-addon2" aria-label="Search"
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
                            <span class="small">Locatário Atual</span>
                            <input type="hidden" name="property_id" id="property_id" value="$propertyData[property_id]" >
                            <input type="text" disabled name="property_client" id="property_client" class="form-control-sm form-control" value="$propertyData[property_client]">
                        </div>
                        <div class="col-sm-4">
                            <span class="small">Tipo de Imóvel</span>
                            $typeProperty
                        </div>
                        <div class="col-sm-4">
                            <span class="small">Finalidade</span>
                            <select name="property_destination" id="property_destination" class="form-control-sm form-control">
                                <option value="Locacao" $locacao>Locação</option>
                                <option value="Arrendamento" $arrendamento>Arrendamento</option>
                                <option value="Compra" $compra>Compra</option>
                                <option value="Comodato" $comodato>Comodato</option>
                                <option value="Incorporacao" $incorporacao>Incorporação</option>
                                <option value="Permuta" $permuta>Permuta</option>
                                <option value="Venda" $venda>Venda</option>
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
	                                        <input type="text" required name="cep" id="cep" class="form-control form-control-sm" value="$propertyData[property_cep]" />
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <span class="small">Endereço</span>
	                                        <input type="text" required name="client_address" id="client_address" class="form-control form-control-sm" value="$propertyData[property_address]" />
	                                    </div>
	                                     <div class="col-sm-2">
	                                        <span class="small">Número</span>
	                                        <input type="text" required name="client_number" id="client_number" class="form-control form-control-sm" value="$propertyData[property_number]" />
	                                    </div>
	                                    <div class="col-sm-2">
	                                        <span class="small">Apto</span>
	                                        <input type="text" required name="number_apto" id="number_apto" class="form-control form-control-sm" value="$propertyData[property_number_apto]" />
	                                    </div>
	                                </div>

	                                <div class="form-group row">
	                                    <div class="col-sm-6">
	                                        <span class="small">Município</span>
	                                        <input type="text"  name="client_county" id="client_county" class="form-control form-control-sm" value="$propertyData[property_county]" />
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <span class="small">Cidade</span>
	                                        <input type="text" name="client_city" id="client_city" class="form-control form-control-sm" value="$propertyData[property_city]" />
	                                    </div>
	                                </div>

	                                <div class="form-group row">
	                                    <div class="col-sm-4">
	                                        <span class="small">Estado</span>
	                                        <input type="text" required name="client_state" id="client_state" class="form-control form-control-sm" value="$propertyData[property_state]" />
	                                    </div>
	                                    <div class="col-sm-4">
	                                        <span class="small">Bairro</span>
	                                        <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control form-control-sm" value="$propertyData[property_neighbordhood]" />
	                                    </div>
	                                    <div class="col-sm-4">
	                                        <span class="small">Complemento</span>
	                                        <input type="text" name="property_complement" id="property_complement" class="form-control form-control-sm" value="$propertyData[property_complement]" />
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
                                            <input type="number" name="property_usefull_area" id="property_usefull_area" class="form-control-sm form-control" value="$propertyData[property_usefull_area]" />
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="small">Construida:</span>
                                            <input type="number" name="property_usefull_built" id="property_usefull_built" class="form-control-sm form-control" value="$propertyData[property_usefull_built]" />
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="small">Terreno:</span>
                                            <input type="number" name="property_ground" id="property_ground" class="form-control-sm form-control" value="$propertyData[property_ground]" />
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
                                            <span class="small">Valor do Imóvel</span>
                                            <input name="property_value" id="property_value" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value" />
                                        </div>
                                        <!-- <div class="col-sm-3">
                                            <span class="small">Locação</span>
                                            <input name="property_value_location" id="property_value_location" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value_location" />
                                        </div> -->

                                        <div class="col-sm-3">
                                            <span class="small">Iptu</span>
                                            <input name="property_value_iptu" id="property_value_iptu" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value_iptu" />
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Condomínio</span>
                                            <input name="property_value_condo" id="property_value_condo" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value_condo" />
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Comgás</span>
                                            <input name="property_value_comgas" id="property_value_comgas" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value_comgas" />
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Rateio</span>
                                            <input name="property_value_rateio" id="property_value_rateio" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value_rateio" />
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Sabesp</span>
                                            <input name="property_value_sabesp" id="property_value_sabesp" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value_sabesp" />
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="small">Seguro</span>
                                            <input name="property_value_seguro" id="property_value_seguro" type="text" placeholder="R$ 0,00" data-mask="#.##0,00" class="form-control-sm form-control" value="$property_value_seguro" />
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
                                            <option value="$propertyData[property_amount_dorm]">$propertyData[property_amount_dorm]</option>
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
                                            <option value="$propertyData[property_amount_suite]">$propertyData[property_amount_suite]</option>
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
                                            <option value="$propertyData[property_amount_room]">$propertyData[property_amount_room]</option>
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
                                            <option value="$propertyData[property_amount_bathroom]">$propertyData[property_amount_bathroom]</option>
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
                                            <option value="$propertyData[property_amount_floors]">$propertyData[property_amount_floors]</option>
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
                                        <option value="$propertyData[property_amount_vague_garage]">$propertyData[property_amount_vague_garage]</option>
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
                                    <select name="property_amount_vague_visitor" id="property_amount_vague_visitor" class="form-control form-control-sm">
                                        <option value="$propertyData[property_amount_vague_visitor]">$propertyData[property_amount_vague_visitor]</option>
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
                                        <option value="$propertyData[property_amount_deposit]">$propertyData[property_amount_deposit]</option>
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
                                        <option value="$propertyData[property_amount_elevators]">$propertyData[property_amount_elevators]</option>
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
                                    <input name="property_age" id="property_age" type="text" name="" id="" class="form-control-sm form-control" value="$propertyData[property_age]" />
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="d-flex align-items-end flex-column bd-highlight mt-3">
                        <div class="mx-4 bd-highlight">
                            <button name="j_btn_salve_property" id="j_btn_salve_property" value="insert_update_property" class="btn btn-success" type="submit">SALVAR <i class="fas fa-save"></i></button></div>
                    </div>
                    
                    <div class="d-flex align-items-end flex-column bd-highlight mt-3">
                        <div class="mx-4 bd-highlight">
                            <button name="j_btn_remove_property" id="j_btn_remove_property" value="remove_property" class="btn btn-danger" type="submit">REMOVER IMÓVEL</button></div>
                    </div>

                </div>
            </div>
        </div>
EOT;
    }

    public function screenTypeProperty($propertyData, $origem){

    	if($origem == 'find'){
		    $option ="<option value=''>Tipo de Imóveis</option>";
	    }
    	else{
    		$option ="<option value='$propertyData[property_type]'>$propertyData[property_type]</option>";
	    }

    	$typeProperty = <<< EOT
		<select name="property_type" id="property_type" class="form-control-sm form-control" onchange="active_number_apto()"  >
            $option
            <option value="Apartamento">Apartamento</option>
            <option value="Casa">Casa</option>
            <option value="Fazenda">Fazenda</option>
            <option value="Loja">Loja</option>
            <option value="Sala">Sala</option>
            <option value="Terreno">Terreno</option>
        </select>
EOT;

    	return $typeProperty;
    }
}
