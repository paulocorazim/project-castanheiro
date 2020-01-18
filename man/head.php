<?php

Class Heads
{

    public function head($title)
    {

        return <<< EOT
        <!DOCTYPE html>
        <html lang="UTF-8">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="https://fonts.googleapis.com/css?family=Cairo:700&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="../css/style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">           
            <script type="text/javascript" src="../js/jquery-1.2.6.pack.js"></script>
            <script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js"/></script>
            <script type="text/javascript" src="https://kit.fontawesome.com/e6868744bc.js" crossorigin="anonymous"/></script>
            <title>$title</title>
        </head>
        <body>

EOT;

    }
}