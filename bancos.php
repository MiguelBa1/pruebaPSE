<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/log.txt');
error_reporting(E_ALL);

require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$url = $_ENV['URL'];
$login = $_ENV['TOKEN'];
$secretKey = $_ENV['SECRETKEY'];
$seed = date('c');
$tranKey = sha1($seed.$secretKey, false);
$auth = [
	"auth"=>[
		"login"=>$login,
		"tranKey"=>$tranKey,
		"seed"=>$seed
	]
];

try {
	$link = new PDO("mysql:host=localhost;dbname=pruebaPSE",
		"root",
		"");
	$link->exec("set names utf8");
	$client = new SoapClient($url);
	$result = $client->getBankList($auth);
	$items = $result->getBankListResult->item;
	$stmt = $link->query("SELECT codigo, nombre FROM bancos");
	$currents = $stmt->fetchAll(PDO::FETCH_ASSOC);
	print_r($currents[0]);
	foreach ($items as $clave => $valor) {
	 	$final = strval($items[$clave]->bankName);
		echo $final."<br>";
	}

	#foreach ($items as $clave => $valor) {
	#	$stmt = $link->prepare("INSERT INTO bancos (codigo, nombre) VALUES (:codigo, :nombre)");
	# 	$nombreBanco = strval($items[$clave]->bankName);
	# 	$codigoBanco = strval($items[$clave]->bankCode);
	#	$stmt->bindParam(":codigo", $codigoBanco, PDO::PARAM_INT);
	#	$stmt->bindParam(":nombre", $nombreBanco, PDO::PARAM_STR);
	#	$stmt->execute();
	#	echo "<br>";
	#}
} catch (Exception $e) {
	echo '<div class="alert alert-info" role="alert" style ="font-size:12pt;">
		<strong>Falló la conexión: !</strong> '.$e->getMessage().'
		</div>';
}
