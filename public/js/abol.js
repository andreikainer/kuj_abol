/*------------------------------------------------------------------*/
    /*-- SMOOTH SCROLL --*/
/*------------------------------------------------------------------*/
// To show/hide "scroll to top" btn
//$('.scrollToTop').style.display = 'none';

window.onscroll=function()
{
    if(window.pageYOffset >= 300) //if window was scrolled down to >=400px, show Back-to-top_btn
    {
        console.log('hey');
        $('.scrollToTop').toggleClass('hidden', false);
    }else{
        console.log('buy');
        $('.scrollToTop').toggleClass('hidden', true);
    }
};

//https://github.com/cferdinandi/smooth-scroll#how-to-contribute - here you may find compiled and production-ready code.
smoothScroll.init({
    speed: 500,                 // How fast to complete the scroll in milliseconds
    easing: 'easeInOutQuint'    // Easing pattern to use
});