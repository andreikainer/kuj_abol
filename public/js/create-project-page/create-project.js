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
        'alphaNumeric' : 'Must contain letters and numbers only, And not begin with a space.',
        'numOnly' : 'Must contain numbers only.',
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