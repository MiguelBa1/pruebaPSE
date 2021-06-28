<?php 
class ModeloUsuarios{
	static function MdlMostrarUsuarios($columna, $valor){
		if (Conexion::conectar()) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE $columna = :valor");
			$stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch(PDO::FETCH_ASSOC);
		}
	}
}
