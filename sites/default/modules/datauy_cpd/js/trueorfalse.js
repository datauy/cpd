(function ($) {

  clickTrueOrFalseAnswer = function(selectedOption,obj){
    $("#"+obj.id).toggleClass("selected");
    var form_value = $("[name='form_value']").val();
    if(form_value==selectedOption){
      $("[name='form_resultado_trueorfalse']").val(1);
    }else{
      $("[name='form_resultado_trueorfalse']").val(0);
    }
    $("#edit-next").click();
    return false;
  };

})(jQuery);
