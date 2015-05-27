(function()
{
    var panelCollection = $('div.userpanel-section');
    var tabCollection = $('.form-section-tab');
    var sideCollection = $('.sidemenu-item');

    // tabs click events
    $('.form-section-tab').on('click', function()
    {
        $.publish('section-tab.click', this);
    });

    // side menu click events
    $('.sidemenu-item').on('click', function()
    {
        $.publish('section-tab.click', this);
    });

    $.subscribe('section-tab.click', function(event, data)
    {
        showSection(panelCollection, $(data).data('section'));
        makeTabActive(tabCollection, $(data).data('section'));
        //makeSidemenuItemActive(sideCollection, $(data));
    });

    /*------------------------------------------------------------------*/
    /*-- CHANGE DETAILS OPTION --*/
    /*------------------------------------------------------------------*/
    /*-- Messages Object --*/
    var errorMessages = {
        'en' : {
            'required'  : 'This field is required.',
            'alphaNumeric' : 'Must contain letters and numbers only. And not begin with a space.',
            'alphaOnly' : 'Must contain letters only. And not begin with a space.',
            'email' : 'Must be of a correct email format. And not begin with a space.',
            'phone' : 'Must be of a correct telephone number format. And not begin with a space.',
            'numOnly' : 'Must contain numbers only. And not begin with a space.',
            'image' : 'Please choose a valid image format.',
            'minLength' : function(required)
            {
                return 'This field must be at least '+required+' characters';
            },
            'maxSize' : function(limit)
            {
                return 'File size must not exceed '+limit+'MB.'
            },
            'maxLength' : function(limit)
            {
                return 'This field must not exceed '+limit+' characters';
            }
        },
        'de' : {
            'required' : 'Dieses Feld darf nicht leer seien.',
            'alphaNumeric' : 'Darf nur Buchstaben und Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Darf nur Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'alphaOnly' : 'Darf nur Buchstaben enthalten und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Dieses Feld muss in einem korrekten E-Mail Format sein und darf keine Leerzeichen enthalten.',
            'phone' : 'Dieses Feld muss in einem korrekten Telefonnummer Format sein und darf keine Leerzeichen enthalten.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'minLength' : function(required)
            {
                return 'Dieses Feld muss mindestens '+required+' Zeichen enthalten';
            },
            'maxSize' : function(limit)
            {
                return 'Dateigröße darf '+limit+'MB nicht überschreiten.'
            },
            'maxLength' : function(limit)
            {
                return 'Dieses Feld darf '+limit+' Zeichen nicht überschreiten';
            }
        }
    };


    /*-- Functions --*/

    /**
     * Validate an image's mime type against a 'white-list'
     *
     * @param mime
     * @returns {boolean}
     */
    function checkImageMime(mime)
    {
        return (   mime === 'image/jpg'
        || mime === 'image/jpeg'
        || mime === 'image/png'
        || mime === 'image/bmp'
        || mime === 'image/tiff');
    }

    /**
     * Check the filesize against a limit (in MB)
     *
     * @param value
     * @param limit
     * @returns {boolean}
     */
    function checkFileSize(value, limit)
    {
        var value = value/1000000;
        return (value <= limit);
    }

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
     * Run the user's selected image through the FileReader object.
     * Set the src of the preview image element.
     *
     * @param file
     * @param container
     */
    function loadImagePreview(file, container)
    {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            container.attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }


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

    $('.account input[name="postcode"]').on('blur', function()
    {
        $.publish('postcode.blur', this);
    });

    $('.account input[name="city"]').on('blur', function()
    {
        $.publish('city.blur', this);
    });

    $('.account input[name="country"]').on('blur', function()
    {
        $.publish('country.blur', this);
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

    $.subscribe('postcode.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if(FormValidation.checkNotEmpty(data.value) && ! FormValidation.checkNumOnly(data.value))
        {
            showErrorMessage(name, errorMessages[window.locale].numOnly);
            addFailClass(data);
            return false;
        }
        if(FormValidation.checkNotEmpty(data.value) && ! FormValidation.checkMinLength(data.value, 4))
        {
            showErrorMessage(name, errorMessages[window.locale].minLength(4))
            addFailClass(data);
            return false;
        }
        if(FormValidation.checkNotEmpty(data.value) && ! FormValidation.checkMaxLength(data.value, 4))
        {
            showErrorMessage(name, errorMessages[window.locale].maxLength(4));
            addFailClass(data);
            return false;
        }

        removeFailClass(data);
        hideErrorMessage(name);
    });

    $.subscribe('city.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (FormValidation.checkNotEmpty(data.value) && ! FormValidation.checkAlphaOnly(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('country.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (FormValidation.checkNotEmpty(data.value) && ! FormValidation.checkAlphaOnly(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].alphaOnly);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('tel_number.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (FormValidation.checkNotEmpty(data.value) && ! FormValidation.checkValidPhone(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].phone);
            return false;
        }

        hideErrorMessage(name);
    });

     /*-- Image input --*/
    /**
     * PUBLISH EVENTS
     */
    $('input[name="avatar"]').on('change', function(event)
    {
        $.publish('image.selected', this);

    });


    /**
     * SUBSCRIBE
     */
    $.subscribe('image.selected', function(event, data)
    {
        if (!checkImageMime(data.files[0].type)) {

            showErrorMessage(data.id, errorMessages[window.locale].image);
            return false;
        }
        if (!checkFileSize(data.files[0].size, 20)) {

            showErrorMessage(data.id, errorMessages[window.locale].maxSize(20));
            return false;
        }

        hideErrorMessage(data.id);

        var loaderImage = $(data).siblings('.image-loader');
        var previewImage = $(data).siblings('label.image-upload-label').children('img');

        // Show the loading animation.
        loaderImage.fadeIn('slow')
            .wait(1000)
            .fadeOut()
            .then(function()
            {
                // Show the image preview.
                loadImagePreview(data.files[0], previewImage);
            });
    });


    $('.add-nav a').on("click", function(e)
    {
        e.preventDefault();
    });

})();