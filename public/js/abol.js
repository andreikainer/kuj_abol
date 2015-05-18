/*------------------------------------------------------------------*/
    /*-- Body resize --*/
/*------------------------------------------------------------------*/
$(window).resize(function() {
    $('body').height($(window).height());
});

$(window).trigger('resize');


/*------------------------------------------------------------------*/
    /*-- SMOOTH SCROLL --*/
/*------------------------------------------------------------------*/
//https://github.com/cferdinandi/smooth-scroll#how-to-contribute - here you may find compiled and production-ready code.
smoothScroll.init({
    speed: 500,                 // How fast to complete the scroll in milliseconds
    easing: 'easeInOutQuint'    // Easing pattern to use
});