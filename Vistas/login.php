<head>
	<link rel="stylesheet" href="styles/login.css">
</head>
<form method="post">
		<label for="usuario">Usuario</label>
		<input type="text" id="usuario" name="usuario" required>
		<label for="contraseña">Contraseña</label>
		<input type="password" id="contraseña" name="contraseña" required>
		<input type="submit" value="Entrar" class="submit">
<?php
	$cont = new controladorUsuarios;
	$cont->ctrIngresoUsuario();
?>
</form>
