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
    smoothScroll.init({
        speed: 500,                 // How fast to complete the scroll in milliseconds
        easing: 'easeInOutQuint'    // Easing pattern to use
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

/*
 * closeSearchModule
 * hides the search module
 */
    function closeSearchModule()
    {
        $('#search_module').slideUp(400);
    }

    function slideModule(btn)
    {
        $(btn.attr('data-target')).slideToggle(400);
    }




/*------------------------------------------------------------------*/
    /*-- SEARCH OPTION --*/
/*------------------------------------------------------------------*/
// when Magnifier Button pressed, show/hide search module
    $('.magnifier').on("click", function(e)
    {
        e.stopPropagation();
        slideModule($(this));
        //$($(this).attr('data-target')).slideToggle(400);
    });
// when user clicks somewhere outside search module, hide search module
    $('html').on("click", function()
    {
        closeSearchModule();
    });
// when user clicks Close Button, hide search module
    $('#search_module i').on("click", function(e)
    {
        closeSearchModule();
    });
// when clicked inside search module, don't hide it
    $('#search_module').on("click", function(e)
    {
        e.stopPropagation();
        $('input[name = search_inputfield]').on('input', function() {
            console.log($(this).val());
        });
    });






/*------------------------------------------------------------------*/
  /*-- LANGUAGE CHANGE OPTION --*/
/*------------------------------------------------------------------*/
/*
 * check what land flag is displaying
 * toggle the flag on a press button event
 */
    $('.language-toggle').on("click", function(e)
    {

        //if(lang_changed === true)
        //{
        //    lang_changed = false;
        //    return;
        //}
        //
        //e.preventDefault();
        //
        //if($('.currLang').text() === 'de')
        //{
        //    $(this).attr('href', 'http://kuj.dev/en');
        //    alert($(this).attr('href'));
        //    lang_changed = true;
        //}else{
        //    $(this).attr('href', 'http://kuj.dev/de');
        //    alert($(this).attr('href'));
        //    lang_changed = true;
        //}
        //
        //$(this).trigger("click");


        if($(this).hasClass('at'))
        {
            $(this).toggleClass('at', false).toggleClass('gb', true);
        }else{
            $(this).toggleClass('at', true).toggleClass('gb', false);
        }

        //e.preventDefault();
        ////console.log(window.location.href.substring(window.location.href.indexOf("/", window.location.href.indexOf("/", window.location.href.indexOf("/") +1))));
        //
        //var currUrl = window.location.href;
        //currUrl = currUrl.split("/");
        //console.log(currUrl[3]);
        //
        //if(currUrl[3] === 'de')
        //{
        //    currUrl[3] = 'en';
        //    var newUrl = currUrl.join('/');
        //
        //    //$(this).toggleClass('at', false).toggleClass('gb', true);
        //    //console.log(newUrl);
        //    $(location).attr('href', newUrl);
        //}

        //if($(this).hasClass('at'))
        //{
        //    $(this).toggleClass('hidden', true);
        //    console.log($('gb'));
        //    $('.gb').toggleClass('hidden', false);
        //}else{
        //    $(this).toggleClass('hidden', false);
        //    $('.gb').toggleClass('hidden', true);
        //}
    });












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