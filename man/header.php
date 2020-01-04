<?php

class Headers
{

    public function navBar($typeModules)
    {

        //<li> dinamica com os módulos do usuário.
        $navBar = <<< EOT
        <header>
            <img class="logo" src="../image/logo.png" alt="logo">
            <nav>
                <ul class="nav_links">
                    <li>
                       $typeModules[0]
                    </li>
                </ul>
            </nav>
            <a class="cta iconnavbar" href="#"><i class="fas fa-user-circle"></i></a>
        </header>   

EOT;

        return $navBar;
    }
}
