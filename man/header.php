<?php

class Headers
{

    public function navBar($typeModules)
    {

        //<li> dinamica com os módulos do usuário.
        return <<< EOT
        <header>
        <img class="sys_logo" src="../image/logo.png" alt="logo">
        <nav>
            <ul class="sys_nav_links">
                <li>
                    $typeModules[0]
                </li>
            </ul>
        </nav>
            <div class="sys_useroption">
                <ul>
                    <li><a class="cta sys_iconnavbar" href="#"><i class="fas fa-user-circle"></i></a>
                        <ul class="sys_uluseroption">
                            <li><a>Olá X</a></li>
                            <li><a href="manager.php?exit=&%$%91">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>

EOT;
    }
}
