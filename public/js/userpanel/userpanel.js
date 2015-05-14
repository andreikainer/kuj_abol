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