<?php

Class ScreenClients
{
    public function screenFormClient($findClients, $clientValues, $clientDocs, $clientTableSavings)
    {
       print_r($clientValues);

        if (empty($clientValues)) {
            $btn_txt = "C A D A S T R A R";
        } else {
            $btn_txt = "A L T E R A R";
        }

        if ($clientValues['type_cli'] == 'cli') {
            $type_current = "CLIENTE";

        } elseif ($clientValues['type_for'] == 'for') {
            $type_current = "FORNECEDOR";

        } elseif ($clientValues['type_loc'] == 'loc') {
            $type_current = "LOCATÁRIO";

        } elseif ($clientValues['type_col'] == 'col') {
            $type_current = "COLABORADOR";

        } else {
            $type_current = "";
        }

        if ($clientDocs == null) {
            $desactive_tab_contract = 'disabled';
        } else {
            $desactive_tab_contract = null;
        }

        return <<< EOT
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <div class="container-fluid"> 
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="p-4">
                        <div class="d-flex align-items-end flex-column bd-highlight">
                            <div class="bd-highlight">
                            <div class="input-group mb-3">
                                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                                  name="select_find_client_id" id="select_find_client_id" type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small">	                         
                                    <option value="--">Localizar Cliente ... </option>
                                    $findClients
                                </select>
                                  <div class="input-group-append">
                                    <button id="j_btn_findclientID" name="j_btn_findclientID" class="btn btn-sm btn-primary" type="button">
                                      <i class="fas fa-search fa-sm"></i>
                                    </button>
                                  </div>
                                </div>
                          </div>
                        </div>
        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#novocliente" role="tab" aria-controls="home" aria-selected="true">Cliente</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#dadosadicionais1" role="tab" aria-controls="profile" aria-selected="false">Endereço</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dadosadicionais2" role="tab" aria-controls="contact" aria-selected="false">Tipo Cliente</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#documentos" role="tab" aria-controls="contact" aria-selected="false">Documentos</a>
                            </li>                           
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#poupanca" role="tab" aria-controls="contact" aria-selected="false">Poupança / Depósito</a>
                              </li>
                            <li class="nav-item">
                              <a class="nav-link $desactive_tab_contract" id="contact-tab" data-toggle="tab" href="#contratos" role="tab" aria-controls="contact" aria-selected="false">Contratos</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link $desactive_tab_contract" id="contact-tab" data-toggle="tab" href="#imoveis" role="tab" aria-controls="contact" aria-selected="false">Imóveis</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#observacoes" role="tab" aria-controls="contact" aria-selected="false">Observações</a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="novocliente" role="tabpanel" aria-labelledby="home-tab">
                                                                             
                                          <div class="form-group row">
                                            <div class="col-sm-2 mb-sm-0">
                                                <br>
                                                <select class="custom-select"  name="client_active" id="client_active">
                                                    <option value="1">Ativo</option>
                                                    <option value="0">Bloqueado</option>
                                                </select>  
                                            </div> 
                                            <div class="col-sm-5 mb-3 mb-sm-0">
                                                <span>Nome</span>
                                                <input type="hidden" id="client_id"  name="client_id" value="$clientValues[id]">
                                                <input type="text" required name="client_name" id="client_name" class="form-control"  value="$clientValues[name]">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <span>Razão Social</span>
                                                <input type="text" required name="client_corporate_name" id="client_corporate_name" class="form-control" value="$clientValues[corporate_name]">
                                            </div>
                                            <div class="col-sm-3 mb-3 mb-sm-0">
                                                <span>CPF / CNPJ</span>
                                                <input type="text" required name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="form-control" value="$clientValues[cpf] $clientValues[cnpj]">
                                            </div>
                                            <div class="col-sm-3 mb-3 mb-sm-0">   
                                                <span>Inscrição Estadual</span>
                                                <input type="text" name="client_state_registration" id="client_state_registration"  class="form-control" value="$clientValues[state_registration]">
                                            </div>
                                            <div class="col-sm-2 mb-3 mb-sm-0 py-4">
                                                <span class="py-5">Isento:</span>
                                                <input class="custom-checkbox" type="checkbox" name="client_state_registration_free" id="client_state_registration_free" value="fr" OnClick="disable_client_state_registration_free()">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <span>Inscrição Municipal</span>
                                                <input type="text" required name="client_municipal_registration" id="client_municipal_registration"  class="form-control" value="$clientValues[municipal_registration]">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <span>RG</span>
                                                <input type="text" name="client_rg" id="client_rg" class="form-control" value="$clientValues[rg]">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <span>Responsável</span>
                                                <input type="text" required name="client_responsible" id="client_responsible" class="form-control" value="$clientValues[responsible]">
                                            </div>
                                        </div>
                            </div>
                            
                            <div class="tab-pane fade" id="dadosadicionais1" role="tabpanel" aria-labelledby="profile-tab">
                              
                                <!-- <h3 class="h-auto">Dados Adicionais 1</h3> -->  
                                                               
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <span>E-mail 1</span>
                                        <input type="email" required name="client_email1" id="client_email1" class="form-control" value="$clientValues[email1]">                           
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <span>E-mail 2</span>
                                    <input type="email" name="client_email2" id="client_email2" class="form-control" value="$clientValues[email2]">                            
                                    </div> 
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <span>Site (www)</span> 
                                        <input type="text" name="client_site" id="client_site" class="form-control" value="$clientValues[site]">                            
                                    </div> 
                                </div>
                                
                                <div class="form-group row">
                                    
                                    <div class="col-sm-4 mb-2 mb-sm-0">
                                       <span>Tel1</span>
                                       <input data-mask='+55 (00) 00000-0000' required type="text" name="client_phone1" id="client_phone1" class="form-control" onclick="format_phones()" value="$clientValues[phone1]">
                                    </div>
                                    <div class="col-sm-4 mb-2 mb-sm-0">
                                       <span>Tel2</span>
                                       <input data-mask='+55 (00) 00000-0000'type="text" name="client_phone2" id="client_phone2" class="form-control" onclick="format_phones()" value="$clientValues[phone2]">
                                    </div>   
                                    <div class="col-sm-4 mb-2 mb-sm-0">   
                                        <span>Tel3</span>
                                        <input data-mask='+55 (00) 00000-0000' type="text" name="client_phone3" id="client_phone3" class="form-control" onclick="format_phones()" value="$clientValues[phone3]">
                                    </div> 
                                    </div>                 
                                
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <span>Cep</span>
                                            <input type="text" required name="cep" id="cep" class="form-control" value="$clientValues[zip_code]">
                                        </div>
                                        <div class="col-sm-8 mb-4 mb-sm-0">
                                            <span>Endereço</span>
                                            <input type="text" required name="client_address" id="client_address" class="form-control" value="$clientValues[address]">
                                        </div>
                                         <div class="col-sm-2 mb-2 mb-sm-0">
                                            <span>Número</span>
                                            <input type="text" required name="client_number" id="client_number" class="form-control" value="$clientValues[number]">                  
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <span>Município</span>
                                            <input type="text" name="client_county" id="client_county" class="form-control" value="$clientValues[county]">                  
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <span>Cidade</span>
                                            <input type="text" name="client_city" id="client_city" class="form-control" value="$clientValues[city]">                  
                                        </div> 
                                    </div>
        
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <span>Estado</span>
                                            <input type="text" required name="client_state" id="client_state" class="form-control" value="$clientValues[state]">                  
                                        </div>
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <span>Bairro</span>
                                            <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control" value="$clientValues[neighbordhood]">                  
                                        </div> 
                                        <div class="col-sm-4 mb-2 mb-sm-0">
                                            <span>Complemento</span>
                                            <input type="text" name="client_complement" id="client_complement" class="form-control" value="$clientValues[complement]">                  
                                        </div> 
                                    </div>
        
                            </div>
                            
                            <div class="tab-pane fade" id="dadosadicionais2" role="tabpanel" aria-labelledby="contact-tab">
                               <div class="form-control-sm form-control bg-light border-0 small">Tipo Atual : <strong>$type_current</strong></div><hr>                                  
                                <select name="client_type" id="client_type" type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small">	                         
                                    <option value="--">Selecione o Tipo de Cliente</option>
                                    <option value="loc">LOCATÁRIO</option>
                                    <option value="cli">CLIENTE</option>
                                    <option value="for">FORNECEDOR</option>
                                    <option value="col">COLABORADOR</option>
                                </select>                                                                           
                            </div>
                            
                            <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="contact-tab">
                                <form method="post" enctype="multipart/form-data" id="fileUploadForm">
                                    <input type="hidden" name="clientIDdoc" id="clientIDdoc" value="$clientValues[id]">
                                    <input type="file" class="btn btn-sm btn-info" name="file" id="file">
                                    <button name="j_btn_doc" id="j_btn_doc" value="insertDoc" class="btn btn-info"><strong>Anexar Documentos</strong></button>                             
                                 </form>   
                                    <hr>
                                <hr>
                                Arquivos atuais : <br>
                                <div class="btn btn-sm btn-light">                                     
                                    <strong>$clientDocs</strong>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="poupanca" role="tabpanel" aria-labelledby="contact-tab">                               
                                <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <form method="post" enctype="multipart/form-data" id="fileUploadFormSaving">
                                        <input type="hidden" name="client_savings_id" id="client_savings_id" value="$clientValues[id]">
                                        <span>Depósito :</span>
                                        <input type="text" required name="client_savings_value" id="client_savings_value" class="form-control" data-mask="#.##0,00" placeholder="R$ 0.000,00">
                                        <span>Data do Depósito :</span>
                                        <input type="date" required name="client_savings_date" id="client_savings_date" class="form-control">
                                        <span>Banco Depósito :</span>

                                        <select class="custom-select"  name="client_savings_bank" id="client_savings_bank">
                                            <option value="ITAU-350-30833-4"><font color='blue'>ITAU AG:350 CC:30833-4</font></option>
                                            <option value="SANTANDER-3986-130048-2"><font color='red'>SANTANDER AG:3186 CC:1300482</font></option>
                                        </select> 

                                        <span>Conta Poupança :</span>
                                        <input type="text" required name="client_savings_number" id="client_savings_number" class="form-control"><br>
                                        
                                        
                                        <input type="file" class="btn btn-sm btn-info" name="fileSavings" id="fileSavings"><hr>
                                        <button name="j_btn_salve_savings" id="j_btn_salve_savings" value="InsertSavings" class="btn btn-sm btn-success">Salvar Depósito</button>
                                    </form>
                                </div>     
                                
                            $clientTableSavings
                            
                            <div class="tab-pane fade" id="contratos" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Anexar PDF do contrato ...</label>
                                    <hr>                            
                                    <div class="btn-success btn-sm">
                                     <a href="../docs/clients/19/CONTRATO_COMERCIAL_PADRAO_REVISADO.pdf" target="_blank">CONTRATO COMERCIAL PADRAO</a>
                                    </div><br>                            
                                </div>
                            </div>
                            <div class="tab-pane fade" id="imoveis" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="custom-file">                            
                                    <select type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small" name="" id="">	                         
                                        <option value="--">Adicionar Imóveis ... </option>
                                        <option value="--">CASA</option>
                                        <option value="--">GALPÃO</option>
                                    </select>                              
                                    <hr>                            
                                    <div class="btn-info btn-sm">
                                     GALPÃO AVINADA POA <hr> Inicio da Locação em : 22/11/2018 <br> Término Locação em : 22/11/2022 <br> Valor: R$ 15.000,00
                                    </div><br>                            
                                </div>
                            </div>
                            <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="contact-tab">
                                <textarea name="client_obs" id="client_obs" cols="30" rows="10"></textarea>   
                                <br>
                                <br>
                            </div>
                          </div>
                          <div class="d-flex align-items-end flex-column bd-highlight mt-3">
                            <div class="p-2 bd-highlight"><button name="btn_insert_update_client" id="btn_insert_update_client" value="InsertUpdate"  class="btn btn-success">$btn_txt</button></div>
                          </div>                                              
                           </div>                           
                        </div>
                    </div>
            
        
EOT;
    }


    public function screenListClientSavings($listClientSavingsRegists)
    {
        return <<< EOT
            <div id="table_savings" class="col-sm-8 mb-auto mb-sm-1">                               
                <div class="card-body">
                  <div class="table-responsive">
                    <table cellspacing="0" class="table small table-hover table-bordered">
                      <thead>
                      <tr>
                        <th>R$</th>
                        <th>Data</th>
                        <th>Banco</th>
                        <th>Poupança</th>
                        <th>Arquivo</th>
                      </tr>
                      </thead>                      
                      <tbody>                 
                         $listClientSavingsRegists
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>                          
            </div>
            </div>
EOT;
    }

}
