(function($){
  /**
  * Function that precess petition
  * @param string controller to open
  * @callback function
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
  $.submit_click = function(open, message){
    $("form").submit(function(e) {
      event.preventDefault();
      $.ajax_process(open, function(response){
        if(response.message == "ok"){
          if(message == "login"){
            window.location.href = "login";
          } else if(message == "home"){
            window.location.href = "home";
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

  $.message = function(message){
    alert(message);
  }
})($)