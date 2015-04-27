/*
 * jQuery Tiny Pub/Sub
 * https://github.com/cowboy/jquery-tiny-pubsub
 *
 * Copyright (c) 2013 "Cowboy" Ben Alman
 * Licensed under the MIT license.
 */

(function($) {

    var o = $({});

    $.subscribe = function() {
        o.on.apply(o, arguments);
    };

    $.unsubscribe = function() {
        o.off.apply(o, arguments);
    };

    $.publish = function() {
        o.trigger.apply(o, arguments);
    };

}(jQuery));
$(document).ready(function()
{

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
    $('.language-toggle').on("click", function()
    {
        if($(this).hasClass('de'))
        {
            $(this).toggleClass('de', false).toggleClass('gb', true);
        }else{
            $(this).toggleClass('de', true).toggleClass('gb', false);
        }
    });




/*------------------------------------------------------------------*/
    /*-- FUNCTIONS --*/
/*------------------------------------------------------------------*/
/*
 * changeCircleBtnGroupAlignment
 * changes the grid layout components of a group of circle buttons (search_btn, help_btn, lang_btn)
 */
    function changeCircleBtnGroupAlignment()
    {
        $('.circles').toggleClass('col-sm-4', false)
            .toggleClass('col-sm-push-5', false)
            .toggleClass('col-sm-3', true)
            .toggleClass('col-sm-push-6', true);
    }

/*
 * changeRightBtnGroupAlignment
 * changes the grid layout components of right group of buttons in the header
 */
    function changeRightBtnGroupAlignment()
    {
        $('.circles div div').toggleClass('alignme-center', false);
    }











/*------------------------------------------------------------------*/
    /*-- CODE --*/
/*------------------------------------------------------------------*/
    if($(window).innerWidth() > 887 && $(window).innerWidth() < 992)
    {
        changeCircleBtnGroupAlignment();
    }else if($(window).innerWidth() >= 1475)
    {
        changeRightBtnGroupAlignment();
    }

});
//# sourceMappingURL=main.js.map