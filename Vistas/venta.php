<form id="pago" method="post" class="pago">
	<div class="wrapper">
		<div class="datos-persona">
		<h2> Datos personales</h2>
			<label for="nombre" class="">Nombre completo</label>
			<input type="text" class="" name="nombre" id="nombre">
			<label for="apellido">Apellidos completos</label>
			<input type="text" class="" name="apellido" id="apellido">
			<label for="email">Correo electronico</label>
			<input type="text" class="" name="email" id="email">
<!--
			<label for="compañia">Compañia</label>
			<input type="text" class="" name="compañia" id="compañia">
-->
			<label for="telefono">Teléfono</label>
			<input type="text" class="" name="telefono" id="telefono" maxlength="10"
			minlength="7"
			data-bv-stringlength-message="El telefono debe tener entre 7 o 10 caracteres">
			<label for="tipodoc">Tipo documento</label>
			<select class="" name="tipodoc">
				<option value="CC">CC</option>
				<option value="CI">CI</option>
				<option value="RG">RG</option>
				<option value="DNI">DNI</option>
				<option value="DUI">DUI</option>
				<option value="	DPI">DPI</option>
				<option value="TDI">TDI</option>
				<option value="CURP">CURP</option>
				<option value="CIP">CIP</option>
				<option value="CIC/CI">CIC/CI</option>
				<option value="CIE">CIE</option>
			</select>
			<label for="documento">Documento</label>
			<input type="text" class="" name="documento" id="documento">
			<label for="direccion">Dirección</label>
			<input type="text" class="" name="direccion" id="direccion">
		</div>
		<div class="datos-compra">
			<h2> Datos de la compra</h2>
				<label for="banco">Banco</label>
				<select name="banco" id="banco">
					<?php
					$bancos = ModeloBancos::MdlMostrarBancos();
					foreach ($bancos as $banco){
						echo "<option value=".$banco["codigo"].">".$banco["nombre"]."</option>";
					}
					?>
				</select>
				<label for="tipo-persona">Tipo de persona</label>
				<select class="" name="tipo-persona">
					<option value="0">Persona</option>
					<option value="1">Empresa</option>
				</select>
				<label for="produc">Referencia</label>
				<select class="" id="produc" name="produc">
					<option>Seleccione un producto</option>
				</select>
				<label for="descripcion">Descripcion</label>
				<input type="text" class="" name="descripcion" id="descripcion">
				<label for="cantidad">Cantidad</label>
				<input type="text" class="" name="cantidad" id="cantidad" value="1" onkeyup ="totalizar();">
				<label for="stotal">Subtotal</label>
				<input type="text" class="" name="stotal" id="stotal" disabled>
				<label for="iva">iva</label>
				<input type="text" class="" name="iva" id="iva" value="19">
				<label for="total">Total</label>
				<input type="text" class="" name="total" id="total" disabled>
				<label for="moneda">Moneda</label>
				<select class="" name="moneda">
					<option value="USD">USD</option>
					<option value="EUR">EUR</option>
					<option value="COP">COP</option>
				</select>
				<?php 
				#$pagar = new ControladorVenta();
				#$pagar->ctrRealizaPago();
				?>
		</div>
	</div>
	<button type="submit" class="btn btn-primary" id="btnpagar" style="margin-top: 5px">Pagar en línea</button>
</form> 
