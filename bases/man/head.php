<?php

Class shHead
{
    public function sh_head($tile)
    {

        return <<< EOT
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
        
          <meta charset="utf-8">
          <meta content="IE=edge" http-equiv="X-UA-Compatible">
          <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
          <meta content="" name="description">
          <meta content="" name="author">
        
          <title>$tile</title>
        
          <!-- Custom fonts for this template-->
          <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">
        
          <!-- Custom styles for this template-->
          <link href="../css/sb-admin-2.min.css" rel="stylesheet">
          <script src="../js/main_clients.js" type="text/javascript" type="text/javascript"></script>
          <script src="../js/cep.js" type="text/javascript" type="text/javascript"></script>

        
        </head>
        
        
EOT;

    }
}