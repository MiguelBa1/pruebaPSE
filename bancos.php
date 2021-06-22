<?php 
// Para programar la tarea diariamente usamos 'cron' con el comando 
// 00 18 * * * /usr/bin/php /opt/lamp/htdocs/probandoPHP/bancos.php

require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Objeto atuh para conectar con placetopay
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

	// Conexion base de datos
	$link = new PDO("mysql:host=localhost;dbname=pruebaPSE",
		"root",
		"");
	$link->exec("set names utf8");

	// Conexion placetopay
	$client = new SoapClient($url);
	$result = $client->getBankList($auth);
	$items = $result->getBankListResult->item;

	foreach ($items as $clave => $valor) {
		try {
			// Si el elemento no esta en la base de datos
			$stmt = $link->prepare("INSERT INTO bancos (codigo, nombre) VALUES (:codigo, :nombre)");
			$nombreBanco = strval($valor->bankName);
			$codigoBanco = strval($valor->bankCode);
			$stmt->bindParam(":codigo", $codigoBanco, PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $nombreBanco, PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			// Si el elemento ya esta en la base de datos
			print_r($valor);
			echo $e->getMessage()."<br>";
		}
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
