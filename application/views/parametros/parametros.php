<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Parametros</title>
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
					<div class="panel panel-success">
						<div class="panel-heading"><i class="glyphicon glyphicon-cog"></i> Parámetros</div>
						<div class="panel-body">
							<div class="row">
								<div class="card-block">
									<div class="form-group col-sm-3">
										<label for="frecardiacamin">Frecuencia Mínima</label>
										<input type="number" class="form-control" placeholder="Frecuencia Mínima" name="frecardiacamin" id="frecardiacamin" required="required" min="0" max="40">
									</div>

									<div class="form-group col-sm-3">
										<label for="frecardiacamax">Frecuencia Máxima</label>
										<input type="number" class="form-control" placeholder="Frecuencia Máxima" name="frecardiacamax" id="frecardiacamax" required="required" min="0" max="180">
									</div>

									<div class="form-group col-sm-3">
										<label for="cantidadmediciones">Cantidad de Mediciones</label>
										<input type="number" class="form-control" placeholder="Cantidad de Mediciones" name="cantidadmediciones" id="cantidadmediciones" required="required" min="0" max="24"> 
									</div>
									<div class="form-group col-sm-3">
										<br>
										<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Guardar información de parámetros</button>						
									</div>
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