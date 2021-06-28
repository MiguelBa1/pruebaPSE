<?php
class controladorUsuarios{
	static public function ctrIngresoUsuario(){
		if (isset($_POST['usuario'])){
			$columna = "Usuario";
			$valor = $_POST["usuario"];
			if (Conexion::conectar()) {
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($columna, $valor);
				if ($respuesta["Usuario"] == $_POST["usuario"] && password_verify($_POST["contraseña"], $respuesta['Contraseña']) ) {
					$_SESSION["iniciarSesion"] = "ok";
					header('Location: venta');
					#echo '<script>window.location = "venta";</script>';
				}else{
					echo '<div>
						<strong>Error!</strong> Usuario y/o contraseña incorrectos.
						</div>';
				}
			}
		}
	}
}
?>
