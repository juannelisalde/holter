(function($){
  /**
  * Function that precess petition
  * @param string controller to open
  * @callback function hola
  */
  $.ajax_process = function(open, callback){
    var url = "/CI/" + open;
    $.ajax({
      url: url, 
      data : $.obj_form_data(),
      type : "POST",
      dataType : "json",
      beforeSend: function( xhr ) {
        $('#loading').css("visibility", "visible");
      },
      success : function(response){
        callback(response);
      },
      error : function(xhr, status, textResponse) {
        $.message("Ocurrio Un Error");
        console.log("error en la peticion : " + textResponse);
      },
      complete : function(xhr, status) {
        $('#loading').css("visibility", "hidden");
      }
    });
  }

  /**
  * Method that controls the submit event
  */
  $.remove_enter = function(){
    $("input").keydown(function(e) {
      if (e.which === 13 && !$(this).is("textarea, :button, :submit")) {
        var inputs = $(this).closest('form').find(":input:not(:disabled, [readonly='readonly'])");
        inputs.eq( inputs.index(this)+ 1 ).focus();
        e.stopPropagation();
        e.preventDefault();
      }
    });
  }

  /**
  * Method that get and return form data
  * @return object form data
  */
  $.obj_form_data = function(){
    obj={};
    $("form").find("input, select, redio").each(function(){
      var key = $(this).attr("id"); 
      var val = $("#"+key).val();
      if(val){
        obj[key] = val;
      }
    });

    return obj;
  }


  /**
  * Method that control click in button submit 
  * @param string controller to open
  * @param string message to show when response is ok
  */
  $.submit_click = function(open, message, form){
    $("form").submit(function(e) {
      event.preventDefault();
      $.ajax_process(open, function(response){
        if(response.message == "ok"){
          if(message == "login"){
            window.location.href = "login";
          } else if(message == "home"){
            window.location.href = "home";
          } else if(message == "paciente"){
            $(".msj-diag").genModal('success', "El registro de medición se ha guardado con éxito");
            form[0].reset();            
          } else{
            $.message(message);
            $("form")[0].reset();
          }

        }else{
          $.message(response.message);
        }

      });
    });
  }

  /**
  * Function that replace html field select 
  * @param object data to select
  * @param string id nuew field
  */
  $.replaceHtmlTD =  function(data, id){
    var html = "<option value=''>Seleccione un tipo de documento...</option>";
    $.each(data, function(key, val){
        html += "<option value='" + val.id_tipodocum + "'>" + val.nombre + "</option>";
    });
    return html;
  }

  /**
  * Method taht show modal with message
  */
  $.message = function(message){
    html =  "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
    html += "   <div class='modal-dialog' role='document'>";
    html += "     <div class='modal-content'>";
    html += "       <div class='modal-header'>";
    html += "         <h5 class='modal-title' id='exampleModalLabel'>Mensaje</h5>";
    html += "         <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    html += "           <span aria-hidden='true'>&times;</span>";
    html += "         </button>";
    html += "       </div>";
    html += "       <div class='modal-body'>";
    html +=           message;
    html += "       </div>";
    html += "       <div class='modal-footer'>";
    html += "         <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>";
    html += "       </div>";
    html += "     </div>";
    html += "   </div>";
    html += "</div>";

    $("body").append(html);

    $('#myModal').modal({backdrop: 'static', keyboard: false})  

    $('#myModal').modal('show');
  }

  $.fn.genModal = function(type, msg){
  switch(type){
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
})($)