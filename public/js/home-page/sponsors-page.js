(function()
{
/*-- To make block with sponsor's name the same size as logo --*/
    var imgWidth    = $('.sponsors div img').css('width');
    var imgHeight   = $('.sponsors div img').css('height');

    $('.logo-name').css('width', imgWidth);
    $('.logo-name').css('height', imgHeight);


    /*-- To show sponsor's name on thumb hover --*/
    $('.form-element').parent().on({
        mouseenter: function()
        {
            $(this).find('.logo-name').toggleClass('hidden', false);
        },
        mouseleave: function()
        {
            $(this).find('.logo-name').toggleClass('hidden', true);
        }
    });
})();