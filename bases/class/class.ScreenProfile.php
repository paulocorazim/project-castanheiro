<?php

    class ScreenProfiles
    {
        public function ScreenProfile()
        {
            $screenFormProfile = <<< EOT


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
                                            <form>
                                            <h4>Paulo Corazim da Silva</h4>
                                            <hr>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>Nome</span>
                                                    <input type="text" required="" name="client_name" id="client_name" class="form-control">
                                                </div>
                                                <div  class="col-sm-6">
                                                    <span>CPF</span>
                                                    <input type="text" required="" name="client_name" id="client_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>E-mail</span>
                                                    <input type="text" required="" name="client_name" id="client_name" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <span>Nova Senha</span>
                                                    <input type="text" required="" name="client_name" id="client_name" class="form-control">
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                </div>
                                                <div class="col-sm-3">
                                                    <br>
                                                    <button name="submit" type="submit"type="button" class="btn btn-sm btn-success">Atualizar</button>
                                                    <button type="button" class="btn btn-sm btn-danger">Cancelar</button>
                                                </div>
                                               
                                            </div>
                                            
                                            </form>
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
            return $screenFormProfile;
        }
    }