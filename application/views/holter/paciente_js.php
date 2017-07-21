<script type="text/javascript">
	$(document).ready(function(){
		$.remove_enter();
		$.submit_click("paciente/insert");

		$("#documento").change(function(){
			if($("#tipodocum_id_tipodocum").val().length == 0){
				alert("Debe Seleccionar Tipo De Documento");
				$(this).val("");
			}else{
				document_patient();
			}
		});
	});

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
</script>