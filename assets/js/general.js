/*
$(document).ready(function() {
	// Inicializando selects
  $('select').material_select();
  $("select[required]").css({display: "inline", height: 0, padding: 0, width: 0});

  // Inicializando picker para fecha
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd'
  });
  // Inicializando tooltips
  $('.tooltipped').tooltip({delay: 50});
  // Proporciones de contenido main

  var marg = 20;
  $(".main").css("max-height",$(window).height()-$("nav").height()-marg);

	$(window).resize(function() {
	  $(".main").css("max-height",$(window).height()-$("nav").height()-marg);
	});
});
*/

(function($){
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
        //$.message("error", "Se Produjo");
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
  * Method that get form data
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
  * @controlator string directory 
  * @file string file of the controlator
  * @message string message to show if response is ok 
  * @method method to execute
  * @tbody_id array id tbody to extract data
  */
  $.submit_click = function(open){
    $("form").submit(function(e) {
      event.preventDefault();
      $.ajax_process(open, function(response){
        if(response.message == "ok"){
          //$.message("message",message);
          //$("form")[0].reset();
          console.log("llega submit", response);
        }else{
          console.log("llega submit erro ", response);
        }
      });
    });
  }
})($)