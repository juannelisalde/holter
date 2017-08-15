<script type="text/javascript">
	$(document).ready(function(){
		$.remove_enter();
		$.submit_click("paciente/insert", "Se Actualizo La Informacion Del Paciente");
		get_document();

		$("#documento").change(function(){
			if($("#tipodocum_id_tipodocum").val().length == 0){
				alert("Debe Seleccionar Tipo De Documento");
				$(this).val("");
			}else{
				document_patient();
			}
		});
	});

	/**
	* Function that throw petition for get data patient
	*/
	function document_patient(){
		$.ajax_process("paciente/consult", function(response){
			if(response.message != "ok"){
				var document_patient = $("#documento").val();
				var type_document = $("#tipodocum_id_tipodocum").val();
				$("form")[0].reset();
				$("#documento").val(document_patient);
				$("#tipodocum_id_tipodocum").val(type_document);
			} else{
				$.each(response.data[0], function(key, val){
					$("#" + key).val(val);
				});
			}
		});
	}

	function get_document(){
		$.ajax_process("paciente/get_document", function(response){
			if(response.message != "ok"){
				$.message(response.message);
			} else{
				var html = "<select class='form-control' id='tipodocum_id_tipodocum' name='tipodocum_id_tipodocum' required='required'>";
				html += "<option value=''>SELECCIONE..</option>";
				$.each(response.data, function(key, val){
			    	html += "<option value='" + val.id_tipodocum + "'>" + val.nombre + "</option>";
				});
				html += "</select>";
			    $("#tipodocum_id_tipodocum").replaceWith(html);
			}
		});	
	}
</script>