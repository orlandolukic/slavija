

const TypingWidgetFactory = (function(jQuery) {

    let widgets = [];
    let is_init = false;

    let SingleTypingWidget = function( idd, w, mls, wrs, dls, wt ) {
        let id = idd;
        let words = w == null ? [] : w;
        let selector = ".typing-container[data-id='" + id + "']";
        let currentWord = 0;
        let currentWordIndex = words[currentWord].list_title.length - 1;

        // Times.
        let millis = mls;
        let deletingSpeed = dls;
        let writingSpeed = wrs;
        let waitingTime = wt;

        let blinkingInterval = null;
        let workingInterval = null;
        let waitingTimeout = null;
        let operation = -1;
        let element = jQuery(selector);
        let working = false;

        let deletingIntervalHandler = function () {
            if ( currentWordIndex < 0 ) {
                window.clearInterval(workingInterval);
                workingInterval = null;
                operation = 1;
                currentWord++;
                if ( currentWord === words.length )
                    currentWord = 0;
                working = false;
                waitingTime = waitingTime / 2 + 50;
                currentWordIndex = 1;
                initiateWaitingTimeout();
            } else {
                let str = words[currentWord].list_title;
                str = str.substr(0, currentWordIndex-1);
                element.find(".text").html( str );
                currentWordIndex--;
            }
        };

        let writingIntervalHandler = function() {
            if ( currentWordIndex > words[currentWord].list_title.length ) {
                window.clearInterval( workingInterval );
                workingInterval = null;
                operation = -1;
                working = false;
                waitingTime = ( waitingTime - 50 ) * 2;
                initiateWaitingTimeout();
            } else {
                let str = words[currentWord].list_title;
                str = str.substr( 0, currentWordIndex );
                element.find(".text").html( str );
                currentWordIndex++;
            }
        };

        let initiateWaitingTimeout = function() {
            waitingTimeout = window.setTimeout(() => {
                window.clearTimeout(waitingTimeout);
                waitingTimeout = null;
                working = true;
                if ( operation < 0 ) {
                    workingInterval = window.setInterval(deletingIntervalHandler, deletingSpeed);
                } else {
                    workingInterval = window.setInterval(writingIntervalHandler, writingSpeed);
                }
                element.find(".blinker").addClass("visible");
            }, waitingTime);
        };


        let unregister = function () {
            if ( blinkingInterval )
                window.clearInterval( blinkingInterval );

            if ( waitingTimeout )
                window.clearTimeout( waitingTimeout );

            if ( workingInterval )
                window.clearInterval( workingInterval );
        };

        let initiate = function () {
            // Initiate widget!
            element.append("<div class=\"blinker\"></div>");
            element.find(".text").css( {minHeight:  element.find(".text").css('height')} );

            // Set blinking interval.
            blinkingInterval = window.setInterval(() => {
                if ( working )
                    return;
                element.find(".blinker").toggleClass( "visible" );
            }, millis);

            // Start waiting for words to change.
            initiateWaitingTimeout();

            //console.log("Widget " + id + " is initiated!");
        }

        return {
            getWords: function() { return words; },
            getId: function() { return id; },
            unregister: unregister,
            init: initiate
        };
    };

    let registerTypingWidget = function ( id, words, millis, writingSpeed, deletingSpeed, waitingTimeout ) {

        let pos = -1;
        for (let i=0; i<widgets.length; i++) {
            if ( widgets[i] && widgets[i].getId() === id )
                return;
            else if ( !widgets[i] )
                pos = i;
        }

        let widget = SingleTypingWidget(id, words, millis, writingSpeed, deletingSpeed, waitingTimeout);
        if ( pos === -1 ) {
            widgets.push( widget );
        } else {
            widgets[pos] = widget;
        }

        //console.log("Widget '" + id + "' is registered");

        setTimeout(() => {
            // Init widget
            widget.init();
        }, 200);
    }

    let init = function() {
        // // Initiate all the widgets.
        // for (let i=0; i<widgets.length; i++) {
        //     widgets[i].init();
        // }
    };

    let unregisterTypingWidget = function( id ) {
        let widget = null;
        let x = -1;
        for (let i=0; i<widgets.length && x === -1; i++) {
            if ( widgets[i].getId() === id )
                widget = widgets[x = i];
        }
        if ( widget == null )
            return;

        widgets[x] = null;
        widget.unregister();
    };

    return {
        registerTypingWidget: registerTypingWidget,
        unregisterTypingWidget: unregisterTypingWidget,
        init: init
    };

})(jQuery);