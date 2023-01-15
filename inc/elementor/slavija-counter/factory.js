
const CounterFactory = (function( $ ){

    let list = LinkedList();

    let extendObject = function (obj) {
        return $.extend( {
            id: null,
            countFrom: 0,
            countTo: 1000,
            countDuration: 2000,
            countDelay: 100,
            countOffset: 500
        }, obj );
    };

    // ===================================================================================================
    //      Single counter
    // ===================================================================================================
    let SingleCounter = function (obj) {

        let id = obj.id;
        let container = $(".number-placeholder[data-id=\"" + obj.id + "\"]");
        let start;
        let isCounted = false;

        // let count = (p) => {
        //
        //     let n;
        //     if ( currentNumber === obj.countTo ) {
        //         window.clearInterval(counterInterval);
        //         counterInterval = null;
        //     } else {
        //         if ( currentNumber + obj.countStep > obj.countTo ) {
        //             currentNumber = obj.countTo;
        //         } else
        //             currentNumber += obj.countStep;
        //         container.find(".number .number-content").html( currentNumber );
        //     }
        //
        // };

        start = () => {
            setTimeout(() => {
                container.addClass("count-started");
                setTimeout(() => {
                    $({Counter: obj.countFrom}).animate({Counter: obj.countTo}, {
                        duration: obj.countDuration,
                        easing: 'swing',
                        step: function () {
                            container.find(".number .number-content").html(Math.ceil(this.Counter));
                        }
                    });
                }, obj.countDelay / 2);
            }, obj.countDelay);
        };

        if ( $(document).scrollTop() > container.offset().top - obj.countOffset ) {
            start();
        } else {
            let onScroll = function (e) {
                if ($(document).scrollTop() > container.offset().top - obj.countOffset) {
                    start();
                    $(window).off("scroll", onScroll);
                }
            };
            $(window).on("scroll", onScroll);
        };

        let destroy = function () {

        };

        return {
            equals: function(idd) { return id === idd; },
            destroy: destroy,
            getId: function() { return obj.id; }
        };
    };

    // ===================================================================================================

    let produce = function( obj ) {
        obj = extendObject(obj);

        if ( obj.id === null )
        {
            console.error("Cannot create counter with NULL ID");
            return;
        }

        if ( obj.id == null || list.contains(obj.id) )
            return;

        let counter = SingleCounter(obj);
        list.insert(counter);
    };

    // ===================================================================================================
    //      Re-registers counter within the factory.
    // ===================================================================================================
    let reregister = function (obj) {
        obj = extendObject(obj);

        if ( obj.id === null || obj.id === "" )
        {
            console.error("Cannot create counter with NULL ID");
            return;
        };

        let ins = null;

        list.forEach((elem) => {
            if ( elem.getId() === obj.id )
                ins = elem;
        });

        if ( ins != null ) {
            ins.destroy();
            list.delete(ins);
        }
        ins = SingleCounter(obj);
        list.insert(ins);
    };

    return {
        produce: produce,
        reregister: reregister
    };
})(jQuery);