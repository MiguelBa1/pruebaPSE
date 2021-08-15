<?php
class ControladorVenta{
	public $token;
	public $login;
	public $tranKey;
	public $sesion;
	static public function ctrVenta(){
		if (isset($_POST["documento"]) && $_POST["documento"] !='') {
			$login = $_ENV['TOKEN'];
			$secretKey = $_ENV['SECRETKEY'];
			$seed = date('c');
			$tranKey = sha1($seed.$secretKey, false);

			$reference =time();

			$request = [					
				"auth"=>[
					"login"=>$login,
					"tranKey"=>$tranKey,
					"seed"=>$seed
				],
				"transaction" => [
					"language" => "ES",
					"bankCode" => $_POST["banco"],
					"bankInterface" => $_POST["tipo-persona"],
					"reference" => $reference,
					"description" => "Testing Payment.",
					"currency" => $_POST["moneda"],
					"totalAmount" => $_POST["total"],
					"taxAmount" => 1.19,
					"devolutionBase" => 0,
					"tipAmount" => 0,
					"payer" => [
						"firstName" => $_POST["nombre"],
						"lastName" => $_POST["apellido"],
						"company" => 'Prueba',
						"emailAddress" => $_POST["email"],
						"address" => $_POST["direccion"],
						"city" => 'Medellin',
						"country" => 'Colombia',
						"documentType" => $_POST["tipodoc"],
						"document" => $_POST["documento"],
						"mobile" => $_POST["telefono"],
						"phone" => $_POST["telefono"]
					],
					"buyer" => [
						"firstName" => $_POST["nombre"],
						"lastName" => $_POST["apellido"],
						"company" => 'Prueba',
						"emailAddress" => $_POST["email"],
						"address" => $_POST["direccion"],
						"city" => 'Medellin',
						"country" => 'Colombia',
						"documentType" => $_POST["tipodoc"],
						"document" => $_POST["documento"],
						"mobile" => $_POST["telefono"],
						"phone" => $_POST["telefono"]
					],
					"shipping" => [
						"firstName" => $_POST["nombre"],
						"lastName" => $_POST["apellido"],
						"company" => 'Prueba',
						"emailAddress" => $_POST["email"],
						"address" => $_POST["direccion"],
						"city" => 'Medellin',
						"country" => 'Colombia',
						"documentType" => $_POST["tipodoc"],
						"document" => $_POST["documento"],
						"mobile" => $_POST["telefono"],
						"phone" => $_POST["telefono"]
					],
					"ipAddress" => "181.142.220.50",
					"userAgent" => "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36",
					"returnURL" => "http://localhost/probandoPHP/index.php?ruta=respuesta"
				]
			];

			try {

				$client = new SoapClient($_ENV['URL']);
				$response = $client->createTransaction($request);
				if ($response->createTransactionResult->returnCode == "SUCCESS") {
					$_SESSION["transactionID"] =$response->createTransactionResult->transactionID;
					$_SESSION["precio"] = $_POST["total"];
					$_SESSION["moneda"] = $_POST["moneda"];
					echo '<script>
						window.location = "'.$response->createTransactionResult->bankURL.'";
						</script>';
				} else {
					echo '<div >
								<strong>Error !</strong> '.$response->createTransactionResult->returnCode.'
								</div>'	;
				}
			} catch (Exception $e) {
							//var_dump($e->getMessage());
			}
		}
	}
}
?>
