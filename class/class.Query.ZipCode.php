<?php

$cep = $_POST['cep'];

$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

$dados['sucesso'] = (string)$reg->resultado;
$dados['client_address'] = (string)$reg->tipo_logradouro . ' ' . $reg->logradouro;
$dados['client_neighborhood'] = (string)$reg->bairro;
$dados['client_city'] = (string)$reg->cidade;
$dados['client_state'] = (string)$reg->uf;

echo json_encode($dados);
