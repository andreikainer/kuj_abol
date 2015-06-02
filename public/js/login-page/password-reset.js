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
            'required'  : 'Dieses Feld darf nicht leer sein.',
            'email' : 'Bitte geben Sie eine gültige E-Mail Adresse an und vermeiden Sie Leerzeichen.',
            'minLength' : function(required)
            {
                return 'Dieses Feld muss mindestens '+required+' Zeichen enthalten';
            }
        }
    };


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

            return false;
        }
        if (! FormValidation.checkValidEmail(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].email);

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

            return false;
        }
        if( ! FormValidation.checkMinLength(data.value, 6))
        {
            showErrorMessage(name, errorMessages[window.locale].minLength(6));

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

            return false;
        }

        hideErrorMessage(name);
    });
})();
