<script type="text/javascript">
	$(document).ready(function(){
		$.remove_enter();

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