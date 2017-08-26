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
										<input type="number" class="form-control" placeholder="Frecuencia Máxima" name="frecardiacamax" id="frecardiacamax" required="required" min="0" max="220">
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
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
</html>