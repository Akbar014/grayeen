jQuery(function ($) {

  "use strict";

  //subscribe thank message
  jQuery(document).ajaxComplete(function (event, xhr, settings) {
    if (settings.data == 'action=increase_submission_count&form_id=1') {
      $('.thank-text').addClass('show');
      setTimeout(function () {
        $('.thank-text').removeClass('show');
      }, 5000);
    }
  });

  //set cookies
  $.cookie('cookies', 'yes', {expires: 30 });


  /*change-cladding*/
  $(document).on('click', '.change-cladding .accordion-item', function(){
    let thisCladding = $(this).data('cladding');
    $('.cladding-sec .change-image').find('.image').removeClass('active')
    $('.cladding-sec .change-image .image[data-number-img="' + thisCladding + '"]').addClass('active')
  });


  // change Accordion Item
  function changeAccordionItem() {
    const nodes = $('.room-models-sec .accordion-title')
    const nodesImg = $('.room-models-sec .image')
    let activeElementIdx = nodes.index()
    let activeElementIdxImg = nodesImg.index()
    let elem = nodes[activeElementIdx]
    let elemImg = nodesImg[activeElementIdxImg]
    let activeElem = $(elem).addClass('active');
    let activeElemImg = $(elemImg).addClass('active');


    // if (interVal != undefined) {
    //   console.log(interVal)
    // }
    //
    //
    // console.log(interVal)
    let interVal = setInterval(function(){

      if(nodes.hasClass('active')){
        nodes.removeClass('active').next().slideUp();
      }

      activeElem = $(elem).removeClass('active');
      activeElemImg = $(elemImg).removeClass('active');
      activeElementIdx += 1
      activeElementIdxImg += 1
      if (activeElementIdx == nodes.length & activeElementIdxImg == nodes.length) {
        activeElementIdx = 0
        activeElementIdxImg = 0
      }

      elem = nodes[activeElementIdx]
      elemImg = nodesImg[activeElementIdxImg]
      activeElem = $(elem).addClass('active')
      activeElemImg = $(elemImg).addClass('active');
      activeElem.next().slideDown();

    }, 10000)

  }
  changeAccordionItem()

  // ective menu
  if($('body').hasClass('tax-products') || $('body').hasClass('single-product') || $('body').hasClass('post-type-archive')){
    console.log(123);
    $('nav li').addClass('current-menu-item');
  }

  //drop-down-menu
  $(document).on('click', '.toggle-block .drop-down-studios', function () {
    // e.preventDefault();
    var headerHeight = $('header').height(),
        current = $(this);
    if ($(this).hasClass('active')){
      $(this).removeClass('active')
    } else {
      $(this).addClass('active')
    }

    if($(this).find('.sub-menu').hasClass('active')){
      // $(this).find('.sub-menu').removeClass('active').slideUp();
      $(this).find('.sub-menu').removeClass('active')
    }
    else {
      // $(this).find('.sub-menu').addClass('active').slideDown();
      $(this).find('.sub-menu').addClass('active')
    }
  });

  $(document).on('click', 'main', function () {
    if($('.toggle-block  .drop-down-studios').hasClass('active')){
      $('.toggle-block  .drop-down-studios').removeClass('active')
    }
    if($('.toggle-block .drop-down-studios').find('.sub-menu').hasClass('active')){
      $('.toggle-block .drop-down-studios').find('.sub-menu').removeClass('active')
    }
  });



  $('.nav-wrapp-mobile .drop-down-studios').scroll(function(){
    let containerSubMenu = $('.nav-wrapp-mobile .drop-down-studios');
    let containerSubMenuBtnR = $('.nav-wrapp-mobile .btn-sub-menu-right');
    let containerSubMenuBtnL =  $('.nav-wrapp-mobile .btn-sub-menu-left');
    if (containerSubMenu.scrollLeft() > 0) {
      containerSubMenuBtnL.addClass('active')
      // console.log('L add active')
    } else {containerSubMenuBtnL.removeClass('active')
      // console.log('L remove active')
    }

    if (containerSubMenu.scrollLeft() > containerSubMenu.width() + 300) {
      containerSubMenuBtnR.removeClass('active')
      // console.log('R remove active')
    } else {containerSubMenuBtnR.addClass('active')
      // console.log('R add active')
    }
  });


  function slide(direction){
    var container = $('.nav-wrapp-mobile .drop-down-studios');
    // console.log(container)
    var scrollCompleted = 0;
    var s = container.scrollLeft();
     // console.log(s)
    // console.log(container.width())

    var slideVar = setInterval(function(){

      if(direction == 'left'){
        container.scrollLeft(s += 10);
        // console.log('left')
        // console.log(interval)
      } else {
        container.scrollLeft( s -= 10);
        // console.log('right')
        // console.log(interval)
      }
      scrollCompleted += 10;
      if(scrollCompleted >= 200){
        window.clearInterval(slideVar);
        // console.log('clearInterval')
      }
    }, 10);
  }

  $('.nav-wrapp-mobile .btn-sub-menu-right').on('click', function(){
    slide('left')
  })

  $('.nav-wrapp-mobile .btn-sub-menu-left').on('click', function(){
    slide('right')
  })




  /*$(document).on('click', '.room-models-sec .accordion-title', function () {
    // let interVal = ''
    // if (interVal == true) {
    //   clearInterval(interVal);
    // }
    // clearInterval(interVal);
    console.log(interVal)
    clearInterval(interVal);
    console.log(interVal)
    changeAccordionItem()

  });*/


});