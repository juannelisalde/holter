<script type="text/javascript">
	$(document).ready(function(){
		$.remove_enter();

		$("#excel").change(function(){
			excel();
		});
	});

	/**
	* Function that throw petition for get data patient
	*/
	function excel(){
		var formData = new FormData();
		formData.append('file', $('#excel')[0].files[0]);
		
		$.ajax({
    		url: "/CI/home/excel",
			type : 'POST',
			data : formData,
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			success : function(response){
        		console.log(response);
      		},
      		error : function(xhr, status, textResponse) {
        		$.message("Ocurrio Un Error");
        		console.log("error en la peticion : " + textResponse);
      		},
		});
	}
</script>