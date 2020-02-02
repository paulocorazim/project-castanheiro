<?php

    class ScreenProfiles
    {
        public function screenFormProfile($perfilUser)
        {

            return <<< EOT
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <div class="container-fluid">
                <div class="card o-hidden border-0 shadow-lg my-4">
                  <div class="p-4">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTWgUT_90oe5ck7cOgfuzAsQhnIfXL_dlgj8Yzc4uaHA3ugtrEn" style="
                                            min-width: 100%;
                                            min-height: 190px;
                                        " class=" img-thumbnail">
                                        </div>
                                            <div class="custom-file mt-3">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label small" for="customFile">Selecione uma nova foto..</label>
                                              </div>
                                        </div> 
                                        <div class="col-sm-9">
                                            
                                            <h4>$perfilUser[user_name]</h4>
                                            <hr>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>Nome</span>
                                                    <input type="hidden" name="user_id"  id="user_id" value="$perfilUser[user_id]">
                                                    <input type="text" required="" name="user_name" id="user_name"  value="$perfilUser[user_name]" class="form-control">
                                                </div>
                                                <div  class="col-sm-6">
                                                    <span>CPF</span>
                                                    <input name="cpfcnpj" id="cpfcnpj" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' type="text" value="$perfilUser[user_cpf]" class="form-control">
                                                </div>
                                            </div><hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>E-mail</span>
                                                    <input type="text" required="" name="user_email" id="user_email" value="$perfilUser[user_email]" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <span>Nova Senha</span>
                                                    <input type="password" required="" name="user_newpasswd" id="user_newpasswd" class="form-control" placeholder="******">
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                </div>
                                                <div class="col-sm-3">
                                                    <br>
                                                    <button id="btn_alter_user" type="button" class="btn btn-sm btn-success" value="%t4383" >Atualizar</button>
                                                    <button type="button" class="btn btn-sm btn-danger">Cancelar</a></button>
                                                </div>                                               
                                            </div>                                                                                        
                                        </div>  
                                    </div>                                                       
                                </div>
                            </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                </div>

EOT;
        }
    }