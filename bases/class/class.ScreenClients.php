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
                    <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Novo Cliente</h1>
                </div>
                
                 <div class="form-group row">                       
                     <form action="../man/manager.clients.php" class="user" method="post" >
                     
                      <div class="form-group row">
                            
                        <select class="custom-select"  name="client_active" id="client_active">
                            <option value="1">Ativo</option>
                            <option value="0">Bloqueado</option>
                        </select>                                                                 
                        <hr>   
                            
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_name" id="client_name" class="form-control form-control-user" placeholder="Nome">
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_corporate_name" id="client_corporate_name" class="form-control form-control-user" placeholder="Razão Social">
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="form-control form-control-user" placeholder="CPF / CNPJ">
                        </div>
                                                    
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            Isento: <br>
                            <input class="custom-checkbox" type="checkbox" name="client_state_registration_free" id="client_state_registration_free" value="fr" OnClick="disable_client_state_registration_free()">
                            <input type="text" name="client_state_registration" id="client_state_registration"  class="form-control form-control-user" placeholder="Inscrição Estadual"  >
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_municipal_registration" id="client_municipal_registration"  class="form-control form-control-user" placeholder="Inscrição Municipal">
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_rg" id="client_rg" class="form-control form-control-user"  placeholder="RG">
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="client_responsible" id="client_responsible" class="form-control form-control-user" placeholder="Responsável">
                        </div>
                          
                
                        <h3 class="h-auto">Dados Adicionais 1</h3>  
                                                       
                         
                         <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" name="client_email1" id="client_email1" class="form-control form-control-user">                           
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            E-mail 2 <input type="email" name="client_email2" id="client_email2" class="form-control form-control-user">                            
                        </div> 

                        <div class="col-sm-6 mb-3 mb-sm-0">
                             site (www) <input type="text" name="client_site" id="client_site" class="form-control form-control-user">                            
                        </div> 

                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          Telefones
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Tel1<input data-mask='+55 (00) 00000-0000' type="text" name="client_phone1" id="client_phone1" class="form-control form-control-user">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Tel2<input type="text" name="client_phone2" id="client_phone2" class="form-control form-control-user">
                            </div>   
                            <div class="col-sm-6 mb-3 mb-sm-0">   
                               Tel3<input type="text" name="client_phone3" id="client_phone3" class="form-control form-control-user">
                            </div> 
                        </div>                 
                            
                            
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Cep (usar somente números)
                               <input type="text" name="cep" id="cep" class="form-control form-control-user">
                            </div>
                            
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Endereço
                               <input type="text" name="client_address" id="client_address" class="form-control form-control-user">
                            </div>  
                            
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Número
                               <input type="text" name="client_number" id="client_number" class="form-control form-control-user">                  
                            </div>
                            
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Município
                               <input type="text" name="client_county" id="client_county" class="form-control form-control-user">                  
                            </div>
                            
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Cidade
                               <input type="text" name="client_city" id="client_city" class="form-control form-control-user">                  
                            </div> 
                            
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Estado
                               <input type="text" name="client_state" id="client_state" class="form-control form-control-user">                  
                            </div>
                            
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               Bairro
                               <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control form-control-user">                  
                            </div> 
                                                       
                   
            
                    
                    
                            <h3 class="sys_spaninput">Dados Adicionais 2</h3>
                            
                              
                            <input type="radio" name="client_type" id="client_type" value="cl">
                                <label for="name"> Cliente</label>
                                
                                <input type="radio" name="client_type" id="client_type" value="fo">
                                <label for="name"> Fornecedor</label>    
                                    
                                <input type="radio" name="client_type" id="client_type" value="co">    
                                <label for="name"> Colaborador</label>    
                                
                                <input type="radio" name="client_type" id="client_type" value="tr">                            
                                <label for="name"> Transportadora</label>
                             <h3 class="sys_spaninput">Documentação</h3>
                             --
                             --
                             <h3 class="sys_spaninput">Contratos</h3>
                             --
                             --
                             <h3 class="sys_spaninput">Observações</h3>
                             <textarea name="client_obs" id="client_obs" cols="30" rows="10"></textarea>   
                                
                             </div>   
                             <br><br>
                             
                            <button class="btn_update_client" type="submit" name="btn_update_client" id="btn_update_client">C A D A S T R A R</button>
                        </form>
                    </div>
            </div>
            
       

EOT;
            return $screenFormClient;

        }


        public function screenListClient()
        {

        }


    }
