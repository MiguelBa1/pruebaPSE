<form id="pago" method="post" class="pago">
				<?php 
				$pagar = new ControladorVenta();
				$pagar->ctrVenta();
				?>
	<div class="wrapper">
		<div class="datos-persona">
		<h2> Datos personales</h2>
			<label for="nombre" class="">Nombre completo</label>
			<input type="text" class="" name="nombre" id="nombre" required>
			<label for="apellido">Apellidos completos</label>
			<input type="text" class="" name="apellido" id="apellido" required>
			<label for="email">Correo electronico</label>
			<input type="email" class="" name="email" id="email" required>
			<label for="telefono">Teléfono</label>
			<input type="text" class="" name="telefono" id="telefono" maxlength="10"
			minlength="7" required>
			<label for="tipodoc">Tipo documento</label>
			<select class="" name="tipodoc" required>
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
			<input type="text" class="" name="documento" id="documento" required>
			<label for="direccion">Dirección</label>
			<input type="text" class="" name="direccion" id="direccion" required>
		</div>
		<div class="datos-compra">
			<h2> Datos de la compra</h2>
				<label for="banco">Banco</label>
				<select name="banco" id="banco" required>
					<?php
					$bancos = ModeloBancos::MdlMostrarBancos();
					foreach ($bancos as $banco){
						echo "<option value=".$banco["codigo"].">".$banco["nombre"]."</option>";
					}
					?>
				</select>
				<label for="tipo-persona">Tipo de persona</label>
				<select class="" name="tipo-persona" required>
					<option value="0">Persona</option>
					<option value="1">Empresa</option>
				</select>
				<label for="produc">Referencia</label>
				<select class="" id="produc" name="produc" required>
					<option>Seleccione un producto</option>
					<?php 
					$productos = ControladorProductos::ctrTreProdustcos(null);
					foreach ($productos as $key => $value) {
					 echo '<option>'.$value["Referencia"].'</option>';
					}
					?>
				</select>
				<label for="descripcion">Descripcion</label>
				<input type="text" class="" name="descripcion" id="descripcion" required>
				<label for="cantidad">Cantidad</label>
				<input type="text" class="" name="cantidad" id="cantidad" value="1" required>
				<div class="wrap-vertical">
					<div class="vert">
						<label for="stotal">Subtotal</label>
						<input type="text" class="" name="stotal" id="stotal" readonly required>
					</div>
					<div class="vert">
						<label for="iva">Iva</label>
						<input type="text" class="" name="iva" id="iva" value="19" required>
					</div>
				</div>
				<div class="wrap-vertical">
					<div class="vert">
						<label for="total">Total</label>
						<input type="text" class="" name="total" id="total" readonly required>
					</div>
					<div class="vert">
						<label for="moneda">Moneda</label>
						<select class="" name="moneda" required>
							<option value="COP">COP</option>
							<option value="USD">USD</option>
							<option value="EUR">EUR</option>
						</select>
					</div>
				</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary" id="btnpagar" style="margin-top: 5px">Pagar en línea</button>
</form> 
<script src="Vistas/js/productos.js"></script>
