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

EOT;

        return $navBar;
    }
}
