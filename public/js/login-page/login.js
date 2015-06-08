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
            'required'  : 'Dieses Feld darf nicht leer sein.',
            'minLength' : function(limit)
            {
                return 'Dieses Feld muss mindestens '+limit+' Zeichen enthalten.';
            }
        }
    };


    /*-- Publish Events --*/
    // Form Field blur events.
    $('#login-page input[name="user_name"]').on('blur', function()
    {
        $.publish('username.blur', this);
    });

    $('#login-page input[name="password"]').on('blur', function()
    {
        $.publish('password.blur', this);
    });

    // Form Validation Events.
    $.subscribe('username.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);

            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('password.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        //if (! FormValidation.checkNotEmpty(data.value)) {
        //    showErrorMessage(name, errorMessages[window.locale].required);
        //
        //    return false;
        //}
        if (! FormValidation.checkMinLength(data.value, 6)) {
            showErrorMessage(name, errorMessages[window.locale].minLength(6));

            return false;
        }

        hideErrorMessage(name);
    });
})();
