(function()
{

/*-- Messages Object --*/
    var errorMessages = {
        'en' : {
            'required'  : 'This field is required.',
            'email'     : 'Must be a correct email format. And not begin with a space.',
            'textArea'  : 'Letters and punctuation signs only.',
            'letters'   : 'Letters and spaces only.',
            'minLength' : function(limit)
            {
                return 'This field must contain at least '+limit+' characters';
            },
            'maxLength' : function(limit)
            {
                return 'This field must not exceed '+limit+' characters';
            }
        },
        'de' : {
            'required'  : 'Dieses Feld darf nicht leer sein.',
            'email' : 'Bitte geben Sie eine gültige E-Mail Adresse an und vermeiden Sie Leerzeichen.',
            'textArea'  : 'Dieses Feld darf nur Buchstaben enthalten.',
            'letters'   : 'Dieses Feld darf nur Buchstaben und Leerzeichen enthalten.',
            'minLength' : function(limit)
            {
                return 'Dieses Feld muss mindestens '+limit+' Zeichen enthalten.';
            },
            'maxLength' : function(limit)
            {
                return 'Dieses Feld darf '+limit+' Zeichen nicht überschreiten';
            }
        }
    };


/*-- Publish Events --*/
  // Form Field blur events.
    $('input[name="name"]').on('blur', function()
    {
        $.publish('name.blur', this);
    });

    $('input[name="email"]').on('blur', function()
    {
        $.publish('email.blur', this);
    });

    $('textarea[name="message_body"]').on('blur', function()
    {
        $.publish('message_body.blur', this);
    });

  // Form Validation Events.
    $.subscribe('name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);

            return false;
        }
        if (! FormValidation.checkLetters(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].letters);

            return false;
        }
        if (! FormValidation.checkMinLength(data.value, 3)) {
            showErrorMessage(name, errorMessages[window.locale].minLength(3));

            return false;
        }

        hideErrorMessage(name);
    });

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

    $.subscribe('message_body.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);

            return false;
        }
        if (! FormValidation.checkMinLength(data.value, 5)) {
            showErrorMessage(name, errorMessages[window.locale].minLength(5));

            return false;
        }
        if (! FormValidation.checkMaxLength(data.value, 10000)) {
            showErrorMessage(name, errorMessages[window.locale].maxLength(10000));

            return false;
        }

        hideErrorMessage(name);
    });
})();