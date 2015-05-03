(function()
{
    /*------------------------------------------------------------------*/
    /*-- PROJECT GALLERY --*/
    /*------------------------------------------------------------------*/

    $('.project-gallery').slick(
        {
            dots: true,
            accessibillity: true,
            appendArrows: $('.arrows'),
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            arrows: true,
            pauseOnHover: true,
            pauseonDotsHover: true,
            swipe: true
        });

    /*-- Changing img size according to the window size --*/
    /*-- get all images --*/
    var aImg = document.querySelectorAll('.project-gallery-item img');
    var a;

    for(a=0 ; a<aImg.length ; a++)
    {
        /*-- change the src path of each image of main carousel according to window size --*/
        if(window.innerWidth < 768)
        {

            aImg[a].src = aImg[a].src.replace("medium", "small");

        }else if(window.innerWidth >= 1400)
        {
            aImg[a].src = aImg[a].src.replace("medium", "large");

        }
    }

    /*------------------------------------------------------------------*/
    /*-- PROGRESS BAR --*/
    /*------------------------------------------------------------------*/

    var amountRaised = document.getElementById('amount_raised').dataset.amountRaised;

    var minimumGoal = document.getElementById('minimum_goal').dataset.minimumGoal;

    var percentage = Math.round(amountRaised/minimumGoal * 100);

    //set the green width of the progress bar and display the %
    if(percentage > 100){
        document.getElementById('progress-bar').style.width = 100 + '%';
    }else{
        document.getElementById('progress-bar').style.width = percentage + '%';
    }

    document.getElementById('progress-bar').firstChild.innerHTML = percentage + '%';

    var options = {
    useEasing : true,
    useGrouping : false,
    suffix : '%'
    };
    var numAnim = new countUp("stat-count", 0, percentage, 0, 5, options);
    numAnim.start();

})();

/*------------------------------------------------------------------*/
/*-- COUNTDOWN --*/
/*------------------------------------------------------------------*/

    var GKCounter = new Class({
        final: null,
        element: null,
        finalText: '',
        dcount: null,
        hcount: null,
        mcount: null,
        scount: null,
        tempDays: 0,
        tempHours: 0,
        tempMins: 0,
        tempSecs: 0,

        initialize: function(el) {
            // set the element handler
            this.element = el;
            // get the date and time
            var dateEnd = this.element.get('data-date');
            var timeEnd = this.element.get('data-time');
            this.finalText = this.element.get('data-final');
            // parse the date and time
            dateEnd = dateEnd.split('-');
            timeEnd = timeEnd.split(':');
            // get the timezone of the date
            var dateTimezone = -1 * parseInt(this.element.get('data-timezone'), 10) * 60;
            // calculate the final date timestamp
            this.final = Date.UTC(dateEnd[2], (dateEnd[1] * 1) - 1, dateEnd[0], timeEnd[0], timeEnd[1]);
            //
            // calculate the final date according to user timezone
            //
            // - get the user timezone
            var tempd = new Date();
            var userTimezone = tempd.getTimezoneOffset();
            var newTimezoneOffset = 0;
            // if the timezones are equal - do nothing, in the other case we need calculations:
            if(dateTimezone !== userTimezone) {
                newTimezoneOffset = userTimezone - dateTimezone;
                // calculate new timezone offset to miliseconds
                newTimezoneOffset = newTimezoneOffset * 60 * 1000;
            }
            // calculate the new final time according to time offset
            this.final = this.final + newTimezoneOffset;

            //
            // So now we know the final time - let's calculate the base time for the counter:
            //

            // create the new date object
            var d = new Date();
            // calculate the current date timestamp
            var current = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds());

            //
            // calculate the difference between the dates
            //
            var diff = this.final - current;

            // if the difference is smaller than 3 seconds - then the counting was ended
            if(diff < 30 * 1000 || diff < 0) {
                this.element.set('html', '');
                this.countingEnded();
            } else {
                // in other case - let's calculate the difference in the days, hours, minutes and seconds
                var leftDays = 0;
                var leftHours = 0;
                var leftMinutes = 0;
                var leftSeconds = 0;

                leftDays = Math.floor((1.0 * diff) / (24 * 60 * 60 * 1000));

                var tempDiff = diff - (leftDays * 24 * 60 * 60 * 1000);
                leftHours = Math.floor(tempDiff / (60 * 60 * 1000));
                tempDiff = tempDiff - (leftHours * 60 * 60 * 1000);
                leftMinutes = Math.floor(tempDiff / (60 * 1000));
                tempDiff = tempDiff - (leftMinutes * 60 * 1000);
                leftSeconds = Math.floor(tempDiff / 1000);
                // set the counter handlers
                this.dcount = document.id('countdown-days');
                this.hcount = document.id('countdown-hours');
                this.mcount = document.id('countdown-minutes');
                this.scount = document.id('countdown-seconds');
                // run the initial animation
                this.tick();
            }
        },

        // function used to tick the counter ;-)
        tick: function() {
            // create the new date object
            var d = new Date();
            // calculate the current date timestamp
            var current = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds());
            //
            // calculate the difference between the dates
            //
            var diff = this.final - current;

            // if the difference is smaller than 1 second - then the counting was ended
            if(diff < 1 * 1000) {
                this.countingEnded();
            } else {
                // in other case - let's calculate the difference in the days, hours, minutes and seconds
                var leftDays = 0;
                var leftHours = 0;
                var leftMinutes = 0;
                var leftSeconds = 0;

                leftDays = Math.floor((1.0 * diff) / (24 * 60 * 60 * 1000));
                var tempDiff = diff - (leftDays * 24 * 60 * 60 * 1000);
                leftHours = Math.floor(tempDiff / (60 * 60 * 1000));
                tempDiff = tempDiff - (leftHours * 60 * 60 * 1000);
                leftMinutes = Math.floor(tempDiff / (60 * 1000));
                tempDiff = tempDiff - (leftMinutes * 60 * 1000);
                leftSeconds = Math.floor(tempDiff / 1000);

                this.dcount.set('text', ((leftDays < 10) ? '0' : '') + leftDays);
                this.hcount.set('text', ((leftHours < 10) ? '0' : '') + leftHours)
                this.mcount.set('text', ((leftMinutes < 10) ? '0' : '') + leftMinutes)
                this.scount.set('text', ((leftSeconds < 10) ? '0' : '') + leftSeconds);

                var $this = this;

                setTimeout(function() {
                    $this.tick();
                }, 1000);
            }
        },

        // function used when the time is up ;-)
        countingEnded: function() {
            // set the H3 element with the final text
            this.element.set('html', '<h2>' + this.finalText + '</h2>');
        }
    });

    new GKCounter(document.id('countdown'));

