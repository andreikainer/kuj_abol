(function()
{
/*
 +----------------------------------------------------------------------------------------------------
 |
 |  ERROR MESSAGE OBJECT
 |
 +----------------------------------------------------------------------------------------------------
 */
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
            'currency' : 'Must only contain numbers, commas and periods. And not begin with a space.',
            'maxLength' : function(limit)
            {
                return 'This field must not exceed '+limit+' characters';
            },
            'maxSize' : function(limit)
            {
                return 'File size must not exceed '+limit+'MB.'
            },
            'charRemaining' : 'characters remaining'
        },
        'de' : {
            'disabled' : 'Bitte benennen Sie Ihr Projekt , klicken Sie anschließend auf Ansuchen beginnen.',
            'required' : 'Dieses Feld darf nicht leer seien.',
            'alphaNumeric' : 'Darf nur Buchstaben und Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Darf nur Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'alphaOnly' : 'Darf nur Buchstaben enthalten und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Dieses Feld muss in einem korrekten E-Mail Format sein und darf keine Leerzeichen enthalten.',
            'phone' : 'Dieses Feld muss in einem korrekten Telefonnummer Format sein und darf keine Leerzeichen enthalten.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'document' : 'Akzeptiert sind JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'currency' : 'Diese Feld darf nur Zahlen, Kommas enthalten und nicht mit einem Leerzeichen beginnen.',
            'maxLength' : function(limit)
            {
                return 'Dieses Feld darf '+limit+' Zeichen nicht überschreiten';
            },
            'maxSize' : function(limit)
            {
                return 'Dateigröße darf '+limit+'MB nicht überschreiten.'
            },
            'charRemaining' : 'noch freie Zeichen'
        }
    };
/*
 +----------------------------------------------------------------------------------------------------
 |
 |  REVEAL FORM INPUT ELEMENT
 |
 +----------------------------------------------------------------------------------------------------
 */
    $('.admin-preview-element').on('click', function()
    {
        var inputSibling = $(this).siblings('.form-input');

        $(this).addClass('display-none');
        inputSibling.removeClass('display-none');
    });
/*
 +----------------------------------------------------------------------------------------------------
 |
 |  DISPLAY CHARACTER COUNT -- SHORT DESCRIPTION
 |
 +----------------------------------------------------------------------------------------------------
 */
    $('textarea[name="short_desc"]').on('keyup', function()
    {
        $.publish('short-description.keyup', this);
    });

    $.subscribe('short-description.keyup', function(event, data)
    {
        var limit = 180;
        if (data.value.length <= limit) {
            updateCharCount(data.value.length, limit, $('.character-count'));
        }
    });
/*
 +----------------------------------------------------------------------------------------------------
 |
 |  FORM VALIDATION
 |
 +----------------------------------------------------------------------------------------------------
 */

    /**
     * PUBLISH EVENTS
     */
    $('input[name="project_name"]').on('blur', function()
    {
        $.publish('project-name.blur', this);
    });

    $('textarea[name="short_desc"]').on('blur', function()
    {
        $.publish('short-description.blur', this);
    });

    $('textarea[name="full_desc"]').on('blur', function()
    {
        $.publish('full-description.blur', this);
    });

    $('input[name="target_amount"]').on('blur', function()
    {
        $.publish('target-amount.blur', this);
    });

    $('input[name="child_name"]').on('blur', function()
    {
        $.publish('child-name.blur', this);
    });

    /**
     * SUBSCRIBE
     */
    $.subscribe('project-name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if (! FormValidation.checkAlphaNumeric(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].alphaNumeric);
            addFailClass(data);
            return false;
        }

        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('short-description.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)){
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if (! FormValidation.checkMaxLength(data.value, 180)) {
            showErrorMessage(name, errorMessages[window.locale].maxLength(180));
            addFailClass(data);
            return false;
        }

        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('full-description.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }

        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('target-amount.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if (! FormValidation.checkValidCurrency(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].currency);
            addFailClass(data);
            return false;
        }

        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('child-name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            addFailClass(data);
            return false;
        }
        if (! FormValidation.checkAlphaOnly(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
            addFailClass(data);
            return false;
        }

        removeFailClass(data);
        hideErrorMessage(name);
    });
/*
 +----------------------------------------------------------------------------------------------------
 |
 |  FUNCTIONS
 |
 +----------------------------------------------------------------------------------------------------
 */

    /**
     * Add the error styles to the form input.
     *
     * @param el
     */
    function addFailClass(el)
    {
        $(el).removeClass('form-input-correct').addClass('form-input-error');
    }

    /**
     * Remove the error styles from the form input.
     *
     * @param el
     */
    function removeFailClass(el)
    {
        $(el).removeClass('form-input-error');
    }

    /**
     * Display the amount of characters left allowed for entry.
     *
     * @param length
     * @param limit
     * @param display
     */
    function updateCharCount(length, limit, display)
    {
        $(display).html(errorMessages[window.locale].charRemaining+' '+(limit-length)).fadeIn();
    }
})();