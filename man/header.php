<?php

class Headers
{

    public function navBar()
    {

        $navBar = <<< EOT
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

EOT;

        return $navBar;
    }
}
