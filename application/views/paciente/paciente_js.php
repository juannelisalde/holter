<script type="text/javascript">
var fmax = <?= $frecardiacamax;?>;
	var fmin = <?= $frecardiacamin;?>;
	var rows = <?= $cantidadmediciones;?>;
	
	$(document).ready(function(){
		var Conf = {min:fmin, max:fmax, noInp: rows, step: 5, step2: 10, no: 5000};

		chartHolter(Conf);

		$.remove_enter();

		get_document();

		date_birth();

		$(".search_doc").click(function(){
			if($("#tipodocum_id_tipodocum").val().length == 0 || $("#documento").val().length == 0){
				$.message("Debe Seleccionar Tipo De Documento y Digitar Un Documento");
			}
		});

		$.submit_click("paciente/insert", "Se Actualizo La Informacion Del Paciente");

		$("#documento_head").change(function(){
			if($("#tipodocum_id_tipodocum_head").val().length == 0){
				$.message("Debe Seleccionar Tipo De Documento");
				$(this).val("");
			}else{
				$("#tab_info_pat").click();
				$("#tipodocum_id_tipodocum").val($("#tipodocum_id_tipodocum_head").val());
				$("#documento").val($("#documento_head").val()).trigger("change");
			}
		});
		
		$("#documento").change(function(){
			if($("#tipodocum_id_tipodocum").val().length == 0){
				$.message("Debe Seleccionar Tipo De Documento");
				$(this).val("");
			}else{
				$("#tipodocum_id_tipodocum_head").val($("#tipodocum_id_tipodocum").val());
				$("#documento_head").val($("#documento").val());
				if($("#documento").val().length > 0){
					document_patient();
				}
			}
		});

		$("#tipodocum_id_tipodocum_head").change(function(){
			$("#tipodocum_id_tipodocum").val($(this).val());
			$("#documento, #documento_head").val("");
		});

		$("#tipodocum_id_tipodocum").change(function(){
			$("#tipodocum_id_tipodocum_head").val($(this).val());
			$("#documento, #documento_head").val("");
		});
	});

  /**
  * Function that validate date birth by patient
  */
	function date_birth(){
		d = new Date();
		mes = parseInt(d.getMonth()) + 1;
		day = parseInt(d.getDate());
		if(d.getMonth() < 10){
			mes = "0" + parseInt(d.getMonth() + 1);
		}
		if(day < 10){
			day = "0" + day;
		}

		$("#fecha_nacimiento").attr({
      "min" : d.getFullYear() - 110 + "-" + mes + "-" + day,
      "max" : d.getFullYear() - 18 + "-" + mes + "-" + day,
    });

    $("#fecha_nacimiento").change(function(){
      $("#edad").text(d.getFullYear() - $(this).val().substr(0, 4) + " Años");
    });
	}

	/**
	* Function that throw petition for get data patient
	*/
	function document_patient(){
		$.ajax_process("paciente/consult", function(response){
			if(response.message != "ok"){
				var document_patient = $("#documento").val();
				var type_document = $("#tipodocum_id_tipodocum").val();
				$("form")[1].reset();
				$("#documento").val(document_patient);
				$("#tipodocum_id_tipodocum").val(type_document);
			} else{
				$.each(response.data[0], function(key, val){
					$("#" + key).val(val);
				});
			}
		});
	}

	/**
	* Function that get type documents
	*/
	function get_document(){
		$.ajax_process("paciente/get_document", function(response){
			if(response.message != "ok"){
				$.message(response.message);
			} else{
		    $("#tipodocum_id_tipodocum").html($.replaceHtmlTD(response.data, "tipodocum_id_tipodocum"));
			  $("#tipodocum_id_tipodocum_head").html($.replaceHtmlTD(response.data, "tipodocum_id_tipodocum_head"));
			}
		});	
	}
</script>