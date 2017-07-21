<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Paciente</title>
	</head>
	<body>
		<form>
			tipodocum_id_tipodocum: <input type="text" name="tipodocum_id_tipodocum" id="tipodocum_id_tipodocum" required="required"> <br>
			documento: <input type="text" name="documento" id="documento" required="required"> <br>
			nombres: <input type="text" name="nombres" id="nombres" required="required"> <br>
			apellidos: <input type="text" name="apellidos" id="apellidos" required="required"> <br>
			fecha_nacimiento: <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required="required"> <br>
			genero: 
			<select name="genero" id="genero" required="required">
				<option value="M">Masculino</option>
				<option value="F">Femenino</option>
			</select>
			<br>
			telefono: <input type="text" name="telefono" id="telefono" required="required"> <br>
			celular: <input type="text" name="celular" id="celular" required="required"> <br>
			email: <input type="text" name="email" id="email" required="required"> <br>
			direccion: <input type="text" name="direccion" id="direccion" required="required"> <br>

			<input type="submit" value="Guardar">
		</form>
	</body>

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
</html>