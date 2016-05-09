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

calculateLayout = ->
	if $.browser.mobile
		$('html').addClass 'mobile'
	else
		$('html').removeClass 'mobile'

	$('.scroll').mod 'ready', $('.scroll__content').height() > $('.scroll__wrap').height()
	if $(window).width() >= 768 && !$.browser.mobile
		if $('.scroll__content').height() > $('.scroll__wrap').height()
			if $('.scroll__wrap[data-perfect-scrollbar]').length > 0
				$('.scroll__wrap[data-perfect-scrollbar]').perfectScrollbar 'update'
			else
				$('.scroll__wrap').perfectScrollbar({suppressScrollX: true, includePadding: true})

@checkScroll = ()->
	el = $(this).elem('content')
	$(this).block().mod 'start', $(this).scrollTop() > 0
	$(this).block().mod 'end', el.outerHeight() <= $(this).scrollTop() + $(this).outerHeight()

@initGalleries = ->
	$('.licenses__item, .album').click (e)->
		elem    = $('.pswp')[0];
		options = galleryOptions
		if $(this).parent().hasMod 'show-all'
			items = $(this).parent().data 'pictures'
			options.index = $(this).index()
		else
			items = $(this).data 'pictures'
		if items.length > 0
			gallery = new PhotoSwipe elem, PhotoSwipeUI_Default, items, options
			gallery.init()
		e.preventDefault()

$(document).ready ->
	#$(window).on 'scroll',  _.throttle(agreementScroll, 100)
	$('.scroll__wrap').on 'scroll', _.throttle(checkScroll, 100)
	$(window).on 'resize', _.throttle(calculateLayout, 300)

	$.BEM = new $.BEM.constructor
	    namePattern: '[a-zA-Z0-9-]+',
	    elemPrefix: '__'
	    modPrefix: '--'
	    modDlmtr: '--'

	initGalleries()

	$('.toolbar__nav, .toolbar__nav-close, .nav__close').on 'click', (e)->
		$('.page').mod 'open', !$('.page').hasMod 'open'
		e.preventDefault()

	delay 300, ->
	  calculateLayout()
