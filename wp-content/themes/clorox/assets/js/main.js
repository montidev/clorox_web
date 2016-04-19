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
var BV;
jQuery(function($){

  $('.contactForm .form-group input').focusin(function(){
    $(this).closest('.contactForm .form-group').css({'border-color': '#1967bb'})
  });

  $('.contactForm .form-group input').focusout(function(){
    $(this).closest('.contactForm .form-group').css({'border-color': '#a2a2a2'})
  });



  var updateProducts = function(container, target, filtersURL) {
  	  $(container).fadeOut();
	    $(container).load(filtersURL + ' ' + target, function(){
	      window.history.pushState('', '', filtersURL);
	      $(this).fadeIn();
	    });
  }
  
	//Slider
  $('.bxslider').bxSlider({
    mode: 'horizontal',
    captions: true,
    controls: true,
    auto: true,
    useCSS: true,
    easing: 'easeOutElastic',
    speed: 2000,
    pager: false,
    pause: 190000,

    preloadImages: 'all',
    onSliderLoad: function(currentIndex){

    	var el = this.getCurrentSlideElement();    
    	var el = $(el).find('.bg-image')[0];

    	if($(el).attr('data-video') && window.screen.availWidth > 480){
	    	var vid = $(el).attr('data-video');	
	    	var vidWebm = $(el).attr('data-video-webm');

	    	BV = new $.BigVideo({
	    		container:$(el),
	    		doLoop:true,
	    		shrinkable: true,
	    	});

				BV.init();
				BV.show([{type: "video/mp4", src: vid}, {type: "video/webm", src: vidWebm}]);
			}				
    },
    onSlideAfter: function($slideElement, oldIndex, newIndex) {
    	var el = this.getCurrentSlideElement();
    	var el = $(el).find('.bg-image')[0];

    	var bef = this.getSlideElement(oldIndex);
    	var bef = $(bef).find('.bg-image')[0];

    	if($(bef).attr('data-video') && $(bef).find('#big-video-wrap').length) {
				BV.dispose();
			}

			var el = this.getCurrentSlideElement();    
			var el = $(el).find('.bg-image')[0];

    	if($(el).attr('data-video') && window.screen.availWidth > 480){
	    	var vid = $(el).attr('data-video');	
	    	var vidWebm = $(el).attr('data-video-webm');

	    	BV = new $.BigVideo({
	    		container:$(el),
	    		doLoop:true,
	    	});
				BV.init();
				BV.show([{type: "video/mp4", src: vid}, {type: "video/webm", src: vidWebm}]);

			}				
    },
    onSlideBefore: function($slideElement, oldIndex, newIndex){
    	
    	var player;
    	var bef = this.getSlideElement(oldIndex);

    	var bef = $(bef).find('.bg-image')[0];

    	if($(bef).attr('data-video') && $(bef).find('#big-video-wrap').length) {
				player = BV.getPlayer();
				player.pause();
			}

			


    }
    

  });


  $('.reload-product-type').click(function(e){
  	e.preventDefault();
  	var newAr = [];
  	var filtersURL = "";
	  if($('#filter-type-prod button span.text').text() != "-" && $('#filter-type-prod button span.text').text()) {
	  	var a = $.grep($('#filter-type-prod a.ajax-load'), function(a){
	    				return $(a).css('display') == 'block';
	    });
	  	a = a[0];
	  	var link = $(a).attr('href');
	  	var objURL = window.filters.addFilterFromUrl(link);
	  	var filtersURL = '?' + $.param( objURL );

	  	$.each(filtersURL.split('&'), function(index, val) {
	  					var ax = val.split('=');
	  					if(ax[0] != 'product_type'){
	  						newAr.push(val);
	  					} 
	  		}
	  	);

	  	filtersURL = newAr.join('&');
	  } else{
	  	
	  	var objURL = window.filters.addFilterFromUrl("?product_type= ");
    	var filtersURL = '?' + $.param( objURL );
	  	filtersURL = "?product_type= ";
	  }

  	$('#filter-type-prod a.ajax-load').css('display','block');
  	$('.filter-category-prod a.ajax-load').css('display','block');
  	//$('#filter-type-prod button span.text').text($(a).text());
  	$('.filter-category-prod button span.text').text("-");
  	updateProducts('.container-products', '.container-products', filtersURL);
  });


  $('.reload-category').click(function(e){
  	e.preventDefault();
  	var newAr = [];
  	if($('.filter-category-prod button span.text').text() != "-") {

  		var currentName = $('.filter-category-prod button span.text').text();
	  	var a = $.grep($('.filter-category-prod a.ajax-load'), function(a){
	    				return $(a).text().trim() == currentName.trim();
	    });
	  	a = a[0];
	  	
	  	var link = $(a).attr('href');
	  	var objURL = window.filters.addFilterFromUrl(link);
	  	var filtersURL = '?' + $.param( objURL );

	  	$.each(filtersURL.split('&'), function(index, val) {
	  					var ax = val.split('=');
	  					if(ax[0] != 'category'){
	  						newAr.push(val);
	  					} 
	  		}
	  	);	

	  	filtersURL = newAr.join('&');
	  } else {
	  	var objURL = window.filters.addFilterFromUrl("?category= ");
    	var filtersURL = '?' + $.param( objURL );
	  	filtersURL = "?category= ";
	  } 	

  	$('#filter-type-prod a.ajax-load').css('display','block');
  	$('.filter-category-prod a.ajax-load').css('display','block');
  	$('#filter-type-prod button span.text').text("-");
  	//$('.filter-category-prod button span.text').text($(a).text());
  	updateProducts('.container-products', '.container-products', filtersURL);
  });

  $('.ajax-load').click(function(e){  	
    e.preventDefault();
    var link = $(this).attr('href');
    var target = $(this).attr('data-target');
    var container = $(this).attr('data-container');
    var append = $(this).attr('data-container');
    var objURL = window.filters.addFilterFromUrl(link);
    var filtersURL = '?' + $.param( objURL );
    var type = $(this).attr('type');
    var val = $(this).attr('val');
    
    $.ajax({
    	url: '/wp-admin/admin-ajax.php',
    	data: {
    		action: 'get_related_prod_types',
    		type: type,
    		value: val
    	},
    	success: function(data){
    		var first = [];
    		if(data.type == 'product-type') {
    			
    			options = $('#filter-type-prod .ajax-load').css('display','none');
    			$.each(data.data, function(index, value){

    				nd = $.grep(options, function(a){
    					return $(a).attr('val') == value;
    				})
    				if(nd){
    					$(nd).css('display', 'block');
    				
    				}
    			});

    			var currentCatName = $('#filter-type-prod button span.text').text();
    			currentCatName = currentCatName.trim();
    			

    			first = $.grep(options, function(a){
    				return ($(a).text().trim() == currentCatName && $(a).css('display') == 'block');
    			});


    			if(!first.length){
    				$('#filter-type-prod button span.text').text("-");

    				//clear category from url; 
    				var newAr = []; 

    				$.each(filtersURL.split('&'), function(index, val) {
    					var ax = val.split('=');
    					if(ax[0] != 'category'){
		  						newAr.push(val);
		  				}
    				});    				
    				filtersURL = newAr.join('&');
    			}			
    		}
    	    	
  			updateProducts(container, target, filtersURL);
    	}
    })
    
   
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

  $(window).load(function(){
  	var a = $('.filter-category-prod a.ajax-load:first-child');

  	var val = $(a).attr("val");
  	var type = $(a).attr('type');

  	$.ajax({
    	url: '/wp-admin/admin-ajax.php',
    	data: {
    		action: 'get_related_prod_types',
    		type: type,
    		value: val
    	},
    	success: function(data){

    		if(data.type == 'product-type') {
    			options = $('#filter-type-prod .ajax-load').css('display','none');
    			$.each(data.data, function(index, value){

    				nd = $.grep(options, function(a){
    					return $(a).attr('val') == value;
    				})

    				if(nd){
    					$(nd).css('display', 'block');
    				}
    			});
    		}
    	}
    });


  })

  $('.with-filters .disable').click(function(e){
  	e.preventDefault();


  	if($('.with-filters .disable').hasClass('disable')){
  		e.stopPropagation();
	  	$('.with-filters .disable').removeClass('disable');
	  	
	  }


  })



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
  $(window).bind('enterBreakpoint1',function() {
  	initSliders();


  });

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
		breakpoints: [1,320, 480, 768]
	});




	
  

});
    

$(function(){
	//para iniciar le demos el tamaño del viewport a .navbar-collapse
	var adjustHeight = function() {$('.navbar-collapse').css('height',($('html').height() - 74) + 'px');  };
	adjustHeight();

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
