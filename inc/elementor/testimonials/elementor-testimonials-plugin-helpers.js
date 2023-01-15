
const ElementorTestimonialsPluginHelpers = (function($) {

    let printDimensions = function( type, dimensionObj ) {
        return type + ": " + dimensionObj.top + dimensionObj.unit + " "
            + dimensionObj.right + dimensionObj.unit + " "
            + dimensionObj.bottom + dimensionObj.unit + " "
            + dimensionObj.left + dimensionObj.unit;
    };

    return {
        printDimensions: printDimensions
    };
})(jQuery);