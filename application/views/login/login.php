<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Ingreso de usuario</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/login.css">
	</head>

	<body>
		<div class="container">
	    <form class="form-signin">
	    	<div class="text-center">
	    		<img src="<?php echo base_url(); ?>/assets/img/logo.png"/>
	    	</div>
	        <h2 class="form-signin-heading text-center">Diagnóstico Holter</h2>
	      <div class="input-group">
			    <div class="input-group-addon">
			    	<i class="glyphicon glyphicon-envelope"></i>
			    </div>
	        <input type="hidden" class="form-control" placeholder="usuario" name="id_usuario" id="id_usuario">
	        <input type="email" class="form-control" placeholder="Correo" name="email" id="email" required autofocus>
		    </div>
	      <div class="input-group">
		      <div class="input-group-addon">
		      	<i class="glyphicon glyphicon-asterisk"></i>
		      </div>
	        <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" required>
		    </div>
		    <br>
	      <button class="btn btn-lg btn-info btn-block" type="submit"><i class="glyphicon glyphicon-log-in"></i> Ingresar</button>
		    <button class="btn btn-link change_pass" type="button">¿Olvidaste tu contraseña?</button>
	    </form>
	  </div>

		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
	</body>
</html>