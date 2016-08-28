(function() {
  var calculateLayout, delay, end, galleryOptions, slickSettings, spinOptions;

  galleryOptions = {
    history: false,
    focus: false,
    shareEl: false
  };

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

  this.getCaptcha = function() {
    return $.get('/include/captcha.php', function(data) {
      return setCaptcha(data);
    });
  };

  this.setCaptcha = function(code) {
    $('input[name=captcha_sid], input[name=captcha_code]').val(code);
    return $('.captcha').css('background-image', "url(/include/captcha.php?captcha_sid=" + code + ")");
  };

  calculateLayout = function() {
    if ($.browser.mobile) {
      $('html').addClass('mobile');
    } else {
      $('html').removeClass('mobile');
    }
    return $('.scroll').each(function(key, el) {
      $(el).mod('ready', $(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight());
      if ($(window).width() >= 768 && !$.browser.mobile) {
        if ($(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight()) {
          if ($(el).find('.scroll__wrap[data-perfect-scrollbar]').length > 0) {
            return $(el).find('.scroll__wrap[data-perfect-scrollbar]').perfectScrollbar('update');
          } else {
            return $(el).find('.scroll__wrap').perfectScrollbar({
              suppressScrollX: true,
              includePadding: true
            });
          }
        }
      }
    });
  };

  this.checkScroll = function() {
    var el;
    el = $(this).elem('content');
    $(this).block().mod('start', $(this).scrollTop() > 0);
    return $(this).block().mod('end', el.outerHeight() <= $(this).scrollTop() + $(this).outerHeight());
  };

  this.initGalleries = function() {
    return $('.licenses__item, .album, .gallery__item, .button--gallery').click(function(e) {
      var elem, gallery, items, options;
      e.preventDefault();
      elem = $('.pswp')[0];
      options = galleryOptions;
      if ($(this).parent().hasMod('show-all')) {
        items = $(this).parent().data('pictures');
        options.index = $(this).index();
      } else {
        items = $(this).data('pictures');
      }
      console.log(items);
      if (items) {
        gallery = new PhotoSwipe(elem, PhotoSwipeUI_Default, items, options);
        return gallery.init();
      }
    });
  };

  this.initMap = function() {
    if ($('[data-map]').length > 0) {
      return $('[data-map]').each(function() {
        var $map, lang;
        $map = $(this);
        lang = $(this).data('lang');
        if (!lang) {
          lang = "ru_RU";
        }
        return $.getScript("http://api-maps.yandex.ru/2.1/?lang=" + lang, function() {
          return ymaps.ready(function() {
            this.map = new ymaps.Map($map.attr('id'), {
              center: $map.data('coords').split(','),
              zoom: $map.data('zoom'),
              controls: ['geolocationControl', 'zoomControl']
            });
            this.mark = new ymaps.Placemark(map.getCenter(), {
              hintContent: $map.data('text')
            }, {
              preset: "twirl#nightDotIcon"
            });
            this.map.geoObjects.add(mark);
            return this.map.container.fitToViewport();
          });
        });
      });
    }
  };

  $(document).ready(function() {
    var scrollTimer;
    $('.scroll__wrap').on('scroll', _.throttle(checkScroll, 100));
    $(window).on('resize', _.throttle(calculateLayout, 300));
    scrollTimer = false;
    $('.params').elem('frame').on('scroll', _.throttle((function(e) {
      var el;
      el = $(e.currentTarget);
      if (el.scrollLeft() > 0) {
        el.block().mod('left', true);
      } else {
        el.block().mod('left', false);
      }
      if (el.scrollLeft() + el.width() === el.find('.param').width()) {
        return el.block().mod('right', true);
      } else {
        return el.block().mod('right', false);
      }
    }), 50));
    $.BEM = new $.BEM.constructor({
      namePattern: '[a-zA-Z0-9-]+',
      elemPrefix: '__',
      modPrefix: '--',
      modDlmtr: '--'
    });
    if ($.browser.mobile === true) {
      $('body').addClass('mobile');
    }
    initGalleries();
    initMap();
    $('.toolbar__nav, .toolbar__nav-close, .nav__close').on('click', function(e) {
      $('.page').mod('open', !$('.page').hasMod('open'));
      return e.preventDefault();
    });
    $('.modal').on('shown.bs.modal', function(e) {
      getCaptcha();
      return $('.page').mod('popup', !$('.page').hasMod('open'));
    });
    $('.modal').on('hidden.bs.modal', function(e) {
      return $('.page').mod('popup', !$('.page').hasMod('open'));
    });
    $('.map__close').click(function(e) {
      $('.map').mod('active', false);
      return e.preventDefault();
    });
    $('a[href*="#map"]').click(function(e) {
      $('.map').mod('active', true);
      if ($('.map ymaps').length === 0) {
        initMap();
      }
      return e.preventDefault();
    });
    $('.captcha__refresh').click(function(e) {
      getCaptcha();
      return e.preventDefault();
    });
    $('.table-modal__close').on('click', function(e) {
      $('.page').mod('popup', !$('.page').hasMod('popup'));
      $('.table-modal').mod('active', false);
      return e.preventDefault();
    });
    $('a[href*="#table-modal"]').on('click', function(e) {
      $($(this).attr('href')).mod('active', true);
      $('.page').mod('popup', !$('.page').hasMod('popup'));
      return e.preventDefault();
    });
    $('.feedback').elem('form').submit(function(e) {
      var request;
      e.preventDefault();
      request = $(this).serialize();
      return $.post('/include/send.php', request, function(data) {
        data = $.parseJSON(data);
        if (data.status === "ok") {
          $('.feedback').elem('form').hide().addClass('hidden');
          return $('.feedback').elem('success').show().removeClass('hidden');
        } else if (data.status === "error") {
          $('input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
    });
    $('.licenses').elem('title').on('click', function(e) {
      $(this).parents('.licenses__section').mod('open', !$(this).parents('.licenses__section').hasMod('open'));
      calculateLayout();
      return e.preventDefault();
    });
    return delay(300, function() {
      return calculateLayout();
    });
  });

}).call(this);
