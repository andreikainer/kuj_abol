(function()
{
    var errorMessages = {
        'en' : {
            'disabled' : 'Please name your project, and click "Start Project" to enable form.',
            'required' : 'This field is required.',
            'alphaNumeric' : 'Must contain letters and numbers only. And not begin with a space.',
            'numOnly' : 'Must contain numbers only. And not begin with a space.',
            'alphaOnly' : 'Must contain letters only. And not begin with a space.',
            'email' : 'Must be of a correct email format. And not begin with a space.',
            'phone' : 'Must be of a correct telephone number format. And not begin with a space.',
            'image' : 'Please choose a valid image format.',
            'document' : 'We accept JPG, JPEG, PNG, BMP, TIFF, and PDF formats.',
            'maxLength' : function(limit)
            {
                return 'This field must not exceed '+limit+' characters';
            },
            'minLength' : function(required)
            {
                return 'This field must be at least '+required+' characters';
            },
            'charRemaining' : 'characters remaining'
        },
        'de' : {
            'disabled' : 'Bitte geben Sie Ihrem Projekt einen Titel unter der "Start"-Leiste.',
            'required' : 'Dieses Feld darf nicht leer sein.',
            'alphaNumeric' : 'Darf nur Buchstaben und Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Darf nur Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'alphaOnly' : 'Darf nur Buchstaben enthalten und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Bitte geben Sie eine gültige E-Mail Adresse an und vermeiden Sie Leerzeichen.',
            'phone' : 'Dieses Feld muss in einem korrekten Telefonnummer Format sein und darf keine Leerzeichen enthalten.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'document' : 'Format: JPG, JPEG, PNG, BMP, TIFF und PDF.',
            'maxLength' : function(limit)
            {
                return 'Dieses Feld darf '+limit+' Zeichen nicht überschreiten.';
            },
            'minLength' : function(required)
            {
                return 'Dieses Feld muss mindestens '+required+' Zeichen enthalten.';
            },
            'charRemaining' : 'freie Zeichen'
        }
    };

    /*------------------------------------------------------------------*/
    /*-- SHARE VIA EMAIL --*/
    /*------------------------------------------------------------------*/
    // Validation
    $('#emailModal input[name="sender_name"]').on('blur', function()
    {
        $.publish('sender-name.blur', this);
    });
    $('#emailModal input[name="sender_email"]').on('blur', function()
    {
        $.publish('sender-email.blur', this);
    });
    $('#emailModal input[name="friend_name"]').on('blur', function()
    {
        $.publish('friend-name.blur', this);
    });
    $('#emailModal input[name="friend_email"]').on('blur', function()
    {
        $.publish('friend-email.blur', this);
    });

    // Submit
    $('#emailModal input[type="submit"]').on('click', function(event)
    {
        event.preventDefault();
        var form = $('#emailModal form');
        $.publish('form.submit', form);
    });

    // Validation
    $.subscribe('sender-name.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if(! FormValidation.checkNotEmpty(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if(! FormValidation.checkAlphaOnly(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
            return false;
        }

        hideErrorMessage(name);
        removeFailClass(data);
    });

    $.subscribe('sender-email.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if(! FormValidation.checkNotEmpty(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if(! FormValidation.checkValidEmail(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].email);
            return false;
        }

        hideErrorMessage(name);
        removeFailClass(data);
    });

    $.subscribe('friend-name.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if(! FormValidation.checkNotEmpty(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if(! FormValidation.checkAlphaOnly(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
            return false;
        }

        hideErrorMessage(name);
        removeFailClass(data);
    });

    $.subscribe('friend-email.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if(! FormValidation.checkNotEmpty(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if(! FormValidation.checkValidEmail(data.value))
        {
            addFailClass(data);
            showErrorMessage(name, errorMessages[window.locale].email);
            return false;
        }

        hideErrorMessage(name);
        removeFailClass(data);
    });

    // Submit
    $.subscribe('form.submit', function(event, data)
    {
        var formData = $(data).serialize();

        $.ajax({
            'url' : $(data).attr('action'),
            'method' : 'POST',
            'data' : formData,
            'dataType' : 'json',
            'success' : function(response)
            {
                if(response.errors)
                {
                    $.publish('email-share.fail', response);
                    return false;
                }

                $.publish('email-share.success', response);
            },
            'error' : function(response)
            {
                $.publish('email-share.error', response);
            }
        });
    });

    $.subscribe('email-share.success', function(event, url)
    {
        window.location = url;
    });

    $.subscribe('email-share.fail', function(event, data)
    {
        var inputFields = $('#emailModal input');

        // Locate each form field with an error.
        // Add an error CSS class, and display its error message.
        $.each(data.errors, function(name, message)
        {
            inputFields.filter('#'+name).addClass('form-input-error');
            showErrorMessage(name, message);
        });
    });

    $.subscribe('email-share.error', function(event, response)
    {
        console.log(response);
    });

    /*------------------------------------------------------------------*/
    /*-- FACEBOOK SDK IMPORT --*/
    /*------------------------------------------------------------------*/

    window.fbAsyncInit = function()
    {
        FB.init
        ({
            appId      : '408944689289995',
            xfbml      : true,
            version    : 'v2.3'
        });
    };

    (function(d, s, id)
    {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/de_DE/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    /*------------------------------------------------------------------*/
    /*-- PROJECT GALLERY --*/
    /*------------------------------------------------------------------*/

    if(window.innerWidth >= 768)
    {
      $('.project-gallery').slick(
        {
            dots: true,
            accessibillity: true,
            infinite: true,
            centerMode: true,
            respondTo: 'slider',
            speed: 500,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            arrows: true,
            pauseOnHover: false,
            pauseonDotsHover: true,
            swipe: true
        });
    }else
    {

        $('.project-gallery').slick(
            {
                dots: false,
                accessibillity: true,
                infinite: true,
                centerMode: true,
                respondTo: 'window',
                mobileFirst: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                arrows: true,
                swipe: true
            });
      }


    /*-- Changing img size according to the window size --*/
    /*-- get all images --*/
    var aImg = document.querySelectorAll('.project-gallery-item img');
    var a;

    for(a=0 ; a<aImg.length ; a++)
    {
        /*-- change the src path of each image in the project gallery according to window size --*/
        if(window.innerWidth < 768)
        {

            aImg[a].src = aImg[a].src.replace("medium", "small");

        }else if(window.innerWidth >= 1400)
        {
            aImg[a].src = aImg[a].src.replace("medium", "large");

        }
    }

    /*------------------------------------------------------------------*/
    /*-- PROGRESS BAR --*/
    /*------------------------------------------------------------------*/

    var amountRaised = document.getElementById('amount_raised').dataset.amountRaised;

    var minimumGoal = document.getElementById('minimum_goal').dataset.minimumGoal;

    var percentage = Math.round(amountRaised/minimumGoal * 100);

    //set the green width of the progress bar and display the %
    if(percentage > 100){
        document.getElementById('progress-bar').style.width = 100 + '%';
    }else{
        document.getElementById('progress-bar').style.width = percentage + '%';
    }

    document.getElementById('progress-bar').firstChild.innerHTML = percentage + '%';

    var options = {
    useEasing : true,
    useGrouping : false,
    suffix : '%'
    };


    var numAnim = new countUp("stat-count", 0, percentage, 0, 5, options);
    numAnim.start();

    //var anotherAnim = new countUp("amount_raised", 0, amountRaised, 0, 5, options);
    //anotherAnim.start();

/*------------------------------------------------------------------*/
/*-- SPONSORS' CAROUSEL --*/
/*------------------------------------------------------------------*/
/*-- Slick --*/
$('.sponsors_carousel').slick(
    {
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        dots: false,
        pauseOnHover: true,
        pauseonDotsHover: true,
        swipe: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
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

$('.logo-name').css('width', imgWidth);
$('.logo-name').css('height', imgHeight);


/*-- To show sponsor's name on thumb hover --*/
$('.form-element').parent().on({
    mouseenter: function()
    {
        $(this).find('.logo-name').toggleClass('hidden', false);
    },
    mouseleave: function()
    {
        $(this).find('.logo-name').toggleClass('hidden', true);
    }
});

})();

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
        fundsText = document.getElementById('funds_text').get('data-funds-text');
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
        document.getElementById('time-text').setAttribute('hidden', true);
        document.getElementById('funds_text').set('html', '<h3>' + fundsText + '</h3>');
    }
});

new GKCounter(document.id('countdown'));

/*------------------------------------------------------------------*/
/*-- FUNCTIONS --*/
/*------------------------------------------------------------------*/
function showErrorMessage(name, message)
{
    $('.form-error[data-error*="'+name+'"]').html(message).fadeIn();
}

function hideErrorMessage(name)
{
    $('.form-error[data-error*="'+name+'"]').fadeOut();
}

function addFailClass(el)
{
    $(el).removeClass('form-input-correct').addClass('form-input-error');
}

function removeFailClass(el)
{
    $(el).removeClass('form-input-error');
}