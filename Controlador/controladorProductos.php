<?php 
class ControladorProductos{
	static public function ctrTreProdustcos($valor){
      $traeproductos = ModeloProductos::mdlMostrarProducto($valor);
      return  $traeproductos; 
	}
}
