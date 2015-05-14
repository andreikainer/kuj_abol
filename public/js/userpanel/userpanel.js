var panelCollection = $('div.userpanel-section');
var tabCollection = $('.form-section-tab');


$('.form-section-tab').on('click', function()
{
    $.publish('section-tab.click', this);
});

$.subscribe('section-tab.click', function(event, data)
{
    showSection(panelCollection, $(data).data('section'));
    makeTabActive(tabCollection, $(data).data('section'));
});

function showSection(collection, i)
{
    collection.fadeOut();
    collection.eq(i).fadeIn()
}

function makeTabActive(collection, i)
{
    collection.removeClass('form-section-tab-active');
    collection.eq(i).addClass('form-section-tab-active');
}

(function()
{
    /*------------------------------------------------------------------*/
    /*-- CHANGE DETAILS OPTION --*/
    /*------------------------------------------------------------------*/
    /*-- Messages Object --*/
    var errorMessages = {
        'en' : {
            'required'  : 'This field is required.',
            'alphaNumeric' : 'Must contain letters and numbers only. And not begin with a space.',
            'email' : 'Must be of a correct email format. And not begin with a space.',
            'phone' : 'Must be of a correct telephone number format. And not begin with a space.',
            'numOnly' : 'Must contain numbers only. And not begin with a space.',
            'image' : 'Please choose a valid image format.',
            'minLength' : function(limit)
            {
                return 'This field must contain at least '+limit+' characters';
            }
        },
        'de' : {
            'required'  : 'Dieses Feld ist erforderlich',
            'alphaNumeric' : 'Muss Buchstaben und Zahlen enthalten nur. Und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Muss für eine korrekte E-Mail- Format sein. Und nicht mit einem Leerzeichen beginnen.',
            'phone' : 'Muss für eine korrekte Telefonnummer -Format vorliegen. Und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Muss nur Zahlen enthalten. Und nicht mit einem Leerzeichen beginnen.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'minLength' : function(limit)
            {
                return 'Diese Feld muss mindestens '+limit+' Charaktere enthalten';
            }
        }
    };


    /*-- Publish Events --*/
    // Form Field blur events.
    $('.account input[name="user_name"]').on('blur', function()
    {
        $.publish('user_name.blur', this);
    });

    $('.account input[name="email"]').on('blur', function()
    {
        $.publish('email.blur', this);
    });

    $('input[name="first_name"]').on('blur', function()
    {
        $.publish('first_name.blur', this);
    });

    $('.account input[name="last_name"]').on('blur', function()
    {
        $.publish('last_name.blur', this);
    });

    $('.account input[name="business_name"]').on('blur', function()
    {
        $.publish('business_name.blur', this);
    });

    $('.account input[name="address"]').on('blur', function()
    {
        $.publish('address.blur', this);
    });

    $('.account input[name="tel_number"]').on('blur', function()
    {
        $.publish('tel_number.blur', this);
    });



    // Form Validation Events.
    $.subscribe('user_name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if (! FormValidation.checkAlphaOnly(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
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

    $.subscribe('first_name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('last_name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('business_name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('address.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('tel_number.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if (! FormValidation.checkValidPhone(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].phone);
            return false;
        }

        hideErrorMessage(name);
    });

})();
