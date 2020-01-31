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
                  <div class="sidebar-brand-text mx-3">App <sup>v1</sup></div>
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
                $typeModules[0]
                                                      
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
                      <!-- Page Heading -->
                      <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        
                        <h5 class="mb-0 mt-2">$selected_module</h5>                      
                      </div>
              
            
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
                          <span class="badge badge-danger badge-counter">0</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div aria-labelledby="alertsDropdown"
                             class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                        </div>
                      </li>
            
                      <!-- Nav Item - Messages -->
                      <li class="nav-item dropdown no-arrow mx-1">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           id="messagesDropdown" role="button">
                          <i class="fas fa-envelope fa-fw"></i>
                          <!-- Counter - Messages -->
                          <span class="badge badge-danger badge-counter">0</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div aria-labelledby="messagesDropdown"
                             class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                        </div>
                      </li>
            
                      <div class="topbar-divider d-none d-sm-block"></div>
            
                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           id="userDropdown" role="button">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small">Olá, $user</span>
                          <!-- <i class="fas fa-sort-down"></i> -->
                          <img class="img-profile rounded-circle" src="https://image.flaticon.com/icons/png/512/17/17004.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                          <a class="dropdown-item" href="../man/manager.profiles.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
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
                      <span>Copyright &copy; Castanheiro | App v1 |  IP: $ip | $type | $date | $update</span>
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
                  <div class="modal-body">Clique em sair para deixar o sistema de forma correta!</div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button">CANCELAR</button>
                    <a class="btn btn-success" href="manager.php?exit=#$@#$">SAIR</a>
                  </div>
                </div>
              </div>
            </div>
              
              
            
                
                

EOT;
        }
    }