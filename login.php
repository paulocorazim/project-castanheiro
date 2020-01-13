<?php

    /*ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);*/

    include('man/head.php');
    include('class/class.UserPermission.php');

    $validation_user = new UserPermission();
    $validation_user->validation_user($_POST['email'], md5($_POST['password']));

