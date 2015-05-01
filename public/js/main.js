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
    // Store the user's current language to `locale`.
    window.locale;
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




<<<<<<< HEAD

/*------------------------------------------------------------------*/
  /*-- LANGUAGE CHANGE BUTTON --*/
/*------------------------------------------------------------------*/
/*
 * check what land flag is displaying
 * toggle the flag on a press button event
 */
    $('.language-toggle').on("click", function()
    {
        if($(this).hasClass('at'))
        {
            $(this).toggleClass('at', false).toggleClass('gb', true);
        }else{
            $(this).toggleClass('at', true).toggleClass('gb', false);
        }

        // Set the global variable `locale` to the user's selected language.
        getLocale();

    });




=======
>>>>>>> 2bddc2910e5293ed99eea1963e64524bbccf2b81
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


<<<<<<< HEAD
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
=======

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
    $('.question').on("click", function(e)
    {
        e.stopPropagation();
        slideModule($(this));
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




>>>>>>> 2bddc2910e5293ed99eea1963e64524bbccf2b81








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
/*------------------------------------------------------------------*/
/*-- COUNTDOWN --*/
/*------------------------------------------------------------------*/

var GKCounter = new Class({
    final: null,
    element: null,
    finalText: '',
    dcount: null,
    hcount: null,
    mcount: null,
    scount: null,
    tempDays: 0,
    tempHours: 0,
    tempMins: 0,
    tempSecs: 0,

    initialize: function(el) {
        // set the element handler
        this.element = el;
        // get the date and time
        var dateEnd = this.element.get('data-date');
        var timeEnd = this.element.get('data-time');
        this.finalText = this.element.get('data-final');
        // parse the date and time
        dateEnd = dateEnd.split('-');
        timeEnd = timeEnd.split(':');
        // get the timezone of the date
        var dateTimezone = -1 * parseInt(this.element.get('data-timezone'), 10) * 60;
        // calculate the final date timestamp
        this.final = Date.UTC(dateEnd[2], (dateEnd[1] * 1) - 1, dateEnd[0], timeEnd[0], timeEnd[1]);
        //
        // calculate the final date according to user timezone
        //
        // - get the user timezone
        var tempd = new Date();
        var userTimezone = tempd.getTimezoneOffset();
        var newTimezoneOffset = 0;
        // if the timezones are equal - do nothing, in the other case we need calculations:
        if(dateTimezone !== userTimezone) {
            newTimezoneOffset = userTimezone - dateTimezone;
            // calculate new timezone offset to miliseconds
            newTimezoneOffset = newTimezoneOffset * 60 * 1000;
        }
        // calculate the new final time according to time offset
        this.final = this.final + newTimezoneOffset;

        //
        // So now we know the final time - let's calculate the base time for the counter:
        //

        // create the new date object
        var d = new Date();
        // calculate the current date timestamp
        var current = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds());

        //
        // calculate the difference between the dates
        //
        var diff = this.final - current;

        // if the difference is smaller than 3 seconds - then the counting was ended
        if(diff < 30 * 1000 || diff < 0) {
            this.element.set('html', '');
            this.countingEnded();
        } else {
            // in other case - let's calculate the difference in the days, hours, minutes and seconds
            var leftDays = 0;
            var leftHours = 0;
            var leftMinutes = 0;
            var leftSeconds = 0;

            leftDays = Math.floor((1.0 * diff) / (24 * 60 * 60 * 1000));

            var tempDiff = diff - (leftDays * 24 * 60 * 60 * 1000);
            leftHours = Math.floor(tempDiff / (60 * 60 * 1000));
            tempDiff = tempDiff - (leftHours * 60 * 60 * 1000);
            leftMinutes = Math.floor(tempDiff / (60 * 1000));
            tempDiff = tempDiff - (leftMinutes * 60 * 1000);
            leftSeconds = Math.floor(tempDiff / 1000);
            // set the counter handlers
            this.dcount = document.id('countdown-days');
            this.hcount = document.id('countdown-hours');
            this.mcount = document.id('countdown-minutes');
            this.scount = document.id('countdown-seconds');
            // run the initial animation
            this.tick();
        }
    },

    // function used to tick the counter ;-)
    tick: function() {
        // create the new date object
        var d = new Date();
        // calculate the current date timestamp
        var current = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds());
        //
        // calculate the difference between the dates
        //
        var diff = this.final - current;

        // if the difference is smaller than 1 second - then the counting was ended
        if(diff < 1 * 1000) {
            this.countingEnded();
        } else {
            // in other case - let's calculate the difference in the days, hours, minutes and seconds
            var leftDays = 0;
            var leftHours = 0;
            var leftMinutes = 0;
            var leftSeconds = 0;

            leftDays = Math.floor((1.0 * diff) / (24 * 60 * 60 * 1000));
            var tempDiff = diff - (leftDays * 24 * 60 * 60 * 1000);
            leftHours = Math.floor(tempDiff / (60 * 60 * 1000));
            tempDiff = tempDiff - (leftHours * 60 * 60 * 1000);
            leftMinutes = Math.floor(tempDiff / (60 * 1000));
            tempDiff = tempDiff - (leftMinutes * 60 * 1000);
            leftSeconds = Math.floor(tempDiff / 1000);

            this.dcount.set('text', ((leftDays < 10) ? '0' : '') + leftDays);
            this.hcount.set('text', ((leftHours < 10) ? '0' : '') + leftHours)
            this.mcount.set('text', ((leftMinutes < 10) ? '0' : '') + leftMinutes)
            this.scount.set('text', ((leftSeconds < 10) ? '0' : '') + leftSeconds);

            var $this = this;

            setTimeout(function() {
                $this.tick();
            }, 1000);
        }
    },

    // function used when the time is up ;-)
    countingEnded: function() {
        // set the H3 element with the final text
        this.element.set('html', '<h2>' + this.finalText + '</h2>');
    }
});

new GKCounter(document.id('countdown'));

/*------------------------------------------------------------------*/
/*-- PROGRESS BAR --*/
/*------------------------------------------------------------------*/

$( document ).click(function() {
    $( "#progress-bar" ).fadeIn(1000);
});


//# sourceMappingURL=main.js.map