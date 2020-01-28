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
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">     
          <!-- Custom styles for this template-->
          <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css" />
          <link href="../css/sb-admin-2.css" rel="stylesheet">
          <link href="../datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
          <link href="../datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        </head>
        
        
EOT;

    }
}