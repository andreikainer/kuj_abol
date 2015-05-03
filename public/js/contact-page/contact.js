(function()
{

/*-- Messages Object --*/
    var errorMessages = {
        'required'  : 'This field is required.',
        'email'     : 'Must be of a correct email format. And not begin with a space.',
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
    };


/*-- Functions --*/
    function showErrorMessage(name, message)
    {
        $('.form-error[data-error="'+name+'"]').html(message).fadeIn();
    }

    function hideErrorMessage(name)
    {
        $('.form-error[data-error*="'+name+'"]').fadeOut();
    }



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
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkLetters(data.value)) {
            showErrorMessage(name, errorMessages.letters);
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

    $.subscribe('message_body.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages.required);
            return false;
        }
        if (! FormValidation.checkMinLength(data.value, 5)) {
            showErrorMessage(name, errorMessages.minLength(5));
            return false;
        }
        if (! FormValidation.checkMaxLength(data.value, 800)) {
            showErrorMessage(name, errorMessages.maxLength(800));
            return false;
        }
        if (! FormValidation.checkValidTextarea(data.value)) {
            showErrorMessage(name, errorMessages.textArea);
            return false;
        }

        hideErrorMessage(name);
    });
})();