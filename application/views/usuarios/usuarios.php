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
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/general.js"></script> 
</html>