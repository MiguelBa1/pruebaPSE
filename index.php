<?php

//ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/log.txt');
//error_reporting(E_ALL);

require('Controlador/controladorPlantilla.php');
require('Controlador/controladorUsuarios.php');
require('Controlador/controladorProductos.php');
require('Controlador/controladorVenta.php');
require('Controlador/controladorRespuesta.php');

require('Modelo/conexion.php');
require('Modelo/usuarios.php');
require('Modelo/bancos.php');
require('Modelo/productos.php');

require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$platilla = new ControladorPlantilla();
$platilla ->crtPlantilla();
?>
