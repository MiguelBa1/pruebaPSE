<?php 
class ModeloProductos{
	static public function mdlMostrarProducto($valor){
		if ($valor != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE Referencia =:refrencia");
			$stmt->bindParam(":refrencia", $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch(PDO::FETCH_ASSOC);
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
			$stmt -> execute();
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
		}
	}
}

