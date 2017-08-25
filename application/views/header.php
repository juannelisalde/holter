<!DOCTYPE html>
<html lang="es">
<head>
	<title>Holter segundo Diagnostico</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/styles/jqx.base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/styles/jqx.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap-theme.min.css">
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
	          	<?=$htm?>
	          <li role="separator" class="divider"></li>
	          <li>
	          	<a href="login/sign_off"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
	          </li>
	        </ul>
	        <ul class="nav navbar-nav navbar-right hidden-xs">
	        	<li>
	        		<a href="paciente"><i class="glyphicon glyphicon-star"></i> Pacientes</a>
	        	</li>
	          <li class="dropdown ">
	          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>  <?= ucfirst(strtolower($this->session->userdata["nombres"])) . " " . ucfirst(strtolower($this->session->userdata["apellidos"])); ?> <i class="glyphicon glyphicon-option-vertical"></i></a>
	          	<ul class="dropdown-menu">
	          		<?=$html?>
		            <li role="separator" class="divider"></li>
		            <li>
		            	<a href="login/sign_off"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
		            </li>
	          	</ul>
	        	</li>
	        </ul>
	      </div>
	    </div>
    </nav>