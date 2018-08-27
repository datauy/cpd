(function ($) {

  openMenu = function(){
    $("#open_menu").css("display","none");
    $("#close_menu").css("display","block");
    $("nav").css("display","block");
    return false;
  };

  closeMenu = function(){
    $("#open_menu").css("display","block");
    $("#close_menu").css("display","none");
    $("nav").css("display","none");
    return false;
  };

})(jQuery);
