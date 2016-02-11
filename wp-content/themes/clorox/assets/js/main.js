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
      $(containerToAppend).append($('<div>').load(link + ' ' + target));
      window.history.pushState('', '', link);
      canPaginate($(this))
    }

  });

  canPaginate($('.paginate-ajax'));


  // $('.filters').on('click', 'a', function(e){
  //   e.preventDefault();
  //   var el = e.target;
  //   console.log($(el).attr('data-value'));
  // });

});
