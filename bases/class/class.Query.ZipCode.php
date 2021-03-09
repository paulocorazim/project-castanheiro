<?php

$cep = $_POST['cep'];

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://viacep.com.br/ws/$cep/json/",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
curl_close($curl);

$response = json_decode($response, true);

$data['sucesso'] = 1;
$data['client_address'] = $response['logradouro'];
$data['client_neighbordhood'] = $response['bairro'];
$data['client_city'] = $response['localidade'];
$data['client_state'] = $response['uf'];

echo json_encode($data);

//$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
//
//$dados['sucesso'] = (string)$reg->resultado;
//$dados['client_address'] = (string)$reg->tipo_logradouro . ' ' . $reg->logradouro;
//$dados['client_neighbordhood'] = (string)$reg->bairro;
//$dados['client_city'] = (string)$reg->cidade;
//$dados['client_state'] = (string)$reg->uf;
//
//echo json_encode($dados);
