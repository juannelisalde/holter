<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Paciente</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/tether/dist/css/tether.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<form autocomplete="off">
			<div class="container">
				<div class="card">
					<div class="card-header">Paciente</div>
					<div class="card-block">
						<div class="form-group">
							<label for="tipodocum_id_tipodocum">Tipo De Documento</label>
							<input type="text" class="form-control" placeholder="Tipo De Documento" name="tipodocum_id_tipodocum" id="tipodocum_id_tipodocum" required="required">
						</div>

						<div class="form-group">
							<label for="documento">Documento</label>
							<input type="text" class="form-control" placeholder="Documento" name="documento" id="documento" required="required">
						</div>
						
						<div class="form-group">
							<label for="nombres">Nombres</label>
							<input type="text" class="form-control" placeholder="Nombres" name="nombres" id="nombres" required="required">
						</div>
						
						<div class="form-group">
							<label for="apellidos">Apellidos</label>
							<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos" required="required">
						</div>

						<div class="form-group">
							<label for="fecha_nacimiento">Fecha De Nacimiento</label>
							<input type="date" class="form-control" placeholder="Fecha De Nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" required="required">
						</div>

						<div class="form-group">
							<label for="fecha_nacimiento">genero</label>
							<select class="form-control" name="genero" id="genero" required="required">
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select>
						</div>

						<div class="form-group">
							<label for="telefono">Telefono</label>
							<input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" required="required">
						</div>

						<div class="form-group">
							<label for="celular">Celular</label>
							<input type="text" class="form-control" placeholder="Celular" name="celular" id="celular" required="required">
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" placeholder="Email" name="email" id="email" required="required">
						</div>
						
						<div class="form-group">
							<label for="direccion">Dirección</label>
							<input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion" required="required">
						</div>

						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</div>
		</form>
	</body>

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/tether/dist/js/tether.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
</html>