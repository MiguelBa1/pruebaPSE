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
			echo '<div class="alert alert-info" role="alert" style ="font-size:12pt;">
				<strong>Falló la conexión: !</strong> '.$e->getMessage().'
				</div>';
		}
	}
}
