<?php
require_once "../../Controlador/controladorProductos.php";
require_once "../../Modelo/productos.php";
require_once "../../Modelo/conexion.php";
$_POST = json_decode(file_get_contents('php://input'), true);

class FetchProductos{
	public $refe; 
	public function TraeProductosIndividual(){
		$refe =$this->refe;
		$respuesta = ControladorProductos::ctrTreProdustcos($refe);
		echo json_encode($respuesta);
	}
} 

if (isset($_POST["referencia"])) {
	$resultado = new FetchProductos();
	$resultado-> refe = $_POST["referencia"];
	$resultado-> TraeProductosIndividual();
}
