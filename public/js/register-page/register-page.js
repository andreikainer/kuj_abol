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
            'disabled' : 'Bitte nennen Sie Ihr Projekt, und klicken Sie auf "Projekt starten", um Form zu ermöglichen.',
            'required' : 'Dieses Feld ist erforderlich.',
            'alphaNumeric' : 'Muss Buchstaben und Zahlen enthalten nur. Und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Muss nur Zahlen enthalten. Und nicht mit einem Leerzeichen beginnen.',
            'alphaOnly' : 'Müssen Buchstaben nur enthalten. Und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Muss für eine korrekte E-Mail- Format sein. Und nicht mit einem Leerzeichen beginnen.',
            'phone' : 'Muss für eine korrekte Telefonnummer -Format vorliegen. Und nicht mit einem Leerzeichen beginnen.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'document' : 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'maxLength' : function(limit)
            {
                return 'Dieses Feld muss '+limit+' Zeichen nicht überschreiten.';
            },
            'minLength' : function(required)
            {
                return 'Bitte dieses Feld '+required+' Zeichen mindestens.';
            },
            'charRemaining' : 'noch freie Zeichen'
        }
    };


    // Publish Events.
    $('form#register-page input[name="user_name"]').on('blur', function()
    {
        $.publish('user-name.blur', this);
    });

    $('form#register-page input[name="email"]').on('blur', function()
    {
        $.publish('email.blur', this);
    });

    $('form#register-page input[name="password"]').on('blur', function()
    {
        $.publish('password.blur', this);
    });

    $('form#register-page input[name="password_confirmation"]').on('blur', function()
    {
        $.publish('password-confirmation.blur', this);
    });

    $('form#register-page input[name="first_name"]').on('blur', function()
    {
        $.publish('first-name.blur', this);
    });

    $('form#register-page input[name="last_name"]').on('blur', function()
    {
        $.publish('last-name.blur', this);
    });

    $('form#register-page input[name="business_yes"]').on('click', function()
    {
        $.publish('business.checkbox');
    });

    $('form#register-page input[name="business_name"]').on('blur', function()
    {
        $.publish('business-name.blur', this);
    });





    // Subscribe to Events.
    $.subscribe('user-name.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value)){
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if( ! FormValidation.checkMinLength(data.value, 3)){
            showErrorMessage(name, errorMessages[window.locale].minLength(3));
            addFailClass(data);
            return false;
        }
        if( ! FormValidation.checkMaxLength(data.value, 16)){
            showErrorMessage(name, errorMessages[window.locale].maxLength(16));
            addFailClass(data);
            return false;
        }

        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('email.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if(! FormValidation.checkValidEmail(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].email);
            addFailClass(data);
            return false;
        }
        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('password.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if( ! FormValidation.checkMinLength(data.value, 6))
        {
            showErrorMessage(name, errorMessages[window.locale].minLength(6));
            addFailClass(data);
            return false;
        }
        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('password-confirmation.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('first-name.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if( ! FormValidation.checkAlphaOnly(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
            addFailClass(data);
            return false;
        }
        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('last-name.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if(! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if( ! FormValidation.checkAlphaOnly(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
            addFailClass(data);
            return false;
        }
        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('business.checkbox', function(event)
    {
        $('form#register-page .business-name-wrapper').fadeToggle();
    });

    $.subscribe('business-name.blur', function(event, data)
    {
        var name = $(data).attr('name');

        if( ! FormValidation.checkNotEmpty(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        removeFailClass(data);
        hideErrorMessage(name);
    });



    // Functions.
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
})()