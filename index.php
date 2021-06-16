<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/log.txt');
error_reporting(E_ALL);

require('conexion.php');
require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$url = $_ENV['URL'];
$login = $_ENV['TOKEN'];
$secretKey = $_ENV['SECRETKEY'];
$seed = date('c');
$tranKey = sha1($seed.$secretKey, false);
$data = [
	"auth"=>[
		"login"=>$login,
		"tranKey"=>$tranKey,
		"seed"=>$seed
	]
];


try {
	$client = new SoapClient($url);
	$result = $client->getBankList($data);
	$items = $result->getBankListResult->item;
	echo "<select name='prueba'>";
	foreach ($items as $clave => $valor) {
	 	$final = strval($items[$clave]->bankName);
		#print_r($items[$clave]->bankName);
		echo "<option value='$final'>$final</options>";
	}
	echo "</select>";
} catch (Exception $e) {
	echo "Error $e";
}

$stmt = Conexion::conectar()->prepare("SELECT * FROM bancos");
$stmt->execute();
echo print_r($stmt->fetch());
?>
	
</body>
</html>
