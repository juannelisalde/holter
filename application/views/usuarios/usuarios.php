<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Usuarios</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/tether/dist/css/tether.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
	</head>
	<body>
		<nav class="navbar navbar navbar-fixed-top">
		    <div class="container-fluid">
		      <div class="navbar-header">
		        <a class="navbar-brand" href="home">
		        <img class="brand" src="<?php echo base_url(); ?>/assets/img/logo.png">
		      </a>
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		          <i class="glyphicon glyphicon-option-vertical"></i>
		        </button>
		        <a class="navbar-brand" href="home">Diagnóstico Holter</a>
		      </div>
		      <div id="navbar" class="navbar-collapse collapse">
		        <ul class="nav navbar-nav navbar-right hidden visible-xs">
		      		<li>
		      			<a href="paciente"><i class="glyphicon glyphicon-star"></i> Pacientes</a>
		      		</li>
		      		<li role="separator" class="divider"></li>
		          <li><a href="usuarios">
		          	<i class="glyphicon glyphicon-user"></i> Perfil</a>
		          </li>
		          <li>
		          	<a href="parametros"><i class="glyphicon glyphicon-cog"></i> Configuración de sistema</a>
		          </li>
		          <li role="separator" class="divider"></li>
		          <li>
		          	<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
		          </li>
		        </ul>
		        <ul class="nav navbar-nav navbar-right hidden-xs">
		        	<li>
		        		<a href="paciente"><i class="glyphicon glyphicon-star"></i> Pacientes</a>
		        	</li>
		          <li class="dropdown ">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>  {Nombre de usuario} <i class="glyphicon glyphicon-option-vertical"></i></a>
		          	<ul class="dropdown-menu">
			            <li>
			            	<a href="usuarios"><i class="glyphicon glyphicon-user"></i> Perfil</a>
			            </li>
			            <li>
			            	<a href="parametros"><i class="glyphicon glyphicon-cog"></i> Configuración de sistema</a>
			            </li>
			            <li role="separator" class="divider"></li>
			            <li>
			            	<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
			            </li>
		          	</ul>
		        	</li>
		        </ul>
		      </div>
		    </div>
	    </nav>
		<div class="container-fluid principal">

			<form autocomplete="off">
				<div class="container-fluid">
					<div class="panel panel-warning">
						<div class="panel-heading"><i class="glyphicon glyphicon-user"></i> Usuarios</div>
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="nombres">Nombres</label>
									<input type="text" class="form-control" placeholder="Nombres" name="nombres" id="nombres" required="required">
								</div>
								<div class="form-group col-sm-6">
									<label for="apellidos">Apellidos</label>
									<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos" required="required">
								</div>
							</div>
							<div class="row">

								<div class="form-group col-sm-6">
									<label for="email">Correo</label>
									<input type="email" class="form-control" placeholder="Correo" name="email" id="email" required="required">
								</div>

								<div class="form-group col-sm-6">
									<label for="pass">Contraseña</label>
									<input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" required="required">
								</div>

							</div>

							<div class="row">
								<div class="form-group col-sm-4">
									<label for="pass">Tipo De Usuario</label>
									<select name="tipo_usuario" class="form-control" id="tipo_usuario" required="required">
										<option value="USER" selected="selected">USER</option>
										<option value="ADMIN">ADMIN</option>
									</select>
								</div>

								<div class="form-group col-sm-8">
									<br>
									<button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Guardar información de usuario</button>								
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/tether/dist/js/tether.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
</html>