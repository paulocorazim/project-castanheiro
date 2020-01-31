<?php

    Class ScreenClients
    {

        public function screenFormClient()
        {

            $screenFormClient = <<< EOT
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <div class="container-fluid"> 
        <div class="card o-hidden border-0 shadow-lg">
            <div class="p-4">
                <div class="d-flex align-items-end flex-column bd-highlight">
                    <div class="bd-highlight">
                <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group mb-3">
                        <select type="text" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small" name="" id="">	                         
                            <option value="--">Localizar Cliente ... </option>
                            <option value="--">... </option>
                            <option value="--">SystemHope</option>
                            <option value="--">Sepher</option>
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
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#fichas" role="tab" aria-controls="contact" aria-selected="false">Fichas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contratos" role="tab" aria-controls="contact" aria-selected="false">Contratos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#imoveis" role="tab" aria-controls="contact" aria-selected="false">Imóveis</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#observacoes" role="tab" aria-controls="contact" aria-selected="false">Observações</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="novocliente" role="tabpanel" aria-labelledby="home-tab">
                            
                                 <form action="../man/manager.clients.php" class="user" method="post" >
                                 
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
                                        <input type="text" required name="client_name" id="client_name" class="form-control">
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <span>Razão Social</span>
                                        <input type="text" required name="client_corporate_name" id="client_corporate_name" class="form-control">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <span>CPF / CNPJ</span>
                                        <input type="text" required name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="form-control">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">   
                                        <span>Inscrição Estadual</span>
                                        <input type="text" name="client_state_registration" id="client_state_registration"  class="form-control">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0 py-4">
                                        <span class="py-5">Isento:</span>
                                        <input class="custom-checkbox" type="checkbox" name="client_state_registration_free" id="client_state_registration_free" value="fr" OnClick="disable_client_state_registration_free()">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <span>Inscrição Municipal</span>
                                        <input type="text" required name="client_municipal_registration" id="client_municipal_registration"  class="form-control">
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <span>RG</span>
                                        <input type="text" name="client_rg" id="client_rg" class="form-control">
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <span>Responsável</span>
                                        <input type="text" required name="client_responsible" id="client_responsible" class="form-control">
                                    </div>
                                </div>
                    </div>
                    
                    <div class="tab-pane fade" id="dadosadicionais1" role="tabpanel" aria-labelledby="profile-tab">
                      
                        <!-- <h3 class="h-auto">Dados Adicionais 1</h3> -->  
                                                       
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <span>E-mail 1</span>
                                <input type="email" required name="client_email1" id="client_email1" class="form-control">                           
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                            <span>E-mail 2</span>
                            <input type="email" name="client_email2" id="client_email2" class="form-control">                            
                            </div> 
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <span>Site (www)</span> 
                                <input type="text" name="client_site" id="client_site" class="form-control">                            
                            </div> 
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-sm-4 mb-2 mb-sm-0">
                               <span>Tel1</span>
                               <input data-mask='+55 (00) 00000-0000' required type="text" name="client_phone1" id="client_phone1" class="form-control" onclick="format_phones()">
                            </div>
                            <div class="col-sm-4 mb-2 mb-sm-0">
                               <span>Tel2</span>
                               <input data-mask='+55 (00) 00000-0000'type="text" name="client_phone2" id="client_phone2" class="form-control" onclick="format_phones()">
                            </div>   
                            <div class="col-sm-4 mb-2 mb-sm-0">   
                                <span>Tel3</span>
                                <input data-mask='+55 (00) 00000-0000' type="text" name="client_phone3" id="client_phone3" class="form-control" onclick="format_phones()">
                            </div> 
                            </div>                 
                        
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <span>Cep</span>
                                    <input type="text" required name="cep" id="cep" class="form-control">
                                </div>
                                <div class="col-sm-8 mb-4 mb-sm-0">
                                    <span>Endereço</span>
                                    <input type="text" required name="client_address" id="client_address" class="form-control">
                                </div>
                                 <div class="col-sm-2 mb-2 mb-sm-0">
                                    <span>Número</span>
                                    <input type="text" required name="client_number" id="client_number" class="form-control">                  
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <span>Município</span>
                                    <input type="text"   name="client_county" id="client_county" class="form-control">                  
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <span>Cidade</span>
                                    <input type="text" name="client_city" id="client_city" class="form-control">                  
                                </div> 
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <span>Estado</span>
                                    <input type="text" required name="client_state" id="client_state" class="form-control">                  
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <span>Bairro</span>
                                    <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control">                  
                                </div> 
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <span>Complemento</span>
                                    <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control">                  
                                </div> 
                            </div>

                    </div>
                    
                    <div class="tab-pane fade" id="dadosadicionais2" role="tabpanel" aria-labelledby="contact-tab">
                          
                        <input type="radio" name="client_type" id="client_type" value="cl">
                            <label for="name">Clientes</label>
                            
                            <input type="radio" name="client_type" id="client_type" value="fo">
                            <label for="name"> Fornecedor</label>    
                                
                            <input type="radio" name="client_type" id="client_type" value="co">    
                            <label for="name"> Colaborador</label>    
                            
                            <input type="radio" name="client_type" id="client_type" value="tr">                            
                            <label for="name"> Transportadora</label>

                    </div>
                    <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo...</label>
                            <hr>
                            <div class="btn-warning btn-sm">Cliente ainda não possui documentos relacionados!</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fichas" role="tabpanel" aria-labelledby="contact-tab">         
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo...</label>
                            <hr>                            
                            <div class="btn-success btn-sm">
                             <a href="../docs/clients/19/FICHA_CADASTRAL_PARA_LOCATARIOS.pdf" target="_blank">FICHA CADASTRAL</a>
                            </div><br>
                            <div class="btn-danger btn-sm">
                             <a href="../docs/clients/19/FICHA_CADASTRAL_PARA_LOCATARIOS.pdf" target="_blank">FICHA CADASTRAL</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contratos" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo...</label>
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
                    <div class="p-2 bd-highlight"><button class="btn btn-success"  type="submit" name="btn_update_client" id="btn_update_client">CADASTRAR</button></div>
                  </div>
                </form>
                                      
                        </div>                           
                </div>
            </div>
            
        
EOT;
            return $screenFormClient;

        }


        public function screenListClient()
        {

        }


    }
