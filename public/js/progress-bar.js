(function()
{

/*------------------------------------------------------------------*/
    /*-- PROJECT TILE PROGRESS BAR --*/
/*------------------------------------------------------------------*/
/*-- target all <p class="percentage"> --*/
    var obj = document.querySelectorAll('.percentage:not(.succ)');
    var objArray = Array.prototype.slice.call(obj);
    var l;

/*-- target all <p class="percentage"> --*/
    var objTot = document.querySelectorAll('.progress-bar');
    var ojbsecArray = Array.prototype.slice.call(obj);

    for(l=0; l<ojbsecArray.length; l++)
    {
        var curr_percentage = Math.round(objTot[l].getAttribute('aria-valuenow') * 100 / objTot[l].getAttribute('aria-valuemax'));
        objArray[l].innerHTML = curr_percentage + '%';
        objTot[l].style.width = curr_percentage +'%';
    }

})();