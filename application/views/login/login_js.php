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

	/**
	* Function that send email for recover pass
	*/
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