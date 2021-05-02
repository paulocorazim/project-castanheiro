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

          <link rel="apple-touch-icon" sizes="57x57" href="../image/apple-icon-57x57.png">
          <link rel="apple-touch-icon" sizes="60x60" href="../image/apple-icon-60x60.png">
          <link rel="apple-touch-icon" sizes="72x72" href="../image/apple-icon-72x72.png">
          <link rel="apple-touch-icon" sizes="76x76" href="../image/apple-icon-76x76.png">
          <link rel="apple-touch-icon" sizes="114x114" href="../image/apple-icon-114x114.png">
          <link rel="apple-touch-icon" sizes="120x120" href="../image/apple-icon-120x120.png">
          <link rel="apple-touch-icon" sizes="144x144" href="../image/apple-icon-144x144.png">
          <link rel="apple-touch-icon" sizes="152x152" href="../image/apple-icon-152x152.png">
          <link rel="apple-touch-icon" sizes="180x180" href="../image/apple-icon-180x180.png">
          <link rel="icon" type="image/png" sizes="192x192"  href="../image/android-icon-192x192.png">
          <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
          <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
          <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
          <link rel="manifest" href="/manifest.json">
          <meta name="msapplication-TileColor" content="#5e452b">
          <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
          <meta name="theme-color" content="#5e452b">


          <!-- Theme included stylesheets -->
          <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
          <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

          <!-- Core build with no theme, formatting, non-essential modules -->
          <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">


          <title>$tile</title>
        
          <!-- Custom fonts for this template-->
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>       
          <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">     
          <!-- Custom styles for this template-->
          <link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css" />
          <link href="../css/sb-admin-2.css" rel="stylesheet">
          <link href="../datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
          <link href="../datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
          </head>
          <body id="page-top">
          <!-- @include('sweet::alert') -->
        
        
EOT;

        }
    }