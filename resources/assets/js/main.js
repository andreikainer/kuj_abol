$(document).ready(function()
{
<<<<<<< HEAD
// store the user's current language to 'locale'
    //window.locale;
=======
    // Store the user's current language to `locale`.
    window.locale;
>>>>>>> master
    getLocale();

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


    function getLocale()
    {
        $.ajax({
            url : '/get-locale',
            method : 'GET',
            success : function(response)
            {
                window.locale = response;
            },
            error : function(response)
            {
                window.locale = 'de';
            }
        });
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
        //$('input[name = search_inputfield]').on('input', function() {
        //    console.log($(this).val());
        //});
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
    /*-- HELP OPTION --*/
/*------------------------------------------------------------------*/
// when Question Button pressed, show/hide search module
//    $('.question').on("click", function(e)
//    {
//        e.stopPropagation();
//        slideModule($(this));
//    });




/*------------------------------------------------------------------*/
  /*-- LANGUAGE CHANGE OPTION --*/
/*------------------------------------------------------------------*/
function getLocale(response)
{
    $.ajax({
        url:        '/get-locale',
        method:     'GET',
        success:    function(response)
        {
            window.locale = response;
        },
        error:      function(response)
        {
            window.locale = 'de';
        }
    });
}


/*
 * check what land flag is displaying
 * toggle the flag on a press button event
 */
    $('.language-toggle').on("click", function(e)
    {

        if($(this).hasClass('at'))
        {
            $(this).toggleClass('at', false).toggleClass('gb', true);
            getLocale('en');
        }else{
            $(this).toggleClass('at', true).toggleClass('gb', false);
            getLocale('de');
        }

<<<<<<< HEAD
    // set the global variable 'locale' to the user's selected language
        //getLocale();
=======
        // Set the global variable `locale` to the user's selected language.
        getLocale();

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
>>>>>>> master
    });










<<<<<<< HEAD
=======

>>>>>>> master
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