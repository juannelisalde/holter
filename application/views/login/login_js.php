<script type="text/javascript">
	$(document).ready(function(){
		$.remove_enter();
		
		$.submit_click("login/login", "home");

		$(".change_pass").click(send_email);

		$(".modal-forget").click(function(e){
			e.stopPropagation();
    	e.preventDefault();
    	send_email();
		});
	});
	
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
				$.message("Por Favor Revise Su Correo, En Caso De No Estar En La Bandeja De Entrada Revise En Spam");
			}
		});	
	}
</script>