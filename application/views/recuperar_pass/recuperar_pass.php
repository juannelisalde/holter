
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Recuperar Contraseña</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<form autocomplete="off">
			<div class="container">
				<div class="card">
					<div class="card-header">Recuperar Contraseña</div>
					<div class="card-block">
						<div class='form-group'>
							<label for='email'>Correo</label>
							<input type='email' class='form-control' placeholder='Correo' name='email' id='email' required='required' disabled="disabled" maxlength="100">
						</div>

						<div class='form-group'>
							<label for='pass'>Contraseña</label>
							<input type='password' class='form-control' placeholder='Contraseña' name='pass' id='pass' required='required' maxlength="40">
						</div>
						<div class='form-group'>
							<label for='pass2'>Confirmar Contraseña</label>
							<input type='password' class='form-control' placeholder='Confirmar Contraseña' name='pass2' id='pass2' required='required' maxlength="40">
						</div>
						<div class='form-group'>
							<button type='submit' class='btn btn-primary'>Guardar</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
</html>