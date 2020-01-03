<?php

class Headers
{

    public function navBar($id_user)
    {

        //<li> dinamica com os módulos do usuário.
        require('../class/class.UserLinkModules.php');
        $LinkModule =new LinkModule();
        $li = $LinkModule->LinkModules($id_user);
        $navBar = <<< EOT
<<<<<<< HEAD
    <header>
        <img class="logo" src="../image/logo.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="manager.php">Dashboard</a></li>
                <li><a href="manager.usuarios.php">Usuarios</a></li>
                <li><a href="#">Produtos</a></li>
                <li><a href="#">Produtos</a
                li>
            </ul>
        </nav>
        <a class="cta iconnavbar" href="../index.php"><i class="fas fa-user-circle"></i></a>
    </header>   
=======
        <header>
            <img class="logo" src="../image/logo.png" alt="logo">
            <nav>
                <ul class="nav_links">
                    <li>
                       $li 
                    </li>
                </ul>
            </nav>
            <a class="cta iconnavbar" href="#"><i class="fas fa-user-circle"></i></a>
        </header>   
>>>>>>> d45e8d59453ee6eac9bd87b813060855e28c362f

EOT;

        return $navBar;
    }
}
