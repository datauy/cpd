(function ($) {

    $( document ).ready(function() {
      //alert("Inicio una trivia");
      $("#edit-name").attr("placeholder", "Tu nombre");
      $("#edit-specify-center").css("display", "none");
      $("#edit-specify-center").attr("placeholder", "Especifica tu centro");
      $("#edit-next").removeClass("btn");
      $("#edit-next").removeClass("btn-default");
      $("#edit-next").removeClass("form-submit");
      $("#edit-next-anonymus").removeClass("btn");
      $("#edit-next-anonymus").removeClass("btn-default");
      $("#edit-next-anonymus").removeClass("form-submit");  
    //$(".page-trivia #page_section h1").hide();
      $( "#edit-center" ).change(function() {
        var selected_center = $(this).find("option:selected").text();
        if(selected_center=="Otro"){
          $("#edit-specify-center").css("display", "inline-block");
        }else{
          $("#edit-specify-center").css("display", "none");
        }
      });
    });

})(jQuery);
