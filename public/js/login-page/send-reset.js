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
})();
