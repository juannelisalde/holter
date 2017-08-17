<script type="text/javascript">
	var fmax = <?php echo $frecardiacamax;?>;
	var fmin = <?php echo $frecardiacamin;?>;
	var rows = <?php echo $cantidadmediciones;?>;

	$(document).ready(function(){
		var Conf = {min:fmin, max:fmax, noInp: rows, step: 5, step2: 10, no: 5000};
		chartHolter(Conf);
		$("#excel").change(function(){
			excel();
		});
	});
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