<?php
class ControladorRespuesta{
	static public function ctrValidaEstadoPago($transactionID){
		if ($transactionID != '') {
			try {
				$login = $_ENV['TOKEN'];
				$secretKey = $_ENV['SECRETKEY'];
				$seed = date('c');
				$tranKey = sha1($seed.$secretKey, false);
				$request = [					
					"auth"=>[
						"login"=>$login,
						"tranKey"=>$tranKey,
						"seed"=>$seed
					],
					"transactionID" => $transactionID
				];

				try {
					$client = new SoapClient($_ENV['URL']);
					$response = $client->getTransactionInformation($request);
					//var_dump($response);
					if ($response->getTransactionInformationResult->transactionState !== "OK") {
						return [
							'result'=> $response->getTransactionInformationResult->responseReasonText,
							'class'=> 'success',
						];
					} else {
						return [
							'result'=> $response->getTransactionInformationResult->responseReasonText,
							'class'=> 'failed',
						];
					}
					// var_dump($response);
				} catch (Exception $e) {
								var_dump($e->getMessage());
				}
			} catch (Exception $e) {
				var_dump($e->getMessage());
			}
			session_destroy(); 
		}
	} 
}
