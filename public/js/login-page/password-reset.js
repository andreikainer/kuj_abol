(function()
{
    /*-- Messages Object --*/
    var errorMessages = {
        'en' : {
            'required'  : 'This field is required.',
            'email'     : 'Must be of a correct email format. And not begin with a space.',
            'minLength' : function(required)
            {
                return 'This field must be at least '+required+' characters';
            }
        },
        'de' : {
            'required'  : 'Dieses Feld ist erforderlich',
            'email'     : 'Muss für eine korrekte E-Mail- Format sein. Und nicht mit einem Leerzeichen beginnen.',
            'minLength' : function(required)
            {
                return 'Bitte dieses Feld '+required+' Zeichen mindestens.';
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
    }


    /*-- Publish Events --*/
    // Form Field blur events.
    $('#password-reset-page input[name="email"]').on('blur', function()
    {
        $.publish('email.blur', this);
    });

    $('#password-reset-page input[name="password"]').on('blur', function()
    {
        $.publish('password.blur', this);
    });

    $('#password-reset-page input[name="password_confirmation"]').on('blur', function()
    {
        $.publish('password-confirmation.blur', this);
    });


    // Form Validation Events.
    $.subscribe('email.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            redTopInput(data);
            return false;
        }
        if (! FormValidation.checkValidEmail(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].email);
            redTopInput(data);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('password.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            redTopInput(data);
            return false;
        }
        if( ! FormValidation.checkMinLength(data.value, 6))
        {
            showErrorMessage(name, errorMessages[window.locale].minLength(6));
            redTopInput(data);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('password-confirmation.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            redTopInput(data);
            return false;
        }

        hideErrorMessage(name);
    });
})();
