<?php

Class ScreenClients
{

    public function screenFormClient()
    {

        $screenFormClient = <<< EOT
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <div class="container-fluid"> 
        <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="p-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#novocliente" role="tab" aria-controls="home" aria-selected="true">Novo Cliente</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#dadosadicionais1" role="tab" aria-controls="profile" aria-selected="false">Dados Adicionais 1</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dadosadicionais2" role="tab" aria-controls="contact" aria-selected="false">Dados Adicionais 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#documentacao" role="tab" aria-controls="contact" aria-selected="false">Documentação</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contratos" role="tab" aria-controls="contact" aria-selected="false">Contratos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#observacoes" role="tab" aria-controls="contact" aria-selected="false">Observações</a>
                      </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="novocliente" role="tabpanel" aria-labelledby="home-tab">
                            
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
                                        <span>Nome</span>
                                        <input type="text" name="client_name" id="client_name" class="form-control">
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <span>Razão Social</span>
                                        <input type="text" name="client_corporate_name" id="client_corporate_name" class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <span>CPF / CNPJ</span>
                                        <input type="text" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="form-control">
                                    </div>
                                </div>
                                    
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">   
                                        <span>Inscrição Estadual</span>
                                        <input type="text" name="client_state_registration" id="client_state_registration"  class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 py-4">
                                        <span class="py-5">Isento:</span>
                                        <input class="custom-checkbox" type="checkbox" name="client_state_registration_free" id="client_state_registration_free" value="fr" OnClick="disable_client_state_registration_free()">
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <span>Inscrição Municipal</span>
                                        <input type="text" name="client_municipal_registration" id="client_municipal_registration"  class="form-control">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <span>RG</span>
                                        <input type="text" name="client_rg" id="client_rg" class="form-control">
                                    </div>
            
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <span>Responsável</span>
                                        <input type="text" name="client_responsible" id="client_responsible" class="form-control">
                                    </div>
                                </div>
                    </div>
                    
                    <div class="tab-pane fade" id="dadosadicionais1" role="tabpanel" aria-labelledby="profile-tab">
                      
                        <!-- <h3 class="h-auto">Dados Adicionais 1</h3> -->  
                                                       
                        <div class="form-group row">
                         <div class="col-sm-6 mb-3 mb-sm-0">
                            <span>E-mail 1</span>
                            <input type="email" name="client_email1" id="client_email1" class="form-control">                           
                        </div>
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                           <span>E-mail 2</span>
                           <input type="email" name="client_email2" id="client_email2" class="form-control">                            
                        </div> 
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <span>Site (www)</span> 
                                <input type="text" name="client_site" id="client_site" class="form-control">                            
                             </div> 
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-sm-4 mb-2 mb-sm-0">
                               <span>Tel1</span>
                               <input data-mask='+55 (00) 00000-0000' type="text" name="client_phone1" id="client_phone1" class="form-control" onclick="format_phones()">
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
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               <span>Cep (usar somente números)</span>
                               <input type="text" name="cep" id="cep" class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-8 mb-4 mb-sm-0">
                                <span>Endereço</span>
                                <input type="text" name="client_address" id="client_address" class="form-control">
                             </div>
                             <div class="col-sm-4 mb-2 mb-sm-0">
                                <span>Número</span>
                                <input type="text" name="client_number" id="client_number" class="form-control">                  
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
                                    <input type="text" name="client_state" id="client_state" class="form-control">                  
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <span>Bairro</span>
                                    <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="form-control">                  
                                </div> 
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <span>Compplemento</span>
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
                    <div class="tab-pane fade" id="documentacao" role="tabpanel" aria-labelledby="contact-tab">
         
                         --
                         --
                    </div>
                    <div class="tab-pane fade" id="contratos" role="tabpanel" aria-labelledby="contact-tab">
               
                         --
                         --
                    </div>
                    <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="contact-tab">
                        <textarea name="client_obs" id="client_obs" cols="30" rows="10"></textarea>   
                        <br>
                        <br>
                    </div>
                  </div>
                  <button class="btn btn-success"  type="submit" name="btn_update_client" id="btn_update_client">CADASTRAR</button>
                </form>
                                      
                        </div>                           
                </div>
            </div>
        
       
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            
            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
            
            <!-- Custom scripts for all pages-->
            <script src="../js/sb-admin-2.min.js"></script>
            
            <!-- Page level plugins -->
            <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
            
            <!-- Page level custom scripts -->
            <script src="../js/demo/datatables-demo.js"></script>
EOT;
        return $screenFormClient;

    }


    public function screenListClient()
    {

    }


}
