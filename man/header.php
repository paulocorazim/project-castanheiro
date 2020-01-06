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
        <div class="useroption">
            <ul>
                <li><a class="cta iconnavbar" href="#"><i class="fas fa-user-circle"></i></a>
                    <ul class="uluseroption">
                        <li><a>Olá, {Usuario}</a></li>
                        <li><a href="../">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
</body>

EOT;

        return $navBar;
    }
}
