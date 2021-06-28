<?php
class ModeloBancos{
	static function MdlMostrarBancos(){
		if (Conexion::conectar()) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM bancos");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
	}
}
