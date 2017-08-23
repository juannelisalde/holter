<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Paciente</title>
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
					<div class="panel panel-info">
						<div class="panel-heading">
						  <h3 class="panel-title"><i class="glyphicon glyphicon-star"></i>Información de Paciente</h3>
						</div>
						<div class="panel-block container">
							<br>
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="tipodocum_id_tipodocum">Tipo De Documento</label>
									<input type="text" class="form-control" placeholder="Tipo De Documento" name="tipodocum_id_tipodocum" id="tipodocum_id_tipodocum" required="required">
								</div>
								<div class="form-group col-sm-6">
									<label for="documento">Documento</label>
									<input type="text" class="form-control" placeholder="Documento" name="documento" id="documento" required="required">
								</div>
							</div>
							<div class="content-hidden">


							</div>

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
										<label for="fecha_nacimiento">Fecha De Nacimiento</label>
										<input type="date" class="form-control" placeholder="Fecha De Nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" required="required">
									</div>

									<div class="form-group col-sm-6">
										<label for="fecha_nacimiento">Género</label>
										<select class="form-control" name="genero" id="genero" required="required">
											<option value="M">Masculino</option>
											<option value="F">Femenino</option>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="form-group col-sm-6">
										<label for="telefono">Telefono</label>
										<input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" required="required">
									</div>

									<div class="form-group col-sm-6">
										<label for="celular">Celular</label>
										<input type="text" class="form-control" placeholder="Celular" name="celular" id="celular" required="required">
									</div>
								</div>

								<div class="row">

									<div class="form-group col-sm-6">
										<label for="email">Email</label>
										<input type="email" class="form-control" placeholder="Email" name="email" id="email" required="required">
									</div>
									
									<div class="form-group col-sm-6">
										<label for="direccion">Dirección</label>
										<input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion" required="required">
									</div>

								</div>
							  <div class="row">
							  		<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Guardar información de paciente</button>
							  </div>
							  <br>

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