
(function( $ ) {
    let x = 820;
    let last = 0;
    let direction;
    let isScrolling = false;
    let isContacted = false;
    let isOpeniongMobileMenu = false;

    document.onselectstart = function(e) {
        return false;
    }

    $(window).on("load", function (e1) {

        if ( $(".welcome-placeholder").length > 0 ) {
            let y = jQuery(".welcome-placeholder").css('height');
            y = y.replace(/px/g, "");
            x = parseFloat(y) - 130;
        }

        $(".scroll-wrapper").on("click", function (e) {
            if ( isScrolling )
                return;
            isScrolling = true;
            $("body,html").animate({
                scrollTop: 0
            }, 1000, 'swing', function () {
                isScrolling = false;
            });
        });

        //console.log( $(".loader-wrapper") );
        setTimeout(function() {
            $(".loader-wrapper").animate({
                opacity: 0
            }, 600, 'swing', function () {
                $(this).remove();
            });
        }, 400);

        $(".apply-for-contact").on("click", function() {
            if ( isContacted ) {
                return false;
            }
            isContacted = true;
            $(this).addClass("disabled");
            $(this).find(".regular").addClass("not-visible");
            $(this).find(".loading").addClass("visible");
            setTimeout(function() {
                window.location.href = "/zakazite-sastanak";
            }, 1000);
        });

        $(".mobile-menu-icon div.icon").on("click", function(e) {
            if ( isOpeniongMobileMenu )
                return;

            isOpeniongMobileMenu = true;
            $(".mobile-menu-placeholder").show(function() {
                $(this).addClass("opened");
                isOpeniongMobileMenu = false;
            });
        });

        $(".mobile-menu-close, .mobile-menu-overlay").on("click", function(e) {
            if ( isOpeniongMobileMenu )
                return;
            isOpeniongMobileMenu = true;
            $(".mobile-menu-placeholder").removeClass("opened");
            setTimeout(function() {
                $(".mobile-menu-list li").removeClass("children-expanded");
                $(".mobile-menu-placeholder").hide();
                isOpeniongMobileMenu = false;
            }, 700);
        });
    });

    $(window).on("scroll", function (e) {
        let st = $(document).scrollTop();
        direction = st > last ? 1 : -1;

        if ( st > 200 && st < x ) {
            if ( direction < 0 ) {
                $(".menu-container").addClass("slowly-remove");
            }
            $(".menu-container").addClass("middle-fixed").removeClass("fixed");
            $(".scroll-wrapper").addClass("not-visible");
            $(".contact-us-button").addClass("not-visible");
        } else if ( st >= x ) {
            $(".menu-container").addClass("fixed").addClass("middle-fixed").removeClass("slowly-remove");
            $(".scroll-wrapper").removeClass("not-visible");
            $(".contact-us-button").removeClass("not-visible");
        } else {
            $(".menu-container").removeClass("fixed").removeClass("middle-fixed").removeClass("slowly-remove");
            $(".scroll-wrapper").addClass("not-visible");
            $(".contact-us-button").addClass("not-visible");            
        }

        last = st;
    });
})(jQuery);