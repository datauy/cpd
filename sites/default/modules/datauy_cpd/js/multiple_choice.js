(function ($) {

  clickOption = function(key,obj){
    $("#edit-game-"+key).click();
    $("#answer-"+key).toggleClass("selected");
    $("#"+obj.id).toggleClass("selected");
    return false;
  };

  clickOnlyOneOption = function(key,obj){
    $("#"+obj.id).toggleClass("selected");
    $("#edit-game-"+key).click();
    $(".question_img").removeClass("selected");
    $("#answer-"+key).addClass("selected");
    $("#edit-next").click();
    return false;
  };


})(jQuery);
