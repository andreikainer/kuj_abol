(function()
{
    /*
     +----------------------------------------------------------------------------------------------------
     |
     |  AJAX SETUP
     |
     +----------------------------------------------------------------------------------------------------
     */
        /**
         * Send the CSRF token with every AJAX request.
         */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    /*
     +----------------------------------------------------------------------------------------------------
     |
     |  GLOBAL VARIABLES
     |
     +----------------------------------------------------------------------------------------------------
     */
        var fieldsetCollection = $('fieldset');
        var tabCollection = $('.form-section-tab');
        var files = {};

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
                'disabled' : 'Bitte nennen Sie Ihr Projekt, und klicken Sie auf "Projekt starten", um Form zu ermöglichen.',
                'required' : 'Dieses Feld ist erforderlich.',
                'alphaNumeric' : 'Muss Buchstaben und Zahlen enthalten nur. Und nicht mit einem Leerzeichen beginnen.',
                'numOnly' : 'Muss nur Zahlen enthalten. Und nicht mit einem Leerzeichen beginnen.',
                'alphaOnly' : 'Müssen Buchstaben nur enthalten. Und nicht mit einem Leerzeichen beginnen.',
                'email' : 'Muss für eine korrekte E-Mail- Format sein. Und nicht mit einem Leerzeichen beginnen.',
                'phone' : 'Muss für eine korrekte Telefonnummer -Format vorliegen. Und nicht mit einem Leerzeichen beginnen.',
                'image' : 'Bitte wählen Sie ein gültiges Bildformat.',
                'document' : 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
                'currency' : 'Muss nur Zahlen, Kommas und Punkte. Und nicht mit einem Leerzeichen beginnen.',
                'maxLength' : function(limit)
                {
                    return 'Dieses Feld muss '+limit+' Zeichen nicht überschreiten';
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
     |  FORM SECTION EVENTS
     |
     +----------------------------------------------------------------------------------------------------
     */

        /**
         * PUBLISH EVENTS
         */
        $('.form-section-tab').on('click', function()
        {
            $.publish('section-tab.click', this);
            $.publish('section-check.errors', this);
        });

        $('.form-input-disabled').on('click.disabled', function()
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

        $('textarea[name="short_desc"]').on('keyup', function()
        {
            $.publish('short-description.keyup', this);
        });

        /**
         * SUBSCRIBE
         */
        $.subscribe('section-tab.click', function(event, data)
        {
            showSection(fieldsetCollection, $(data).data('section'));
            makeTabActive(tabCollection, tabCollection.index(data));
        });

        $.subscribe('disabled-input.click', function(event, data)
        {
            var name = (data.hasAttribute('name')) ? data.getAttribute('name') : data.getAttribute('for');
            showErrorMessage(name, errorMessages[window.locale].disabled);
        });

        $.subscribe('next-button.click', function(event, data)
        {
            if(window.innerWidth <= 991)
            {
                var currTab = $(data).parents('fieldset').data('section')+5;
            }
            else
            {
                var currTab = $(data).parents('fieldset').data('section');
            }
            var currSection = $(data).parents('fieldset').data('section');
            showSection(fieldsetCollection, currSection+1);
            makeTabActive(tabCollection, currTab+1);
            checkForErrors(currSection);
        });

        $.subscribe('back-button.click', function(event, data)
        {
            if(window.innerWidth <= 991)
            {
                var currTab = $(data).parents('fieldset').data('section')+5;
            }
            else
            {
                var currTab = $(data).parents('fieldset').data('section');
            }
            var currSection = $(data).parents('fieldset').data('section');
            showSection(fieldsetCollection, currSection-1);
            makeTabActive(tabCollection, currTab-1);
            checkForErrors(currSection);
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
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('short-description.blur', this);
        });

        $('textarea[name="full_desc"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('full-description.blur', this);
        });

        $('input[name="target_amount"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('target-amount.blur', this);
        });

        $('input[name="child_name"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('child-name.blur', this);
        });

        $('input[name="first_name"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('first-name.blur', this);
        });

        $('input[name="last_name"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('last-name.blur', this);
        });

        $('input[name="email"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('email.blur', this);
        });

        $('textarea[name="address"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('address.blur', this);
        });

        $('input[name="tel_number"]').on('blur', function()
        {
            // Don't display the blur validation if form is disabled.
            if($(this).hasClass('form-input-disabled')) {return false;}

            $.publish('tel-number.blur', this);
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

        $.subscribe('first-name.blur', function(event, data)
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

        $.subscribe('last-name.blur', function(event, data)
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

        $.subscribe('email.blur', function(event, data)
        {
            var name = data.getAttribute('name');

            if (! FormValidation.checkNotEmpty(data.value)) {
                showErrorMessage(name, errorMessages[window.locale].required);
                addFailClass(data);
                return false;
            }
            if (! FormValidation.checkValidEmail(data.value)) {
                showErrorMessage(name, errorMessages[window.locale].email);
                addFailClass(data);
                return false;
            }

            removeFailClass(data);
            hideErrorMessage(name);
        });

        $.subscribe('address.blur', function(event, data)
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

        $.subscribe('tel-number.blur', function(event, data)
        {
            var name = data.getAttribute('name');

            if (! FormValidation.checkNotEmpty(data.value)) {
                showErrorMessage(name, errorMessages[window.locale].required);
                addFailClass(data);
                return false;
            }
            if (! FormValidation.checkValidPhone(data.value)) {
                showErrorMessage(name, errorMessages[window.locale].phone);
                addFailClass(data);
                return false;
            }

            removeFailClass(data);
            hideErrorMessage(name);
        });

        $.subscribe('section-check.errors', function(event, sectionTab)
        {
            var currentSectionNum = parseInt($(sectionTab).attr('data-section'));
            $.each(tabCollection, function(index, value)
            {
                if (index !== currentSectionNum)
                {
                    checkForErrors($(value).attr('data-section'));
                }
            });
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
        $('input[name*="img"]').on('change', function(event)
        {
            $.publish('image.selected', this);
            files[this.name] = event.target.files;
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
                addFailClass(data);
                showErrorMessage(data.id, errorMessages[window.locale].image);
                return false;
            }
            if(! checkFileSize(data.files[0].size, 20))
            {
                addFailClass(data);
                showErrorMessage(data.id, errorMessages[window.locale].maxSize(20));
                return false;
            }
            removeFailClass(data);
            hideErrorMessage(data.id);
            var inputControls = $(data).parent('.image-upload-controls');
            var previewContainer = inputControls.siblings('.image-upload-preview');
            var loaderImage = $(data).siblings('.image-loader');

            // Show the loading animation.
            loaderImage.fadeIn('slow')
                .wait(1000)
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
                                $.publish('image-preview.close', this);
                            });
                        });
                });
        });

        // Close the image preview, and bring the input controls into view.
        $.subscribe('image-preview.close', function(event, button)
        {
            // Remove any trace of a saved image, if the user decides to replace it.
            $(button).siblings('input[type="hidden"]').remove();
            // Close the image preview.
            closeFilePreview(button);
        });

    /*
     +----------------------------------------------------------------------------------------------------
     |
     |  DOCUMENT PREVIEW
     |
     +----------------------------------------------------------------------------------------------------
     */

        /**
         * PUBLISH EVENTS
         */
        $('input[name*="doc"]').on('change', function(event)
        {
            files[this.name] = event.target.files;
            $.publish('document.selected', this);
        });

        /**
         * SUBSCRIBE
         */
        $.subscribe('document.selected', function(event, data)
        {
            if (! checkDocumentMime(data.files[0].type)) {
                addFailClass(data);
                showErrorMessage(data.id, errorMessages[window.locale].document);
                return false;
            }
            if (! checkFileSize(data.files[0].size, 20))
            {
                addFailClass(data);
                showErrorMessage(data.id, errorMessages[window.locale].maxSize(20));
                return false;
            }
            removeFailClass(data);
            hideErrorMessage(data.id);

            // Show the loading animation.
            var loaderImage = $(data).siblings('.image-loader');
            loaderImage.fadeIn('slow');

            // Prepare the file data to upload.
            var formData = new FormData();

            formData.append('name', $(data).attr('name'));
            formData.append('element', data.id);
            formData.append($(data).attr('name'), files[$(data).attr('name')][0]);

            // Call the AJAX request, passing along the file info.
            $.publish('document-submit.ajax', formData);
        });

        $.subscribe('document-submit.ajax', function(event, data)
        {
            // Make AJAX request to PHP script, POST up the received data from event.
            $.ajax({
                url : 'http://kinderfoerderungen.at/temp-document',
                method : 'POST',
                data : data,
                cache : false,
                processData : false,
                contentType : false,
                success : function(response)
                {
                    if( response.errors )
                    {
                        var loaderImage = $('input[name="'+response.element+'"]').siblings('.image-loader');
                        loaderImage.fadeOut();
                        $.publish('temp-document.fail', response);
                        return false;
                    }

                    // Remove the error feedback.
                    $('.form-section-tab[data-section="3"]').removeClass('form-section-tab-error');
                    hideErrorMessage(response.element);
                    hideErrorFlashMessage();

                    $.publish('temp-document.success', response);
                },
                error : function(response)
                {
                    $.publish('temp-document.fail', response);
                }
            });
        });

        $.subscribe('temp-document.success', function(event, data)
        {
            var data = JSON.parse(data);
            var inputControls = $('#'+data.element).parent('.image-upload-controls');
            var previewContainer = inputControls.siblings('.image-upload-preview');
            var iframe = previewContainer.children('iframe');
            var loaderImage = $('#'+data.element).siblings('.image-loader');

            // Fade out the loading animation, file input. Set the src of the iframe.
            loaderImage.fadeOut('slow')
                .then(function()
                {
                    inputControls.fadeOut('slow');
                    //var src = previewContainer.attr('src');
                    //iframe.attr('src', src+'/'+data.path.substr(data.path.indexOf('temp'), data.path.length));
                    iframe.attr('src', 'http://kinderfoerderungen.at/'+data.path.substr(data.path.indexOf('temp'), data.path.length));
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
                        $.publish('document-preview.close', this);
                    });
                });
        });

        // Close the document preview, and bring the input controls into view.
        $.subscribe('document-preview.close', function(event, button)
        {
            $(button).siblings('input[type="hidden"]').remove();
            //$(button).siblings('.image-upload-preview').children('iframe').attr('src', 'http://kinderfoerderungen.at');
            $(button).siblings('.image-upload-preview').children('iframe').attr('src', '');
            closeFilePreview(button);
        });

    /*
     +----------------------------------------------------------------------------------------------------
     |
     |  SUMMARY PAGE
     |
     +----------------------------------------------------------------------------------------------------
     */

        /**
         * PUBLISH EVENTS
         */
        $('.form-section-tab[data-section="4"]').on('click', function()
        {
            $.publish('summary-page.render');
        });

        /**
         * SUBSCRIBE
         */
        $.subscribe('summary-page.render', function()
        {
            var summaryItems = $('fieldset.summary-group p');
            var summaryList = $('fieldset.summary-group ul.summary-list');
            var formData = $('form#create-project input, textarea')
                .not('input[name="_token"]')
                .not('input[type="submit"]');
            // Fill each text section of the summary page.
            $.each(summaryItems, function(index, value)
            {
                var field = $(value).data('field');
                if ( field === formData.filter('#'+field).attr('name') )
                {
                    $(value).html(formData.filter('#'+field).val());
                }
            });
            // Clear the images & documents list items before looping.
            summaryList.empty();
            // Create a list of the files to upload.
            $.each(files, function(index, file)
            {
                $.each(file, function(i, value)
                {
                    summaryList.append('<li>'+value.name+'</li>');
                });
            });
            var savedFiles = $('input[type="hidden"]')
                .not('input[name="_token"]')
                .not('input[name="_method"]');
            $.each(savedFiles, function(i, value)
            {
                summaryList.append('<li>'+value.value+'</li>');
            });
        });

    /*
     +----------------------------------------------------------------------------------------------------
     |
     |  HTTP REQUESTS
     |
     +----------------------------------------------------------------------------------------------------
     */

        /**
         * PUBLISH EVENTS
         */
        // Submit Event.
        $('form#create-project').on('submit', function(event)
        {
            event.preventDefault();
            $.publish('form.submitted', $(this));
        });

        // Save Event.
        $('form#create-project .form-button[data-button="save"] > a').on('click.save', function(event)
        {
            event.preventDefault();
            $.publish('form.save', this);
        });

        // Start Project Event.
        $('form#create-project .form-button[data-button="start"]').on('click', function()
        {
            var projectTitle = $('input[name="project_name"]');
            $.publish('project.start', projectTitle);
        });

        // Delete Project Event.
        $('form#create-project .saved-project-delete').on('click', function(event)
        {
            event.preventDefault();
            $.publish('project.delete', this);
        });

        /**
         * SUBSCRIBE
         */
        /**
         * -------------------------
         * SUBMIT
         * -------------------------
         */
        $.subscribe('form.submitted', function(event, form)
        {
            var loaderImage = $(form).find('input[type="submit"]').siblings('.image-loader');
            loaderImage.fadeIn();
            // Create a new form data instance.
            var formData = new FormData();
            // Append the images and documents.
            $.each(files, function(name, field)
            {
                $.each(field, function(i, file)
                {
                    formData.append(name, file);
                });
            });
            var textInput = $('form#create-project input, textarea')
                .not('input[type="file"]')
                .not('input[type="submit"]');
            // Append the text input to the form data.
            $.each(textInput, function(i, field)
            {
                formData.append(field.name, field.value);
            });
            // Hide the flash error message, if showing.
            hideErrorFlashMessage();
            // Make the submit request.
            $.ajax({
                url : $(form).attr('action'),
                method : 'POST',
                data : formData,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response)
                {
                    loaderImage.fadeOut();

                    if ( response.errors )
                    {
                        $.publish('form-submit.fail', response);
                        return false;
                    }

                    if ( response.duplicateName )
                    {
                        displayErrorFlashMessage(response.duplicateName);
                        return false;
                    }

                    hideErrorFlashMessage();
                    $.publish('form-submit.success');
                },
                error : function(response)
                {
                    loaderImage.fadeOut();
                    displayErrorFlashMessage(' An unexpected error occurred.');
                }
            });
        });

        $.subscribe('form-submit.fail form-save.fail project-start.fail temp-document.fail', function(event, data)
        {
            var formFields = $('form#create-project input, textarea');

            // Locate each form field with an error.
            // Add an error CSS class, and display its error message.
            $.each(data.errors, function(name, message)
            {
                formFields.filter('#'+name).addClass('form-input-error');
                showErrorMessage(name, message);
            });
            // Render the section tabs with an error CSS class.
            // For those whose section contains errors.
            $.each(tabCollection, function(index, value)
            {
                checkForErrors($(value).attr('data-section'));
            });

            displayErrorFlashMessage(data.message);
        });

        $.subscribe('form-submit.success', function()
        {
            window.location = 'http://kinderfoerderungen.at/create-project/success';
        });

        /**
         * -------------------------
         * SAVE
         * -------------------------
         */
        $.subscribe('form.save', function(event, data)
        {
            if($(data).parent().hasClass('form-save-button-disabled'))
            {
                return false;
            }

            var loaderImage = $(data).siblings('.image-loader');
            loaderImage.fadeIn();

            // Create a new form data instance.
            var formData = new FormData();
            // Append the images and documents.
            $.each(files, function(name, field)
            {
                $.each(field, function(i, file)
                {
                    formData.append(name, file);
                });
            });
            var textInput = $('form#create-project input, textarea')
                            .not('input[type="file"]')
                            .not('input[type="submit"]');
            // Append the text input to the form data.
            $.each(textInput, function(i, field)
            {
                formData.append(field.name, field.value);
            });

            $.ajax({
                url : $(data).attr('href'),
                method : 'POST',
                data : formData,
                dataType: 'json',
                cache : false,
                processData : false,
                contentType : false,
                success : function(response)
                {
                    loaderImage.fadeOut();

                    // Render validation errors.
                    if ( response.errors )
                    {
                        $.publish('form-save.fail', response);
                        return false;
                    }

                    // Render duplicate name errors.
                    if ( response.duplicateName )
                    {
                        displayErrorFlashMessage(response.duplicateName);
                        return false;
                    }

                    hideErrorFlashMessage();
                    $.publish('form-save.success', response);
                },
                error : function(response)
                {
                    loaderImage.fadeOut();
                    displayErrorFlashMessage(' An unexpected error occurred.');
                }
            });
        });

        $.subscribe('form-save.success', function(event, response)
        {
            // Redirect to the edit form, for the saved project.
            window.location = response.url;
        });

        /**
         * -------------------------
         * START PROJECT
         * -------------------------
         */
        $.subscribe('project.start', function(event, data)
        {
            var startButton = $('form#create-project .form-button[data-button="start"]');
            var loaderImage = startButton.siblings('.image-loader');
            loaderImage.fadeIn();

            $.ajax({
                url : startButton.data('url'),
                method : 'POST',
                data : {project_name : data.value},
                dataType : 'json',
                success : function(response)
                {
                    // Stop the Ajax animation.
                    loaderImage.fadeOut();

                    // Render validation errors.
                    if( response.errors )
                    {
                        $.publish('project-start.fail', response);
                        return false;
                    }

                    // Remove the error feedback.
                    $('.form-section-tab[data-section="0"]').removeClass('form-section-tab-error');

                    // Render authentication errors.
                    if( response.login )
                    {
                        displayErrorFlashMessage(response.login);
                        return false;
                    }

                    // Render incomplete project errors.
                    if( response.incomplete )
                    {
                        displayErrorFlashMessage(response.incomplete);
                        return false;
                    }

                    // Render pending project error.
                    if( response.pendingProject )
                    {
                        displayErrorFlashMessage(response.pendingProject);
                        return false;
                    }

                    // Render current live project error.
                    if( response.liveProject )
                    {
                        displayErrorFlashMessage(response.liveProject);
                        return false;
                    }

                    // Publish the event of success.
                    if( response.success )
                    {
                        $.publish('project-start.success', response);
                    }
                },
                error : function(response)
                {
                    loaderImage.fadeOut();
                    displayErrorFlashMessage(' An unexpected error occurred.');
                    console.log(response);
                }
            });
        });

        $.subscribe('project-start.success', function(event, data)
        {
            var formFields = $('form#create-project input, textarea');
            var fileLabels = $('label.form-input-disabled');
            var saveButtons = $('.form-save-button-disabled');

            hideErrorFlashMessage();

            // Remove the disabled state, of form fields.
            // Clear any previous error messages.
            $.each(formFields, function(index, element)
            {
                $(element).removeAttr('disabled')
                    .removeAttr('readonly')
                    .off('click.disabled')
                    .removeClass('form-input-disabled');
                hideErrorMessage($(element).attr('name'));
                removeFailClass(element);
            });

            $.each(fileLabels, function(index, element)
            {
                $(element).off('click.disabled')
                    .removeClass('form-input-disabled');
            });

            // Enable the save buttons.
            saveButtons.removeClass('form-save-button-disabled');

            // Move user to the next section.
            makeTabActive(tabCollection, 1);
            showSection(fieldsetCollection, 1);

        });

        /**
         * -------------------------
         * DELETE PROJECT
         * -------------------------
         */
        $.subscribe('project.delete', function(event, data)
        {
            // If on the edit page, remove the PATCH method.
            $('form#create-project input[value="PATCH"]').remove();

            $('form#create-project').prepend('<input name="_method" type="hidden" value="DELETE">')
                .attr('action', $(data).attr('href'))
                .trigger('submit.delete');
        });

    /*
     +----------------------------------------------------------------------------------------------------
     |
     |  FUNCTIONS
     |
     +----------------------------------------------------------------------------------------------------
     */

        /**
         * Bring a form fieldset into view.
         *
         * @param collection
         * @param i
         */
        function showSection(collection, i)
        {
            collection.fadeOut();
            collection.eq(i).fadeIn()
        }

        /**
         * Add styles to a section tab, a visual cue to the current section.
         *
         * @param collection
         * @param i
         */
        function makeTabActive(collection, i)
        {
            collection.removeClass('form-section-tab-active');
            collection.eq(i).addClass('form-section-tab-active');
        }

        /**
         * Display the form input's error message.
         *
         * @param name
         * @param message
         */
        function showErrorMessage(name, message)
        {
            $('.form-error[data-error*="'+name+'"]').html(message).fadeIn();
        }

        /**
         * Hide the form input's error message.
         *
         * @param name
         */
        function hideErrorMessage(name)
        {
            $('.form-error[data-error*="'+name+'"]').fadeOut();
        }

        /**
         * Bring the error message at the head of form into view.
         *
         * @param message
         */
        function displayErrorFlashMessage(message)
        {
            $('.error-box').html(message).fadeIn();
        }

        /**
         * Hide the error message at the head of form.
         */
        function hideErrorFlashMessage()
        {
            $('.error-box').fadeOut().html('');
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
         * Validate a document's mime type against a 'white-list'
         *
         * @param mime
         * @returns {boolean}
         */
        function checkDocumentMime(mime)
        {
            return (   mime === 'image/jpg'
                    || mime === 'image/jpeg'
                    || mime === 'image/png'
                    || mime === 'image/bmp'
                    || mime === 'image/tiff'
                    || mime === 'application/pdf'
            );
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

        /**
         * Remove the preview image from display.
         * Bring the input controls back into view.
         *
         * @param button
         */
        function closeFilePreview(button)
        {
            var image = $(button).siblings('.image-upload-preview');
            var inputControls = $(button).siblings('.image-upload-controls');
            var inputField = inputControls.find('input');

            // Remove the value of the file input (this enables the change event to fire again).
            inputField.val('');
            // Remove the close button from the DOM.
            $(button).remove();
            // Fade out the image preview, fade in the form control. Rinse and Repeat!
            image.fadeOut('slow')
                .wait(700)
                .then(function()
                {
                    inputControls.fadeIn('slow');
                });
        }

        /**
         * Prepend a close button to the preview image.
         *
         * @param container
         * @returns {*|jQuery}
         */
        function createImageCloseButton(container)
        {
            return $('<span class="image-upload-close-button">X</span>').prependTo(container);
        }

        /**
         * Check for any validation errors, whilst moving to a new fieldset.
         * Render the section tab with feedback, if errors are present.
         *
         * @param sectionNum
         */
        function checkForErrors(sectionNum)
        {
            var section = $('fieldset[data-section="'+sectionNum+'"]');
            var sectionTab = $('.form-section-tab[data-section="'+sectionNum+'"]');

            if (section.find('.form-input-error').length > 0)
            {
                sectionTab.addClass('form-section-tab-error');
            }
            else {
                sectionTab.removeClass('form-section-tab-error');
            }
        }
})();