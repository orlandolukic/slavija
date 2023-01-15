(function( $ ) {
    $(window).on("load", function(e) {
        $(".caret-expansion").on("click", function(e) {            

            let $parent = $(this).parent();
            let hasClass = $parent.hasClass("children-expanded");         

            // Remove 'expanded' class from all of menu items
            $(".mobile-menu-list li").removeClass("children-expanded");

            if ( hasClass ) {
                $parent.removeClass("children-expanded");                              
            } else {
                $parent.addClass("children-expanded");                              
            }

            // Stop propagation so this class won't be removed
            e.stopPropagation();

        });

        $(".mobile-menu-list > li > a").on("click", function(e) {                        
            $(".mobile-menu-list > li").removeClass("children-expanded");
        });
    })
})(jQuery);