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
    /*-- LOGIN OPTION --*/
/*------------------------------------------------------------------*/
// when Login Button pressed, show/hide login module
    $('.login').on("click", function(e)
    {
        e.stopPropagation();
        slideModule($(this));
    });

    /**
     * Send the CSRF token with every AJAX request.
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*-- Messages Object --*/
    var errorMessages = {
        'en' : {
            'required'  : 'This field is required.',
            'minLength' : function(limit)
            {
                return 'This field must contain at least '+limit+' characters';
            }
        },
        'de' : {
            'required'  : 'Dieses Feld ist erforderlich',
            'minLength' : function(limit)
            {
                return 'Diese Feld muss mindestens '+limit+' Charaktere enthalten';
            }
        }
    };


    /*-- Functions --*/
    function showErrorMessage(name, message)
    {
        $('.form-error[data-error="'+name+'"]').html(message).fadeIn();
    }

    function hideErrorMessage(name)
    {
        $('.form-error[data-error*="'+name+'"]').fadeOut();
        $('.form-error[data-error*="'+name+'"]').prev().find('input').toggleClass('error-red-top', false);
    }

    // to make the top-border of input field red color when there is an error
    function redTopInput(input)
    {
        input.toggleClass('error-red-top', true);
        console.log('red');
    }


    /*-- Publish Events --*/
    // Form Field blur events.
    $('input[name="username"]').on('blur', function()
    {
        $.publish('username.blur', this);
    });

    $('input[name="password"]').on('blur', function()
    {
        $.publish('password.blur', this);
    });

    // Form Validation Events.
    $.subscribe('username.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            redTopInput(data);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('password.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            redTopInput(data);
            return false;
        }
        if (! FormValidation.checkMinLength(data.value, 6)) {
            showErrorMessage(name, errorMessages[window.locale].minLength(6));
            redTopInput(data);
            return false;
        }

        hideErrorMessage(name);
    });

    $('form[data-remote]').on("submit", function(e)
    {
        var form 	= $(this);
    // check for method, if not defined, use POST
        var method	= form.find('input[name="_method"]').val() || 'POST';
    // where to submit the form => get the current url
        var url		= window.location.href;


        $.ajax(
            {
                type:		method,
                url:		url,
                data:		form.serialize(),
                dataType:	'json',
            success: 	function(data)
            {
            // on success point give the user a feedback message on a popup modal
                //giveFeedback(form);
                console.log('data');
            },
            error:		function(data)
            {
                // get the errors response data
                var errors = data.responseJSON;
                console.log(errors);
                // now render the errors with js
                //var errorsHTML = '';
                //$.each(errors, function(key, value)
                //{
                //    errorsHTML = '<li>' + value[0] + '</li>';
                //});
            // append those <li> to a <div class=”form_errors”></div> inside the form
            $('.form_errors').html(errorsHTML);
        }
        }).done(function(data)
        {
            console.log('done');
        }).fail(function(data)
        {
            console.log('fail');
        });

        e.preventDefault();
        return false;
    });



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

    var langBtnArray = Array.prototype.slice.call(document.querySelectorAll('.flag'));

        langBtnArray[1].addClass('at');
        langBtnArray[2].addClass('gb');


/*
 * check what land flag is displaying
 * toggle the flag on a press button event
 */
    $('.language-toggle').on("click", function(e)
    {
        //window.locale;

        //if(window.locale === 'de')
        //{
        //    console.log('pipa');
        //    window.locale = 'en';
        //    //getLocale();
        //}else{
        //    console.log('pepa');
        //    window.locale = 'de';
        //    //getLocale();
        //}
        //if($(this).hasClass('at'))
        //{
        //    $(this).toggleClass('at', false).toggleClass('gb', true);
        //    getLocale('en');
        //    console.log (window.locale);
        //}else{
        //    $(this).toggleClass('at', true).toggleClass('gb', false);
        //    getLocale();
        //    console.log (window.locale);
        //}

    // set the global variable 'locale' to the user's selected language
        //console.log (window.locale);

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
/* ========================================================================
 * Bootstrap: alert.js v3.3.2
 * http://getbootstrap.com/javascript/#alerts
 * ========================================================================
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // ALERT CLASS DEFINITION
  // ======================

  var dismiss = '[data-dismiss="alert"]'
  var Alert   = function (el) {
    $(el).on('click', dismiss, this.close)
  }

  Alert.VERSION = '3.3.2'

  Alert.TRANSITION_DURATION = 150

  Alert.prototype.close = function (e) {
    var $this    = $(this)
    var selector = $this.attr('data-target')

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }

    var $parent = $(selector)

    if (e) e.preventDefault()

    if (!$parent.length) {
      $parent = $this.closest('.alert')
    }

    $parent.trigger(e = $.Event('close.bs.alert'))

    if (e.isDefaultPrevented()) return

    $parent.removeClass('in')

    function removeElement() {
      // detach from parent, fire event then clean up data
      $parent.detach().trigger('closed.bs.alert').remove()
    }

    $.support.transition && $parent.hasClass('fade') ?
      $parent
        .one('bsTransitionEnd', removeElement)
        .emulateTransitionEnd(Alert.TRANSITION_DURATION) :
      removeElement()
  }


  // ALERT PLUGIN DEFINITION
  // =======================

  function Plugin(option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.alert')

      if (!data) $this.data('bs.alert', (data = new Alert(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  var old = $.fn.alert

  $.fn.alert             = Plugin
  $.fn.alert.Constructor = Alert


  // ALERT NO CONFLICT
  // =================

  $.fn.alert.noConflict = function () {
    $.fn.alert = old
    return this
  }


  // ALERT DATA-API
  // ==============

  $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)

}(jQuery);

//# sourceMappingURL=main.js.map