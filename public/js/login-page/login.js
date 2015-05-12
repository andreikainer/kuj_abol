(function()
{
/*------------------------------------------------------------------*/
    /*-- LOGIN OPTION --*/
/*------------------------------------------------------------------*/
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
})();
