<?php
header("Content-type: text/html; charset=UTF-8");
error_reporting(E_ALL);

require_once('../database.php');



function api_request($url,$dados,$cookie = ''){


	$headers = [
		'Content-Type: application/json',
		'Charset: utf-8',
		'Content-lenght:'.strlen($dados),
		'User-Agent: 1',
		'Cookie: '.$cookie
	];

	$context = stream_context_create([
		'http'    => [
			'method'  => 'POST',
			'header'  => $headers,
			'content' => $dados
		],

	]);

	return file_get_contents($url,false,$context);


}



function login(){


	$dados = '{
		"serviceName": "MobileLoginSP.login",
		"requestBody": {
			"NOMUSU": {
				"$": "PORTAL_SK"
				},
				"INTERNO":{
					"$":123456
					},
					"KEEPCONNECTED": {
						"$": "S"
					}
				}
			}';
			$url = "http://prioridade-producao.tarx.tech/mge/service.sbr?serviceName=MobileLoginSP.login&outputType=json";


			$result = api_request($url,$dados);

			
			$response = json_decode($result) -> responseBody;


			$array = json_decode(json_encode($response), true);

			return $array;


		}


		function get_parceiros(){

			$key = login();

			$key = $key['jsessionid']['$'];	

			// var_dump($key);

			setcookie("JSESSIONID", $key, time()+3600); 




			
			$pega_parceiros = '{
				"serviceName": "CRUDServiceProvider.loadRecords",
				"requestBody": {
					"dataSet": {
						"rootEntity": "Parceiro",
						"includePresentationFields": "N",
						"offsetPage": "0",
						"criteria": {
							"expression": {
								"$": "FORNECEDOR = \'S\'"
							}
							},
							"entity": {
								"fieldset": {
									"list": "CODPARC,NOMEPARC,FORNECEDOR,CLIENTE,CODCID,CLIENTE,CLASSIFICMS"
								}
							}
						}
					}
				}';




			$url = "http://prioridade-producao.tarx.tech/mge/service.sbr?serviceName=CRUDServiceProvider.loadRecords&outputType=json&mgeSession=".$key;

			echo "<pre>";

			$result = api_request($url,$pega_parceiros,'JSESSIONID='.$key);

			//var_dump($result);

			ini_set('mbstring.substitute_character', "none");
			$result= mb_convert_encoding($result, 'UTF-8', 'ISO-8859-1');

			//var_dump($result);






		 	$jsonData = json_decode($result,true);

			if (is_null($jsonData))
			{
				echo 'Error decoding JSON.<br>';
				echo 'Error number: ' . json_last_error() . '<br>';
				echo 'Error message: ' . json_last_error_msg();
			}


			

			return $jsonData['responseBody'];
			


			


		 }


		 $json = get_parceiros();

		 $entidades = $json['entities'];

		
		$campos = $entidades['metadata']['fields']['field'];

		
		$aux = array();
		foreach ($campos as $key => $campo) {
				array_push($aux, $campo['name']);
			}
		

		$valores = $entidades['entity'];

		
		$dados = array();

		foreach ($valores as $key => $value) {

			$novo = array();
			
			foreach ($value as $key2 => $dado) {
				
				
				$novo[$aux[str_replace('f', '', $key2)]] = $dado['$']; 


			}
			array_push($dados, $novo);

		}

		var_dump($dados);

		foreach ($dados as $key => $value) {
			save('parceiros',$value);
		}




