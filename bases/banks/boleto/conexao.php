<?php
date_default_timezone_set("America/Belem");
#require "sem-erros.php";
ini_set('default_charset','iso-8859-1');

$conexao_host        	= 'iuri0091.hospedagemdesites.ws';                 // nome do host do servidor do banco de dados
$conexao_user        	= 'grupocas_app';                 // Usuario
$conexao_pass        	= '@14TW07sevi';         // Senha usuario
$conexao_dbname        	= 'grupocas_app';            // Banco de dados

$conn = new PDO('mysql:host=' . $conexao_host . ';dbname=' . $conexao_dbname . ';', $conexao_user, $conexao_pass );

ini_set('default_charset','iso-8859-1');
//require "sem-erros.php";
?>