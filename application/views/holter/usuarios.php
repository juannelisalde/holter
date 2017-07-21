<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Usuarios</title>
	</head>
	<body>
		<form>
			nombres: <input type="text" name="nombres" id="nombres" required="required"> <br>
			apellidos: <input type="text" name="apellidos" id="apellidos" required="required"> <br>
			email: <input type="text" name="email" id="email" required="required"> <br>
			pass: <input type="text" name="pass" id="pass" required="required"> <br>
			tipo_usuario: 
			<select name="tipo_usuario" id="tipo_usuario" required="required">
				<option value="USER">USER</option>
				<option value="ADMIN">ADMIN</option>
			</select> 
			<br>

			<input type="submit" value="Guardar">
		</form>
	</body>

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
</html>