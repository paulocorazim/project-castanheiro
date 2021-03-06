<?php

    class ScreenFormInspections
    {
        public function screenFormInspection($findClients)
        {
            return <<< EOT
            <div class="container-fluid">         
                
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="p-4">
                    <div class="text-right">
                        <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group mb-3">                
                                <select type="text" name="find_client" id="find_client" aria-describedby="basic-addon2" aria-label="Search" class="form-control-sm form-control bg-light border-0 small"  onchange="find_clitn()">	                         
                                <option value="">Localizar Cliente ... </option>
                                <option value="">... </option>
                                $findClients
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="button"><i class="fas fa-search fa-sm"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <span>Imóvel</span>
                                <input type="text" required name="" id="" class="form-control form-control-sm">  
                            </div> 
                            <div class="col-sm-4">
                                <span>Locador</span>
                                <input type="text" required name="" id="" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-4">
                                <span>Locatários</span>
                                <input type="text" required name="" id="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row px-4 py-3">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Área de Serviço</h4>
                                        <div id="toolbar"></div>
                                        <div id="editor"></div>

                                        <script>
                                            var toolbarOptions = [
                                                ['bold', 'italic',  'underline', 'strike']
                                            ];
                                            
                                            var quill = new Quill('#editor' , {
                                                    modules: {
                                                        toolbar: toolbarOptions
                                                    },
                                                    theme: 'snow'
                                            });
                                        </script>
                                    </div>
                                </div> 
                            </div>
            
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Varanda</h4>
                                        <ul>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row px-4 py-3">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Área de Serviço</h4>
                                        <ul>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Varanda</h4>
                                        <ul>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                            <li>p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row px-4 py-3">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="text-right">
                      <button type="submit" id="btn_update" name="btn_update" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
	                    
EOT;
        }
    }