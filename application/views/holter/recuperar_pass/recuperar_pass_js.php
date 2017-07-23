<script type="text/javascript">
	$(document).ready(function(){		
		$("#email").val(location.search.split('email=')[1]);
		$.remove_enter();
		$.submit_click("holter/usuarios/recover_pass", "login");
	});
</script>