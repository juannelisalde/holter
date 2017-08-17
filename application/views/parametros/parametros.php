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
							<label for="frecardiacamin">Frecuencia Minima</label>
							<input type="number" class="form-control" placeholder="Frecuencia Minima" name="frecardiacamin" id="frecardiacamin" required="required" min="0" max="40">
						</div>

						<div class="form-group">
							<label for="frecardiacamax">Frecuencia Maxima</label>
							<input type="number" class="form-control" placeholder="Frecuencia Maxima" name="frecardiacamax" id="frecardiacamax" required="required" min="0" max="180">
						</div>

						<div class="form-group">
							<label for="cantidadmediciones">Mediciones</label>
							<input type="number" class="form-control" placeholder="Mediciones" name="cantidadmediciones" id="cantidadmediciones" required="required" min="0" max="24"> 
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