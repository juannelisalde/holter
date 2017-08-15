$.fn.genModal = function(type, msg){
	switch(type)
	{
		case 'success':
		case 'warning':
		case 'info':
		case 'danger': break;
		default: type = "default"; break;
	}

	$(this).html('<div class="alert alert-'+type+' alert-dismissible" role="alert">\
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
			  '+msg+'\
			</div>');

};