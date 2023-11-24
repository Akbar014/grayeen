var _functions = {}, winWidth;

jQuery(function($) {

	"use strict";
        
  /* function on page ready */
  var isTouchScreen = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);
  if (isTouchScreen) $('html').addClass('touch-screen');
  var winScr, winHeight,
      is_Mac = navigator.platform.toUpperCase().indexOf('MAC') >= 0,
      is_IE = /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) || /MSIE 10/i.test(navigator.userAgent) || /Edge\/\d+/.test(navigator.userAgent),
      is_Chrome = navigator.userAgent.indexOf('Chrome') >= 0 && navigator.userAgent.indexOf('Edge') < 0;

  /* check browser */
  winWidth = $(window).width();
  winHeight = $(window).height();

  if(is_Mac){$('html').addClass('mac');}
  if(is_IE){$('html').addClass('ie');}
  if(is_Chrome){$('html').addClass('chrome');}

  /* page loader and etc */
  if($('.select-box').length){
    $('.SelectBox').SumoSelect();
  }
  setTimeout( function(){
    $('body').addClass('site-ready');
  },1200);

	/* function on page scroll */
	$(window).scroll(function(){
		_functions.scrollCall();
	});

  var prev_scroll = 0;
  _functions.scrollCall = function() {
    winScr = $(window).scrollTop();
    if(winScr > 80) {
      $('header').addClass('scrolled');
    } else {
      $('header').removeClass('scrolled');
    }

    //show-hide header on scroll
    if (winScr > prev_scroll && $('.open-menu').length === 0) {
      $('header').addClass('header-hide');
    }else{
      $('header').removeClass('header-hide');
    }
    prev_scroll = winScr;

    if(winScr <= 50){
      $('header').removeClass('header-hide');
      prev_scroll = 0;
    }

  }
  _functions.scrollCall();

  /*menu*/
  $('.mobile-button').on('click', function(){
    $(this).toggleClass('active');
    $('html').toggleClass('overflow-menu');
    $(this).parents('header').toggleClass('open-menu');
  });

  //layer close
  $('.layer-close').on('click', function(){
    $('header').removeClass('active-layer-close');
    $('.user-account').removeClass('open');
    $('.menu-notification').removeClass('open');
  });

  /* swiper sliders */
  _functions.getSwOptions = function(swiper){
    var options = swiper.data('options');
        options = (!options || typeof options !=='object') ? {} : options;
        var $p = swiper.closest('.swiper-entry'),
            slidesLength = swiper.find('>.swiper-wrapper>.swiper-slide').length;
    if(!options.pagination) options.pagination = {
      el: $p.find('.swiper-pagination')[0],
      clickable: true
    };
    if(!options.navigation) options.navigation = {
      nextEl: $p.find('.swiper-button-next')[0],
      prevEl: $p.find('.swiper-button-prev')[0]
    };
    options.preloadImages = false;
    options.lazy = {loadPrevNext: true};
    options.observer = true;
    options.observeParents = true;
    options.watchOverflow = true;
    if(!options.speed) options.speed = 500;
    options.roundLengths = false;
    if(!options.centerInsufficientSlides) options.centerInsufficientSlides = false;
    if (options.customFraction){
      $p.addClass('custom-fraction-swiper');
      if (slidesLength > 1 && slidesLength < 10) {
        $p.find('.custom-current').text('01');
        $p.find('.custom-total').text('0' + slidesLength);
      } else if (slidesLength > 1) {
        $p.find('.custom-current').text('01');
        $p.find('.custom-total').text(slidesLength);
      }
    }
    if(slidesLength <= 1){
      options.loop = false;
    }
    if(isTouchScreen) options.direction = "horizontal";
    return options;
  };

  _functions.initSwiper = function(el){
    var swiper = new Swiper(el[0], _functions.getSwOptions(el));
  };
    
  $('.swiper-entry .swiper-container').each(function(){
    _functions.initSwiper($(this));
  });

  $('.swiper-thumbs').each(function () {
    var top = $(this).find('.swiper-container.swiper-thumbs-top')[0].swiper,
        bottom = $(this).find('.swiper-container.swiper-thumbs-bottom')[0].swiper;
    top.thumbs.swiper = bottom;
    top.thumbs.init();
    top.thumbs.update();
  });

  $('.swiper-control').each(function () {
    var top = $(this).find('.swiper-container')[0].swiper,
        bottom = $(this).find('.swiper-container')[1].swiper;
    top.controller.control = bottom;
    bottom.controller.control = top;
  });
  //custom fraction
  $('.custom-fraction-swiper').each(function() {
    var $this = $(this),
      $thisSwiper = $this.find('.swiper-container')[0].swiper;

    $thisSwiper.on('slideChange', function() {
      $this.find('.custom-current').text(
        function() {
          if ($thisSwiper.realIndex < 9) {
            return '0' + ($thisSwiper.realIndex + 1)
          } else {
            return $thisSwiper.realIndex + 1
          }
        }
      )
    });
  });
 
  //popup
  var popupTop = 0;
  function removeScroll(){
    popupTop = $(window).scrollTop();
    $('html').css({
      "position": "fixed",
      "top": -$(window).scrollTop(),
      "width": "100%"
    });
  }
  function addScroll(){
    $('html').css({
      "position": "static"
    });
    window.scroll(0, popupTop);
  }
  _functions.openPopup = function(popup){
    $('.popup-content').removeClass('active');
    $(popup + ', .popup-wrapper').addClass('active');
    removeScroll();
  };

	_functions.closePopup = function(){
		$('.popup-wrapper, .popup-content').removeClass('active');
		addScroll();
	};

	_functions.textPopup = function(title, description){
		$('#text-popup .text-popup-title').html(title);
		$('#text-popup .text-popup-description').html(description);
		_functions.openPopup('#text-popup');
	};

	$(document).on('click', '.open-popup', function(e){
		e.preventDefault();
    _functions.openPopup('.popup-content[data-rel="' + $(this).data('rel') +'"]');
	});

	$(document).on('click', '.popup-wrapper .btn-close, .popup-wrapper .layer-close, .popup-wrapper .close-popup', function(e){
		e.preventDefault();
		_functions.closePopup();
	});

  //close popup with ESCAPE key
  $(document).keyup(function(e){
    if (e.keyCode === 27 ){
      _functions.closePopup();
    }
  });

  /*video pop-up*/
  $(document).on('click', '.video-open', function (e) {
    e.preventDefault();
    var video = $(this).attr('href');
    $('.video-popup-container iframe').attr('src', video);
    $('.video-popup').addClass('active');
    $('html').addClass('overflow-hidden');
  });
  $('.video-popup-close, .video-popup-layer').on('click', function (e) {
    $('html').removeClass('overflow-hidden');
    $('.video-popup').removeClass('active');
    $('.video-popup-container iframe').attr('src', 'about:blank');
    e.preventDefault();
  });

  function pageScroll(current,headerHeight){
    if($(window).width() > 991){
      $('html, body').animate({scrollTop: current.offset().top - 90}, 888);
    }
    else{
      $('html, body').animate({scrollTop: current.offset().top - 59}, 777);
    }
  }

  //scroll animation
  function scrollAnime() {
    if ($('.animate-item').length && !is_IE) {
      $('.animate-item').not('.animated').each(function () {
        var th = $(this);
        if ($(window).scrollTop() >= th.offset().top - ($(window).height() * 0.9)) {
          th.addClass('animated');
        }
      });
    }
  }
  scrollAnime();
  $(window).on('scroll', function () {
    scrollAnime();
  });

  //anchor scroll
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 888);
          $('html').removeClass('overflow-menu');
          $('header').removeClass('open-menu');
          $('.mobile-button').removeClass('active');
          return false;
        }
      }
    });
  });

  //accordion
  $(document).on('click', '.accordion-item:not(.edit) .accordion-title', function () {
    var headerHeight = $('header').height(),
        current = $(this);
    if($(this).hasClass('active')){
      $(this).removeClass('active').next().slideUp();
    }
    else {
      $(this).closest('.accordion').find('.accordion-title').not(this).removeClass('active').next().slideUp();
      $(this).addClass('active').next().slideDown();
    }
  });
  
  //cookies-informer
  setTimeout(function(){
    $('.site-ready .cookies-informer').addClass('active');
  }, 4000);
  $(document).on('click', '.cookies-informer .close-cookies', function () {
    $(this).parents('.cookies-informer').removeClass('active');
  });

  // lightbox
  if($('.lightbox').length){
    var lightBoxOptions = {
          disableScroll: false,
          captionSelector: 'self',
          alertErrorMessage: "No image found. Next will be load.",
          history: false,
          captionType: 'data',
          captionsData: 'caption',
          captionPosition: 'outside',
          className: 'simple-lightbox',
          animationSpeed: 200,
          docClose:false,
          heightRatio: 0.7,
          widthRatio: 0.7,
          showCounter: true
        },
        lightboxSelector = $('.lightbox-wrapper'),
        lightboxLength = lightboxSelector.length,
        lightbox = [];

    for(var i=0;i<lightboxLength;i++){
      lightbox[i] = $(lightboxSelector[i]).find('.lightbox').simpleLightbox(lightBoxOptions);
      $(lightboxSelector[i]).find('.lightbox').on('shown.simplelightbox', removeScroll);
      $(lightboxSelector[i]).find('.lightbox').on('close.simplelightbox', addScroll);
    };

    $(document).on('click', '.sl-overlay', function() {
      lightbox[0].close();
    });
  }

  /*scroll to*/
  $(document).on('click', '.scroll-to', function(){
    let thisBlock = $(this).data('scroll-to')
    $("html,body").animate({
      scrollTop: $('.scroll-to-block[data-scroll-block="' + thisBlock + '"]').offset().top
    }, 1000)
  })

  /*subscribe form*/
  $(document).on('change', '.subscribe-form .checkbox-item input', function(){
    if ($(this).is(':checked')){
      $(this).prop('checked', true);
      $(this).closest('.subscribe-form').addClass('check');
    }
    else{
      $(this).prop('checked', false);
      $(this).closest('.subscribe-form').removeClass('check');
    }
  });

  $(document).on('click', '.subscribe-form .subscribe-btn', function(){
    $(this).closest('.subscribe-form').addClass('send');
  });

  //tabs
  $('.tab-title').on('click', function() {
    $(this).parent().toggleClass('active');
  });
  $(document).on('click', '.tab-toggle div', function () {
      var tab = $(this).closest('.tabs').find('.tab');
      var i = $(this).index();
      $(this).addClass('active').siblings().removeClass('active');
      tab.eq(i).siblings('.tab:visible').fadeOut(function() {
        tab.eq(i).fadeIn();
      });
  });

  /*change-cladding*/
  $(document).on('click', '.change-cladding li', function(){
    let thisCladding = $(this).data('cladding');
    $('.cladding-sec .change-image').find('.image').removeClass('active')
    $('.cladding-sec .change-image .image[data-number-img="' + thisCladding + '"]').addClass('active')
  });

});
