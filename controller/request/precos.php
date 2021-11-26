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
				"$": "TESTEAPI"
				},
				"INTERNO":{
					"$":123456
					},
					"KEEPCONNECTED": {
						"$": "S"
					}
				}
			}';
			$url = "http://192.168.56.210:8180/mge/service.sbr?serviceName=MobileLoginSP.login&outputType=json";


			$result = api_request($url,$dados);

			
			$response = json_decode($result) -> responseBody;


			$array = json_decode(json_encode($response), true);

			return $array;


		}


		function get_preco($id){

			$key = login();

			$key = $key['jsessionid']['$'];	

			 // var_dump($key);

			setcookie("JSESSIONID", $key, time()+3600); 




			
			// $pega_precos = '{
			// 	"serviceName": "CRUDServiceProvider.loadRecords",
			// 	"requestBody": {
			// 		"dataSet": {
			// 			"rootEntity": "Parceiro",
			// 			"includePresentationFields": "N",
			// 			"offsetPage": "0",
			// 			"criteria": {
			// 				"expression": {
			// 					"$": "FORNECEDOR = \'S\'"
			// 				}
			// 				},
			// 				"entity": {
			// 					"fieldset": {
			// 						"list": "CODPARC,NOMEPARC,FORNECEDOR,CLIENTE,CODCID,CLIENTE,CLASSIFICMS"
			// 					}
			// 				}
			// 			}
			// 		}
			// 	}';

				$pega_precos = '{
					"serviceName": "ConsultaProdutosSP.getDetalhesPrecos",
					"requestBody": {
						"criterio": {
							"CODPROD": "'.$id.'",
							"RESOURCEID": "br.com.sankhya.com.cons.consultaProdutos"
						}
					}
				}';




				$url = "http://192.168.56.210:8180/mgecom/service.sbr?serviceName=ConsultaProdutosSP.getDetalhesPrecos&outputType=json&mgeSession=".$key;

				echo "<pre>";

				$result = api_request($url,$pega_precos,'JSESSIONID='.$key);

			// var_dump($result);

				ini_set('mbstring.substitute_character', "none");
				$result= mb_convert_encoding($result, 'UTF-8', 'ISO-8859-1');

			// var_dump($result);
			





				$jsonData = json_decode($result,true);

				if (is_null($jsonData))
				{
					echo 'Error decoding JSON.<br>';
					echo 'Error number: ' . json_last_error() . '<br>';
					echo 'Error message: ' . json_last_error_msg();
				}


				$dado = $jsonData['responseBody']['produto']['precos']['preco'];

				//var_dump($preco);

				$preco = array();

				$preco['codprod'] = $id;
				$preco['valor'] = $dado['VALOR']["$"];
				




				return $preco;






			}


			$produtos = find('produtos');
			$precos = array();

			foreach ($produtos as $key => $value) {
				
				$id = $value['codprod'];
				$preco = get_preco($id);
				array_push($precos,$preco);
				

			}



			foreach ($precos as $key => $value) {
				
				save('precos',$value);

			}
			// var_dump($precos);


