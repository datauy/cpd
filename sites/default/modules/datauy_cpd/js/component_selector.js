(function ($) {

  select_component = function(term_id){
    console.log(term_id);
    $("[name='form_eje_tematico']").val(term_id);
    $("#edit-next").click();
    return true;
  };

})(jQuery);
