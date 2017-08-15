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
          <a class="navbar-brand" href="#">
	        <img class="brand" src="<?php echo base_url(); ?>/assets/img/logo.png">
	      </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <i class="glyphicon glyphicon-option-vertical"></i>
          </button>
          <a class="navbar-brand" href="#">Diagnóstico Holter</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right hidden visible-xs">
          		<li><a href="paciente"><i class="glyphicon glyphicon-star"></i> Pacientes</a></li>
          		<li role="separator" class="divider"></li>
	            <li><a href="perfil.php"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>
	            <li><a href="config.php"><i class="glyphicon glyphicon-cog"></i> Configuración de sistema</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right hidden-xs">
          	<li><a href="paciente"><i class="glyphicon glyphicon-star"></i> Pacientes</a></li>
            <li class="dropdown ">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>  {Nombre de usuario} <i class="glyphicon glyphicon-option-vertical"></i></a>
	          <ul class="dropdown-menu">
	            <li><a href="perfil.php"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>
	            <li><a href="config.php"><i class="glyphicon glyphicon-cog"></i> Configuración de sistema</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
	          </ul>
	        </li>
          </ul>
        </div>
      </div>
    </nav>


	<div class="container principal">
		<div class="alert-content principal">
		</div>
		<div>
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Generar reporte</a></li>
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-dashboard"></i> Gráfica 5*5</a></li>
		    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-dashboard"></i> Gráfica 10*10</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="home">
	    		<div class="row">
					<div class="col-md-12">
						<form>
						  <div class="col-sm-8 col-md-7 col-lg-6">
						  		<div class="form-group ">
								    <div id='jqxWidget'>
								        <div id="jqxgrid"></div>
								    </div>
							    
							    </div>
						  </div>

						  <div class="form-group col-sm-4 col-md-3 col-lg-3">
						    <label for="excel">Cargue de archivo</label>
						    <input type="file" class="form-control-file" id="excel" accept="application/vnd.ms-excel">
						    <p class="help-block">Subir archivo Excel</p>
						  </div>
				
						  <div class="form-group col-sm-4 col-md-5 col-lg-6">
						  	<button id="csvJson" type="button" class="btn btn-info"><i class="glyphicon glyphicon-heart"></i> Generar diagnóstico</button>
						  </div>
						</form>
			  		</div>
				</div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="profile">
				<div class="row">
					<div class="col-md-12">
							<div class="chart-holter">	
								<div id="char-holter"></div>
							</div>
					</div>
				</div>
			</div>
		    <div role="tabpanel" class="tab-pane" id="messages">
		    	<div class="row">
					<div class="col-md-12">
							<div class="chart-holter">	
								<div id="char-holter-10"></div>
							</div>
					</div>
				</div>
		    </div>
		  </div>
		</div>


		
	</div>

	<div class="modal fade modal-result" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	       <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Diagnóstico de paciente</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
		        <div id="diagnostic-body" class="col-md-6"></div>
		        <div class="col-md-6">
		        	<form>
					  <h4><i class="glyphicon glyphicon-search"></i> Consultar paciente</h4>
		        	  <div class="form-group">
					    <select class="form-control" name="tipo_documento" id="tipo_documento" required>
						  <option>Escoge un Tipo de documento</option>
						  <option value="TI">Tarjeta de identidad</option>
						  <option value="CC">Cédula de ciudadania</option>
						  <option value="CE">Cédula de extranjeria</option>
						  <option value="PS">Pasaporte</option>
						</select>
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control" name="doc_ident" id="doc_ident" placeholder="Documento de identidad" required>
					  </div>
					  <div class="row">
						  <div class="form-group col-sm-6">
						    <input type="date" class="form-control" name="date_ini" id="date_ini" title="Fecha de toma de datos" placeholder="Fecha de toma de datos" required>
						  </div>
						  <div class="form-group col-sm-6">
						    <input type="time" class="form-control" name="time_ini" id="time_ini" min="00:00:00" step="3600" title="Hora inicial de toma" placeholder="Hora inicial de toma" required>
						  </div>
					  </div>
					  <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar diagnóstico</button>
		        	</form>
		        </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <div class="alert-container col-sm-8 col-md-9 msj-diag"></div>
	        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Cerrar diagnóstico</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 

    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxdata.export.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxgrid.edit.js"></script>  
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxgrid.columnsresize.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/jqwidgets/jqxgrid.export.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jqwidgets/scripts/demos.js"></script> 

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/highcharts/code/highcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/highcharts/code/highcharts-more.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/highcharts/code/modules/exporting.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general-1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/index.js"></script>
	<script type="text/javascript">
		var Conf = {max:180, min:40, step: 5, step2: 10, no: 5000, noInp: 21};
		//$(".principal.alert-content").genModal('success', "Esto es un mensaje de prueba");
		chartHolter(Conf);
	</script>
</body>
</html>