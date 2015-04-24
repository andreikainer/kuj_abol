(function()
{
    // on click of section tabs, serve up the correct fieldset.
    // and hide the others
    $('li.form-section-tab').on('click', function()
    {
        $.publish('section-tab.click', this.getAttribute('data-section'));
    });

    $.subscribe('section-tab.click', function(event, data)
    {
        var collection = $('fieldset');
        showSection(collection, data);
    });


    function showSection(collection, i)
    {
        collection.fadeOut();
        collection.eq(i-1).fadeIn()
    }
})();