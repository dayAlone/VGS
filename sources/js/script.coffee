galleryOptions =
    history : false
    focus   : false
    shareEl : false

slickSettings =
    infinite      : true
    adaptiveHeight: true
    slidesToShow  : 1
    slidesToScroll: 1
    prevArrow     : '<button type="button" class="slick-prev"><img src="/layout/images/left.png"></button>'
    nextArrow     : '<button type="button" class="slick-next"><img src="/layout/images/right.png"></button>'

spinOptions =
    lines     : 13
    length    : 21
    width     : 2
    radius    : 24
    corners   : 0
    rotate    : 0
    direction : 1
    color     : '#870b24'
    speed     : 1
    trail     : 68
    shadow    : false
    hwaccel   : false
    className : 'spinner'
    zIndex    : 2e9
    top       : '50%'
    left      : '50%'

delay = (ms, func) -> setTimeout func, ms

end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd'

@getCaptcha = ()->
    $.get '/include/captcha.php', (data)->
        setCaptcha data

@setCaptcha = (code)->
    $('input[name=captcha_sid], input[name=captcha_code]').val(code)
    $('.captcha').css 'background-image', "url(/include/captcha.php?captcha_sid=#{code})"

calculateLayout = ->
    if $.browser.mobile
        $('html').addClass 'mobile'
    else
        $('html').removeClass 'mobile'

    $('.scroll').each (key, el)->

        $(el).mod 'ready', $(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight()

        if $(window).width() >= 768 && !$.browser.mobile
            if $(el).find('.scroll__content').outerHeight() > $(el).find('.scroll__wrap').outerHeight()
                if $(el).find('.scroll__wrap[data-perfect-scrollbar]').length > 0
                    $(el).find('.scroll__wrap[data-perfect-scrollbar]').perfectScrollbar 'update'
                else
                    $(el).find('.scroll__wrap').perfectScrollbar({suppressScrollX: true, includePadding: true})

@checkScroll = ()->
    el = $(this).elem('content')
    $(this).block().mod 'start', $(this).scrollTop() > 0
    $(this).block().mod 'end', el.outerHeight() <= $(this).scrollTop() + $(this).outerHeight()

@initGalleries = ->
    $('.licenses__item, .album, .gallery__item, .button--gallery, .text__gallery').click (e)->
        e.preventDefault()

        elem    = $('.pswp')[0];
        options = galleryOptions

        if $(this).parent().hasMod 'show-all'
            items = $(this).parent().data 'pictures'
            options.index = $(this).index()
        else
            items = $(this).data 'pictures'
        console.log items
        if items
            gallery = new PhotoSwipe elem, PhotoSwipeUI_Default, items, options
            gallery.init()

@initMap = ->
    if $('[data-map]').length > 0
        $('[data-map]').each ->
            $map = $(this)
            lang = $(this).data('lang')
            lang = "ru_RU" if !lang
            $.getScript "http://api-maps.yandex.ru/2.1/?lang=#{lang}", ->
                ymaps.ready ()->
                    @map = new ymaps.Map $map.attr('id'), {
                        center: $map.data('coords').split(',')
                        zoom: $map.data('zoom'),
                        controls: ['geolocationControl', 'zoomControl']
                    }
                    @mark = new ymaps.Placemark map.getCenter(), { hintContent: $map.data('text') }, { preset: "twirl#nightDotIcon" }
                    @map.geoObjects.add mark
                    @map.container.fitToViewport()

$(document).ready ->
    #$(window).on 'scroll',  _.throttle(agreementScroll, 100)
    $('.scroll__wrap').on 'scroll', _.throttle(checkScroll, 100)
    $(window).on 'resize', _.throttle(calculateLayout, 300)


    scrollTimer = false
    $('.params').elem('frame').on 'scroll', _.throttle ((e)->
        el = $(e.currentTarget)
        if el.scrollLeft() > 0
            el.block().mod 'left', true
        else
            el.block().mod 'left', false

        if el.scrollLeft() + el.width() == el.find('.param').width()
            el.block().mod 'right', true
        else
            el.block().mod 'right', false
    ), 50

    $.BEM = new $.BEM.constructor
        namePattern: '[a-zA-Z0-9-]+',
        elemPrefix: '__'
        modPrefix: '--'
        modDlmtr: '--'

    if $.browser.mobile == true
        $('body').addClass 'mobile'

    initGalleries()

    initMap()

    $('.toolbar__nav, .toolbar__nav-close, .nav__close').on 'click', (e)->
        $('.page').mod 'open', !$('.page').hasMod 'open'
        e.preventDefault()

    $('.modal').on 'shown.bs.modal', (e)->
        getCaptcha()
        $('.page').mod 'popup', !$('.page').hasMod 'open'

    $('.modal').on 'hidden.bs.modal', (e)->
        $('.page').mod 'popup', !$('.page').hasMod 'open'

    $('.map__close').click (e)->
        $('.map').mod 'active', false
        e.preventDefault()

    $('a[href*="#map"]').click (e)->
        $('.map').mod 'active', true
        if $('.map ymaps').length == 0
            initMap()
        e.preventDefault()

    $('.captcha__refresh').click (e)->
        getCaptcha()
        e.preventDefault()

    $('.table-modal__close').on 'click', (e)->
        $('.page').mod 'popup', !$('.page').hasMod 'popup'
        $('.table-modal').mod 'active', false
        e.preventDefault()

    $('a[href*="#table-modal"]').on 'click', (e)->
        $($(this).attr('href')).mod 'active', true
        $('.page').mod 'popup', !$('.page').hasMod 'popup'
        e.preventDefault()

    $('.feedback').elem('form').submit (e)->
        e.preventDefault()
        request = $(this).serialize()
        $.post '/include/send.php', request,
            (data) ->
                data = $.parseJSON(data)
                if data.status == "ok"
                    $('.feedback').elem('form').hide().addClass 'hidden'
                    $('.feedback').elem('success').show().removeClass 'hidden'
                else if data.status == "error"
                    $('input[name=captcha_word]').addClass('parsley-error')
                    getCaptcha()

    $('.licenses').elem('title').on 'click', (e)->
        $(this).parents('.licenses__section').mod 'open', !$(this).parents('.licenses__section').hasMod 'open'
        calculateLayout()
        e.preventDefault()

    delay 300, ->
      calculateLayout()
