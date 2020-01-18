<?php

Class ScreenClients{

public function screenFormClient()
{

    $screenFormClient = <<< EOT
    <script src="../js/main_clients.js" type="text/javascript" type="text/javascript"></script>
    <script src="../js/cep.js" type="text/javascript" type="text/javascript"></script>

    <div class="sys_containerprincipal">
            <div class="sys_margin_esq_padrao">
                <h2>Cadastro de Clientes</h2>
            </div>
            <div class="sys_flex_main">
                <div class="sys_flex_sub">
                    <form action="" method="post" class="sys_form">
                    <h3 class="sys_spaninput">Dados Gerais do Cliente.</h3>
                               
                        <select name="client_active" id="client_active">
                         <option value="1">Ativo</option>
                         <option value="0">Bloqueado</option>
                        </select>                                                                 
                        
                        <hr>                                                        
                        
                        <div class="sys_input-group">
                            <input type="text" name="client_name" id="client_name" class="sys_form-control">
                            <label for="name"> Fantasia</label>
                        </div>
                        <div class="sys_input-group">
                            <input type="text" name="client_corporate_name" id="client_corporate_name" class="sys_form-control">
                            <label for="name"> Razão Social</label>
                        </div>
                        
                        <div class="sys_input-group">
                            <input type="text" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="sys_form-control">
                            <label for="cpf">CPF / CNPJ</label>
                        </div>
                        
                        <div class="sys_input-group">
                            <input type="checkbox" name="client_state_registration_free" id="client_state_registration_free" value="fr" OnClick="disable_client_state_registration_free()">    
                            <label for="name">Isento</label>
                        </div>    
                            
                        <div class="sys_input-group">
                            <input type="text" name="client_state_registration" id="client_state_registration"  class="sys_form-control">
                            <label for="cpf">Inscrição Estadual</label>
                        </div>
                        
                        <div class="sys_input-group">
                            <input type="text" name="client_municipal_registration" id="client_municipal_registration"  class="sys_form-control">
                            <label for="cpf">Inscrição Municipal</label>
                        </div>
                        
                        <div class="sys_input-group">
                            <input type="text" name="client_rg" id="client_rg" class="sys_form-control">
                            <label for="client_rg">RG</label>
                        </div>
                        
                        <div class="sys_input-group">
                            <input type="text" name="client_responsible" id="client_responsible" class="sys_form-control">
                            <label for="client_responsible">Responsavel</label>
                        </div>
                          
                </div>
                
                    <div class="sys_flex_sub">     
                        <h3 class="sys_spaninput">Dados Adicionais 1</h3>  
                        <hr>                               
                         
                         <div class="sys_input-group">
                             E-mail 1 <input type="email" name="client_email1" id="client_email1" class="sys_form-control">                           
                        </div>
                        
                        <div class="sys_input-group">
                            E-mail 2 <input type="email" name="client_email2" id="client_email2" class="sys_form-control">                            
                        </div> 

                        <div class="sys_input-group">
                             site (www) <input type="text" name="client_site" id="client_site" class="sys_form-control">                            
                        </div> 

                        
                        <div class="sys_input-group">
                          Telefones
                            <div class="sys_input-group">
                               Tel1<input type="text" name="client_phone1" id="client_phone1" class="sys_form-control">
                            </div>
                            <div class="sys_input-group">
                               Tel2<input type="text" name="client_phone2" id="client_phone2" class="sys_form-control">
                            </div>   
                            <div class="sys_input-group">   
                               Tel3<input type="text" name="client_phone3" id="client_phone3" class="sys_form-control">
                            </div> 
                        </div>                 
                            
                            
                            <div class="sys_input-group">
                               Cep (usar somente números)
                               <input type="text" name="cep" id="cep" class="sys_form-control">
                            </div>
                            
                            <div class="sys_input-group">
                               Endereço
                               <input type="text" name="client_address" id="client_address" class="sys_form-control">
                            </div>  
                            
                            <div class="sys_input-group">
                               Número
                               <input type="text" name="client_number" id="client_number" class="sys_form-control">                  
                            </div>
                            
                            <div class="sys_input-group">
                               Município
                               <input type="text" name="client_county" id="client_county" class="sys_form-control">                  
                            </div>
                            
                            <div class="sys_input-group">
                               Cidade
                               <input type="text" name="client_city" id="client_city" class="sys_form-control">                  
                            </div> 
                            
                            <div class="sys_input-group">
                               Estado
                               <input type="text" name="client_state" id="client_state" class="sys_form-control">                  
                            </div>
                            
                            <div class="sys_input-group">
                               Bairro
                               <input type="text" name="client_neighbordhood" id="client_neighbordhood" class="sys_form-control">                  
                            </div> 
                                                       
                    </div>
            
                    <div class="sys_flex_sub">
                    
                            <h3 class="sys_spaninput">Dados Adicionais 2</h3>
                            <hr>
                            <div class="sys_form-control">  
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
                             
                            <button type="submit" name="btn_update_client" id="btn_update_client">C A D A S T R A R</button>
                        </form>
                    </div>
            </div>
            
        <div class="sys_margin_esq_padrao">
            <h2> Clientes já Cadastrados</h2>
        </div>

EOT;
    return $screenFormClient;

}


    public function screenListClient()
    {

    }


}
