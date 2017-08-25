<script type="text/javascript">
	$(document).ready(function(){
		$.remove_enter();
		$.submit_click("login/login", "home");

		$("#email").change(function(){
			email();
		});

		$(".change_pass").click(send_email);

		$(".modal-forget").click(function(e){
			e.stopPropagation();
        	e.preventDefault();
        	send_email();
			
			html = "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
			html += "	<div class='modal-dialog' role='document'>";
			html += " 		<div class='modal-content'>";
			html += "			<div class='modal-header'>";
			html += "				<h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>";
			html += "				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
			html += "					<span aria-hidden='true'>&times;</span>";
			html += "				</button>";
			html += "			</div>";
			html += "			<div class='modal-body'>";
			html += "				<div class='form-group'>";
			html += "					<label for='pass1'>Contraseña</label>";
			html += "					<input type='password' class='form-control' placeholder='Contraseña' name='pass1' id='pass1' required='required'>";
			html += "				</div>";
			html += "				<div class='form-group'>";
			html += "					<label for='pass2'>Contraseña</label>";
			html += "					<input type='password' class='form-control' placeholder='Contraseña' name='pass2' id='pass2' required='required'>";
			html += "				</div>";
			html += "				<div class='form-group'>";
			html += "					<button type='submit' class='btn btn-primary'>Guardar</button>";
			html += "				</div>";
			html += "			</div>";
			html += "			<div class='modal-footer'>";
			html += "				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
			html += "				<button type='button' class='btn btn-primary'>Save changes</button>";
			html += "			</div>";
			html += "		</div>";
			html += "	</div>";
			html += "</div>";

			//$("body").append(html);

			//$('#myModal').modal('show');
		});
	});

	/**
	* Function that throw petition for get data patient
	*/
	function email(){
		$.ajax_process("login/user", function(response){
			if(response.message != "ok"){
				$("#email").val("");
				$.message(response.message);
			}else{
				$("#id_usuario").val(response.data);
			}
		});
	}

	function send_email(){
		if($("#email").val().length == 0){
			$.message("Debe Digitar Correo Al Cual Enviar Token");
			return false;
		}

		$.ajax_process("login/send_email", function(response){
			if(response.message != "ok"){
				$.message(response.message);
			} else{
				$.message("Se Envio Correo");
			}
		});	
	}
</script>