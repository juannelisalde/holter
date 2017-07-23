<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Parametros</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/tether/dist/css/tether.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<form autocomplete="off">
			<div class="container">
				<div class="card">
					<div class="card-header">Parametros</div>
					<div class="card-block">
						<div class="form-group">
							<label for="email">Correo</label>
							<input type="email" class="form-control" placeholder="Correo" name="email" id="email" required="required">
						</div>

						<div class="form-group">
							<label for="pass">Contraseña</label>
							<input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" required="required">
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>

						<div class="form-group">
							<a href="" class="modal-forget">Olvido Contraseña</a>
						</div>

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