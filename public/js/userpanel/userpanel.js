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
            'maxSize' : function(limit)
            {
                return 'File size must not exceed '+limit+'MB.'
            },
        },
        'de' : {
            'required'  : 'Dieses Feld ist erforderlich',
            'alphaNumeric' : 'Muss Buchstaben und Zahlen enthalten nur. Und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Muss für eine korrekte E-Mail- Format sein. Und nicht mit einem Leerzeichen beginnen.',
            'phone' : 'Muss für eine korrekte Telefonnummer -Format vorliegen. Und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Muss nur Zahlen enthalten. Und nicht mit einem Leerzeichen beginnen.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'maxSize' : function(limit)
            {
                return 'Dateigröße darf '+limit+'MB nicht überschreiten.'
            },
        }
    };


    /*-- Functions --*/
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


    function loadImagePreview(file, container)
    {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            container.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }


    function createImageCloseButton(container)
    {
        return $('<span class="image-upload-close-button">X</span>').prependTo(container);
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

    /*
     +----------------------------------------------------------------------------------------------------
     |
     |  IMAGE PREVIEW
     |
     +----------------------------------------------------------------------------------------------------
     */

    /**
     * PUBLISH EVENTS
     */
    $('input[name="avatar"]').on('change', function(event)
    {
        console.log('pressed');
        $.publish('image.selected', this);

    });

    if($('span.image-upload-close-button'))
    {
        $('span.image-upload-close-button').on('click', function()
        {
            $.publish('document-preview.close', this);
            $.publish('image-preview.close', this);
        });
    }

    /**
     * SUBSCRIBE
     */
    $.subscribe('image.selected', function(event, data)
    {
        if (! checkImageMime(data.files[0].type)) {

            showErrorMessage(data.id, errorMessages[window.locale].image);
            return false;
        }
        if(! checkFileSize(data.files[0].size, 20))
        {

            showErrorMessage(data.id, errorMessages[window.locale].maxSize(20));
            return false;
        }

        hideErrorMessage(data.id);

        var inputControls = $(data).parent('.image-upload-controls');
        var previewContainer = inputControls.siblings('.image-upload-preview');
        var loaderImage = $(data).siblings('.image-loader');
        console.log(loaderImage);

        // Show the loading animation.
        //loaderImage.fadeIn('slow')
        //    .wait(1000)
        //    .fadeOut()
        //    .then(function()
        //    {
        //        // Fade out the file input, and load the selected image.
        //        inputControls.fadeOut('slow');
        //        loadImagePreview(data.files[0], previewContainer);
        //    })
        //    .wait(700)
        //    .then(function()
        //    {
        //        // Fade the selected image into view.
        //        $(previewContainer).fadeIn('slow')
        //            .wait(700)
        //            .then(function()
        //            {
        //                // Create a close button, and attach a click event to it.
        //                var closeButton = createImageCloseButton(previewContainer.parent());
        //                $(closeButton).on('click', function()
        //                {
        //                    $.publish('image-preview.close', this);
        //                });
        //            });
        //    });
    });

    // Close the image preview, and bring the input controls into view.
    $.subscribe('image-preview.close', function(event, button)
    {
        // Remove any trace of a saved image, if the user decides to replace it.
        $(button).siblings('input[type="hidden"]').remove();
        // Close the image preview.
        closeFilePreview(button);
    });

})();
