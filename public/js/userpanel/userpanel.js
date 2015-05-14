var fieldsetCollection = $('div.userpanel-tab');
var tabCollection = $('.form-section-tab');

$('.form-section-tab').on('click', function()
{
    $.publish('section-tab.click', this);
});

$.subscribe('section-tab.click', function(event, data)
{
    showSection(fieldsetCollection, $(data).data('section'));
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

