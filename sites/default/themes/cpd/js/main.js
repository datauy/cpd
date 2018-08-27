(function ($) {
  var mySound = new buzz.sound("/sites/default/themes/cpd/sounds/bg.mp3", {
      preload: true,
      autoplay: true,
      volume:0
    });

  $(".menu li a, .home a, #open-button").mouseover(function(){
    var mySound = new buzz.sound("/sites/default/themes/cpd/sounds/btnHover.mp3", {
      preload: true,
      autoplay: true,
    });
  });

  $("#open-button").mousedown(function(){
    var mySound = new buzz.sound("/sites/default/themes/cpd/sounds/openmenu.mp3", {
      preload: true,
      autoplay: true,
    });
  });
  $(".button , button").mousedown(function(){
    var mySound = new buzz.sound("/sites/default/themes/cpd/sounds/buttonPress.mp3", {
      preload: true,
      autoplay: true,
    });
  });
})(jQuery);
