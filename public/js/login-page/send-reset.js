(function()
{
    /*------------------------------------------------------------------*/
    /*-- LOGIN OPTION --*/
    /*------------------------------------------------------------------*/
    /*-- Messages Object --*/
    var errorMessages = {
        'en' : {
            'required'  : 'This field is required.',
            'email'     : 'Must be of a correct email format. And not begin with a space.'
        },
        'de' : {
            'required'  : 'Dieses Feld ist erforderlich',
            'email'     : 'Muss für eine korrekte E-Mail- Format sein. Und nicht mit einem Leerzeichen beginnen.'
        }
    };


    /*-- Publish Events --*/
    // Form Field blur events.
    $('input[name="email"]').on('blur', function()
    {
        $.publish('email.blur', this);
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
})();
