<script type="text/javascript">
	var fmax = <?= $frecardiacamax;?>;
	var fmin = <?= $frecardiacamin;?>;
	var rows = <?= $cantidadmediciones;?>;

	$(document).ready(function(){
		//Cargar menú de tipos de documento
		get_document();

		$.submit_click("paciente/save_meditation", "paciente", $("#send_meditation"));

		d = new Date();
		mes = parseInt(d.getMonth()) + 1;
		day = parseInt(d.getDay()) + 2;
		if(d.getMonth() < 10){
			mes = "0" + parseInt(d.getMonth() + 1);
		}
		if(d.getDay() < 10){
			day = "0" + parseInt(d.getDay() + 2);
		}
		$("#date_ini").attr({
       "max" : d.getFullYear() + "-" + mes + "-" + day,
    });

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
		
		//Jqwidget grids	
		jq_init(Conf);
		
		//Chart
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
				console.log(response.data);
				var usr = response.data[0];
				$("#paciente_id_paciente").val(usr.id_paciente);  
				$(".msj-diag").genModal("warning","Guardando información del paciente <b>"+usr.nombres+" "+usr.apellidos+"</b> ...")
			}
		});
	}

	function save_meditation(){
		$.ajax_process("paciente/save_meditation", function(response){
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

	/**
	* Function that throw patition for validate excel
	*/
	function excel(){
		var formData = new FormData();
		formData.append('file', $('#excel')[0].files[0]);
		
		$.ajax({
	    url: "/CI/home/excel",
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
      			$("#jqxgrid").jqxGrid('setcellvalue', key, 'Lat/Hora', row[2]);
					});
				}
      },
      error : function(xhr, status, textResponse) {
      	$.message("Ocurrio Un Error");
      	console.log("error en la peticion : " + textResponse);
      },
		});
	}

	var jq_init = function(Conf){
		$(document).ready(function () {
			// renderer for grid cells.
			var numberrenderer = function (row, column, value) {
				return '<div style="text-align: center; margin-top: 5px;">' + (1 + value) + '</div>';
			}

			// create Grid datafields and columns arrays.
			var datafields = [];
			var columns = [];
			for (var i = 0; i < 3; i++) {
				var text = headTxt(i);
				var exportText = exportTxt(i);
				if (i == 0) {
					var cssclass = 'jqx-widget-header';
					if (theme != ''){
						cssclass += ' jqx-widget-header-' + theme;
					}
					columns[columns.length] = {
						pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer 
					}
				}
				datafields[datafields.length] = { name: exportText, type: 'int' };
				columns[columns.length] = { 
					text: exportText,
					datafield: exportText,
					width: 145,
					align: 'center',
					cellsalign: 'center',
					validation: function (cell, value) {
						if (value == ""){ return { result: false, message: "El campo no puede ser vacío" }; }
						var val = parseInt(value);
						if ((val <= 0 || val > Conf.max) && cell.column != "Lat/Hora") 
						{ return { result: false, message: "Digite un valor mayor a 0 y menor a "+Conf.max }; }
						if ((val <= 0 || val > 10000) && cell.column == "Lat/Hora") 
						{ return { result: false, message: "Digite un valor mayor a 0 y menor a "+Conf.max }; }
						return true;
					}
				}
			}
			//};
			var source = {
				unboundmode: true,
				totalrecords: Conf.noInp,
				datafields: datafields,
				updaterow: function (rowid, rowdata) {
				// synchronize with the server - send update command   
				}
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// initialize jqxGrid
			$("#jqxgrid").jqxGrid({
				width: 480,
				source: dataAdapter,
				editable: true,
				theme: 'bootstrap',
				columnsresize: true,
				selectionmode: 'multiplecellsadvanced',
				columns: columns
			});
		});
	}
</script>