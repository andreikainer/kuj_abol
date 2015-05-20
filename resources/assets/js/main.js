/*-- Functions for FormValidation --*/
    function showErrorMessage(name, message)
    {
        $('.form-error[data-error="'+name+'"]').html(message).fadeIn();
        $('.form-error[data-error*="'+name+'"]').prev().find('input').toggleClass('error-red-top', true);
    }

    function hideErrorMessage(name)
    {
        $('.form-error[data-error*="'+name+'"]').fadeOut();
        $('.form-error[data-error*="'+name+'"]').prev().find('input').toggleClass('error-red-top', false);
    }

$(document).ready(function()
{
    // Store the user's current language to `locale`.
    window.locale;



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
    /*-- GET RID OF WHITE SPACE AFTER FOOTER FOR PAGES WITH NOT MUCH CONTENT --*/
/*------------------------------------------------------------------*/
    var body_height = $('.content').height();
    var window_height = $(window).height();

    if (body_height < window_height) {

        $('.content').css('height', window_height);
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


/*-----Functions for modules ---------------------------------------*/

/*
 * closeModule
 * hides the search module
 */
    function closeModule()
    {
        $('.module').slideUp(400);
    }

 /*
  * slideModule
  * @param btn; obj; button, that was pressed
  * shows/hides the module
  */
    function slideModule(btn)
    {
        $(btn.attr('data-target')).slideToggle(400);
    }

// when user clicks somewhere outside search module, hide search module
    $('html').on("click", function()
    {
        closeModule();
    });
// when user clicks Close Button, hide the module
    $('.module i').on("click", function(e)
    {
        closeModule();
    });
// when clicked inside module, don't hide it
    $('.module').on("click", function(e)
    {
        e.stopPropagation();
    });
/*------------------------------------------------------------------*/



/*------------------------------------------------------------------*/
    /*-- SEARCH OPTION --*/
/*------------------------------------------------------------------*/
// when Magnifier Button pressed, show/hide search module
    $('.magnifier').on("click", function(e)
    {
        e.stopPropagation();
        slideModule($(this));
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