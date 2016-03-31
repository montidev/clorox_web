window.filters = {
  current: {},
  _addParam: function(filter) {
    var f = filter.split('=');
    var k = f[0].replace('?','');
    var v = f[1];
    this.current[k] = v;
  },
  addFilterFromUrl: function(link){
    var fs = link.split('&');
    if ( fs.length ) {
      for (var i = 0; i < fs.length; i++) {
        this._addParam(fs[i]);
      }
    } else {
      this._addParam(link);
    }
    return this.current;
  }
};

// Update filters when page is loaded
window.filters.addFilterFromUrl(window.location.search);

jQuery(function($){

  $('.contactForm .form-group input').focusin(function(){
    $(this).closest('.contactForm .form-group').css({'border-color': '#1967bb'})
  });

  $('.contactForm .form-group input').focusout(function(){
    $(this).closest('.contactForm .form-group').css({'border-color': '#a2a2a2'})
  });

	//Slider
  $('.bxslider').bxSlider({
    mode: 'horizontal',
    captions: true,
    controls: false,
    auto: true,
    useCSS: true,
    easing: 'easeOutElastic',
    speed: 2000,
    pager: false,
    preloadImages: 'all'
  });

  $('.ajax-load').click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    var target = $(this).attr('data-target');
    var container = $(this).attr('data-container');
    var append = $(this).attr('data-container');
    var objURL = window.filters.addFilterFromUrl(link);
    var filtersURL = '?' + $.param( objURL );
    $(container).fadeOut();
    $(container).load(filtersURL + ' ' + target, function(){
      window.history.pushState('', '', filtersURL);
      $(this).fadeIn();
    });
  });

  var isLastPage = function( link ) {
    return (link === '' || (window.location.href == link));
  }

  var canPaginate = function ($el) {
    if ( isLastPage($el.attr('href')) ) {
      $el.addClass('disabled');
      return false;
    }
    return true;
  }

  $('.paginate-ajax').click(function(e){
    e.preventDefault();
    if ( canPaginate($(this)) ){
      var link = $(this).attr('href');
      var target = $(this).attr('data-target');
      var containerToAppend = $(this).attr('data-container-append');
      var items = $(this).attr('data-item');
      that = this;
      $(containerToAppend).append($('<div>').load(link + ' ' + target, function(data){
      	var a = $(data).find('.btn-more a').attr('href');
      	$(that).attr('href', a);
      	window.history.pushState('', '', link);
      	canPaginate($(that));      	
      }));
      
    }

  });



  //responsive JS
  //inicio de sliders

  canPaginate($('.paginate-ajax'));

  var envSlider;
  var proSlider;
  var proRelateds;
  var campSlider;
  initSliders = function(){

    $('.bg-transparent').removeClass('transition');

  	if(!envSlider && $('.environments').length){
	  	envSlider = $('.environments').bxSlider({
	    	hideControlOnEnd: true,
			  slideWidth: 223,
			  slideMargin: 10,
			  adaptiveHeight: true,
	    });
  	}

  	if(!proSlider && $('.home .products').length){
  		proSlider = $('.home .products, .single-product .products').bxSlider({
	    	hideControlOnEnd: true,
			  slideWidth: 190,
			  slideMargin: 10,
			  adaptiveHeight: true,
	    });

  	}

    if(!proRelateds && $('#section-relateds .products').length && $('#section-relateds .products .product').length > 2){
    	console.log('entro a')
	    proRelateds = $('#section-relateds .products').bxSlider({
	    	hideControlOnEnd: true,
			  slideWidth: 190,
			  slideMargin: 10,
			  adaptiveHeight: true,
	    });
	  }

	  if(!campSlider && $('#sectionCampaignDetail .products').length){
	    campSlider = $('#sectionCampaignDetail .products').bxSlider({
	    	hideControlOnEnd: true,
			  slideWidth: 190,
			  slideMargin: 10,
			  adaptiveHeight: true,
	    });
	  }
  }


  /* BREAKPOINT events */
  $(window).bind('enterBreakpoint320',function() {

    	initSliders();

  });


  $(window).bind('enterBreakpoint480',function() {

    	initSliders();

  });

  $(window).bind('enterBreakpoint768',function() {
    if(envSlider){
    	envSlider.destroySlider();
    	envSlider = undefined;
    }
    if(proSlider){
    	proSlider.destroySlider();
    	proSlider = undefined;
    }
    if(proRelateds){
    	proRelateds.destroySlider();
    	proRelateds = undefined;
    }
    if(campSlider){
    	campSlider.destroySlider();
    	campSlider = undefined;
    }
    $('.bg-transparent').addClass('transition');
  });

  

	$(window).setBreakpoints({
		distinct: true,
		breakpoints: [320, 480, 768]
	});




	
  

});


$(function(){
	//para iniciar le demos el tamaño del viewport a .navbar-collapse
	var adjustHeight = function() {$('.navbar-collapse').css('height',($('html').height() - 74) + 'px');  };


	//función que cada vez que apriete. quede bien
	$('.navbar-toggle').click(function(e){
		e.stopPropagation();
		
		

		if($('.navbar-collapse').is(':visible')) {
			$('.navbar-collapse').slideToggle(500, adjustHeight);
			$('.navbar-collapse').removeClass('in');
			$('body > nav').addClass('shadow');

		} else {
			//espero a que abra
			$('.navbar-collapse').slideToggle(500, adjustHeight);
			$('.navbar-collapse').addClass('in');
			$('body > nav.shadow').removeClass('shadow');
			
		}

		
	})
});
