<?php 
class Conexion{
	static public function conectar(){
		try {
			$link = new PDO("mysql:host=localhost;dbname=pruebaPSE",
				"root",
				"");
			$link->exec("set names utf8");
			return $link;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
