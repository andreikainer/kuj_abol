(function()
{

    /**
     * Messages Object
     */

    var errorMessages = {
        'disabled' : 'Please name your project, and click "Start Project" to enable form.'
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




    /**
     * Subscribe to Events.
     */

    $.subscribe('section-tab.click', function(event, data)
    {
        var fieldsetCollection = $('fieldset');
        var tabCollection = $('.form-section-tab');
        showSection(fieldsetCollection, data.getAttribute('data-section'));
        makeTabActive(tabCollection, data);
    });

    $.subscribe('disabled-input.click', function(event, data)
    {
        var name = (data.hasAttribute('name')) ? data.getAttribute('name') : data.getAttribute('for');
        showErrorMessage(name, errorMessages.disabled);
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
})();