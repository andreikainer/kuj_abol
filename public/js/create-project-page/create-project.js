(function()
{
    /**
     * Send the CSRF token with every AJAX request.
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /**
     * Global Variables
     */

    var fieldsetCollection = $('fieldset');
    var tabCollection = $('.form-section-tab');


    /**
     * Messages Object
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
            'image' : 'Please choose a valid image format',
            'document' : 'Please choose a valid image / document format.',
            'maxLength' : function(limit)
            {
                return 'This field must not exceed '+limit+' characters';
            },
            'charRemaining' : 'characters remaining'
        },
        'de' : {
            'disabled' : 'Bitte nennen Sie Ihr Projekt, und klicken Sie auf "Projekt starten", um Form zu ermöglichen.',
            'required' : 'Dieses Feld ist erforderlich',
            'alphaNumeric' : 'Muss Buchstaben und Zahlen enthalten nur. Und nicht mit einem Leerzeichen beginnen.',
            'numOnly' : 'Muss nur Zahlen enthalten. Und nicht mit einem Leerzeichen beginnen.',
            'alphaOnly' : 'Müssen Buchstaben nur enthalten. Und nicht mit einem Leerzeichen beginnen.',
            'email' : 'Muss für eine korrekte E-Mail- Format sein. Und nicht mit einem Leerzeichen beginnen.',
            'phone' : 'Muss für eine korrekte Telefonnummer -Format vorliegen. Und nicht mit einem Leerzeichen beginnen.',
            'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
            'document' : 'Bitte wählen Sie ein gültiges Bild / Dokument-Format.',
            'maxLength' : function(limit)
            {
                return 'Dieses Feld muss '+limit+' Zeichen nicht überschreiten';
            },
            'charRemaining' : 'noch freie Zeichen'
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

    $('textarea[name="short_desc"]:not(.form-input-disabled)').on('keyup', function()
    {
        $.publish('short-description.keyup', this);
    });

    $('input[name="main_img"]').on('change', function()
    {
        $.publish('main-image.selected', this);
    });

    $('input[name="img_2"]').on('change', function()
    {
        $.publish('image-two.selected', this);
    });

    $('input[name="img_3"]').on('change', function()
    {
        $.publish('image-three.selected', this);
    });

    $('input[name="img_4"]').on('change', function()
    {
        $.publish('image-four.selected', this);
    });

    $('input[name="doc_1_mand"]').on('change', function()
    {
        $.publish('document-one.selected', this);
    });

    $('input[name="doc_2_mand"]').on('change', function()
    {
        $.publish('document-two.selected', this);
    });

    $('input[name="doc_3"]').on('change', function()
    {
        $.publish('document-three.selected', this);
    });

    $('input[name="doc_4"]').on('change', function()
    {
        $.publish('document-four.selected', this);
    });

    $('input[name="doc_5"]').on('change', function()
    {
        $.publish('document-five.selected', this);
    });

    $('input[name="doc_6"]').on('change', function()
    {
        $.publish('document-six.selected', this);
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
        showErrorMessage(name, errorMessages[window.locale].disabled);
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

    $.subscribe('short-description.keyup', function(event, data)
    {
        var limit = 180;
        if (data.value.length <= limit) {
            updateCharCount(data.value.length, limit, $('.character-count'));
        }
    });

    // Image Preview.
    $.subscribe('main-image.selected image-two.selected image-three.selected image-four.selected', function(event, data)
    {
        if (! checkImageMime(data.files[0].type)) {
            showErrorMessage(data.id, errorMessages[window.locale].image);
            return false;
        }
        hideErrorMessage(data.id);
        var inputControls = $(data).parent('.image-upload-controls');
        var previewContainer = inputControls.siblings('.image-upload-preview');
        var loaderImage = $(data).siblings('.image-loader');

        // Show the loading animation.
        loaderImage.fadeIn('slow')
        .wait(1500)
        .fadeOut()
        .then(function()
        {
            // Fade out the file input, and load the selected image.
            inputControls.fadeOut('slow');
            loadImagePreview(data.files[0], previewContainer);
        })
        .wait(700)
        .then(function()
        {
            // Fade the selected image into view.
            $(previewContainer).fadeIn('slow')
            .wait(700)
            .then(function()
            {
                // Create a close button, and attach a click event to it.
                var closeButton = createImageCloseButton(previewContainer.parent());
                $(closeButton).on('click', function()
                {
                    // Remove the value of the file input (this enables the change event to fire again).
                    data.value = '';
                    // Remove the close button from the DOM.
                    $(this).remove();
                    // Fade out the image preview, fade in the form control. Rinse and Repeat!
                    previewContainer.fadeOut('slow')
                    .wait(700)
                    .then(function()
                    {
                        inputControls.fadeIn('slow');
                    });
                });
            });
        });
    });

    // Document Preview.
    $.subscribe('document-one.selected document-two.selected document-three.selected document-four.selected document-five.selected document-six.selected', function(event, data)
    {
        if (! checkDocumentMime(data.files[0].type)) {
            showErrorMessage(data.id, errorMessages[window.locale].document);
            return false;
        }
        hideErrorMessage(data.id);

        // Show the loading animation.
        var loaderImage = $(data).siblings('.image-loader');
        // Read the document, and prepare data to send to PHP script.
        var reader = new FileReader();
        reader.onload = function(e)
        {
            loaderImage.fadeIn('slow');
            var obj = {
                'element' : data.id,
                'filename' : data.files[0].name,
                'data' : e.target.result
            };
            // Once finished reading document, publish an event and pass along obj.
            $.publish('document-submit.ajax', obj);
        }
        reader.readAsDataURL(data.files[0]);
    });

    $.subscribe('document-submit.ajax', function(event, data)
    {
        // Make AJAX request to PHP script, POST up the received 'obj'
        ajaxRequest('/temp-document', data, 'temp-document.success', 'temp-document.fail');
    });

    $.subscribe('temp-document.success', function(event, data)
    {
        var inputControls = $('#'+data.element).parent('.image-upload-controls');
        var previewContainer = inputControls.siblings('.image-upload-preview');
        var loaderImage = $('#'+data.element).siblings('.image-loader');

        // Fade out the loading animation, file input. Set the src of the iframe.
        loaderImage.fadeOut('slow')
        .then(function()
        {
            inputControls.fadeOut('slow');
            previewContainer.attr('src', '../'+data.path.substr(data.path.indexOf('temp'), data.path.length));
        })
        .wait(700)
        .then(function()
        {
            // Fade the document (iframe) into view.
            previewContainer.fadeIn('slow');
        })
        .wait(700)
        .then(function()
        {
            // Create a close button, and attach a click event to it.
            var closeButton = createImageCloseButton(previewContainer.parent());
            $(closeButton).on('click', function()
            {
                // Remove the value of the file input (this enables the change event to fire again).
                $('#'+data.element).val('');
                // Remove the close button from the DOM.
                $(this).remove();
                // Fade out the image preview, fade in the form control. Rinse and Repeat!
                previewContainer.fadeOut('slow')
                .wait(700)
                .then(function()
                {
                    inputControls.fadeIn('slow');
                });
            });
        });
    });




    // Form Validation Events.
    $.subscribe('project-name.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if (! FormValidation.checkAlphaNumeric(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].alphaNumeric);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('short-description.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)){
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if (! FormValidation.checkMaxLength(data.value, 180)) {
            showErrorMessage(name, errorMessages[window.locale].maxLength(180));
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('full-description.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('target-amount.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if (! FormValidation.checkNumOnly(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].numOnly);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('child-name.blur', function(event, data)
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

    $.subscribe('first-name.blur', function(event, data)
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

    $.subscribe('last-name.blur', function(event, data)
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

    $.subscribe('address.blur', function(event, data)
    {
        var name = data.getAttribute('name');

        if (! FormValidation.checkNotEmpty(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].required);
            return false;
        }
        if (! FormValidation.checkAlphaNumeric(data.value)) {
            showErrorMessage(name, errorMessages[window.locale].alphaNumeric);
            return false;
        }

        hideErrorMessage(name);
    });

    $.subscribe('tel-number.blur', function(event, data)
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

    function updateCharCount(length, limit, display)
    {
        $(display).html(errorMessages[window.locale].charRemaining+' '+(limit-length)).fadeIn();
    }

    function checkImageMime(mime)
    {
        return (   mime === 'image/jpg'
                || mime === 'image/jpeg'
                || mime === 'image/png'
                || mime === 'image/bmp'
                || mime === 'image/tiff');
    }

    function checkDocumentMime(mime)
    {
        return (   mime === 'image/jpg'
                || mime === 'image/jpeg'
                || mime === 'image/png'
                || mime === 'image/bmp'
                || mime === 'image/tiff'
                || mime === 'application/pdf'
                || mime === 'application/msword'
                || mime === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    }

    function loadImagePreview(file, container)
    {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            container.attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }

    function createImageCloseButton(container)
    {
        return $('<span class="image-upload-close-button">X</span>').prependTo(container);
    }

    function ajaxRequest(url, data, successEvent, errorEvent)
    {
        $.ajax({
            url : url,
            method : 'POST',
            dataType : 'json',
            data : data,
            success : function(response)
            {
                $.publish(successEvent, response);
            },
            error : function(response)
            {
                $.publish(errorEvent, response);
            }
        });
    }
})();