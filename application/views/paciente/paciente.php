	    <div class="container-fluid principal">
			
			<div class="container-fluid">
				<div class="panel panel-info">
					<div class="panel-heading">
					 	<h3 class="panel-title"><i class="glyphicon glyphicon-star"></i>Información de Paciente</h3>
					</div>
					<div class="panel-block container">
						<br>
						<form class="alert alert-info" autocomplete="off">
							<div class="row">
								<div class="form-group col-sm-4">
									<label for="tipodocum_id_tipodocum">Tipo De Documento</label>
									<select class="form-control" placeholder="Tipo De Documento" name="tipodocum_id_tipodocum" id="tipodocum_id_tipodocum_head" required="required"></select>
								</div>
								<div class="form-group col-sm-4">
									<label for="documento">Documento</label>
									<input type="text" class="form-control" placeholder="Documento" name="documento" id="documento_head" required="required" maxlength="15">
								</div>
								<div class="form-group col-sm-4">
									<br>
									<button style="margin-top:5px;" type="button" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></button>
								</div>
								<hr>
							</div>
						</form>
						<div>
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
						    <li role="presentation">
						    	<a href="#home" id="tab_info_pat" aria-controls="home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Información del paciente</a>
						    </li>
						    <li role="presentation">
						    	<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-dashboard"></i> Gráfica 5*5</a>
						    </li>
						    <li role="presentation">
						    	<a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-dashboard"></i> Gráfica 10*10</a>
						    </li>
						  </ul>
						  <!-- Tab panes -->
						  <div class="tab-content">
						    <div role="tabpanel" class="tab-pane" id="home">
					    		<form autocomplete="off">
						    		<div class="row container">
											<div class="row">
												<div class="form-group col-sm-6">
													<label for="tipodocum_id_tipodocum">Tipo De Documento</label>
													<select class="form-control" placeholder="Tipo De Documento" name="tipodocum_id_tipodocum" id="tipodocum_id_tipodocum" required="required"></select>
												</div>
												<div class="form-group col-sm-6">
													<label for="documento">Documento</label>
													<input type="text" class="form-control" placeholder="Documento" name="documento" id="documento" required="required" maxlength="15">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-6">
													<label for="nombres">Nombres</label>
													<input type="text" class="form-control" placeholder="Nombres" name="nombres" id="nombres" required="required" maxlength="50">
												</div>
												
												<div class="form-group col-sm-6">
													<label for="apellidos">Apellidos</label>
													<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos" required="required" maxlength="50">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-6">
													<label for="fecha_nacimiento">fecha_nacimiento</label>
													<div class="form-group">
														<div class='input-group date'>
															<input type="date" class="form-control" placeholder="fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" required="required" max="2016-01-01">
									            <span class="input-group-addon">
									              <span id="edad"></span>
									            </span>
										        </div>
													</div>
												</div>
											<div class="form-group col-sm-6">
												<label for="genero">Género</label>
												<select class="form-control" name="genero" id="genero" required="required">
													<option value="">Seleccione Genero...</option>
													<option value="M">Masculino</option>
													<option value="F">Femenino</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-6">
												<label for="telefono">Telefono</label>
												<input type="number" class="form-control" placeholder="Telefono" name="telefono" id="telefono" required="required" min="0" max="9999999999">
											</div>
											<div class="form-group col-sm-6">
												<label for="celular">Celular</label>
												<input type="number" class="form-control" placeholder="Celular" name="celular" id="celular" required="required" min="0" max="9999999999">
											</div>
										</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label for="email">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" id="email" required="required" maxlength="100">
										</div>
										<div class="form-group col-sm-6">
											<label for="direccion">Dirección</label>
											<input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion" required="required" maxlength="100">
										</div>

									</div>
									<div class="row">
									  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Guardar información de paciente</button>
									</div>
								</div>
							</form>
						   
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
				</div>
			</div>
	  </div>			
	</body>

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/highcharts/code/highcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/highcharts/code/highcharts-more.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/highcharts/code/modules/exporting.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/index.js"></script> 
</html>