<?php

    class ScreenManager
    {
        public function pageWrapper($typeModules, $selected_module, $contentNow, $alert_type)
        {

            $ip = $_SERVER['REMOTE_ADDR'];
            $user = $_SESSION['name'];
            $type = $_SESSION['user_type'];
            $update = $_SESSION['dt_update'];
            $date = date('d-M-Y');

            return <<< EOT
            <!-- Page Wrapper -->
            <div id="wrapper">
            
              <!-- Sidebar -->
              <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="manager.php">
                  <div class="sidebar-brand-icon">
                  <img src="../image/logo.png" style="width: 40px">
                  </div>
                  <div class="sidebar-brand-text mx-3">appManager <sup>v1</sup></div>
                </a>
            
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
            
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                  <a class="nav-link" href="manager.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
            
                <!-- Divider -->
                <hr class="sidebar-divider">
            
                <!-- Heading -->
                <div class="sidebar-heading">
                  <span>Interface</span>
                </div>
            
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                  <a aria-controls="collapsecadastros" aria-expanded="true" class="nav-link collapsed" data-target="#collapsecadastros"
                     data-toggle="collapse"
                     href="#">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cadastros</span>
                  </a>
                  <div aria-labelledby="collapsecadastros" class="collapse" data-parent="#accordionSidebar" id="collapsecadastros">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Cadastros Gerais:</h6>
                      $typeModules[0]
                      </div>
                  </div>
                </li> 

                <li class="nav-item">
                  <a aria-controls="collapseboletos" aria-expanded="true" class="nav-link collapsed" data-target="#collapseboletos"
                     data-toggle="collapse"
                     href="#">
                     <i class="fas fa-barcode"></i>
                    <span>Boletos</span>
                  </a>
                  <div aria-labelledby="collapseboletos" class="collapse" data-parent="#accordionSidebar" id="collapseboletos">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Cadastros Gerais:</h6>
                      $typeModules[0]
                      </div>
                  </div>
                </li>

                <li class="nav-item">
                  <a aria-controls="collapseclientes" aria-expanded="true" class="nav-link collapsed" data-target="#collapseclientes"
                     data-toggle="collapse"
                     href="#">
                     <i class="fas fa-users"></i>
                    <span>Clientes</span>
                  </a>
                  <div aria-labelledby="collapseclientes" class="collapse" data-parent="#accordionSidebar" id="collapseclientes">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Cadastros Gerais:</h6>
                      $typeModules[0]
                      </div>
                  </div>
                </li>
                
                <li class="nav-item">
                  <a aria-controls="collapseusuarios" aria-expanded="true" class="nav-link collapsed" data-target="#collapseusuarios"
                     data-toggle="collapse"
                     href="#">
                     <i class="fas fa-user-friends"></i>
                    <span>Usuários</span>
                  </a>
                  <div aria-labelledby="collapseusuarios" class="collapse" data-parent="#accordionSidebar" id="collapseusuarios">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Cadastros Gerais:</h6>
                      $typeModules[0]
                      </div>
                  </div>
                </li>

                <li class="nav-item">
                  <a aria-controls="collapsevencimentos" aria-expanded="true" class="nav-link collapsed" data-target="#collapsevencimentos"
                     data-toggle="collapse"
                     href="#">
                     <i class="far fa-calendar"></i>
                    <span>Vencimentos</span>
                  </a>
                  <div aria-labelledby="collapsevencimentos" class="collapse" data-parent="#accordionSidebar" id="collapsevencimentos">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Cadastros Gerais:</h6>
                      $typeModules[0]
                      </div>
                  </div>
                </li>

                <li class="nav-item">
                  <a aria-controls="collapseboderos" aria-expanded="true" class="nav-link collapsed" data-target="#collapseboderos"
                     data-toggle="collapse"
                     href="#">
                     <i class="fas fa-file-invoice"></i>
                    <span>Borderô</span>
                  </a>
                  <div aria-labelledby="collapseboderos" class="collapse" data-parent="#accordionSidebar" id="collapseboderos">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Cadastros Gerais:</h6>
                      $typeModules[0]
                      </div>
                  </div>
                </li>

                <li class="nav-item">
                  <a aria-controls="collapsevistorias" aria-expanded="true" class="nav-link collapsed" data-target="#collapsevistorias"
                     data-toggle="collapse"
                     href="#">
                     <i class="far fa-paper-plane"></i>
                    <span>Vistorias</span>
                  </a>
                  <div aria-labelledby="collapsevistorias" class="collapse" data-parent="#accordionSidebar" id="collapsevistorias">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Cadastros Gerais:</h6>
                      $typeModules[0]
                      </div>
                  </div>
                </li>

 
                <!-- Nav Item - Utilities Collapse Menu 
                <li class="nav-item">
                  <a aria-controls="collapseUtilities" aria-expanded="true" class="nav-link collapsed"
                     data-target="#collapseUtilities"
                     data-toggle="collapse" href="#">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                  </a>
                  <div aria-labelledby="headingUtilities" class="collapse" data-parent="#accordionSidebar" id="collapseUtilities">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Custom Utilities:</h6>
                      <a class="collapse-item" href="utilities-color.html">Colors</a>
                      <a class="collapse-item" href="utilities-border.html">Borders</a>
                      <a class="collapse-item" href="utilities-animation.html">Animations</a>
                      <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                  </div>
                </li>-->
            
                <!-- Divider -->
               
               <!--  <hr class="sidebar-divider"> -->
            
                <!-- Heading 
                <div class="sidebar-heading">
                  Addons
                </div> -->
            
                <!-- Nav Item - Pages Collapse Menu 
                <li class="nav-item">
                  <a aria-controls="collapsePages" aria-expanded="true" class="nav-link collapsed" data-target="#collapsePages"
                     data-toggle="collapse"
                     href="#">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                  </a>
                  <div aria-labelledby="headingPages" class="collapse" data-parent="#accordionSidebar" id="collapsePages">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Login Screens:</h6>
                      <a class="collapse-item" href="index.php">Login</a>
                      <a class="collapse-item" href="register.html">Register</a>
                      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                      <div class="collapse-divider"></div>
                      <h6 class="collapse-header">Other Pages:</h6>
                      <a class="collapse-item" href="404.html">404 Page</a>
                      <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                  </div>
                </li>-->
            
                <!-- Nav Item - Charts
                <li class="nav-item">
                  <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
                </li> -->
            
                <!-- Nav Item - Tables 
                <li class="nav-item">
                  <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
                </li>-->
            
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
            
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            
              </ul>
              <!-- End of Sidebar -->
            
              <!-- Content Wrapper -->
              <div class="d-flex flex-column" id="content-wrapper">
            
                <!-- Main Content -->
                <div id="content">
            
                  <!-- Topbar -->
                  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            
                    <!-- Sidebar Toggle (Topbar) -->
                    <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                      <i class="fa fa-bars"></i>
                    </button>
            
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      <div class="input-group">
                        <input aria-describedby="basic-addon2" aria-label="Search" class="form-control bg-light border-0 small"
                               placeholder="Localize aqui ..." type="text">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
            
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
            
                      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                      <li class="nav-item dropdown no-arrow d-sm-none">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           id="searchDropdown" role="button">
                          <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div aria-labelledby="searchDropdown"
                             class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in">
                          <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                              <input aria-describedby="basic-addon2" aria-label="Search"
                                     class="form-control bg-light border-0 small"
                                     placeholder="Search for..." type="text">
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                  <i class="fas fa-search fa-sm"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </li>
            
                      <!-- Nav Item - Alerts -->
                      <li class="nav-item dropdown no-arrow mx-1">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           id="alertsDropdown" role="button">
                          <i class="fas fa-bell fa-fw"></i>
                          <!-- Counter - Alerts -->
                          <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div aria-labelledby="alertsDropdown"
                             class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                          <h6 class="dropdown-header">
                            Alerts Center
                          </h6>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                              <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                              </div>
                            </div>
                            <div>
                              <div class="small text-gray-500">December 12, 2019</div>
                              <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                              <div class="icon-circle bg-success">
                                <i class="fas fa-donate text-white"></i>
                              </div>
                            </div>
                            <div>
                              <div class="small text-gray-500">December 7, 2019</div>
                              $290.29 has been deposited into your account!
                            </div>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                              <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                              </div>
                            </div>
                            <div>
                              <div class="small text-gray-500">December 2, 2019</div>
                              Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                          </a>
                          <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                      </li>
            
                      <!-- Nav Item - Messages -->
                      <li class="nav-item dropdown no-arrow mx-1">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           id="messagesDropdown" role="button">
                          <i class="fas fa-envelope fa-fw"></i>
                          <!-- Counter - Messages -->
                          <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div aria-labelledby="messagesDropdown"
                             class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                          <h6 class="dropdown-header">
                            Message Center
                          </h6>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                              <img alt="" class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60">
                              <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                              <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                                having.
                              </div>
                              <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                              <img alt="" class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60">
                              <div class="status-indicator"></div>
                            </div>
                            <div>
                              <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent
                                to you?
                              </div>
                              <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                              <img alt="" class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60">
                              <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                              <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far,
                                keep up the good work!
                              </div>
                              <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                              <img alt="" class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60">
                              <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                              <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
                                say this to all dogs, even if they aren't good...
                              </div>
                              <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                          </a>
                          <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                      </li>
            
                      <div class="topbar-divider d-none d-sm-block"></div>
            
                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           id="userDropdown" role="button">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small">Olá, $user</span>
                          <i class="fas fa-sort-down"></i>
                          <!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
                        </a>
                        <!-- Dropdown - User Information -->
                        <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Configurações
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" data-target="#logoutModal" data-toggle="modal" href="#">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Sair
                          </a>
                        </div>
                      </li>
            
                    </ul>
            
                  </nav>
                  <!-- End of Topbar -->
            
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
            
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">$selected_module</h1>
                      <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="?user_report=23!#%LS"><i
                              class="fas fa-download fa-sm text-white-50"></i> Report $selected_module</a>
                    </div>
            
            
                    <!-- Content Now -->
                    $alert_type
                    $contentNow                              
                  </div>
                  <!-- /.container-fluid -->
            
                </div>
                <!-- End of Main Content -->
            
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                  <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Castanheiro | appManager v1 |  IP: $ip | $type | $date | $update</span>
                    </div>
                  </div>
                </footer>
                <!-- End of Footer -->
            
              </div>
              <!-- End of Content Wrapper -->
            
            </div>
            <!-- End of Page Wrapper -->
            
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fas fa-angle-up"></i>
            </a>
            
            <!-- Logout Modal-->
            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="logoutModal" role="dialog"
                 tabindex="-1">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja sair da Plataforma?</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Clique em sair para deixar o sistema de forma correta!.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">CANCELA</button>
                    <a class="btn btn-primary" href="manager.php?exit=#$@#$">SAIR</a>
                  </div>
                </div>
              </div>
            </div>
              
              
            
                
                

EOT;
        }
    }