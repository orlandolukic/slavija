
const TestimonialsFactory = (function($) {

    let list = LinkedList();

    $(window).resize((e) => {
        list.forEach((item) => {
            item.destroy();
            item.init();
        });
    });

    let TestimonialInstance = function(obj) {
        let object = $.extend({
            id: null,
            intervalTicks: 3,
            slidingInterval: 700,
            slidingRetracement: 200
        }, obj);
        let id = object.id;
        let wrapper = $(".testimonials-wrapper[data-id='" + id + "']");
        let testimonialsPlaceholder = wrapper.find(".testimonials-placeholder");
        let testimonialsCount = wrapper.attr('data-testimonials-count');
        let testimonialsButtonNavigationPlaceholder = wrapper.find(".testimonials-bottom-navigation-placeholder");
        let TESTIMONIALS_PLACEHOLDER_WIDTH, TESTIMONIALS_PLACEHOLDER_HEIGHT;
        let intervalSliding = null;
        let allowTicks = true;
        let currentTicks = object.intervalTicks;
        let changeTestimonial;
        let currentTestimonialIndex = 0;

        let init = function() {
            // Set width.
            testimonialsPlaceholder.find( ".testimonial-list" ).width(
                testimonialsPlaceholder.width() * testimonialsCount + (testimonialsCount-1) * 150
            );
            TESTIMONIALS_PLACEHOLDER_WIDTH = testimonialsPlaceholder.width();
            TESTIMONIALS_PLACEHOLDER_HEIGHT = testimonialsPlaceholder.find( ".testimonial-list" ).height();
            testimonialsPlaceholder.find("li").each((i, v) => {
                $(v).width( TESTIMONIALS_PLACEHOLDER_WIDTH );
                $(v).height( TESTIMONIALS_PLACEHOLDER_HEIGHT );
            });

            wrapper.find(".testimonials-loader").addClass("not-visible");
            testimonialsPlaceholder.addClass("visible");
            wrapper.find(".testimonials-bottom-navigation").addClass('visible');

            let removeAllSelectionOnBottomNavigation = function() {
                testimonialsButtonNavigationPlaceholder.find(".testimonials-change-button").each((i, v) => {
                    $(v).removeClass("selected");
                });
            };

            wrapper.find(".testimonials-bottom-navigation .testimonials-change-button").each( function(i, v) {
                $(v).on("click", function(e) {
                    if ( !allowTicks )
                        return;
                    allowTicks = false;
                    removeAllSelectionOnBottomNavigation();
                    $(this).addClass("selected");
                    currentTicks = object.intervalTicks;
                    changeTestimonial(i);
                });
            } );

            testimonialsPlaceholder.find( ".testimonial-list li" ).each((i,v) => {
                $(v).mouseenter((e) => {
                    allowTicks = false;
                }).mouseleave((e) => {
                    currentTicks = Math.floor( object.intervalTicks / 2 );
                    allowTicks = true;
                });
            });

            // Sliding interval
            intervalSliding = window.setInterval(() => {
                if ( allowTicks ) {
                    if (currentTicks === 0) {
                        currentTicks = object.intervalTicks;
                        changeTestimonial(-1);
                    } else
                        currentTicks--;
                }
            }, 1000 );
        }

        let moveToZero = function () {
            currentTestimonialIndex = 0;
            testimonialsButtonNavigationPlaceholder.find(".testimonials-change-button").each((i, v) => {
                if ( i === 0 ) {
                    $(v).addClass("selected");
                } else
                    $(v).removeClass("selected");
            });
            testimonialsPlaceholder.find(".testimonial-list li").each((i, v) => {
                $(v).animate({left: 0}, object.slidingRetracement, 'swing', () => {
                    allowTicks = true;
                });
            });
        };

        changeTestimonial = function( slide ) {

            if ( slide > -1 && slide <= testimonialsCount ) {
                if ( slide === 0 ) {
                    moveToZero();
                    return;
                } else {
                    let disp;
                    let sign = slide > currentTestimonialIndex ? "-" : "+";
                    disp = Math.abs( slide - currentTestimonialIndex );
                    let arr = [];
                    testimonialsPlaceholder.find(".testimonial-list li").each((i, v) => {
                        arr.push( new Promise((resolve, reject) => {
                            $(v).animate({
                                left:  sign + "=" + ((TESTIMONIALS_PLACEHOLDER_WIDTH + 150) * disp)
                            }, object.slidingRetracement, 'swing', () => {
                                resolve();
                            })
                        }) );
                    });
                    Promise.all(arr).then(() => {
                        currentTestimonialIndex = slide;
                        currentTicks = object.intervalTicks;
                        allowTicks = true;
                    });
                    return;
                }
            }

            if ( currentTestimonialIndex === testimonialsCount - 1 ) {
                moveToZero();
            } else {

                allowTicks = false;

                let promise1 = new Promise((resolve, reject) => {
                    testimonialsPlaceholder.find(".testimonial-list li:eq(" + currentTestimonialIndex + ")").animate({
                        left: "-=" + (TESTIMONIALS_PLACEHOLDER_WIDTH + 150)
                    }, object.slidingInterval, 'swing', () => {
                        resolve();
                    });
                });
                let promise2 = new Promise( (resolve, reject) => {
                    testimonialsPlaceholder.find(".testimonial-list li:eq(" + (currentTestimonialIndex+1) + ")").animate({
                        left: "-=" + (TESTIMONIALS_PLACEHOLDER_WIDTH + 150)
                    }, object.slidingInterval, 'swing', () => {
                        resolve();
                    });
                });

                testimonialsButtonNavigationPlaceholder.find(".testimonials-change-button:eq(" + currentTestimonialIndex + ")").removeClass("selected");
                testimonialsButtonNavigationPlaceholder.find(".testimonials-change-button:eq(" + (currentTestimonialIndex+1) + ")").addClass("selected");

                Promise.all([promise1, promise2] ).then((response) => {
                    currentTestimonialIndex++;
                    allowTicks = true;
                });
            }
        };

        let destroy = function() {
            window.clearInterval(intervalSliding);
            testimonialsButtonNavigationPlaceholder.find(".testimonials-change-button").each((i, v) => {
                $(v).off("click");
            });
        };

        // Initiate!
        init();

        return {
            getId: function() { return id; },
            equals: function(_id) { return id === _id; },
            destroy: destroy,
            init: init
        }
    };

    let init = function( obj ) {
        setTimeout(() => {

            if ( !list.contains(obj.id) )
                list.insert( TestimonialInstance(obj) );

        }, 500);
    }

    let destroy = function() {

        if ( list != null ) {
            list.forEach((item) => {
                item.destroy();
            });
        }
        list = LinkedList();

    }

    return {
        init: init,
        destroy: destroy
    }
})(jQuery);
