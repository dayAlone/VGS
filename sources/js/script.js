(function() {
  var calculateLayout, delay, end, slickSettings, spinOptions;

  slickSettings = {
    infinite: true,
    adaptiveHeight: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick-prev"><img src="/layout/images/left.png"></button>',
    nextArrow: '<button type="button" class="slick-next"><img src="/layout/images/right.png"></button>'
  };

  spinOptions = {
    lines: 13,
    length: 21,
    width: 2,
    radius: 24,
    corners: 0,
    rotate: 0,
    direction: 1,
    color: '#870b24',
    speed: 1,
    trail: 68,
    shadow: false,
    hwaccel: false,
    className: 'spinner',
    zIndex: 2e9,
    top: '50%',
    left: '50%'
  };

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd';

  calculateLayout = function() {
    if ($.browser.mobile) {
      $('html').addClass('mobile');
    } else {
      $('html').removeClass('mobile');
    }
    $('.scroll').mod('ready', $('.scroll__content').height() > $('.scroll__wrap').height());
    if ($(window).width() >= 768 && !$.browser.mobile) {
      if ($('.scroll__content').height() > $('.scroll__wrap').height()) {
        if ($('.scroll__wrap[data-perfect-scrollbar]').length > 0) {
          return $('.scroll__wrap[data-perfect-scrollbar]').perfectScrollbar('update');
        } else {
          return $('.scroll__wrap').perfectScrollbar({
            suppressScrollX: true,
            includePadding: true
          });
        }
      }
    }
  };

  this.checkScroll = function() {
    var el;
    el = $(this).elem('content');
    $(this).block().mod('start', $(this).scrollTop() > 0);
    return $(this).block().mod('end', el.outerHeight() <= $(this).scrollTop() + $(this).outerHeight());
  };

  $(document).ready(function() {
    $('.scroll__wrap').on('scroll', _.throttle(checkScroll, 100));
    $(window).on('resize', _.throttle(calculateLayout, 300));
    $.BEM = new $.BEM.constructor({
      namePattern: '[a-zA-Z0-9-]+',
      elemPrefix: '__',
      modPrefix: '--',
      modDlmtr: '--'
    });
    $('.toolbar__nav, .toolbar__nav-close, .nav__close').on('click', function(e) {
      $('.page').mod('open', !$('.page').hasMod('open'));
      return e.preventDefault();
    });
    return delay(300, function() {
      return calculateLayout();
    });
  });

}).call(this);
