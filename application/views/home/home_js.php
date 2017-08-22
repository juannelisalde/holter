<script type="text/javascript">
	var fmax = <?php echo $frecardiacamax;?>;
	var fmin = <?php echo $frecardiacamin;?>;
	var rows = <?php echo $cantidadmediciones;?>;

	$(document).ready(function(){
		//Cargar menú de tipos de documento
		get_document();

		// Validaciòn 
		$("#documento").change(function(){
			if($("#tipodocum_id_tipodocum").val().length == 0){
				alert("Debe Seleccionar Tipo De Documento");
				$(this).val("");
			}else{
				document_patient();
			}
		});

		var Conf = {min:fmin, max:fmax, noInp: rows, step: 5, step2: 10, no: 5000};
		chartHolter(Conf);
		$("#excel").change(function(){
			excel();
		});
	});

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

	function document_patient(){
		$.ajax_process("paciente/consult", function(response){
			if(response.message != "ok"){
				$(".msj-diag").genModal("danger","<b>Alerta:</b> "+response.message+' <a target="_blank" href="paciente" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Crear paciente</a>')
			} else{
				$.each(response.data[0], function(key, val){
					$("#" + key).val(val);
				});
			}
		});
	}
	/**
	* Function that throw patition for validate excel
	*/
	function excel(){
		var formData = new FormData();
		formData.append('file', $('#excel')[0].files[0]);
		
		$.ajax({
	    url: "/git-holter/home/excel",
			type : 'POST',
			data : formData,
			processData: false,
			contentType: false,
			dataType : "json",
			success : function(response){
				console.log(response.message);
				if(response.message != "ok"){
					if(response.data){
						var html = "<center><h4>Errores En El Archivo De Excel</h4></center>";
						html += "<table class='table table-striped'>";
						html += 	"<thead>";
						html += 		"<tr>";
						html += 		"<th>Fila</th>";
						html += 		"<th>Error</th>";
						html += 		"</tr>";
						html += 	"</thead>";
						html += 	"<tbody>";
						$.each(response.data, function(key, val){
							html += 	"<tr>";
							html +=   	"<td>" + val.line + "</td>";
							html +=   	"<td>" + val.error + "</td>";
							html += 	"</tr>";
						});
						html += 	"</tbody>";
						html += "</table>";
					}else{
						var html = response.message; 

					}


					$(".principal.alert-content").genModal('danger', html);

				} else{
					$.each(response.data, function(key, row){
            			$("#jqxgrid").jqxGrid('setcellvalue', key, 'FMin', row[0]);
            			$("#jqxgrid").jqxGrid('setcellvalue', key, 'FMax', row[1]);
            			$("#jqxgrid").jqxGrid('setcellvalue', key, 'Lathora', row[2]);
					});
				}
      },
      error : function(xhr, status, textResponse) {
      	//$.message("Ocurrio Un Error");
      	console.log("error en la peticion : " + textResponse);
      },
		});
	}
</script>