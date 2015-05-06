(function()
{
/*------------------------------------------------------------------*/
    /*-- MAIN CAROUSEL --*/
/*------------------------------------------------------------------*/
/*-- Slick --*/
  $('.main_carousel').slick(
  {
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        arrows: false,
        pauseOnHover: true,
        pauseonDotsHover: true,
        swipe: true
  });

/*-- Changing img size according to the window size --*/
  /*-- get all images of the main carousel --*/
  var aImg = document.querySelectorAll('.main_carousel_item img');
  var a;

  for(a=0 ; a<aImg.length ; a++)
  {
      /*-- get the name of each image of the main carousel --*/
      var imgName = aImg[a].src.substring(aImg[a].src.lastIndexOf("/") +1, aImg[a].src.lastIndexOf("."));

      /*-- change the src path of each image of main carousel according to window size --*/
      if($(window).innerWidth() < 768)
      {
          aImg[a].src = 'img/main-carousel/xs/' + imgName + '.jpg';

      }else if($(window).innerWidth() >= 768 && $(window).innerWidth() < 992)
      {
          aImg[a].src = 'img/main-carousel/md/' + imgName + '.jpg';

      }else if($(window).innerWidth() >= 992 && $(window).innerWidth() < 1200)
      {
          aImg[a].src = 'img/main-carousel/lg/' + imgName + '.jpg';

      }else if($(window).innerWidth() >= 1200)
      {
          aImg[a].src = 'img/main-carousel/xlg/' + imgName + '.jpg';
      }else if(window.devicePixelRatio >= 2)
      {
          aImg[a].src = 'img/main-carousel/retina/' + imgName + '.jpg';
      }
  }





 /*------------------------------------------------------------------*/
    /*-- SPONSORS' CAROUSEL --*/
 /*------------------------------------------------------------------*/
 /*-- Slick --*/
  $('.sponsors_carousel').slick(
  {
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 7000,
      infinite: true,
      dots: false,
      pauseOnHover: true,
      pauseonDotsHover: true,
      swipe: true,
      responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            variableWidth: false
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    }
                  ]
  });


/*-- To make block with sponsor's name the same size as logo --*/
  var imgWidth    = $('.sponsors_carousel div img').css('width');
  var imgHeight   = $('.sponsors_carousel div img').css('height');

  $('.sponsors_carousel div div').css('width', imgWidth);
  $('.sponsors_carousel div div').css('height', imgHeight);


/*-- To show sponsor's name on thumb hover --*/
  $('.sponsors_carousel div img').on({
      mouseenter: function()
      {
          $(this).prev().toggleClass('hidden', false);
      },
      mouseleave: function()
      {
          $(this).prev().toggleClass('hidden', true);
      }
  });
})();