$(document).ready(function(){
    console.log('pipa');

    /*------------------------------------------------------------------*/
    /*-- BACKUPS --*/
    /*------------------------------------------------------------------*/

    /*-- Opera MIni Backup -----------------------------------------------*/
    var isOperaMini = (navigator.userAgent.indexOf('Opera Mini') > -1);
    if (isOperaMini)
    {
        $('#operamini').show();
    }




    /*------------------------------------------------------------------*/
    /*-- SMOOTH SCROLL --*/
    /*------------------------------------------------------------------*/
//https://github.com/cferdinandi/smooth-scroll#how-to-contribute - here you may find compiled and production-ready code.
//    smoothScroll.init({
//        speed: 500, // How fast to complete the scroll in milliseconds
//        easing: 'easeInOutQuint', // Easing pattern to use
//    });





    /*------------------------------------------------------------------*/
    /*-- LANGUAGE CHANGE BUTTON --*/
    /*------------------------------------------------------------------*/
    /*
     * check what land flag is displaying
     * toggle the flag on a press button event
     */
    $('#language-toggle').on("click", function()
    {
        if($(this).hasClass('de'))
        {
            $(this).toggleClass('de', false).toggleClass('gb', true);
        }else{
            $(this).toggleClass('de', true).toggleClass('gb', false);
        }
    });



    //$('.main_carousel').slick(
    //    {
    //        dots: true,
    //        infinite: true,
    //        speed: 500,
    //        fade: true,
    //        cssEase: 'linear',
    //        autoplay: true,
    //        //pauseOnHover: true,
    //        //pauseonDotsHover: true,
    //        swipe: true
    //    });

    /*
     * changeCircleBtnGroupAlignment
     * changes the grid layout components of a group of circle buttons (search_btn, help_btn, lang_btn)
     */
    function changeCircleBtnGroupAlignment()
    {
        console.log('polo');
        $('.circles').toggleClass('col-sm-4', false)
            .toggleClass('col-sm-push-5', false)
            .toggleClass('col-sm-3', true)
            .toggleClass('col-sm-push-6', true);
    }

    if($(window).innerWidth() > 887 && $(window).innerWidth() < 992)
    {
        console.log('marko');
        changeCircleBtnGroupAlignment();
    }
});