<?php 
$requestId = $_SESSION["transactionID"];
$respuesta = ControladorRespuesta::ctrValidaEstadoPago($requestId);
?>
<div class="container">
  <h1>N° PETICIÓN : <?= $requestId ?></h1>
  <div class="<?= $respuesta['class'] ?>" >
      <div>
        <strong>Informacion de la operación: </strong> <?= $respuesta['result']?>
      </div>
      <div>
        <strong>Total: </strong> <?= $_SESSION['precio'].' '.$_SESSION['moneda']?>
      </div>
  </div>
  <button id="btnpagar" onclick="location.href='venta'">Volver</button>
</div>
