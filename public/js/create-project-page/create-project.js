(function()
{
    /**
     * Global Variables
     */

    var fieldsetCollection = $('fieldset');
    var tabCollection = $('.form-section-tab');


    /**
     * Messages Object
     */

    var errorMessages = {
        'disabled' : 'Please name your project, and click "Start Project" to enable form.',
        'required' : 'This field is required.',
        'alphaNumeric' : 'Must contain letters and numbers only. And not begin with a space.',
        'numOnly' : 'Must contain numbers only. And not begin with a space.',
        'alphaOnly' : 'Must contain letters only. And not begin with a space.',
        'email' : 'Must be of a correct email format. And not begin with a space.',
        'phone' : 'Must be of a correct telephone number format. And not begin with a space.',
        'maxLength' : function(limit)
        {
            return 'This field must not exceed '+limit+' characters';
        }
    };





    /**
     * Publish Events.
     */

    $('.form-section-tab').on('click', function()
    {
        $.publish('section-tab.click', this);
    });

    $('.form-input-disabled').on('click', function()
    {
        $.publish('disabled-input.click', this);
    });

    $('*[data-button="next"]').on('click', function()
    {
        $.publish('next-button.click', this);
    });

    $('*[data-button="back"]').on('click', function()
    {
        $.publish('back-button.click', this);
    });

    // Form Field blur events.
    $('input[name="project_name"]').on('blur', function()
    {
        $.publish('project-name.blur', this);
    });

    $('textarea[name="short_desc"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('short-description.blur', this);
    });

    $('textarea[name="full_desc"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('full-description.blur', this);
    });

    $('input[name="target_amount"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('target-amount.blur', this);
    });

    $('input[name="child_name"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('child-name.blur', this);
    });

    $('input[name="first_name"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('first-name.blur', this);
    });

    $('input[name="last_name"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('last-name.blur', this);
    });

    $('input[name="email"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('email.blur', this);
    });

    $('textarea[name="address"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('address.blur', this);
    });

    $('input[name="tel_number"]:not(.form-input-disabled)').on('blur', function()
    {
        $.publish('tel-number.blur', this);
    });




    /**
     * Subscribe to Events.
     */

    $.subscribe('section-tab.click', function(event, data)
    {
        showSection(fieldsetCollection, $(data).data('section'));
        makeTabActive(tabCollection, data);
    });

    $.subscribe('disabled-input.click', function(event, data)
    {
        var name = (data.hasAttribute('name')) ? data.getAttribute('name') : data.getAttribute('for');
        showErrorMessage(name, errorMessages.disabled);
    });

    $.subscribe('next-button.click', function(event, data)
    {
        var currSection = $(data).parents('fieldset').data('section');
        showSection(fieldsetCollection, currSection+1);
        makeTabActive(tabCollection, $('.form-section-tab[data-section="'+(currSection+1)+'"]'));
    });

    $.subscribe('back-button.click', function(event, data)
    {
        var currSection = $(data).parents('fieldset').data('section');
        showSection(fieldsetCollection, currSection-1);
        makeTabActive(tabCollection, $('.form-section-tab[data-section="'+(currSection-1)+'"]'));
    });


    // Form Validation Events.
    $.subscribe('project-name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkAlphaNumeric(data.value)) {
            showErrorMessage(name, errorMessages.alphaNumeric);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('short-description.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)){
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkAlphaNumeric(data.value)) {
            showErrorMessage(name, errorMessages.alphaNumeric);
            return false;
        }
        if (! FormValidation.checkMaxLength(data.value, 180)) {
            showErrorMessage(name, errorMessages.maxLength(180));
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('full-description.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkAlphaNumeric(data.value)) {
            showErrorMessage(name, errorMessages.alphaNumeric);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('target-amount.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkNumOnly(data.value)) {
            showErrorMessage(name, errorMessages.numOnly);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('child-name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkAlphaOnly(data.value)) {
            showErrorMessage(name, errorMessages.alphaOnly);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('first-name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkAlphaOnly(data.value)) {
            showErrorMessage(name, errorMessages.alphaOnly);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('last-name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkAlphaOnly(data.value)) {
            showErrorMessage(name, errorMessages.alphaOnly);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('email.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkValidEmail(data.value)) {
            showErrorMessage(name, errorMessages.email);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('address.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkAlphaNumeric(data.value)) {
            showErrorMessage(name, errorMessages.alphaNumeric);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('tel-number.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkValidPhone(data.value)) {
            showErrorMessage(name, errorMessages.phone);
            return false;
        }

        hideErrorMessage(name);
    });



    /**
     * Functions.
     */

    function showSection(collection, i)
    {
        collection.fadeOut();
        collection.eq(i).fadeIn()
    }

    function makeTabActive(collection, el)
    {
        collection.removeClass('form-section-tab-active');
        $(el).addClass('form-section-tab-active');
    }

    function showErrorMessage(name, message)
    {
        $('.form-error[data-error*="'+name+'"]').html(message).fadeIn();
    }

    function hideErrorMessage(name)
    {
        $('.form-error[data-error*="'+name+'"]').fadeOut();
    }
})();