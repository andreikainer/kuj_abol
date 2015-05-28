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
            'disabled' : 'Bitte benennen Sie Ihr Projekt , klicken Sie anschließend auf Ansuchen beginnen.',
            'required' : 'Dieses Feld darf nicht leer sein.',
            'alphaNumeric' : 'Darf nur Buchstaben und Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Darf nur Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'alphaOnly' : 'Darf nur Buchstaben enthalten und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Dieses Feld muss in einem korrekten E-Mail Format sein und darf keine Leerzeichen enthalten.',
            'phone' : 'Dieses Feld muss in einem korrekten Telefonnummer Format sein und darf keine Leerzeichen enthalten.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'document' : 'Akzeptiert sind JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'maxLength' : function(limit)
            {
                return 'Dieses Feld darf '+limit+' Zeichen nicht überschreiten.';
            },
            'minLength' : function(required)
            {
                return 'Dieses Feld muss mindestens '+required+' Zeichen enthalten';
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