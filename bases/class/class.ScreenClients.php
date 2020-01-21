<?php

    Class ScreenClients{

        public function screenFormClient()
        {

            $screenFormClient = <<< EOT
            <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
            <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css" />
            <script src="../js/main.js" type="text/javascript" type="text/javascript"></script>
            <script src="../js/cep.js" type="text/javascript" type="text/javascript"></script>
     
            <div class="container">
            
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="p-5">
            <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Novo Cliente</h1>
            </div>                
                     <form action="../man/manager.clients.php" class="user" method="post" >
                     
                      <div class="form-group">
                        <select class="custom-select col-sm-2"  name="client_active" id="client_active">
                            <option value="1">Ativo</option>
                            <option value="0">Bloqueado</option>
                        </select>  
                      </div>                                                               
                        <hr>   
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_name" id="client_name" class="form-control form-control-user" placeholder="Nome">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_corporate_name" id="client_corporate_name" class="form-control form-control-user" placeholder="Razão Social">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="form-control form-control-user" placeholder="CPF / CNPJ">
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">   
                            <input type="text" name="client_state_registration" id="client_state_registration"  class="form-control form-control-user" placeholder="Inscrição Estadual"  >
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <span>Isento:</span>
                            <input class="custom-checkbox" type="checkbox" name="client_state_registration_free" id="client_state_registration_free" value="fr" OnClick="disable_client_state_registration_free()">
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_municipal_registration" id="client_municipal_registration"  class="form-control form-control-user" placeholder="Inscrição Municipal">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_rg" id="client_rg" class="form-control form-control-user"  placeholder="RG">
                        </div>

                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_responsible" id="client_responsible" class="form-control form-control-user" placeholder="Responsável">
                        </div>
                    </div>
                          
                        <h1 class="h4 text-gray-900 mb-4">Dados Adicionais 1</h1>
                        <hr>
                        <!-- <h3 class="h-auto">Dados Adicionais 1</h3> -->  
                                                       
                        <div class="form-group row">
                         <div class="col-sm-6 mb-3 mb-sm-0">
                            <sapn>E-mail 1</sapn>
                            <input type="email" name="client_email1" id="client_email1" class="form-control form-control-user">                           
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                           <sapn>E-mail 2</sapn>
                           <input type="email" name="client_email2" id="client_email2" class="form-control form-control-user">                            
                        </div> 
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
<<<<<<< HEAD
                                <span>Site (www)</span> 
                                <input type="text" name="client_site" id="client_site" class="form-control form-control-user">                            
                             </div> 
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-sm-4 mb-2 mb-sm-0">
                               <sapn>Tel1</sapn>
                               <input type="text" name="client_phone1" id="client_phone1" class="form-control form-control-user" onclick="format_phones()">
                            </div>
                            <div class="col-sm-4 mb-2 mb-sm-0">
                               <sapn>Tel2</sapn>
                               <input type="text" name="client_phone2" id="client_phone2" class="form-control form-control-user" onclick="format_phones()">
                            </div>   
                            <div class="col-sm-4 mb-2 mb-sm-0">   
                                <span>Tel3</span>
                                <input type="text" name="client_phone3" id="client_phone3" class="form-control form-control-user" onclick="format_phones()">
=======
                               Tel1<input data-mask='+55 (00) 00000-0000' type="text" name="client_phone1" id="client_phone1" class="form-control form-control-user">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Tel2<input type="text" name="client_phone2" id="client_phone2" class="form-control form-control-user">
                            </div>   
                            <div class="col-sm-6 mb-3 mb-sm-0">   
                               Tel3<input type="text" name="client_phone3" id="client_phone3" class="form-control form-control-user">
>>>>>>> 0329eecbc6b44d3ddc1b89edc6b7d43e30330ffa
                            </div> 
                            </div>                 
                        
                            <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               <span>Cep (usar somente números)</span>
                               <input type="text" name="cep" id="cep" class="form-control form-control-user">
                            </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-8 mb-4 mb-sm-0">
                                <span>Endereço</span>
                                <input type="text" name="client_address" id="client_address" class="form-control form-control-user">
                             </div>
                             <div class="col-sm-4 mb-2 mb-sm-0">
                                <span>Número</span>
                                <input type="text" name="client_number" id="client_number" class="form-control form-control-user">                  
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <span>Município</span>
                                    <input type="text"   name="client_county" id="client_county" class="form-control form-control-user">                  
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <sapn>Cidade</sapn>
                                    <input type="text" name="client_city" id="client_city" class="form-control form-control-user">                  
                                </div> 
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <sapn>Estado</sapn>
                                    <input type="text" name="client_state" id="client_state" class="form-control form-control-user">                  
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <span>Bairro</span>
                                    <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control form-control-user">                  
                                </div> 
                            </div>
                            
                            
                            <h1 class="h4 text-gray-900 mb-4">Dados Adicionais 2</h1>
                            <hr>
                            <!-- <h3 class="h-auto">Dados Adicionais 1</h3> -->
                            
                              
                            <input type="radio" name="client_type" id="client_type" value="cl">
                                <label for="name">Clientes</label>
                                
                                <input type="radio" name="client_type" id="client_type" value="fo">
                                <label for="name"> Fornecedor</label>    
                                    
                                <input type="radio" name="client_type" id="client_type" value="co">    
                                <label for="name"> Colaborador</label>    
                                
                                <input type="radio" name="client_type" id="client_type" value="tr">                            
                                <label for="name"> Transportadora</label>
                             <h3 class=""><b>Documentação</b></h3>
                             <h1 class="h4 text-gray-900 mb-4">Documentação</h1>
                             <hr>
                             --
                             --
                             <h3 class=""><b>Contratos</b></h3>
                             <h1 class="h4 text-gray-900 mb-4">Contratos</h1>
                             <hr>
                             --
                             --
                             <h3 class=""><b>Observações</b></h3>
                             <h3 class="">Observações</h3>
                             <h1 class="h4 text-gray-900 mb-4">Observações</h1>
                             <hr>
                             <textarea name="client_obs" id="client_obs" cols="30" rows="10"></textarea>   
                             <br>
                             <br>
                             <button class=""  type="submit" name="btn_update_client" id="btn_update_client">C A D A S T R A R</button>
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
