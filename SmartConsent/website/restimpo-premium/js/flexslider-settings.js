(function($) {
  $(window).load(function(){
  $('#header-slider').flexslider({
    animation: "fade",
    controlNav: true,
    directionNav: false,
  start: function(slider){
    $('body').removeClass('loading');
}
});
  $('.posts-slider').flexslider({
    animation: "slide",
    slideshow: false,
    controlNav: false,
    animationLoop: false,
    itemWidth: 176,
    prevText: "&lt;",
    nextText: "&gt;",
});
});
})(jQuery);