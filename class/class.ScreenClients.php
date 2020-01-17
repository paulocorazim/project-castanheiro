<?php

Class ScreenClients{

public function screenFormClient()
{

    $screenFormClient = <<< EOT
    <script src="../js/main_clients.js" type="text/javascript" type="text/javascript"></script>
    <script src="../js/cep.js" type="text/javascript" type="text/javascript"></script>

    <div class="containerprincipal">
            <div class="margin_esq_padrao">
                <h2>Cadastro de Clientes</h2>
            </div>
            <div class="flex_main">
                <div class="flex_sub">
                    <form action="" method="post">
                    <h3 class="spaninput">Dados Gerais do Cliente.</h3>
                                                                                         
                        <hr>                                                        
                        
                        <div class="input-group">
                            <input type="text" name="client_name" id="client_name" class="form-control">
                            <label for="name"> Fantasia</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="client_corporate_name" id="client_corporate_name" class="form-control">
                            <label for="name"> Razão Social</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' class="form-control">
                            <label for="cpf">CPF / CNPJ</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="rg" id="rg" class="form-control">
                            <label for="cpf">RG</label>
                        </div>
                        <div class="input-group">
                            <input type="email" name="client_email1" id="client_email1" class="form-control">
                            <label for="email">E-mail 1</label>
                        </div>
                        <div class="input-group">
                            <input type="email" name="client_email2" id="client_email2" class="form-control">
                            <label for="email">E-mail 2</label>
                        </div>                   
                </div>
                
                    <div class="flex_sub">     
                        <h3 class="spaninput">Endereços</h3>  
                        <hr>    
                            <div class="input-group">
                               Cep (usar somente números)
                               <input type="text" name="cep" id="cep" class="form-control">
                            </div>
                            
                            <div class="input-group">
                               Endereço
                               <input type="text" name="client_address" id="client_address" class="form-control">
                            </div>  
                            
                            <div class="input-group">
                               Número
                               <input type="text" name="client_number" id="client_number" class="form-control">                  
                            </div>
                            
                            <div class="input-group">
                               Município
                               <input type="text" name="client_county" id="client_county" class="form-control">                  
                            </div>
                            
                            <div class="input-group">
                               Cidade
                               <input type="text" name="client_city" id="client_city" class="form-control">                  
                            </div> 
                            
                            <div class="input-group">
                               Estado
                               <input type="text" name="client_state" id="client_state" class="form-control">                  
                            </div>
                            
                            <div class="input-group">
                               Bairro
                               <input type="text" name="client_neighborhood" id="client_neighborhood" class="form-control">                  
                            </div> 
                                                       
                    </div>
            
                    <div class="flex_sub">
                    
                            <h3 class="spaninput">Dados Adicionais</h3>
                            <hr>
                            <div class="form-control"> 
                            <input type="radio" name="client_type" id="client_type" value="cl">
                                <label for="name"> Cliente</label>
                                
                                <input type="radio" name="client_type" id="client_type" value="fo">
                                <label for="name"> Fornecedor</label>    
                                    
                                <input type="radio" name="client_type" id="client_type" value="co">    
                                <label for="name"> Colaborador</label>    
                                
                                <input type="radio" name="client_type" id="client_type" value="tr">                            
                                <label for="name"> Transportadora</label>
                             </div>   
                             <br><br>
                             
                            <button type="submit" name="btn_update" id="btn_upadte">C A D A S T R A R</button>
                        </form>
                    </div>
            </div>
            
        <div class="margin_esq_padrao">
            <h2> Clientes já Cadastrados</h2>
        </div>

EOT;
    return $screenFormClient;

}


    public function screenListClient()
    {

    }


}
