jQuery(function($){

  $('.bxslider').bxSlider({
    mode: 'horizontal',
    captions: true,
    controls: false,
    auto: true,
    useCSS: true,
    easing: 'easeOutElastic',
    speed: 2000,
    pager: false
  });

  $('.ajax-load').click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    var target = $(this).attr('data-target');
    var container = $(this).attr('data-container');
    $(container).fadeOut();
    $(container).load(link + ' ' + target, function(){
      $(this).fadeIn();
    });
  });

  // $('.filters').on('click', 'a', function(e){
  //   e.preventDefault();
  //   var el = e.target;
  //   console.log($(el).attr('data-value'));
  // });

});
