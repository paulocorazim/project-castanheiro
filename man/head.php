<?php

Class Heads {

    public function head($title){

    $head = <<< EOT
    <!DOCTYPE html>
    <html lang="UTF-8">
    <head>
        <script src="nunjucks.js"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Cairo:700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/e6868744bc.js" crossorigin="anonymous"></script>
        <title>$title</title>
    </head>
    <body>

EOT;

        return $head;

    }
}