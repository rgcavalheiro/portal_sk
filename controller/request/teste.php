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


		function get_produtos(){

			$key = login();

			$key = $key['jsessionid']['$'];	

			// var_dump($key);

			setcookie("JSESSIONID", $key, time()+3600); 






			$pega_pedidos = '{
				"serviceName": "CRUDServiceProvider.loadRecords",
				"requestBody": {
					"dataSet": {
						"rootEntity": "Produto",
						"includePresentationFields": "N",
						"offsetPage": "0",					
						"entity": {
							"fieldset": {
								"list": "CODPROD,DESCRPROD,LOCAL,CODVOL"
							}
						}
					}
				}
			}';

			$url = "http://prioridade-producao.tarx.tech/mge/service.sbr?serviceName=CRUDServiceProvider.loadRecords&outputType=json&mgeSession=".$key;

			echo "<pre>";

			$result = api_request($url,$pega_pedidos,'JSESSIONID='.$key);

			var_dump($result);

			//$result = mb_convert_encoding($result, 'UTF-8', 'auto');

			ini_set('mbstring.substitute_character', "none");
			$result= mb_convert_encoding($result, 'UTF-8', 'ISO-8859-1');


			// $result = utf8_encode($result);
			 // $result = mb_convert_encoding($result,"ISO-8859-1","auto");
			 //$jsonData = json_decode(json_encode($result), true);

			var_dump($result);

			$jsonData = json_decode($result,true);

			if (is_null($jsonData))
			{
				echo 'Error decoding JSON.<br>';
				echo 'Error number: ' . json_last_error() . '<br>';
				echo 'Error message: ' . json_last_error_msg();
			}


			

			return $jsonData['responseBody'];
			


			


		}


		 $json = get_produtos();		


		var_dump($json);
		$produtos = $json['entities']['entity'];



		// foreach ($produtos as $key => $value) {
		// 	$cod_prod = $value['f3']['$'];
		// 	var_dump($cod_prod);
		// }

		//var_dump($produtos);


		// $novo_produto = array();
		// foreach ($produtos as $key => $value) {
			

		// 	if($value['f0']['$'] != 0){

		// 		$novo_produto['codprod'] = (int)$value['f0']['$'];			
		// 		$novo_produto['descprod'] = $value['f1']['$'];
		// 		$novo_produto['local'] = (int)$value['f2']['$'];			
		// 		$novo_produto['codvol'] = $value['f3']['$'];

		// 		var_dump($novo_produto);
		// 		 save('produtos',$novo_produto);				
		// 		$novo_produto = array();

		// 	}
			

		// }

		




		




